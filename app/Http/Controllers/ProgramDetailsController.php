<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramDetails;
use App\Models\Programme;
use App\Models\AcademicDetails;

class ProgramDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = ProgramDetails::all();
        return view('programdetails.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programmes = Programme::all();
        return view('user.programdetails.create', compact('programmes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'app_id' => 'required|max:255',
            'program' => 'required|string|max:255',
            'program_of_choice' => 'required|string|max:255',
            'streams' => 'required|string',
        ]);

        // Create the new program details record
        ProgramDetails::create($validatedData);

        return redirect()->route('academicdetails.create')->with('success', 'Program Details added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $app_id)
    {
        $pgd = ProgramDetails::where('app_id', $app_id)->first();
        $programmes = Programme::all();

        if (!$pgd) {
            return redirect()->back()->with('error', 'Programme details not found.');
        }

        return view('user.programdetails.edit', compact('pgd', 'programmes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $app_id)
    {
        $validatedData = $request->validate([
            'app_id' => 'required|max:255',
            'program' => 'required|string|max:255',
            'program_of_choice' => 'required|string|max:255',
            'streams' => 'required|string',
        ]);

        $pgd = ProgramDetails::where('app_id', $request->app_id)->first();

        if (!$pgd) {
            return redirect()->back()->with('error', 'Programme details not found.');
        }

        // Update the program details
        $pgd->update($validatedData);

        return redirect()->route('programdetails.edit', $app_id)
            ->with('success', 'Programme updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
