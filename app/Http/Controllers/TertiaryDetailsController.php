<?php

namespace App\Http\Controllers;

use App\Models\TertiaryDetails;
use App\Models\AttachedDocuments;
use Illuminate\Http\Request;

class TertiaryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tertiarydetails = TertiaryDetails::all();
        return view('tertiarydetails.index', compact('tertiarydetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tertiarydetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'institution_name' => 'nullable|string|max:255',
            'start_year' => 'nullable|integer',
            'start_month' => 'nullable|string|max:255',
            'completion_year' => 'nullable|integer',
            'completion_month' => 'nullable|string|max:255',
            'certificate_obtained' => 'nullable|string|max:255',

            'institution_name2' => 'nullable|string|max:255',
            'start_year2' => 'nullable|integer',
            'start_month2' => 'nullable|string|max:255',
            'completion_year2' => 'nullable|integer',
            'completion_month2' => 'nullable|string|max:255',
            'certificate_obtained2' => 'nullable|string|max:255',

            'institution_name3' => 'nullable|string|max:255',
            'start_year3' => 'nullable|integer',
            'start_month3' => 'nullable|string|max:255',
            'completion_year3' => 'nullable|integer',
            'completion_month3' => 'nullable|string|max:255',
            'certificate_obtained3' => 'nullable|string|max:255',
        ]);

        // Automatically assign the authenticated user's app_id
        $data['app_id'] = auth()->user()->app_id;

        TertiaryDetails::create($data);

        return redirect()->route('attacheddocuments.create')->with('success', 'Tertiary Details added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $app_id)
    {
        $td = TertiaryDetails::where('app_id', $app_id)->first();
        $atd = AttachedDocuments::where('app_id', $app_id)->first();
        
        if (!$td) {
            return redirect()->back()->with('error', 'Tertiary Details not found.');
        }

        return view('user.tertiarydetails.edit', compact('td', 'atd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $app_id)
    {
        $data = $request->validate([
            'institution_name' => 'nullable|max:255',
            'start_year' => 'nullable|integer',
            'start_month' => 'nullable|string|max:255',
            'completion_year' => 'nullable|integer',
            'completion_month' => 'nullable|string|max:255',
            'certificate_obtained' => 'nullable|string|max:255',

            'institution_name2' => 'nullable|string|max:255',
            'start_year2' => 'nullable|integer',
            'start_month2' => 'nullable|string|max:255',
            'completion_year2' => 'nullable|integer',
            'completion_month2' => 'nullable|string|max:255',
            'certificate_obtained2' => 'nullable|string|max:255',

            'institution_name3' => 'nullable|string|max:255',
            'start_year3' => 'nullable|integer',
            'start_month3' => 'nullable|string|max:255',
            'completion_year3' => 'nullable|integer',
            'completion_month3' => 'nullable|string|max:255',
            'certificate_obtained3' => 'nullable|string|max:255',
        ]);

        $td = TertiaryDetails::where('app_id', $app_id)->first();

        if (!$td) {
            return redirect()->back()->with('error', 'Tertiary Details not found.');
        }

        $td->update($data);

        return redirect()->route('tertiarydetails.edit', $app_id)
            ->with('success', 'Tertiary Details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TertiaryDetails $tertiaryDetail)
    {
        //
    }
}
