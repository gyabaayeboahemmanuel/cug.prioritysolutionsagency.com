<x-guest-layout>
    @section('title', 'Register - Catholic University of Ghana Admissions Portal')
    @section('meta')
        <meta name="description" content="Register for admission to Catholic University of Ghana through the Priority Admissions Office. Secure your spot today.">
        <meta name="keywords" content="Catholic University of Ghana, CUG Registration, Admissions Portal, University Admission Form, Ghana University">
    @endsection

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Application ID -->
        <div>
            <x-input-label for="app_id" :value="__('APPLICATION ID')" />
            <x-text-input
                id="app_id"
                class="block mt-1 w-full"
                type="text"
                name="app_id"
                :value="old('app_id')"
                placeholder="Enter your Application ID"
                required
                autofocus
                autocomplete="app_id"
            />
            <x-input-error :messages="$errors->get('app_id')" class="mt-2" />
        </div>
<!-- Voucher Code -->
<div class="mt-4">
    <x-input-label for="voucher_code" :value="__('Voucher Code')" />
    <x-text-input id="voucher_code" class="block mt-1 w-full" type="text" name="voucher_code" :value="old('voucher_code')" required placeholder="Enter your voucher code" />
    <x-input-error :messages="$errors->get('voucher_code')" class="mt-2" />
</div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                placeholder="example@email.com"
                required
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                placeholder="Enter a strong password"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                placeholder="Re-enter your password"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Terms -->
        <div class="mt-4">
            <x-input-label for="terms_accepted" :value="__('')" />
            <label for="terms_accepted" class="inline-flex items-center">
                <input
                    id="terms_accepted"
                    type="checkbox"
                    name="terms_accepted"
                    value="true"
                    required
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >
                <span class="ml-2 text-sm text-gray-600">{{ __('Accept Terms and Conditions') }}</span>
            </label>
            <x-input-error :messages="$errors->get('terms_accepted')" class="mt-2" />
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end mt-4">
            <a
                class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ route('login') }}"
            >
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

     <!-- Voucher Help Notice -->
<div class="mt-6 p-4 bg-blue-50 border border-blue-200 text-blue-800 rounded-md text-sm flex items-start space-x-3">
    <i class="fas fa-info-circle mt-1 text-blue-600"></i>
    <span>
        Don’t have an application voucher yet? 
        <strong>Contact us on WhatsApp</strong>: 
        <a href="https://wa.me/233248229540" class="underline text-blue-700 hover:text-blue-900" target="_blank">
            wa.me/233248229540
        </a>
        to get your voucher and start your application.
    </span>
</div>


    </form>
</x-guest-layout>
