<x-app-layout>
    <x-slot name="header">
        Angebote
    </x-slot>

    <x-slot name="buttons">
    </x-slot>

    <div class="w-full h-auto py-12">
        <x-empty-state headline="Keine Angebote" copy="Beginnen Sie mit dem Anlegen eines neuen Angebots."
            buttonLabel="Neues Angebot" buttonLink="#" :permissionKey="Permissions::CREATE_OFFER" />
    </div>
</x-app-layout>
