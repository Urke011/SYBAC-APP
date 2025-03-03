<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubsectionResource\Pages;
use App\Filament\Resources\SubsectionResource\RelationManagers;
use App\Models\Subsection;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubsectionResource extends Resource
{
    protected static ?string $model = Subsection::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Gewerke';
    protected static ?string $navigationGroup = 'Kalkulator';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('code')->type('number')->label('Gewerkenummer')->placeholder('5000')->required()->unique(),
                    TextInput::make('name')->label('Name')->placeholder('Name des Gewerks')->required(),
                    Textarea::make('description')->label('Beschreibung')->placeholder('Beschreibung des Gewerks'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Gewerkenummer')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Name')->sortable(),
                Tables\Columns\TextColumn::make('description')->label('Beschreibung'),
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
            'index' => Pages\ListSubsections::route('/'),
            'create' => Pages\CreateSubsection::route('/create'),
            'edit' => Pages\EditSubsection::route('/{record}/edit'),
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
