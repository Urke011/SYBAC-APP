<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-8"
                                :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-8 bg-red-500 rounded border-2 border-red-400 p-4"
                                    :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <div class="flex flex-col space-y-8">
                <div>

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token"
                                        value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email"
                                        :value="__('auth.email')" />

                        <x-text-input id="email"
                                        class="block mt-1 w-full"
                                        type="email"
                                        name="email"
                                        :value="old('email', $request->email)" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password"
                                        :value="__('auth.password')" />

                        <x-text-input id="password"
                                        class="block mt-1 w-full"
                                        type="password"
                                        name="password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation"
                                        :value="__('auth.confirm_password')" />

                        <x-text-input id="password_confirmation"
                                        class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                </div>
                <div>

                    <div class="flex gap-4 items-center justify-end mt-4">
                        <x-button tag="button" type="submit"> {{ __('auth.reset_password') }}</x-button>
                    </div>

                </div>
            </div><!-- end divider -->
        </form>
    </x-auth-card>
</x-guest-layout>
