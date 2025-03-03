<?php

namespace App\Filament\Resources\SubsectionResource\Pages;

use App\Constants\Subsections;
use App\Filament\Resources\SubsectionResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions\ForceDeleteAction;
use Filament\Pages\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSubsection extends EditRecord
{
    protected static string $resource = SubsectionResource::class;

    protected static ?string $title = 'Gewerk bearbeiten';

    protected function getActions(): array
    {
        if (Subsections::DEFAULT['id'] !== $this->data['id']) {
            return [
                DeleteAction::make()->modalHeading('Gewerk löschen'),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ];
        }

        return [];
    }
}
