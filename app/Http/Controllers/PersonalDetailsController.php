<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalDetails;
use App\Models\ProgramDetails;
use Illuminate\Support\Facades\Storage;

class PersonalDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = PersonalDetails::all();
        return view('personaldetails.edit', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.personaldetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'academic_year' => 'required|string',
            'form_type' => 'required|in:undergraduate,postgraduate',
            'app_id' => 'required|max:255|unique:personal_details,app_id',
            'title' => 'nullable',
            'surname' => 'required|max:255',
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'nullable|max:255',
            'region_of_birth' => 'nullable|max:255',
            'hometown' => 'nullable|max:255',
            'region_of_hometown' => 'nullable|max:255',
            'country' => 'required|max:255',
            'marital_status' => 'required',
            'number_of_children' => 'nullable|integer',
            'religion' => 'nullable|max:255',
            'worship_place' => 'nullable|max:255',
            'is_employed' => 'required|max:255',
            'occupation' => 'nullable|max:255',
            'facility' => 'nullable|max:255',
            'intend_finance_education' => 'required|max:255',
            'avatar' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('profile', 'public');
        }

        // Create a new personal details entry
        $newPersonalDetails = PersonalDetails::create($data);

        if (!$newPersonalDetails) {
            return redirect()->back()->with('error', 'Personal details upload was not successful.');
        }

        return redirect()->route('contactdetails.create')->with('success', 'Personal Details added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = PersonalDetails::findOrFail($id);
        return view('home', ['detail' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $app_id)
    {
        $pd = PersonalDetails::where('app_id', $app_id)->first();

        if (!$pd) {
            return redirect()->back()->with('error', 'Personal details not found.');
        }

        return view('user.personaldetails.edit', compact('pd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $app_id)
    {
        $data = $request->validate([
            'academic_year' => 'required|string',
            'form_type' => 'required|in:undergraduate,postgraduate',
            'title' => 'nullable',
            'surname' => 'required|max:255',
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'nullable|max:255',
            'region_of_birth' => 'nullable|max:255',
            'hometown' => 'nullable|max:255',
            'region_of_hometown' => 'nullable|max:255',
            'country' => 'required|max:255',
            'marital_status' => 'required',
            'number_of_children' => 'nullable|integer',
            'religion' => 'nullable|max:255',
            'worship_place' => 'nullable|max:255',
            'is_employed' => 'required|max:255',
            'occupation' => 'nullable|max:255',
            'facility' => 'nullable|max:255',
            'intend_finance_education' => 'required|max:255',
            'avatar' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pd = PersonalDetails::where('app_id', $app_id)->first();

        if (!$pd) {
            return redirect()->back()->with('error', 'Personal details not found.');
        }

        if ($request->hasFile('avatar')) {
            // Delete the old avatar if exists
            if ($pd->avatar) {
                Storage::delete('public/' . $pd->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('profile', 'public');
        }

        $pd->update($data);

        return redirect()->route('personaldetails.edit', $app_id)->with('success', 'Personal Details updated successfully.');
    }

    /**
     * Display a listing of applicants in the admin panel.
     */
    public function adminIndex(Request $request)
    {
        $query = PersonalDetails::join('program_details', 'personal_details.app_id', '=', 'program_details.app_id')
            ->select('personal_details.app_id', 'personal_details.surname', 'personal_details.first_name', 'program_details.program_of_choice');

        // Apply sorting
        $sortField = $request->get('sort', 'app_id'); // Default sort by 'app_id'
        $sortDirection = $request->get('direction', 'asc'); // Default direction is 'asc'
        $query->orderBy($sortField, $sortDirection);

        // Paginate results
        $details = $query->paginate(1000);

        return view('admin.applicants.index', compact('details', 'sortField', 'sortDirection'));
    }
}
