<x-app-layout>
    <x-slot name="header">
        Kunde: {{ $customer->company_name }} &mdash; Bearbeitungsansicht
    </x-slot>

    <div class="w-full h-auto">
        <div class="w-full h-auto mb-4  px-4 sm:px-6">
            <p class="mt-1 text-sm text-gray-500">Mit Sternchen * gekennzeichnete Felder sind Pflichtfelder.</p>
        </div>

        <form action="{{ route('customers.update', ['id' => $customer->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="overflow-hidden shadow sm:rounded-md divide-y divide-gray-200">
                <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="md:grid md:grid-cols-3 md:gap-6">

                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Unternehmen</h3>
                            <p class="mt-1 text-sm text-gray-500">Informationen zum Unternehmen</p>
                        </div>

                        <div class="mt-5 space-y-6 md:col-span-2 md:mt-0">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-3">
                                    <div class="mt-1 ">
                                        <label for="company_name" class="block text-sm font-medium text-gray-700">Name
                                            des
                                            Unternehmens *</label>
                                        <input type="text" name="company_name" id="company_name"
                                            autocomplete="company_name" value="{{ $customer->company_name }}" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <label for="street" class="block text-sm font-medium text-gray-700">Straße und
                                        Hausnummer *</label>
                                    <input type="text" name="street" id="street" autocomplete="street"
                                        value="{{ $customer->street }}" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="zip" class="block text-sm font-medium text-gray-700">Postleitzahl
                                        *</label>
                                    <input type="text" name="zip" id="zip" autocomplete="off"
                                        value="{{ $customer->zip }}" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="city" class="block text-sm font-medium text-gray-700">Stadt
                                        *</label>
                                    <input type="text" name="city" id="city" autocomplete="city"
                                        value="{{ $customer->city }}" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="country" class="block text-sm font-medium text-gray-700">Land *</label>
                                    <select id="country" name="country" required
                                        class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option selected disabled>Bitte Land auswählen</option>
                                        @foreach ($countries as $key => $country)
                                            <option value="{{ $key }}"
                                                @if ($customer->country == $key) selected @endif>{{ $country }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email-Addresse
                                        */label>
                                        <input id="email" type="email" name="email" id="email"
                                            autocomplete="off" value="{{ $customer->email }}" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="md:grid md:grid-cols-3 md:gap-6">

                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Ansprechpartner</h3>
                            <p class="mt-1 text-sm text-gray-500">Kontaktinformationen</p>
                        </div>

                        <div class="mt-5 md:col-span-2 md:mt-0">

                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="contact_name" class="block text-sm font-medium text-gray-700">Name des
                                        Ansprechpartners *</label>
                                    <input type="text" name="contact_name" id="contact_name" autocomplete="off"
                                        value="{{ $customer->contact_name }}" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="contact_email"
                                        class="block text-sm font-medium text-gray-700">Email-Addresse *</label>
                                    <input type="text" name="contact_email" id="contact_email" autocomplete="off"
                                        value="{{ $customer->contact_email }}" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                    <label for="contact_phone"
                                        class="block text-sm font-medium text-gray-700">Telefonnummer</label>
                                    <input type="text" name="contact_phone" id="contact_phone" autocomplete="off"
                                        value="{{ $customer->contact_phone }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex justify-between gap-4 border-none">
                    <x-button tag="a" flat href="{{ route('customers.show', ['id' => $customer->id]) }}">
                        Abbrechen
                    </x-button>
                    <x-button type="submit">Speichern</x-button>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
