<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-8"
                                :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-8 bg-red-500 rounded border-2 border-red-400 p-4"
                                    :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex flex-col space-y-8">
                <div>

                    <!-- Name -->
                    <div>
                        <x-input-label for="name"
                                        class=""
                                        :value="__('Name')" />

                        <x-text-input id="name"
                                        class="block mt-1 w-full"
                                        type="text"
                                        name="name"
                                        :value="old('name')"
                                        required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email"
                                        class=""
                                        :value="__('Email')" />

                        <x-text-input id="email"
                                        class="block mt-1 w-full"
                                        type="email"
                                        name="email"
                                        :value="old('email')"
                                        required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password"
                                        class=""
                                        :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation"
                                        class=""
                                        :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation"
                                        class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                </div>
                <div>

                    <div class="flex gap-4 items-center justify-end mt-4">
                        <a class="underline text-sm text-slate-300 hover:text-primary-600" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button tag="button" type="submit">
                            {{ __('Register') }}
                        </x-button>
                    </div>

                </div>
            </div><!-- end divider -->
        </form>
    </x-auth-card>
</x-guest-layout>
