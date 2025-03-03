<x-app-layout>
    <x-slot name="header">
        Kalkulationen
    </x-slot>

    <x-slot name="buttons">
        {{-- @if (count($calculations) > 0)
            @can(Permissions::getPermissionKey(Permissions::CREATE_INQUIRY))
                <x-button tag="a" href="{{ route('calculations.create') }}">Neue Kalkulation</x-button>
            @endcan
        @endif --}}
    </x-slot>

    <div class="w-full h-auto py-12">
        @if (count($calculations) > 0)
            <div class="px-4 sm:px-6 lg:px-8">
                {{-- <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their
                            name,
                            title, email and role.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <button type="button"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                            user</button>
                    </div>
                </div> --}}
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                          <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ID
                                            </th>
                                            @can(Permissions::getPermissionKey(Permissions::READ_CUSTOMER))
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                    Anfrage-ID</th>
                                            @endcan
                                            {{-- <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Zweck
                                                der Halle
                                            </th> --}}
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Bauort
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Notizen/Kommentar
                                            </th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Details</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($calculations as $calculation)
                                            <tr>
                                              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                  {{ $calculation->id }}</td>
                                                @can(Permissions::getPermissionKey(Permissions::READ_CUSTOMER))
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-500 sm:pl-6">
                                                        {{ $calculation->inquiry->id }}</td>
                                                @endcan
                                                {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $calculation->purpose }}</td> --}}
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $calculation->location }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $calculation->notes }}</td>
                                                <td
                                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                    @can(Permissions::getPermissionKey(Permissions::READ_INQUIRY))
                                                        <a href="{{ route('calculations.show', ['id' => $calculation->id]) }}"
                                                            class="text-indigo-600 hover:text-indigo-900">Details</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <x-empty-state headline="Keine Anfragen" copy="Beginnen Sie mit dem Anlegen eines neue Anfrage."
                buttonLabel="Neue Anfrage" buttonLink="{{ route('calculations.create') }}" :permissionKey="Permissions::CREATE_INQUIRY" />
        @endif
    </div>
</x-app-layout>
