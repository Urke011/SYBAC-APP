<x-app-layout>
    <x-slot name="header">
        Gewerke
    </x-slot>

    <x-slot name="buttons">
    </x-slot>

    <div class="w-full h-auto py-12">
        <div class="w-full h-auto mb-4  px-4 sm:px-6">
            <p class="mt-1 text-sm text-gray-500">Mit Sternchen * gekennzeichnete Felder sind Pflichtfelder.</p>
        </div>
        <form action="{{ route('subsections.store') }}" method="POST">
            @csrf
            <div class="overflow-hidden shadow sm:rounded-md divide-y divide-gray-200">
                <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-12 gap-6">

                        <div class="col-span-full">
                            <label for="code" class="block text-sm font-medium text-gray-700">Gewerkenummer *</label>
                            <input type="number" name="code" id="code" autocomplete="off" placeholder="5000"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-full">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name *</label>
                            <input type="text" name="name" id="name" autocomplete="off"
                                placeholder="Name des Gewerks" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-full">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700">Beschreibung</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Beschreibung des Gewerks"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex justify-between gap-4 border-none">
                    <x-button tag="a" href="{{ route('subsections.index') }}" flat>Abbrechen</x-button>
                    <x-button tag="button" type="submit">Anfrage erstellen</x-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
