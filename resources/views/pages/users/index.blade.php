<x-app-layout>
    <x-slot name="header">
        Benutzer
    </x-slot>

    <x-slot name="buttons">
        <x-button tag="a" href="{{ route('users.create') }}">Neu</x-button>
    </x-slot>

    <div class="w-full h-auto py-12">
        @if (count($users) > 0)

            <div class="overflow-hidden bg-white shadow sm:rounded-md">
                @foreach ($users as $user)
                    <ul role="list" class="list-none divide-y divide-gray-200">
                        <li>
                            <a href="{{ route('users.show', ['user' => $user['id']]) }}" class="block hover:bg-gray-50">
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="flex min-w-0 flex-1 items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-12 w-12 rounded-full"
                                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="">
                                        </div>
                                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                            <div>
                                                <p class="truncate text-sm font-medium text-indigo-600">
                                                    {{ $user['firstname'] }} {{ $user['lastname'] }}</p>
                                                <p class="mt-2 inline-flex items-center gap-4 text-sm text-gray-500">
                                                    <x-custom-icon icon="email" tag="span"  />
                                                    <span class="truncate">{{ $user['email'] }}</span>
                                                </p>
                                            </div>
                                            <div class="hidden md:block">
                                                <div>
                                                    <p class="inline-flex items-center gap-4 text-sm text-gray-500">
                                                        <x-custom-icon icon="department" tag="span" />
                                                        <span>{{ $user['department'] }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                      <x-custom-icon icon="chevron-right" />

                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                @endforeach
            </div>
        @else
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Keine Benutzer</h3>
                <p class="mt-1 text-sm text-gray-500">Beginnen Sie mit dem Anlegen eines neuen Benutzer.</p>
                <div class="mt-6">
                    <a href="{{ route('customers.create') }}"
                        class="inline-flex items-center rounded-md border border-transparent bg-primary-600px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <!-- Heroicon name: mini/plus -->
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        Neuer Kunde
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
