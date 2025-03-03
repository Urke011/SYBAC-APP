<?php

namespace App\Filament\Resources\SubsectionResource\Pages;

use App\Filament\Resources\SubsectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubsections extends ListRecords
{
    protected static string $resource = SubsectionResource::class;

    protected static ?string $title = 'Gewerkübersicht';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
