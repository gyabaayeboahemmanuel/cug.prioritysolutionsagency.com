<?php

namespace App\Http\Controllers;

use App\Models\EmploymentDetail;
use Illuminate\Http\Request;

class EmploymentDetailController extends Controller
{
    /**
     * Display a listing of the employment details.
     */
    public function index()
    {
        $employmentDetails = EmploymentDetail::all();
        return view('user.employmentdetails.index', compact('employmentDetails'));
    }

    /**
     * Show the form for creating a new employment detail.
     */
    public function create()
    {
        return view('user.employmentdetails.create');
    }

    /**
     * Store a newly created employment detail in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'app_id' => 'required|string',
            'employer_name' => 'nullable|string|max:255',
            'employer_phone' => 'nullable|string|max:15',
            'employer_address' => 'nullable|string|max:255',
            'employer_email' => 'nullable|email|max:255',
            'employment_from' => 'nullable|date',
            'employment_to' => 'nullable|date',
            'current_position' => 'nullable|string|max:255',
            'responsibilities' => 'nullable|string',
            'prev_employer_name' => 'nullable|string|max:255',
            'prev_employer_phone' => 'nullable|string|max:15',
            'prev_employer_address' => 'nullable|string|max:255',
            'prev_employer_email' => 'nullable|email|max:255',
            'prev_employment_from_month' => 'nullable|string|max:20',
            'prev_employment_from_year' => 'nullable|string|max:4',
            'prev_employment_to_month' => 'nullable|string|max:20',
            'prev_employment_to_year' => 'nullable|string|max:4',
            'prev_position' => 'nullable|string|max:255',
            'prev_responsibilities' => 'nullable|string',
        ]);

        EmploymentDetail::create($validated);

        return redirect()->route('employmentdetails.index')
            ->with('success', 'Employment Details added successfully.');
    }

    /**
     * Display the specified employment detail.
     */
    public function show(EmploymentDetail $employmentDetail)
    {
        return view('user.employmentdetails.show', compact('employmentDetail'));
    }

    /**
     * Show the form for editing the specified employment detail.
     */
    public function edit(EmploymentDetail $employmentDetail)
    {
        return view('user.employmentdetails.edit', compact('employmentDetail'));
    }

    /**
     * Update the specified employment detail in storage.
     */
    public function update(Request $request, EmploymentDetail $employmentDetail)
    {
        $validated = $request->validate([
            'app_id' => 'required|string',
            'employer_name' => 'nullable|string|max:255',
            'employer_phone' => 'nullable|string|max:15',
            'employer_address' => 'nullable|string|max:255',
            'employer_email' => 'nullable|email|max:255',
            'employment_from' => 'nullable|date',
            'employment_to' => 'nullable|date',
            'current_position' => 'nullable|string|max:255',
            'responsibilities' => 'nullable|string',
            'prev_employer_name' => 'nullable|string|max:255',
            'prev_employer_phone' => 'nullable|string|max:15',
            'prev_employer_address' => 'nullable|string|max:255',
            'prev_employer_email' => 'nullable|email|max:255',
            'prev_employment_from_month' => 'nullable|string|max:20',
            'prev_employment_from_year' => 'nullable|string|max:4',
            'prev_employment_to_month' => 'nullable|string|max:20',
            'prev_employment_to_year' => 'nullable|string|max:4',
            'prev_position' => 'nullable|string|max:255',
            'prev_responsibilities' => 'nullable|string',
        ]);

        $employmentDetail->update($validated);

        return redirect()->route('employmentdetails.index')
            ->with('success', 'Employment Details updated successfully.');
    }

    /**
     * Remove the specified employment detail from storage.
     */
    public function destroy(EmploymentDetail $employmentDetail)
    {
        $employmentDetail->delete();
        return redirect()->route('employmentdetails.index')
            ->with('success', 'Employment Details deleted successfully.');
    }
}
