<?php

namespace App\Http\Controllers;

use App\Models\FamilyDetails;
use Illuminate\Http\Request;

class FamilyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = FamilyDetails::all();
        return view('familydetails.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.familydetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'app_id' => 'required|max:255',
            'father_full_name' => 'required|max:255',
            'father_status' => 'required|max:255',
            'father_contact' => 'max:20',
            'father_occupation' => 'max:255',
            'father_address' => 'max:255',
            'mother_full_name' => 'required|max:255',
            'mother_status' => 'required|max:255',
            'mother_address' => 'max:255',
            'mother_contact' => 'max:20',
            'mother_occupation' => 'max:255',
            'guardian_name' => 'max:255',
            'relation_to_applicant' => 'max:255',
            'guardian_address' => 'max:255',
            'guardian_occupation' => 'max:255',
            'guardian_phone_number' => 'max:20',
        ]);
    
        // Create the new family details record
        $newFamilyDetails = FamilyDetails::create($data);

        // Redirect with success message
        if (!$newFamilyDetails) {
            return redirect()->back()->with('error', 'Family Details upload was not successful.');
        }

        return redirect()->route('programdetails.create')->with('success', 'Family Details added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $app_id)
    {
        $fd = FamilyDetails::where('app_id', $app_id)->first();

        if (!$fd) {
            return redirect()->back()->with('error', 'Family Details not found.');
        }

        return view('user.familydetails.edit', compact('fd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $app_id)
    {
        $data = $request->validate([
            'app_id' => 'required|max:255',
            'father_full_name' => 'required|max:255',
            'father_status' => 'required|max:255',
            'father_contact' => 'max:20',
            'father_occupation' => 'max:255',
            'father_address' => 'max:255',
            'mother_full_name' => 'required|max:255',
            'mother_status' => 'required|max:255',
            'mother_address' => 'max:255',
            'mother_contact' => 'max:20',
            'mother_occupation' => 'max:255',
            'guardian_name' => 'max:255',
            'relation_to_applicant' => 'max:255',
            'guardian_address' => 'max:255',
            'guardian_occupation' => 'max:255',
            'guardian_phone_number' => 'max:20',
        ]);

        $fd = FamilyDetails::where('app_id', $app_id)->first();

        if (!$fd) {
            return redirect()->back()->with('error', 'Update failed: Family Details not found.');
        }

        $fd->update($data);

        return redirect()->route('familydetails.edit', $app_id)->with('success', 'Family Details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
