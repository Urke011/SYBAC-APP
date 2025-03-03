<x-app-layout>
    <x-slot name="header">
        Bauteile
    </x-slot>

    <x-slot name="buttons">
    </x-slot>

    <div class="w-full h-auto py-12">
        <div class="w-full h-auto mb-4  px-4 sm:px-6">
            <p class="mt-1 text-sm text-gray-500">Mit Sternchen * gekennzeichnete Felder sind Pflichtfelder.</p>
        </div>
        <form action="{{ route('components.store') }}" method="POST">
            @csrf
            <div class="overflow-hidden shadow sm:rounded-md divide-y divide-gray-200">
                <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-12 gap-6">

                        <div class="col-span-full">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name *</label>
                            <input type="text" name="name" id="name" autocomplete="off"
                                placeholder="Name des Bauteils" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-full">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700">Beschreibung</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Beschreibung des Bauteils"></textarea>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-6">
                            <label for="color" class="block text-sm font-medium text-gray-700">Farbe</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" name="color" id="color" autocomplete="off" placeholder="Weiß"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-6">
                            <label for="is_iso" class="block text-sm font-medium text-gray-700">Ist ISO-Norm?</label>
                            <div class="relative mt-1 rounded-md shadow-sm" x-data="toggleInput">
                                <button type="button"
                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    :class="active ? 'bg-primary-600' : 'bg-gray-200'" role="switch" @click="toggle"
                                    aria-checked="false">
                                    <span class="sr-only">Ist ISO-Norm?</span>
                                    <span aria-hidden="true"
                                        class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                        :class="active ? 'translate-x-5' : 'translate-x-0'"></span>
                                </button>
                                <input type="hidden" name="is_iso" id="is_iso" x-model="active"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-4">
                            <label for="grid" class="block text-sm font-medium text-gray-700">Rastermaß</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="grid" id="grid" autocomplete="off" placeholder="10"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="grid-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="grid-unit">
                                        mm
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-4">
                            <label for="width" class="block text-sm font-medium text-gray-700">Breite</label>
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

                        <div class="col-span-full sm:col-span-4">
                            <label for="height" class="block text-sm font-medium text-gray-700">Höhe</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="height" id="height" autocomplete="off" placeholder="10"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="height-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="height-unit">
                                        mm
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-4">
                            <label for="length" class="block text-sm font-medium text-gray-700">Länge</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="length" id="length" autocomplete="off"
                                    placeholder="10"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="length-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="length-unit">
                                        mm
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-4">
                            <label for="weight" class="block text-sm font-medium text-gray-700">Gewicht</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="weight" id="weight" autocomplete="off"
                                    placeholder="10"  step="0.001" min="0"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="weight-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="weight-unit">
                                        kg
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-4">
                            <label for="area" class="block text-sm font-medium text-gray-700">Fläche</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="area" id="area" autocomplete="off"
                                    placeholder="10"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="area-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="area-unit">
                                        qm
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="price_mount" class="block text-sm font-medium text-gray-700">Preis
                                pauschal</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="price_mount" id="price_mount" autocomplete="off"
                                    placeholder="10,00" step="0.01" min="0"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="price_mount-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="price_mount-unit">
                                        €
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="price_per_unit" class="block text-sm font-medium text-gray-700">Preis pro
                                Einheit *</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="number" name="price_per_unit" id="price_per_unit" autocomplete="off"
                                    placeholder="10.00" step="0.01" min="0"
                                    class="pr-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    aria-describedby="price_per_unit-unit">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="price_per_unit-unit">
                                        €
                                    </span>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex justify-between gap-4 border-none">
                    <x-button tag="a" href="{{ route('components.index') }}" flat>Abbrechen</x-button>
                    <x-button tag="button" type="submit">Bauteil erstellen</x-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
