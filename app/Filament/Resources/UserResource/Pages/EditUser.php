<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions\ForceDeleteAction;
use Filament\Pages\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected static ?string $title = 'Benutzer bearbeiten';

    protected function getActions(): array
    {
        return [
            DeleteAction::make()->modalHeading('Benutzer löschen'),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
