<x-app-layout>
    <x-slot name="header">
        Bauteil: {{ $data->name }} &mdash; Detailansicht
    </x-slot>

    <x-slot name="buttons">
        @can(Permissions::getPermissionKey(Permissions::READ_COMPONENTS))
        <x-button tag="a" flat href="{{ route('components.index') }}">Zurück zur Übersicht</x-button>
        @endcan
        @can(Permissions::getPermissionKey(Permissions::UPDATE_COMPONENT))
        <x-button tag="a" secondary href="{{ route('components.edit', ['id' => $data->id]) }}">Bearbeiten</x-button>
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
                        <dt class="text-sm font-medium text-gray-500">Bauteil-ID</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $data->id }}</span></dd>
                    </div>

                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->name)
                                <span class="flex-grow">{{ $data->name }}</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Beschreibung</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->description)
                                <span class="flex-grow">{{ $data->description }}</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Farbe</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->color)
                                <span class="flex-grow">{{ $data->color }}</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Ist ISO-Norm?</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->is_iso)
                                <span class="flex-grow">{{ $data->is_iso ? 'Ja' : 'Nein' }}</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Rastermaß</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->grid)
                                <span class="flex-grow">{{ $data->grid }} mm</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Breite</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->width)
                                <span class="flex-grow">{{ $data->width }} mm</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Höhe</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->height)
                                <span class="flex-grow">{{ $data->height }} mm</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Länge</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->length)
                                <span class="flex-grow">{{ $data->length }} mm</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Gewicht</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->weight)
                                <span class="flex-grow">{{ number_format((float) $data->weight, 3, ',', '.') }} kg</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Bereich</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->area)
                                <span class="flex-grow">{{ $data->area }} qm</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Preis pauschal</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">

                            @isset($data->price_mount)
                                <span class="flex-grow">{{ number_format((float) $data->price_mount, 2, ',', '.') }}
                                    €</span>
                            @endisset
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Preis pro Einheit</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @isset($data->price_per_unit)
                                <span class="flex-grow">{{ number_format((float) $data->price_per_unit, 2, ',', '.') }} €</span>
                            @endisset
                        </dd>
                    </div>

                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
