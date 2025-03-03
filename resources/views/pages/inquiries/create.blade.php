<x-app-layout>
    <x-slot name="header">
        Anfragen
    </x-slot>

    <x-slot name="buttons">
    </x-slot>

    <div class="w-full h-auto py-12">
        <div class="w-full h-auto mb-4  px-4 sm:px-6">
            <p class="mt-1 text-sm text-gray-500">Mit Sternchen * gekennzeichnete Felder sind Pflichtfelder.</p>
        </div>
        <form action="{{ route('inquiries.store') }}" method="POST">
            @csrf
            <div class="overflow-hidden shadow sm:rounded-md divide-y divide-gray-200">
                <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-full sm:col-span-6">
                            <label for="customer_id" class="block text-sm font-medium text-gray-700">Kunde *</label>
                            <select id="customer_id" name="customer_id" autocomplete="off"
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option @if (!Request::has('customer_id')) selected @endif disabled>Bitte Kunde auswählen
                                </option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        @if (!Request::has('customer_id') && Request::get('customer_id') == $customer->id) selected @endif>{{ $customer->company_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-full sm:col-start-1 sm:col-span-6">
                            <label for="purpose" class="block text-sm font-medium text-gray-700">Zweck der
                                Halle</label>
                            <input type="text" name="purpose" id="purpose" autocomplete="off"
                                placeholder="Lagerhalle für Material"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-full sm:col-span-6">
                            <label for="location" class="block text-sm font-medium text-gray-700">Bauort</label>
                            <input type="text" name="location" id="location" autocomplete="off"
                                placeholder="Musterstraße 1, 12345 Musterstadt"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="length" class="block text-sm font-medium text-gray-700">Grundlänge der
                                Halle</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="length" id="length" autocomplete="off" placeholder="10"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="length-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="length-unit">
                                        mm
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="width" class="block text-sm font-medium text-gray-700">Grundbreite der
                                Halle</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="width" id="width" autocomplete="off" placeholder="10"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="with-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="with-unit">
                                        mm
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="eaves_height" class="block text-sm font-medium text-gray-700">Traufhöhe</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="eaves_height" id="eaves_height" autocomplete="off"
                                    placeholder="10"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="eaves-height-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="eaves-height-unit">
                                        mm
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="snowload" class="block text-sm font-medium text-gray-700">Schneelast</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="snowload" id="snowload" autocomplete="off" placeholder="10"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="snowload-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="snowload-unit">
                                        kN/m<sup>3</sup>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="craneload" class="block text-sm font-medium text-gray-700">Kranbahnlast</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="craneload" id="craneload" autocomplete="off"
                                    placeholder="10"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="craneload-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="craneload-unit">
                                        kN/m<sup>3</sup>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="hookheight" class="block text-sm font-medium text-gray-700">Hakenhöhe</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="hookheight" id="hookheight" autocomplete="off"
                                    placeholder="10"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="hookheight-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="hookheight-unit">
                                        mm
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-6">
                            <label for="notes"
                                class="block text-sm font-medium text-gray-700">Notizen/Kommentar</label>
                            <div class="mt-1">
                                <textarea id="notes" name="notes" rows="5"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Notizen oder Kommentare"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex justify-between gap-4 border-none">
                    <x-button tag="a" href="{{ route('inquiries.index') }}" flat>Abbrechen</x-button>
                    <x-button tag="button" type="submit">Anfrage erstellen</x-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
