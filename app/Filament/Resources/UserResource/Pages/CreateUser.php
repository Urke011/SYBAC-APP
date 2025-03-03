<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Carbon\Carbon;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected static ?string $title = 'Neuen Benutzer erstellen';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = Hash::make(strtolower($data['firstname'] . $data['firstname']));
        $data['email_verified_at'] = Carbon::now();

        return $data;
    }
}
