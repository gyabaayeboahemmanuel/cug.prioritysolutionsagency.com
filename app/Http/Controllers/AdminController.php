<?php
namespace App\Http\Controllers;
use App\Models\ProgramDetails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\AttachedDocuments;
use App\Models\PersonalDetails;
use App\Models\AcademicDetails;
use App\Models\ContactDetails;
use App\Models\FamilyDetails;
use App\Models\TertiaryDetails;

class AdminController extends Controller
{
    public function dashboard()
    {
        $todayApplicationsCount = User::whereDate('created_at', today())->count();
        $monthlyApplicantsCount = User::whereMonth('created_at', now()->month)->count();
        $newApplicantsCount = User::whereDate('created_at', today()->subDay())->count();
        $approvedApplicantsCount = User::count();
        $completedApplicationsCount = User::count();
    
        $percentageToday = $this->calculatePercentageChange($todayApplicationsCount, $monthlyApplicantsCount);
        $percentageMonth = $this->calculatePercentageChange($monthlyApplicantsCount, $monthlyApplicantsCount);
        $newApplicantsChange = $this->calculatePercentageChange($newApplicantsCount, $todayApplicationsCount);
        $approvedApplicantsPercentage = $this->calculatePercentageChange($approvedApplicantsCount, $completedApplicationsCount);
        $dailyApplicationIncrease = 0;
    
        // Paginate applicants with most recent first
        $applicants = User::orderBy('created_at', 'desc')->take(10)->get();
    
        return view('admin.dashboard', compact(
            'todayApplicationsCount',
            'monthlyApplicantsCount',
            'newApplicantsCount',
            'approvedApplicantsCount',
            'completedApplicationsCount',
            'percentageToday',
            'percentageMonth',
            'newApplicantsChange',
            'approvedApplicantsPercentage',
            'applicants',
            'dailyApplicationIncrease',
        ));
    }
    
    
    private function calculatePercentageChange($newValue, $oldValue)
    {
        // Calculate the percentage change
        if ($oldValue == 0) {
            return 0;
        }

        return round((($newValue - $oldValue) / $oldValue) * 100, 2);
    }

    public function programmeindex()
    {
        $programmes = Programme::all();
        return view('admin.programme.index')->with('programmes', $programmes);
    }
    public function programmecreate()
    {
        return view('admin.programme.create');
    }
    public function programmestore(Request $request)
    {
        $programmes = Programme::create($request->all());
        return redirect(route('programme.create'));
    }

    // Display list of programmes
    public function showProgrammes()
    {
        // Get all distinct programmes
        $programmes = ProgramDetails::select('programme')->distinct()->get();

        return view('admin.programmes', compact('programmes'));
    }

    // Display applicants for a selected programme
    public function showApplicantsByProgramme($programme)
    {
        // Get applicants who selected the clicked programme
        $applicants = ProgramDetails::where('programme', $programme)->get();

        return view('admin.applicants', compact('applicants', 'programme'));
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('admin'); // Ensure only admin has access
    // }

    public function editPersonalDetails(string $app_id)
    {
        $pd = PersonalDetails::where('app_id', $app_id)->first();
        return view('admin.application.personal-details.edit', compact('pd'));
    }

    public function updatePersonalDetails(Request $request, string $app_id)
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
            'avatar' => 'nullable|mimes:jpg,jpeg,png', // Added max file size
        ]);

        // Find personal details record
        $personalDetails = PersonalDetails::where('app_id', $app_id)->first();
        if (!$personalDetails) {
            return redirect()->back()->with('error', 'Personal details not found.');
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if it exists
            if ($personalDetails->avatar) {
                Storage::disk('public')->delete($personalDetails->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('profile', 'public');
        }

        // Update personal details
        $personalDetails->update($data);

        return redirect()->route('admin.applicants.index')->with('success', 'Personal details updated successfully.');
    }


    public function editContactDetails(string $app_id)
    {
        $cd = ContactDetails::where('app_id', $app_id)->first();
        return view('admin.application.contact-details.edit', compact('cd'));
    }

    public function updateContactDetails(Request $request, string $app_id)
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

        $contactDetails = ContactDetails::where('app_id', $app_id)->first();
        if (!$contactDetails) {
            return redirect()->back()->with('error', 'Contact details not found.');
        }
        $contactDetails->update($data);

        return redirect()->route('admin.applicants.index')->with('success', 'Contact details updated successfully.');
    }

    public function editFamilyDetails(string $app_id)
    {
        $fd = FamilyDetails::where('app_id', $app_id)->first();
        return view('admin.application.family-details.edit', compact('fd'));
    }

    public function updateFamilyDetails(Request $request, string $app_id)
    {
        $data = $request->validate([
            'app_id' => 'required|max:255',
            'father_full_name' => 'required|max:255',
            'father_status' => 'required|max:255',
            'father_contact' => 'max:20',
            'father_occupation' => 'max:255',
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

        $familyDetails = FamilyDetails::where('app_id', $app_id)->first();
        if (!$familyDetails) {
            return redirect()->back()->with('error', 'Family details not found.');
        }
        $familyDetails->update($data);

        return redirect()->route('admin.applicants.index')->with('success', 'Family details updated successfully.');
    }

    public function editAcademicDetails(string $app_id)
    {
        $ad = AcademicDetails::where('app_id', $app_id)->first();
        return view('admin.application.academic-details.edit', compact('ad'));
    }

    public function updateAcademicDetails(Request $request, string $app_id)
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

        $academicDetails = AcademicDetails::where('app_id', $app_id)->first();
        if (!$academicDetails) {
            return redirect()->back()->with('error', 'Academic details not found.');
        }
        $academicDetails->update($data);

        return redirect()->route('admin.applicants.index')->with('success', 'Academic details updated successfully.');
    }

    public function editTertiaryDetails(string $app_id)
    {
        $td = TertiaryDetails::where('app_id', $app_id)->first();
        return view('admin.application.edit-tertiary-details', compact('td'));
    }

    public function updateTertiaryDetails(Request $request, string $app_id)
    {
        $data = $request->validate([
            'app_id' => 'required|max:255',
            'institution_name' => 'required|max:255',
            'course_of_study' => 'required|max:255',
            'year_of_graduation' => 'nullable|date',
            'qualification' => 'required|max:255',
        ]);

        $tertiaryDetails = TertiaryDetails::where('app_id', $app_id)->first();
        if (!$tertiaryDetails) {
            return redirect()->back()->with('error', 'Tertiary details not found.');
        }
        $tertiaryDetails->update($data);

        return redirect()->route('admin.applicants.index')->with('success', 'Tertiary details updated successfully.');
    }

    public function printApplication(string $app_id)
    {
        // Fetch all details related to the application
        $pd = PersonalDetails::where('app_id', $app_id)->first();
        $cd = ContactDetails::where('app_id', $app_id)->first();
        $fd = FamilyDetails::where('app_id', $app_id)->first();
        $pgd = ProgramDetails::where('app_id', $app_id)->first();
        $ad = AcademicDetails::where('app_id', $app_id)->first();
        $td = TertiaryDetails::where('app_id', $app_id)->first();

        // Return the application print view
        return view('admin.print-application', compact('pd', 'cd', 'fd', 'ad', 'td', 'pgd'));
    }

}
