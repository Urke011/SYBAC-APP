<?php

namespace App\Filament\Resources;

use App\Constants\Countries;
use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\Actions\Modal\Actions\Action;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Log;
use Monarobase\CountryList\CountryList;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-s-user';

    protected static ?string $navigationLabel = 'Kunden';
    protected static ?string $navigationGroup = 'CRM';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    TextInput::make('company_name')->label('Firmenname')->placeholder('Mustermann GmbH')->required(),
                    TextInput::make('street')->label('Adresse')->placeholder('Musterstraße 1')->required()->hint('Straße und Hausnummer'),
                    TextInput::make('zip')->label('PLZ')->placeholder('12345')->required(),
                    TextInput::make('city')->label('Stadt')->placeholder('Musterstadt')->required(),
                    Select::make('country')->label('Land')->options(collect(Countries::getAll())->pluck('value', 'key'))->searchable()->hint('Land kann ausgewählt werden. Suche ist auch möglich.')->required(),
                    TextInput::make('email')->label('E-Mail-Adresse')->placeholder('info@mustermann.com')->required()->email()->unique(ignoreRecord: true)->hint('Allgemeine E-Mail-Adresse für Rechnung etc.')
                ]),
                Card::make()->schema([
                    TextInput::make('contact_name')->label('Ansprechpartner - Name')->placeholder('Max Mustermann')->required()->hint('Vor- und Nachname'),
                    TextInput::make('contact_email')->label('Ansprechpartner - E-Mail-Adresse')->placeholder('max@mustermann.com')->required()->email()->hint('Persönliche E-Mail-Adresse des Ansprechpartners'),
                    TextInput::make('contact_phone')->label('Ansprechpartner - Telefonnummer')->placeholder('+49 (0 160 12345678')->tel()->hint('Persönliche Telefonnummer des Ansprechpartners'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('company_name')->label('Firmenname')->sortable(),
                Tables\Columns\TextColumn::make('city')->label('Stadt')->sortable(),
                Tables\Columns\TextColumn::make('email')->label('E-mail-Adresse'),
                Tables\Columns\TextColumn::make('contact_name')->label('Ansprechpartner')->sortable(),
            ])
            ->defaultSort('company_name')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([])->defaultSort('updated_at', 'desc');
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
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
