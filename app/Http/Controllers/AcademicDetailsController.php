<?php

namespace App\Http\Controllers;

use App\Models\AcademicDetails;
use Illuminate\Http\Request;

class AcademicDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicDetails = AcademicDetails::all();
        return view('academicdetails.index', compact('academicDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.academicdetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $data = $request->validate([
            'app_id' => 'required|max:255',
            // First academic details
            'name_of_shs' => 'required|string|max:255',
            'course_offered' => 'required|string|max:255',
            'start_date' => 'required|date',
            'completion_date' => 'required|date',
            'exams_type' => 'required|string|max:255',
            'index_number' => 'required|string|max:255',
            'exams_year' => 'required|numeric|digits:4',
            // Second academic details (nullable)
            'name_of_shs2' => 'nullable|string|max:255',
            'course_offered2' => 'nullable|string|max:255',
            'start_date2' => 'nullable|date',
            'completion_date2' => 'nullable|date',
            'exams_type2' => 'nullable|string|max:255',
            'index_number2' => 'nullable|string|max:255',
            'exams_year2' => 'nullable|numeric|digits:4',
            // Third academic details (nullable)
            'name_of_shs3' => 'nullable|string|max:255',
            'course_offered3' => 'nullable|string|max:255',
            'start_date3' => 'nullable|date',
            'completion_date3' => 'nullable|date',
            'exams_type3' => 'nullable|string|max:255',
            'index_number3' => 'nullable|string|max:255',
            'exams_year3' => 'nullable|numeric|digits:4',
        ]);

        // Create a new record in the database
        AcademicDetails::create($data);

        // Redirect to the next step
        return redirect()->route('tertiarydetails.create')
                         ->with('success', 'Academic Details added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $app_id)
    {
        // Retrieve Academic Details using the app_id
        $ad = AcademicDetails::where('app_id', $app_id)->first();

        if (!$ad) {
            return redirect()->back()->with('error', 'Academic Details not found.');
        }

        // Render the edit view
        return view('user.academicdetails.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $app_id)
    {
        // Validate request data
        $data = $request->validate([
            'name_of_shs' => 'required|string|max:255',
            'course_offered' => 'required|string|max:255',
            'start_date' => 'required|date',
            'completion_date' => 'required|date',
            'exams_type' => 'required|string|max:255',
            'index_number' => 'required|string|max:255',
            'exams_year' => 'required|numeric|digits:4',
            // Second academic details (nullable)
            'name_of_shs2' => 'nullable|string|max:255',
            'course_offered2' => 'nullable|string|max:255',
            'start_date2' => 'nullable|date',
            'completion_date2' => 'nullable|date',
            'exams_type2' => 'nullable|string|max:255',
            'index_number2' => 'nullable|string|max:255',
            'exams_year2' => 'nullable|numeric|digits:4',
            // Third academic details (nullable)
            'name_of_shs3' => 'nullable|string|max:255',
            'course_offered3' => 'nullable|string|max:255',
            'start_date3' => 'nullable|date',
            'completion_date3' => 'nullable|date',
            'exams_type3' => 'nullable|string|max:255',
            'index_number3' => 'nullable|string|max:255',
            'exams_year3' => 'nullable|numeric|digits:4',
        ]);

        // Retrieve existing academic details by app_id
        $ad = AcademicDetails::where('app_id', $app_id)->first();

        if (!$ad) {
            return redirect()->back()->with('error', 'Academic Details not found.');
        }

        // Update the existing record
        $ad->update($data);

        return redirect()->route('academicdetails.edit', $app_id)
                         ->with('success', 'Academic Details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $app_id)
    {
        $ad = AcademicDetails::where('app_id', $app_id)->first();
        
        if (!$ad) {
            return redirect()->back()->with('error', 'Academic Details not found.');
        }

        $ad->delete();

        return redirect()->route('academicdetails.index')
                         ->with('success', 'Academic Details deleted successfully.');
    }
}
