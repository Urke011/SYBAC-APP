<x-app-layout>
    <x-slot name="header">
        Kalkulation: {{ $calculation->id }} &mdash; Detailansicht
    </x-slot>

    <x-slot name="buttons">
        @can(Permissions::getPermissionKey(Permissions::READ_INQUIRIES))
            <x-button tag="a" flat href="{{ route('calculations.index') }}">Zurück zur Übersicht</x-button>
        @endcan
        @can(Permissions::getPermissionKey(Permissions::UPDATE_INQUIRY))
            <x-button tag="a" secondary href="{{ route('calculations.edit', ['id' => $calculation->id]) }}">Bearbeiten
            </x-button>
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
                        <dt class="text-sm font-medium text-gray-500">Kalkulations-ID</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->id }}</span></dd>
                    </div>
                    @can(Permissions::getPermissionKey(Permissions::READ_CUSTOMER))
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Anfrage-ID</dt>
                            <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                <span class="flex-grow">{{ $calculation->inquiry->id }}</span>
                                <span class="ml-4 flex-shrink-0">
                                    <a href="{{ route('inquiries.show', ['id' => $calculation->inquiry->id]) }}"
                                        class="px-2 py-1 rounded-md bg-white font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">zur
                                        Anfrage</a>
                                </span>
                            </dd>
                        </div>
                    @endcan
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Zweck der Halle</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->purpose }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Bauorts</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->location }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Grundlänge der
                            Halle (in mm)</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->length }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Grundbreite der
                            Halle (in mm)</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->width }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Raster (in mm)</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->raster }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Traufhöhe (in mm)</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->eaves_height }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Schneelast (in kN/m<sup>3</sup>)</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->snowload }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Kranbahnlast (in kN/m<sup>3</sup>)</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->craneload }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Hakenhöhe (in mm)</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->hookheight }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Notizen/Kommentar</dt>
                        <dd class="mt-1flex  text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $calculation->notes }}</span></dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
