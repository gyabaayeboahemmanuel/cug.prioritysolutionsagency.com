<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Voucher;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */


public function store(Request $request): RedirectResponse 
{
    $request->validate([
        'app_id' => 'required|string|max:255|unique:users,app_id',
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'voucher_code' => 'required|string|exists:vouchers,code',
    ]);

    // Validate that the voucher has not been used
    $voucher = Voucher::where('code', $request->voucher_code)
                      ->whereNull('claimed_by')
                      ->first();

    if (!$voucher) {
        throw ValidationException::withMessages([
            'voucher_code' => 'This voucher is invalid or has already been used.',
        ]);
    }

    // Create the user
    $user = User::create([
        'app_id' => $request->app_id,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Optional: Pre-create related model entries if needed
    // PersonalDetails::create(['app_id' => $user->app_id]);
    // AcademicDetails::create(['app_id' => $user->app_id]);
    // etc...

    // Mark voucher as claimed
    $voucher->update([
        'claimed_by' => $user->app_id,
        'claimed_at' => now(),
    ]);

    event(new Registered($user));
    Auth::login($user);

    return redirect(route('dashboard', absolute: false));
}

}
