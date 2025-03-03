<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InquiryResource\Pages;
use App\Filament\Resources\InquiryResource\RelationManagers;
use App\Filament\Resources\InquiryResource\RelationManagers\CustomerRelationManager;
use App\Models\Customer;
use App\Models\Inquiry;
use Filament\Forms;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InquiryResource extends Resource
{
    protected static ?string $model = Inquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationLabel = 'Anfragen';
    protected static ?string $navigationGroup = 'CRM';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('customer_id')->label('Firmenname')->options(Customer::all()->pluck('company_name', 'id'))->searchable(),
                    TextInput::make('purpose')->label('Zweck der Halle')->placeholder('Lagerhalle für Material'),
                    TextInput::make('location')->label('Bauort')->placeholder('Musterstraße 1, 12345 Musterstadt'),
                    TextInput::make('length')->type('number')->label('Grundlänge der Halle')->suffix('mm')->placeholder('10'),
                    TextInput::make('width')->type('number')->label('Grundbreite der Halle')->suffix('mm')->placeholder('10'),
                    TextInput::make('eaves_height')->type('number')->label('Traufhöhe')->suffix('mm')->placeholder('10'),
                    TextInput::make('snowload')->type('number')->step(0.01)->label('Schneelast')->suffix('kg/m3')->placeholder('5'),
                    TextInput::make('craneload')->type('number')->step(0.01)->label('Kranbahnlast')->suffix('kN/m3')->placeholder('3'),
                    TextInput::make('hookheight')->type('number')->label('Hakenhöhe')->suffix('mm')->placeholder('20'),
                    Textarea::make('notes')->label('Notizen/Kommentar')->placeholder('Notizen oder Kommentare'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.company_name')->label('Kundennummer')->sortable(),
                Tables\Columns\TextColumn::make('purpose')->label('Zweck der Halle'),
                Tables\Columns\TextColumn::make('location')->label('Bauort')->sortable(),
                // Tables\Columns\TextColumn::make('notes')->label('Notizen/Kommentar'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('Kalkulation')->icon('heroicon-o-calculator')
                    ->url(fn (Inquiry $record): string => route('filament.resources.calculations.create', [
                        'inquiry' => $record->id
                    ])),
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
            'index' => Pages\ListInquiries::route('/'),
            'create' => Pages\CreateInquiry::route('/create'),
            'edit' => Pages\EditInquiry::route('/{record}/edit'),
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
