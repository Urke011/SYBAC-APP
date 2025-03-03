<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Constants\DefaultRoles;
use App\Filament\Resources\RoleResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions\ForceDeleteAction;
use Filament\Pages\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected static ?string $title = 'Rolle bearbeiten';

    protected function getActions(): array
    {
        if (!DefaultRoles::isDefaultRole($this->data['name'])) {
            return [
                DeleteAction::make()->modalHeading('Rolle löschen'),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ];
        }

        return [];
    }
}
