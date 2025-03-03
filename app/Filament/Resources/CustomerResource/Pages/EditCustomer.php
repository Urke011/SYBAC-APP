<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions\ForceDeleteAction;
use Filament\Pages\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;


class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    protected static ?string $title = 'Kunde bearbeiten';

    protected function getActions(): array
    {
        return [
            DeleteAction::make()->modalHeading('Kunde löschen'),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
