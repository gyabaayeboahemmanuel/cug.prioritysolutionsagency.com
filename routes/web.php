<?php

use App\Models\Post;
use App\Models\Flyer;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;

// Frontend Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicFlyerController;
use App\Http\Controllers\Frontend\PostFrontendController;
use App\Http\Controllers\ContactController;

// Authenticated Application Controllers
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PersonalDetailsController;
use App\Http\Controllers\ProgramDetailsController;
use App\Http\Controllers\ContactDetailsController;
use App\Http\Controllers\FamilyDetailsController;
use App\Http\Controllers\AcademicDetailsController;
use App\Http\Controllers\TertiaryDetailsController;
use App\Http\Controllers\AttachedDocumentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmploymentDetailsController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\PostgraduateDocumentController;


// Admin Controllers
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\FlyerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\VoucherController;

// ================= FRONTEND ===================== //
Route::get('/', [HomeController::class, 'home'])->name('welcome');
Route::get('/news', [PostFrontendController::class, 'index'])->name('frontend.posts.show');
Route::get('/news/{slug}', [PostFrontendController::class, 'show'])->name('frontend.post.show');
Route::get('/flyers', [PublicFlyerController::class, 'index'])->name('public.flyers.index');
Route::get('/flyers/{slug}', [PublicFlyerController::class, 'show'])->name('public.flyers.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ================= AUTHENTICATED USER ROUTES ===================== //
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ApplicationController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Application Steps
    Route::get('/application', [ApplicationController::class, 'application'])->name('application');
    Route::get('/application/{app_id}/summary', [ApplicationController::class, 'summary'])->name('application.summary');
    Route::get('/application/{app_id}/print', [ApplicationController::class, 'print'])->name('application.print');

    // ================= Personal Details ===================== //
    Route::prefix('personaldetails')->group(function () {
        Route::get('/', [PersonalDetailsController::class, 'index'])->name('personaldetails.index');
        Route::get('/create', [PersonalDetailsController::class, 'create'])->name('personaldetails.create');
        Route::post('/store', [PersonalDetailsController::class, 'store'])->name('personaldetails.store');
        Route::get('/{app_id}/edit', [PersonalDetailsController::class, 'edit'])->name('personaldetails.edit');
        Route::patch('/{app_id}', [PersonalDetailsController::class, 'update'])->name('personaldetails.update');
        Route::delete('/{app_id}', [PersonalDetailsController::class, 'destroy'])->name('personaldetails.destroy');
    });

    // ================= Program Details ===================== //
    Route::prefix('programdetails')->group(function () {
        Route::get('/', [ProgramDetailsController::class, 'index'])->name('programdetails.index');
        Route::get('/create', [ProgramDetailsController::class, 'create'])->name('programdetails.create');
        Route::post('/store', [ProgramDetailsController::class, 'store'])->name('programdetails.store');
        Route::get('/{app_id}/edit', [ProgramDetailsController::class, 'edit'])->name('programdetails.edit');
        Route::patch('/{app_id}', [ProgramDetailsController::class, 'update'])->name('programdetails.update');
        Route::delete('/{app_id}', [ProgramDetailsController::class, 'destroy'])->name('programdetails.destroy');
    });

    // ================= Contact Details ===================== //
    Route::prefix('contactdetails')->group(function () {
        Route::get('/', [ContactDetailsController::class, 'index'])->name('contactdetails.index');
        Route::get('/create', [ContactDetailsController::class, 'create'])->name('contactdetails.create');
        Route::post('/store', [ContactDetailsController::class, 'store'])->name('contactdetails.store');
        Route::get('/{app_id}/edit', [ContactDetailsController::class, 'edit'])->name('contactdetails.edit');
        Route::patch('/{app_id}', [ContactDetailsController::class, 'update'])->name('contactdetails.update');
        Route::delete('/{app_id}', [ContactDetailsController::class, 'destroy'])->name('contactdetails.destroy');
    });

    // ================= Family Details ===================== //
    Route::prefix('familydetails')->group(function () {
        Route::get('/', [FamilyDetailsController::class, 'index'])->name('familydetails.index');
        Route::get('/create', [FamilyDetailsController::class, 'create'])->name('familydetails.create');
        Route::post('/store', [FamilyDetailsController::class, 'store'])->name('familydetails.store');
        Route::get('/{app_id}/edit', [FamilyDetailsController::class, 'edit'])->name('familydetails.edit');
        Route::patch('/{app_id}', [FamilyDetailsController::class, 'update'])->name('familydetails.update');
        Route::delete('/{app_id}', [FamilyDetailsController::class, 'destroy'])->name('familydetails.destroy');
    });

    // ================= Academic Details ===================== //
    Route::prefix('academicdetails')->group(function () {
        Route::get('/', [AcademicDetailsController::class, 'index'])->name('academicdetails.index');
        Route::get('/create', [AcademicDetailsController::class, 'create'])->name('academicdetails.create');
        Route::post('/store', [AcademicDetailsController::class, 'store'])->name('academicdetails.store');
        Route::get('/{app_id}/edit', [AcademicDetailsController::class, 'edit'])->name('academicdetails.edit');
        Route::patch('/{app_id}', [AcademicDetailsController::class, 'update'])->name('academicdetails.update');
        Route::delete('/{app_id}', [AcademicDetailsController::class, 'destroy'])->name('academicdetails.destroy');
    });

    // ================= Tertiary Details ===================== //
    Route::prefix('tertiarydetails')->group(function () {
        Route::get('/', [TertiaryDetailsController::class, 'index'])->name('tertiarydetails.index');
        Route::get('/create', [TertiaryDetailsController::class, 'create'])->name('tertiarydetails.create');
        Route::post('/store', [TertiaryDetailsController::class, 'store'])->name('tertiarydetails.store');
        Route::get('/{app_id}/edit', [TertiaryDetailsController::class, 'edit'])->name('tertiarydetails.edit');
        Route::patch('/{app_id}', [TertiaryDetailsController::class, 'update'])->name('tertiarydetails.update');
        Route::delete('/{app_id}', [TertiaryDetailsController::class, 'destroy'])->name('tertiarydetails.destroy');
    });

    // ================= Attached Documents ===================== //
    Route::prefix('attacheddocuments')->group(function () {
        Route::get('/', [AttachedDocumentsController::class, 'index'])->name('attacheddocuments.index');
        Route::get('/create', [AttachedDocumentsController::class, 'create'])->name('attacheddocuments.create');
        Route::post('/store', [AttachedDocumentsController::class, 'store'])->name('attacheddocuments.store');
        Route::get('/{app_id}/edit', [AttachedDocumentsController::class, 'edit'])->name('attacheddocuments.edit');
        Route::patch('/{app_id}', [AttachedDocumentsController::class, 'update'])->name('attacheddocuments.update');
        Route::delete('/{app_id}', [AttachedDocumentsController::class, 'destroy'])->name('attacheddocuments.destroy');
    });

    // ================= Employment Details ===================== //
    Route::prefix('employmentdetails')->group(function () {
        Route::get('/', [\App\Http\Controllers\EmploymentDetailController::class, 'index'])->name('employmentdetails.index');
        Route::get('/create', [\App\Http\Controllers\EmploymentDetailController::class, 'create'])->name('employmentdetails.create');
        Route::post('/store', [\App\Http\Controllers\EmploymentDetailController::class, 'store'])->name('employmentdetails.store');
        Route::get('/{app_id}/edit', [\App\Http\Controllers\EmploymentDetailController::class, 'edit'])->name('employmentdetails.edit');
        Route::patch('/{app_id}', [\App\Http\Controllers\EmploymentDetailController::class, 'update'])->name('employmentdetails.update');
        Route::delete('/{app_id}', [\App\Http\Controllers\EmploymentDetailController::class, 'destroy'])->name('employmentdetails.destroy');
    });

    // ================= References ===================== //
    Route::prefix('references')->group(function () {
        Route::get('/', [\App\Http\Controllers\ReferenceController::class, 'index'])->name('references.index');
        Route::get('/create', [\App\Http\Controllers\ReferenceController::class, 'create'])->name('references.create');
        Route::post('/store', [\App\Http\Controllers\ReferenceController::class, 'store'])->name('references.store');
        Route::get('/{app_id}/edit', [\App\Http\Controllers\ReferenceController::class, 'edit'])->name('references.edit');
        Route::patch('/{app_id}', [\App\Http\Controllers\ReferenceController::class, 'update'])->name('references.update');
        Route::delete('/{app_id}', [\App\Http\Controllers\ReferenceController::class, 'destroy'])->name('references.destroy');
    });

    // ================= Postgraduate Documents ===================== //
    Route::prefix('postgraduatedocuments')->group(function () {
        Route::get('/', [\App\Http\Controllers\PostgraduateDocumentController::class, 'index'])->name('postgraduatedocuments.index');
        Route::get('/create', [\App\Http\Controllers\PostgraduateDocumentController::class, 'create'])->name('postgraduatedocuments.create');
        Route::post('/store', [\App\Http\Controllers\PostgraduateDocumentController::class, 'store'])->name('postgraduatedocuments.store');
        Route::get('/{app_id}/edit', [\App\Http\Controllers\PostgraduateDocumentController::class, 'edit'])->name('postgraduatedocuments.edit');
        Route::patch('/{app_id}', [\App\Http\Controllers\PostgraduateDocumentController::class, 'update'])->name('postgraduatedocuments.update');
        Route::delete('/{app_id}', [\App\Http\Controllers\PostgraduateDocumentController::class, 'destroy'])->name('postgraduatedocuments.destroy');
    });
});


// ================= ADMIN ROUTES ===================== //

use Illuminate\Support\Facades\DB;

Route::get('/admin/google-referrals-data', function () {
    $results = DB::table('google_referrals')
        ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy('date')
        ->get();

    $labels = $results->pluck('date');
    $counts = $results->pluck('count');

    return response()->json([
        'labels' => $labels,
        'counts' => $counts
    ]);
});
Route::get('/admin/analytics', [AnalyticsController::class, 'index'])->name('admin.analytics');
Route::middleware(['auth', 'verified', Admin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    // Γ£à Add this group for consistent route naming
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::resource('posts', PostController::class);
        Route::resource('flyers', FlyerController::class);
        Route::resource('testimonials', TestimonialController::class);
        // Route::resource('user', UserController::class);
        Route::resource('vouchers', VoucherController::class);
    });

    Route::get('/admin/applicants', [ApplicantController::class, 'index'])->name('applicant.index');
    Route::get('/admin/applicants/table', [PersonalDetailsController::class, 'adminIndex'])->name('admin.applicants.index');

    // Programmes
    Route::get('/admin/programme/index', [AdminController::class, 'programmeindex'])->name('programme.index');
    Route::get('/admin/programme/create', [AdminController::class, 'programmecreate'])->name('programme.create');
    Route::post('/admin/programme/store', [AdminController::class, 'programmestore'])->name('programme.store');

    // Sectional Edits
    Route::prefix('admin')->group(function () {
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('users/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::patch('users/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::get('users/{id}', [UserController::class, 'show'])->name('admin.users.show');
        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });

    Route::prefix('admin')->group(function () {
        Route::get('application/{app_id}/print', [AdminController::class, 'printApplication'])->name('admin.application.print');

        Route::get('personal-details/{app_id}/edit', [AdminController::class, 'editPersonalDetails'])->name('admin.personal-details.edit');
        Route::post('personal-details/{app_id}/update', [AdminController::class, 'updatePersonalDetails'])->name('admin.personal-details.update');

        Route::get('contact-details/{app_id}/edit', [AdminController::class, 'editContactDetails'])->name('admin.contact-details.edit');
        Route::post('contact-details/{app_id}/update', [AdminController::class, 'updateContactDetails'])->name('admin.contact-details.update');

        Route::get('family-details/{app_id}/edit', [AdminController::class, 'editFamilyDetails'])->name('admin.family-details.edit');
        Route::post('family-details/{app_id}/update', [AdminController::class, 'updateFamilyDetails'])->name('admin.family-details.update');

        Route::get('academic-details/{app_id}/edit', [AdminController::class, 'editAcademicDetails'])->name('admin.academic-details.edit');
        Route::post('academic-details/{app_id}/update', [AdminController::class, 'updateAcademicDetails'])->name('admin.academic-details.update');

        Route::get('tertiary-details/{app_id}/edit', [AdminController::class, 'editTertiaryDetails'])->name('admin.tertiary-details.edit');
        Route::post('tertiary-details/{app_id}/update', [AdminController::class, 'updateTertiaryDetails'])->name('admin.tertiary-details.update');
    });
});

// ================= UTILITIES ===================== //
Route::get('/generate-pdf/{app_id}', [ApplicationController::class, 'generatePdf'])->name('generate.pdf');
Route::get('/send-email/{id}', [ApplicantController::class, 'notifyApplicant'])->name('send.email');

// ================= AUTH ROUTES ===================== //
require __DIR__ . '/auth.php';


// ================= SITEMAP ===================== //


// ================= SITEMAP ROUTE =====================
Route::get('/sitemap.xml', function () {
    $content = '<?xml version="1.0" encoding="UTF-8"?>';
    $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Public routes
    $publicRoutes = [
        '/',
        '/news',
        '/flyers',
        '/contact'
    ];

    foreach ($publicRoutes as $route) {
        $content .= '<url>';
        $content .= '<loc>' . htmlspecialchars(url($route)) . '</loc>';
        $content .= '<changefreq>weekly</changefreq>';
        $content .= '<priority>0.8</priority>';
        $content .= '</url>';
    }

    // Home page sections (fixed slashes for hash URLs)
    $sections = ['#hero', '#about', '#services', '#faculties', '#reviews', '#team', '#contact', '#blog'];
    foreach ($sections as $section) {
        $content .= '<url>';
        $content .= '<loc>' . env('APP_URL') . '/' . $section . '</loc>'; // Added a slash
        $content .= '<changefreq>weekly</changefreq>';
        $content .= '<priority>0.7</priority>';
        $content .= '</url>';
    }

    // Fetching all blog posts
    $posts = Post::all();
    foreach ($posts as $post) {
        $content .= '<url>';
        $content .= '<loc>' . htmlspecialchars(url('/news/' . $post->slug)) . '</loc>';
        $content .= '<changefreq>weekly</changefreq>';
        $content .= '<priority>0.9</priority>';
        $content .= '</url>';
    }

    // Fetching all flyers
    $flyers = Flyer::all();
    foreach ($flyers as $flyer) {
        $content .= '<url>';
        $content .= '<loc>' . htmlspecialchars(url('/flyers/' . $flyer->slug)) . '</loc>';
        $content .= '<changefreq>weekly</changefreq>';
        $content .= '<priority>0.9</priority>';
        $content .= '</url>';
    }

    $content .= '</urlset>';

    return response($content, 200)->header('Content-Type', 'application/xml');
});


// ==========================
// Scheduled Command Setup
// ==========================

if (App::runningInConsole()) {
    Artisan::command('sitemap:generate', function () {
        Artisan::call('route:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        echo "Sitemap Regenerated Successfully.";
    });
}
