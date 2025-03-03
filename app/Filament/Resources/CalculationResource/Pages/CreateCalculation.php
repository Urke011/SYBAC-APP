<?php

namespace App\Filament\Resources\CalculationResource\Pages;

use App\Filament\Resources\CalculationResource;
use App\Models\Inquiry;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class CreateCalculation extends CreateRecord
{
    private $inquiryId = null;
    protected static string $resource = CalculationResource::class;

    protected static ?string $title = 'Kalkulation erstellen';
}
