<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalculationResource\Pages;
use App\Models\Calculation;
use App\Models\Inquiry;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CalculationResource extends Resource
{
    protected static ?string $model = Calculation::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    protected static ?string $navigationLabel = 'Kalkulationen';
    protected static ?string $navigationGroup = 'CRM';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        $inquiry = request()->has('inquiry') ? Inquiry::find(request()->input('inquiry')) : null;

        $fields = [];

        if ($inquiry) {
            // array_push($fields, TextInput::make('inquiry_id')->label('')->type('hidden')->default(fn () => $inquiry->id));
            array_push($fields, Hidden::make('inquiry_id')->default(fn () => $inquiry->id));
        } else {
            array_push($fields, Select::make('inquiry_id')->label('Anfrage')->options(Inquiry::all()->pluck('id', 'id'))->searchable(),);
        }
        array_push($fields, TextInput::make('purpose')->label('Zweck der Halle')->placeholder('Lagerhalle für Material')->default(fn () => $inquiry->purpose ?? null));
        array_push($fields, TextInput::make('location')->label('Bauort')->placeholder('Musterstraße 1, 12345 Musterstadt')->default(fn () => $inquiry->location ?? null));
        array_push($fields, TextInput::make('length')->type('number')->label('Grundlänge der Halle')->suffix('mm')->placeholder('10')->default(fn () => $inquiry->length ?? null));
        array_push($fields, TextInput::make('width')->type('number')->label('Grundbreite der Halle')->suffix('mm')->placeholder('10')->default(fn () => $inquiry->width ?? null));
        array_push($fields,  TextInput::make('raster')->type('number')->label('Raster')->suffix('mm')->placeholder('1')->default(fn () => $inquiry->raster ?? null));
        array_push($fields, TextInput::make('eaves_height')->type('number')->label('Traufhöhe')->suffix('mm')->placeholder('10')->default(fn () => $inquiry->eaves_height ?? null));
        array_push($fields, TextInput::make('snowload')->type('number')->step(0.01)->label('Schneelast')->suffix('kN/m3')->placeholder('0,6')->default(fn () => $inquiry->snowload ?? null));
        array_push($fields, TextInput::make('craneload')->type('number')->step(0.01)->label('Kranbahnlast')->suffix('kN/m3')->placeholder('10')->default(fn () => $inquiry->craneload ?? null));
        array_push($fields, TextInput::make('hookheight')->type('number')->label('Hakenhöhe')->suffix('mm')->placeholder('10')->default(fn () => $inquiry->hookheight ?? null));
        array_push($fields,  Textarea::make('notes')->label('Notizen/Kommentar')->placeholder('Notizen oder Kommentare')->default(fn () => $inquiry->notes ?? null));




        return $form
            ->schema([
                Card::make()->schema($fields),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('inquiry.id')->label('Anfrage-ID')->sortable(),
                Tables\Columns\TextColumn::make('purpose')->label('Zweck der Halle'),
                Tables\Columns\TextColumn::make('location')->label('Bauort')->sortable(),
                // Tables\Columns\TextColumn::make('notes')->label('Notizen/Kommentar'),
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ])->defaultSort('updated_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCalculations::route('/'),
            'create' => Pages\CreateCalculation::route('/create'),
            'edit' => Pages\EditCalculation::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
