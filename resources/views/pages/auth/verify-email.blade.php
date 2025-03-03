<x-guest-layout>
    <x-auth-card>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('auth.verification_success_message') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('auth.verification_link_sent_message') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                  <x-button tag="button" type="submit"> {{ __('auth.resend_verification_email') }}</x-button>

                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-button tag="button" type="submit"> {{ __('auth.logout') }}</x-button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
