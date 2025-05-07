<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AttachedDocuments;
use App\Models\PersonalDetails;
use App\Models\AcademicDetails;
use App\Models\ContactDetails;
use App\Models\FamilyDetails;
use App\Models\ProgramDetails;
use App\Models\TertiaryDetails;

use App\Mail\ApplicantEmail;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all()->where('role','applicant');
        $pd =    PersonalDetails::get();
        $at =    AttachedDocuments::get();
        $at =    collect($at)->groupBy('app_id');
        $pd = collect($pd)->groupBy('app_id');
        // $data = ;
        // dd($at);
        return view('admin.application.index')->with(['applicants'=> $users, 'pds'=>$pd, 'at'=>$at]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


// public function notifyApplicant($applicantId)
// {
//     $applicant = ContactDetails::where("app_id",$applicantId)->first(); // Retrieve applicant details
//     Mail::to($applicant->email)->send(new ApplicantEmail($applicant));

//     return back()->with('success', 'Email sent to the applicant successfully!');
// }

public function notifyApplicant($applicantId)
{
    // Retrieve the user (applicant) by app_id
    $applicant = User::where('app_id', $applicantId)->first();

    // Check if the applicant exists
    if (!$applicant) {
        return back()->withErrors('The applicant does not exist.');
    }

    // Use the relationship to fetch contact details
    $contactDetails = $applicant->contactDetails;

    // Check if the contact details exist and have a valid email address
    if (!$contactDetails || !filter_var($contactDetails->email_address, FILTER_VALIDATE_EMAIL)) {
        return back()->withErrors('The applicant does not have a valid email address in their contact details.');
    }

    // Send the email
    Mail::to($contactDetails->email_address)->send(new ApplicantEmail($applicant));

    return back()->with('success', 'Confirmation email sent successfully to the applicant.');
}


}
