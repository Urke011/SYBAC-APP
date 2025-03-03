<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-8"
                                :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-8 bg-red-500 rounded border-2 border-red-400 p-4"
                                    :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-col space-y-8">
                <div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email"
                                        class=""
                                        :value="__('auth.email')" />

                        <x-text-input id="email"
                                        class="block mt-1 w-full"
                                        type="email"
                                        name="email"
                                        :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password"
                                        class=""
                                        :value="__('auth.password')" />

                        <x-text-input id="password"
                                        class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-6">
                        <label for="remember_me"
                                class="inline-flex items-center">

                            <input id="remember_me"
                                    type="checkbox"
                                    class="text-green-600 rounded border-2 border-slate-400 focus:border-slate-400 focus:ring-2 focus:ring-sky-400"
                                    name="remember">

                            <span class="ml-4 font-normal text-sm text-slate-400">
                                {{ __('auth.remember_me') }}
                            </span>
                        </label>
                    </div>

                </div>
                <div>

                    <div class="flex gap-4 items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-slate-300 hover:text-primary-600" href="{{ route('password.request') }}">
                                {{ __('auth.forgot_password') }}
                            </a>
                        @endif

                        <x-button tag="button" type="submit"> {{ __('auth.login') }}</x-button>
                    </div>

                </div>
            </div><!-- end divider -->
        </form>
    </x-auth-card>
</x-guest-layout>
