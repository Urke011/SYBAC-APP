<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-40 h-auto" />
            </a>
        </x-slot>
        <div class="flex justify-center w-full h-auto">
            <x-button tag="a" href="{{ route('login') }}">zur Anmeldung</x-button>
        </div>
    </x-auth-card>
</x-guest-layout>
