<?php

namespace App\Filament\Resources\SubsectionResource\Pages;

use App\Filament\Resources\SubsectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubsection extends CreateRecord
{
    protected static string $resource = SubsectionResource::class;

    protected static ?string $title = 'Neues Gewerk erstellen';
}
