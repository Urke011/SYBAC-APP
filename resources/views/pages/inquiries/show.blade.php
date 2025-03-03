<x-app-layout>
    <x-slot name="header">
        Anfrage: {{ $inquiry->id }} &mdash; Detailansicht
    </x-slot>

    <x-slot name="buttons">
        @can(Permissions::getPermissionKey(Permissions::READ_INQUIRIES))
            <x-button tag="a" flat href="{{ route('inquiries.index') }}">Zurück zur Übersicht</x-button>
        @endcan
        @can(Permissions::getPermissionKey(Permissions::UPDATE_INQUIRY))
            <x-button tag="a" secondary href="{{ route('inquiries.edit', ['id' => $inquiry->id]) }}">Bearbeiten</x-button>
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
                        <dt class="text-sm font-medium text-gray-500">Anfrage-ID</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $inquiry->id }}</span></dd>
                    </div>
                    @can(Permissions::getPermissionKey(Permissions::READ_CUSTOMER))
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Kunde</dt>
                            <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                <span class="flex-grow">{{ $inquiry->customer->company_name }},
                                    {{ $inquiry->customer->city }}</span>
                                <span class="ml-4 flex-shrink-0">
                                    <a href="{{ route('customers.show', ['id' => $inquiry->customer->id]) }}"
                                        class="px-2 py-1 rounded-md bg-white font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">zum
                                        Kunden</a>
                                </span>
                            </dd>
                        </div>
                    @endcan
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Zweck der Halle</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $inquiry->purpose }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Bauorts</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $inquiry->location }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Grundlänge der
                            Halle (in mm)</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $inquiry->length }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Grundbreite der
                            Halle (in mm)</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $inquiry->width }}</span></dd>
                    </div>

                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Traufhöhe (in mm)</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $inquiry->eaves_height }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Schneelast (in kg/m<sup>3</sup>)</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                              class="flex-grow">{{ $inquiry->snowload }}</span></dd>
                  </div>
                  <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Kranbahnlast (in kg/m<sup>3</sup>)</dt>
                    <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                            class="flex-grow">{{ $inquiry->craneload }}</span></dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Hakenhöhe (in mm)</dt>
                  <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                          class="flex-grow">{{ $inquiry->hookheight }}</span></dd>
              </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Notizen/Kommentar</dt>
                        <dd class="mt-1flex  text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $inquiry->notes }}</span></dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Kalkulationen</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @if (count($inquiry->calculations) > 0)
                                <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                                    @foreach ($inquiry->calculations as $calculation)
                                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                            <div class="flex w-0 flex-1 items-center">
                                                <x-custom-icon icon="calculation" tag="span"
                                                    class="text-gray-500 mr-3 flex-shrink-0" /><span
                                                    class="ml-2 w-0 flex-1 truncate">{{ $calculation->id }}<br />
                                                    <span class="truncate text-xs">zuletzt bearbeitet am
                                                        {{ $calculation->updated_at->format('d.m.Y') }}</span>
                                                </span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('calculations.show', ['id' => $calculation->id]) }}"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">zur
                                                    Kalkulation</a>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            @else
                                Keine Kalkulationen
                            @endif

                            <div class="flex justify-start w-full h-auto mt-6">
                                @can(Permissions::getPermissionKey(Permissions::CREATE_CALCULATION))
                                    <x-button tag="a" secondary
                                        href="{{ route('calculations.create', ['inquiry_id' => $inquiry->id]) }}">Neue
                                        Kalkulation hinzufügen</x-button>
                                @endcan
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
