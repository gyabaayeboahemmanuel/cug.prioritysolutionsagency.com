<?php

namespace App\Http\Controllers;

use App\Models\ContactDetails;
use Illuminate\Http\Request;

class ContactDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = ContactDetails::all();
        return view('contactdetails.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.contactdetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'app_id' => 'required|max:255',
            'phone_number' => 'required|string',
            'online_number' => 'nullable|string',
            'email_address' => 'required|string|email|max:255|unique:contact_details,email_address',
            'postal_address' => 'required|string|max:255',
            'city_of_post_office_box' => 'nullable|string|max:100',
            'residential_address' => 'required|string|max:255',
        ]);

        // Create new contact details
        $newContactDetails = ContactDetails::create($data);

        // Redirect back with success message or to another page
        if (!$newContactDetails) {
            return redirect()->back()->with('error', 'Contact Details upload was not successful.');
        }

        return redirect()->route('familydetails.create')->with('success', 'Contact Details added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $app_id)
    {
        $cd = ContactDetails::where('app_id', $app_id)->first();

        if (!$cd) {
            return redirect()->back()->with('error', 'Contact details not found.');
        }

        return view('user.contactdetails.edit', compact('cd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $app_id)
    {
        $data = $request->validate([
            'app_id' => 'required|max:255',
            'phone_number' => 'required|string',
            'online_number' => 'nullable|string',
            'email_address' => 'required|string|email',
            'postal_address' => 'required|string|max:255',
            'city_of_post_office_box' => 'nullable|string|max:100',
            'residential_address' => 'required|string|max:255',
        ]);

        // Retrieve existing contact details by app_id
        $cd = ContactDetails::where('app_id', $app_id)->first();

        if (!$cd) {
            return redirect()->back()->with('error', 'Update failed: Contact details not found.');
        }

        // Update contact details
        $cd->update($data);

        return redirect()->route('contactdetails.edit', $app_id)->with('success', 'Contact Details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the contact details by ID
        $cd = ContactDetails::find($id);

        if (!$cd) {
            return redirect()->back()->with('error', 'Contact details not found.');
        }

        // Delete the contact details
        $cd->delete();

        return redirect()->route('contactdetails.index')->with('success', 'Contact Details deleted successfully.');
    }
}
