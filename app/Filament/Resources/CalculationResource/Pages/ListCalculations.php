<?php

namespace App\Filament\Resources\CalculationResource\Pages;

use App\Filament\Resources\CalculationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCalculations extends ListRecords
{
    protected static string $resource = CalculationResource::class;

    protected static ?string $title = 'Kalkulationenübersicht';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
