<?php

namespace App\Filament\Resources\CalculationResource\Pages;

use App\Filament\Resources\CalculationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalculation extends EditRecord
{
    protected static string $resource = CalculationResource::class;

    protected static ?string $title = 'Kalkulation bearbeiten';

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
