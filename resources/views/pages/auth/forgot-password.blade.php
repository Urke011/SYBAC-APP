<x-guest-layout>
    <x-auth-card>

        <div class="mb-8 bg-blue-500 rounded border-2 border-blue-400 p-4">
            <div class="font-bold text-white">
                <svg class="sm:max-w-8 sm:max-h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path>
                </svg>
                {{ __('Ein kleiner Hinweis :-)') }}
            </div>

            <div class="font-normal mt-4 text-sm text-white">
                {{ __('auth.forgot_password_message') }}
            </div>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-8"
                                :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-8 bg-red-500 rounded border-2 border-red-400 p-4"
                                    :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="flex flex-col space-y-8">
                <div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('auth.email')" />

                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                </div>
                <div>

                    <div class="flex gap-4 items-center justify-end mt-4">
                        <a class="underline text-sm text-slate-300 hover:text-primary-600" href="{{ route('login') }}">
                            {{ __('Zurück zum Login') }}
                        </a>
                        <x-button tag="button" type="submit"> {{ __('auth.email_password_reset_link') }}</x-button>
                    </div>
                    
                </div>
            </div><!-- end divider -->
        </form>
    </x-auth-card>
</x-guest-layout>
