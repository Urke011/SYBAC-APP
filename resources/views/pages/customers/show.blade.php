<x-app-layout>
    <x-slot name="header">
        Kunde: {{ $customer->company_name }} &mdash; Detailansicht
    </x-slot>

    <x-slot name="buttons">
        @can(Permissions::getPermissionKey(Permissions::READ_CUSTOMERS))
            <x-button tag="a" flat href="{{ route('customers.index') }}">Zurück zur Übersicht</x-button>
        @endcan
        @can(Permissions::getPermissionKey(Permissions::UPDATE_CUSTOMER))
            <x-button tag="a" secondary href="{{ route('customers.edit', ['id' => $customer->id]) }}">Bearbeiten</x-button>
        @endcan
        @can(Permissions::getPermissionKey(Permissions::CREATE_INQUIRY))
            <x-button tag="a" href="{{ route('inquiries.create', ['customer_id' => $customer->id]) }}">Anfrage erstellen
            </x-button>
        @endcan
    </x-slot>




    <div class="w-full h-auto">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            {{-- <div class="px-4 py-5 sm:px-6">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Applicant Information</h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
          </div> --}}
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Kunden-ID</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $customer->id }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Firmenname</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <span class="flex-grow">{{ $customer->company_name }}</span>
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Straße und Hausnummer</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $customer->street }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Postleitzahl</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $customer->zip }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Stadt</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $customer->city }}</span></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Land</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0"> <span
                                class="flex-grow">{{ $customer->country ? App\Constants\Countries::getOne($customer->country) : '' }}</span>
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Ansprechpartner</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <ul role="list" class="w-full grid grid-cols-1 sm:grid-cols-2">
                                <li class="w-full flex items-center justify-between text-sm">
                                    <div class="w-full divide-y divide-gray-200 rounded-lg bg-white shadow-md">
                                        <div class="flex w-full items-center justify-between space-x-6 p-6">
                                            <div class="flex-1 truncate">
                                                <div class="flex items-center space-x-3">
                                                    <h3 class="truncate text-sm font-medium text-gray-900">
                                                        {{ $customer->contact_name }}
                                                    </h3>
                                                    {{-- <span
                                                        class="inline-block flex-shrink-0 rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-800">Admin</span> --}}
                                                </div>
                                                <p class="mt-1 truncate text-sm text-gray-500">
                                                    {{ $customer->contact_email }}</p>
                                            </div>
                                            {{-- <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                                alt=""> --}}
                                        </div>
                                        <div>
                                            <div class="-mt-px flex divide-x divide-gray-200">
                                                <div class="flex w-0 flex-1">
                                                    <a href="mailto:{{ $customer->contact_email }}"
                                                        class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                                        <x-custom-icon icon="email" />
                                                        <span class="ml-3">Email schreiben</span>
                                                    </a>
                                                </div>
                                                @isset($customer->contact_phone)
                                                    <div class="-ml-px flex w-0 flex-1">
                                                        <a href="tel:+1-202-555-0170"
                                                            class="relative inline-flex w-0 flex-1 items-center justify-center rounded-br-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                                            <x-custom-icon icon="phone" />
                                                            <span class="ml-3">{{ $customer->contact_phone }}</span>
                                                        </a>
                                                    </div>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Anfragen</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        @if(count($customer->inquiries) > 0)
                        <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                          @foreach ($customer->inquiries as $inquiry)
                          <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                            <div class="flex w-0 flex-1 items-center">
                              <x-custom-icon icon="inquiry" tag="span" class="text-gray-500 mr-3 flex-shrink-0" />
                              <span class="ml-2 w-0 flex-1 truncate">{{ $inquiry->id }}<br />
                                <span class="truncate text-xs">erstellt am {{ $inquiry->created_at->format('d.m.Y') }}</span>
                              </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                              <a href="{{route('inquiries.show', ['id' => $inquiry->id])}}" class="font-medium text-indigo-600 hover:text-indigo-500">zur Anfrage</a>
                            </div>
                          </li>
                          @endforeach

                        </ul>
                        @else
                        Keine Anfragen
                        @endif
                      </dd>
                    </div>
                </dl>
            </div>
        </div>


    </div>
</x-app-layout>
