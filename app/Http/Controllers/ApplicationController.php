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
    public function summary($app_id){
       
        $pd = PersonalDetails::where('app_id', $app_id)->first();
        $cd = ContactDetails::where('app_id', $app_id)->first();
        $fd = FamilyDetails::where('app_id', $app_id)->first();
        $pgd = ProgramDetails::where('app_id', $app_id)->first();
        $ad = AcademicDetails::where('app_id', $app_id)->first();
        $td = TertiaryDetails::where('app_id', $app_id)->first();
        $at = AttachedDocuments::where('app_id', $app_id)->first();
        $user = auth()->user(); // or fetch by user_id if needed

        return view('user.summary')->with(['pd'=> $pd,'cd'=>$cd, 'fd'=>$fd, 'pgd' =>$pgd, 'ad'=>$ad, 'td'=>$td , 'at'=>$at ,'user'=>$user,   'created_at' => $user->created_at]);
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
