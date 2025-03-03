<x-app-layout>
    <x-slot name="header">
        Gewerk: {{$subsection->name}} &mdash; Detailansicht
    </x-slot>

    <x-slot name="buttons">
        @can(Permissions::getPermissionKey(Permissions::READ_SUBSECTIONS))
            <x-button tag="a" flat href="{{ route('subsections.index') }}">Zurück zur Übersicht</x-button>
        @endcan
        @can(Permissions::getPermissionKey(Permissions::UPDATE_SUBSECTION))
            <x-button tag="a" secondary href="{{ route('subsections.edit', ['id' => $subsection->id]) }}">Bearbeiten</x-button>
        @endcan
    </x-slot>

    <div class="w-full h-auto py-12">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            {{-- <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Applicant Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
            </div> --}}
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Gewerk-ID</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $subsection->id }}</span></dd>
                    </div>

                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $subsection->name }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Beschreibung</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $subsection->description }}</span></dd>
                    </div>

                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
