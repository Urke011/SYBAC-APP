<?php

namespace App\Filament\Resources\InquiryResource\Pages;

use App\Filament\Resources\InquiryResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions\ForceDeleteAction;
use Filament\Pages\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditInquiry extends EditRecord
{
    protected static string $resource = InquiryResource::class;

    protected static ?string $title = 'Anfrage bearbeiten';

    protected function getActions(): array
    {
        return [
            DeleteAction::make()->modalHeading('Anfrage löschen'),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
