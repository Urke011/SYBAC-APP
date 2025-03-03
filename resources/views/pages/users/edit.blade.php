<x-app-layout x-data="usersEdit">
    <x-slot name="header">
        Benutzer
    </x-slot>

    <x-slot name="buttons">
        <x-button tag="a" secondary href="{{ route('users.show', ['user' => $user->id]) }}">Abbrechen</x-button>
    </x-slot>

    <div class="w-full h-auto py-12">
        {{-- TODO: Maybe switch to tabs and extra forms --}}

        <form class="w-full h-auto grid grid-cols-12 gap-4" action="{{ route('users.update', ['user' => $user['id']]) }}"
            method="POST" autocomplete="off">
            @csrf
            @method('PUT')
            {{-- User-Data --}}
            <div class="col-span-12 flex flex-col gap-8 w-full h-auto bg-white px-4 py-5 shadow sm:rounded-lg sm:p-6">
                <div class="w-full h-auto grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        <h3 class="text-lg font-bold leading-6 text-gray-900">Persönliche Daten</h3>
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <label for="firstname" class="block text-sm font-medium text-gray-700">Vorname</label>
                        <input type="text" name="firstname" id="firstname" value="{{ $user->firstname }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <label for="lastname" class="block text-sm font-medium text-gray-700">Nachname</label>
                        <input type="text" name="lastname" id="lastname" value="{{ $user->lastname }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">E-Mail:</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" readonly
                            disabled
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:opacity-50 disabled:cursor-not-allowed">
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <label for="department" class="block text-sm font-medium text-gray-700">Abteilung</label>
                        <input type="text" name="department" id="department" value="{{ $user->department }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                    </div>

                </div>
            </div>

            {{-- Roles --}}
            <div class="col-span-6 flex flex-col gap-8 w-full h-auto bg-white px-4 py-5 shadow sm:rounded-lg sm:p-6">
                <div class="w-full h-auto grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        <h3 class="text-lg font-bold leading-6 text-gray-900">Rechte-Verwaltung</h3>
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <fieldset class="w-full h-auto">
                            <legend class="sr-only">Rollen</legend>

                            @foreach ($roles as $role)
                                <div class="relative flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="roles" aria-describedby="roles-description" name="roles[]"
                                            type="checkbox" value="{{ $role->id }}"
                                            @if (in_array($role->id, $user_roles)) checked @endif
                                            class="h-4 w-4 rounded border-gray-300 text-primary-600focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="roles"
                                            class="font-medium text-gray-700">{{ $role->title != null ? $role->title : $role->name }}</label>
                                        @if ($role->description)
                                            <p id="roles-description" class="text-gray-500">{{ $role->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </fieldset>
                    </div>
                </div>
            </div>

            {{-- Admin Settings  --}}
            <div class="col-span-6 flex flex-col gap-8 w-full h-auto bg-white px-4 py-5 shadow sm:rounded-lg sm:p-6">
                <div class="w-full h-auto grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        <h3 class="text-lg font-bold leading-6 text-gray-900">Admin-Bereich</h3>
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        TODO:</br>
                        Passwort-Reset</br>
                    </div>
                </div>
            </div>

            {{-- Delete Card --}}
            <div class="col-span-6 flex flex-col w-full h-auto bg-white px-4 py-5 shadow sm:rounded-lg sm:p-6">
                <h3 class="text-lg font-bold leading-6 text-gray-900">Benutzer löschen</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>Der Benutzer wird gelöscht und er hat keinen Zugriff mehr auf die Daten.</p>
                </div>
                <div class="mt-5">
                    <button type="button" @click="openModal"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-100 px-4 py-2 font-medium text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:text-sm">Benutzer
                        löschen</button>
                </div>
            </div>


            <div class="col-span-12 mt-4 flex gap-4 justify-end">
                <x-button tag="a" secondary href="{{ route('users.show', ['user' => $user->id]) }}">Abbrechen
                </x-button>
                <x-button type="submit">Speichern</x-button>
            </div>
        </form>
    </div>

    <x-slot name="modals">
        <x-modal x-show="modalOpen" icon="exclamation" headline="Benutzer wirklich löschen?" message="Sind Sie sicher, dass sie den Benutzer unwiderruflich löschen möchten.">
            <x-slot name="form">
                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" x-ref="deleteForm">
                    @csrf
                    @method('DELETE')
                </form>
            </x-slot>
            <x-slot name="actions">
                <x-button error type="button" @click="submit">Löschen</x-button>
                <x-button secondary type="button" @click="closeModal">Abbrechen</x-button>
            </x-slot>
        </x-modal>
    </x-slot>



    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('usersEdit', () => ({
                modalOpen: false,
                openModal() {
                    this.modalOpen = true
                },
                closeModal() {
                    this.modalOpen = false
                },
                submit() {
                    this.submitDeleteForm()
                    this.closeModal()
                },
                submitDeleteForm() {
                    this.$refs.deleteForm.submit()
                }
            }))
        })
    </script>
</x-app-layout>
