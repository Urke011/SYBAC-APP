<x-app-layout>
    <x-slot name="header">
        Benutzer
    </x-slot>

    <x-slot name="buttons">
        <x-button tag="a" secondary href="{{ route('users.index') }}">Zurück</x-button>
        <x-button tag="a" href="{{ route('users.edit', ['user' => $user->id]) }}">Bearbeiten</x-button>
    </x-slot>


    <div class="w-full h-auto py-12">

        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Benutzerdetails</h3>
                <p class="hidden mt-1 max-w-2xl text-sm text-gray-500"></p>
            </div>

            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Vorname</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->firstname }}</dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Nachname</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->lastname }}</dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">E-Mail</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Abteilung</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->department }}</dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Benutzerrollen</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                                @foreach ($userroles as $userrole)
                                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <x-custom-icon icon="key" tag="span" small />
                                            <span
                                                class="ml-2 w-0 flex-1 truncate">{{ isset($userrole->title) ? $userrole->title : $userrole->key }}</span>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </dd>
                    </div>
                </dl>
            </div>
        </div>


    </div>
</x-app-layout>
