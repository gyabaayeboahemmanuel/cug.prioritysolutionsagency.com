<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PersonalDetails;
use App\Models\AcademicDetails;
use App\Models\ContactDetails;
use App\Models\FamilyDetails;
use App\Models\ProgramDetails;
use App\Models\TertiaryDetails;
use App\Models\AttachedDocuments;
use App\Models\PostgraduateDocuments;
use App\Models\Reference;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
// use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function dashboard(){
            if(Auth::user()->role =="admin"){
                return redirect(route('admin-dashboard'));
            }
            
            $pd = PersonalDetails::where('app_id', Auth::user()->app_id)->first();
            // $pd = DB::table('personal_details')->where('app_id', $app_id)->get();
            $at = AttachedDocuments::where('app_id', Auth::user()->app_id)->first();
            return view('user.dashboard')->with(['pd'=>$pd, 'at'=>$at]);
    }
    public function application(){
        $pd = PersonalDetails::where('app_id', Auth::user()->app_id)->first();
        $at = AttachedDocuments::where('app_id', Auth::user()->app_id)->first();

        return view('user.application')->with(['pd'=>$pd, 'at'=>$at]);
    }
    public function summary($app_id)
    {
        $user = auth()->user();
        $pd = PersonalDetails::where('app_id', $app_id)->first();
    
        // First check if personal details exist
        if (!$pd) {
            return redirect()->route('personaldetails.create')
                ->with('error', 'Please complete your personal details first.');
        }
    
        // Get all other details
        $cd = ContactDetails::where('app_id', $app_id)->first();
        $fd = FamilyDetails::where('app_id', $app_id)->first();
        $pgd = ProgramDetails::where('app_id', $app_id)->first();
        $ad = AcademicDetails::where('app_id', $app_id)->first();
        $td = TertiaryDetails::where('app_id', $app_id)->first();
        $at = AttachedDocuments::where('app_id', $app_id)->first();
        $ref = Reference::where('app_id', $app_id)->first();
        $pgdoc = PostgraduateDocuments::where('app_id', $app_id)->first();
    
        // Common required fields for all applicants
        $requiredFields = [
            'contactdetails' => $cd,
            'familydetails' => $fd,
            'programdetails' => $pgd,
        ];
    
        // Add fields based on application type
        if (strtolower($pd->form_type) == 'undergraduate') {
            $requiredFields['academicdetails'] = $ad;
            $requiredFields['tertiarydetails'] = $td;
            $requiredFields['attacheddocuments'] = $at;
        } elseif (strtolower($pd->form_type) == 'postgraduate') {
            $requiredFields['tertiarydetails'] = $td;
            $requiredFields['references'] = $ref;
            $requiredFields['postgraduatedocuments'] = $pgdoc;
        }
    
        // Check all required fields
        foreach ($requiredFields as $route => $fieldData) {
            if (!$fieldData) {
                $routeName = $route . (strtolower($pd->form_type) == 'postgraduate' && $route == 'tertiarydetails' ? '.edit' : '.create');
                return redirect()->route($routeName)
                    ->with('error', "Please complete your " . str_replace('details', ' ', ucfirst($route)) . "section before viewing the summary.");
            }
        }
    
        return view('user.summary', [
            'pd' => $pd,
            'cd' => $cd,
            'fd' => $fd,
            'pgd' => $pgd,
            'ad' => $ad,
            'td' => $td,
            'at' => $at,
            'ref' => $ref,
            'pgdoc' => $pgdoc,
            'user' => $user,
            'usr' => $user, // For nav compatibility
            'created_at' => $user->created_at
        ]);
    }
    public function print($app_id)
    {
        $pd = PersonalDetails::where('app_id', $app_id)->first();
        $cd = ContactDetails::where('app_id', $app_id)->first();
        $fd = FamilyDetails::where('app_id', $app_id)->first();
        $pgd = ProgramDetails::where('app_id', $app_id)->first();
        $ad = AcademicDetails::where('app_id', $app_id)->first();
        $td = TertiaryDetails::where('app_id', $app_id)->first();
        $at = AttachedDocuments::where('app_id', $app_id)->first();
        $user = auth()->user(); // or fetch by user_id if needed
        
        // Correctly pass $user to the view
        return view('user.print')->with([
            'pd' => $pd,
            'cd' => $cd,
            'fd' => $fd,
            'pgd' => $pgd,
            'ad' => $ad,
            'td' => $td,
            'at' => $at,
            'user' => $user, // Correctly passing $user
            'created_at' => $user->created_at
        ]);
    }
    
    public function generatePdf($app_id)
    {
        set_time_limit(120); // <-- Add this line
    
        $user = User::with('familyDetails')->where('app_id', $app_id)->first();
        
        if (!$user) {
            return redirect()->route('dashboard')->with('error', 'User not found');
        }
    
        $pdf = PDF::loadView('pdf.application_details', compact('user'));
        $output = $pdf->output();
    
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="application_details_' . $user->app_id . '.pdf"',
            'Content-Length' => strlen($output),
        ];
    
        return response($output, 200, $headers);
    }
    
}
