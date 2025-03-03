<x-guest-layout>
    <x-auth-card>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('auth.secure_area_message') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-8 bg-red-500 rounded border-2 border-red-400 p-4"
                                    :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="flex flex-col space-y-8">
                <div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password"
                                        :value="__('auth.password')" />

                        <x-text-input id="password"
                                        class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>

                </div>
                <div>

                    <div class="flex justify-end mt-4">
                        <x-button tag="button" type="submit"> {{ __('auth.confirm') }}</x-button>
                    </div>

                </div>
            </div><!-- end divider -->
        </form>
    </x-auth-card>
</x-guest-layout>
