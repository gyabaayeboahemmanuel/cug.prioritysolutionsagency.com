<?php
namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf($app_id)
    {
        $user = User::with('familyDetails')->where('app_id', $app_id)->first();

        if (!$user) {
            return redirect()->route('dashboard')->with('error', 'User not found');
        }
dd(use Barryvdh\DomPDF\Facade;);
        // Render view with user data
        $pdf = Pdf::loadView('pdf.application_details', compact('user'));

        return $pdf->download('application_details_' . $user->app_id . '.pdf');
    }
}
