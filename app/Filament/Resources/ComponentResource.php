<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComponentResource\Pages;
use App\Models\Component;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComponentResource extends Resource
{
    protected static ?string $model = Component::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    protected static ?string $navigationLabel = 'Bauteile';
    protected static ?string $navigationGroup = 'Kalkulator';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')->label('Name')->placeholder('Name des Bauteils')->required(),
                    Textarea::make('description')->label('Beschreibung')->placeholder('Beschreibung des Bauteils'),
                    TextInput::make('color')->label('Farbe')->placeholder('Farbe des Bauteils'),
                    Toggle::make('is_iso')->inline(false)->label('Ist ISO-Norm?'),
                    TextInput::make('grid')->numeric()->label('Rastermaß')->hint('in mm')->suffix('mm')->placeholder('500'),
                    TextInput::make('width')->numeric()->label('Breite')->hint('in mm')->suffix('mm')->placeholder('1000'),
                    TextInput::make('height')->numeric()->label('Höhe')->hint('in mm')->suffix('mm')->placeholder('1000'),
                    TextInput::make('length')->numeric()->label('Länge')->hint('in mm')->suffix('mm')->placeholder('10'),
                    TextInput::make('weight')->numeric()->label('Gewicht')->hint('in kg')->suffix('kg')->placeholder('1,123'),
                    TextInput::make('area')->numeric()->label('Fläche')->hint('in qm')->suffix('qm')->placeholder('1000'),
                    TextInput::make('price_mount')->numeric()->label('Preis pauschal')->hint('')->suffix('€')->placeholder('1000.00'),
                    TextInput::make('price_per_unit')->numeric()->label('Preis pro Einheit')->hint('')->suffix('€')->placeholder('100.00')->required(),

                ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name')->sortable(),
                Tables\Columns\TextColumn::make('description')->label('Beschreibung'),
                Tables\Columns\TextColumn::make('color')->label('Farbe'),
                ViewColumn::make('is_iso')->label('Ist ISO-Norm?')->view('filament.tables.columns.true-false-column'),
                // Tables\Columns\TextColumn::make('is_iso')->label('Ist ISO-Norm?')->formatStateUsing(fn (bool $is_iso): string => $is_iso ? 'Ja ' : 'Nein'),
                // Tables\Columns\TextColumn::make('grid')->label('Grid'),
                // Tables\Columns\TextColumn::make('width')->label('Breite'),
                // Tables\Columns\TextColumn::make('height')->label('Höhe'),
                // Tables\Columns\TextColumn::make('length')->label('Länge'),
                // Tables\Columns\TextColumn::make('weight')->label('Gewicht')->view('filament.tables.columns.weight'),
                // Tables\Columns\TextColumn::make('area')->label('Bereich'),
                ViewColumn::make('price_mount')->label('Preis pauschal')->view('filament.tables.columns.price-column'),
                ViewColumn::make('price_per_unit')->label('Preis pro Einheit')->view('filament.tables.columns.price-column'),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComponents::route('/'),
            'create' => Pages\CreateComponent::route('/create'),
            'edit' => Pages\EditComponent::route('/{record}/edit'),
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
