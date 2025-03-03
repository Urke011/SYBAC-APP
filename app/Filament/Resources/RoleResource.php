<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use App\Models\Role;
use Closure;
use Facades\Str;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Rollen';
    protected static ?string $navigationGroup = 'System';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('title')->label('Titel')->placeholder('Admin')->required()->reactive()->afterStateUpdated(function (Closure $set, $state, $context) {
                        if ($context === 'edit') {
                            return;
                        }

                        $set('name', Str::slug($state));
                    }),
                    TextInput::make('description')->label('Beschreibung')->placeholder('Der Admin hat vollen Zugriff auf alle Bereiche')->required(),
                    TextInput::make('name')->label('Interner Key')->placeholder('admin')->disabled()->required()->rules(['alpha_dash'])->unique(ignoreRecord: true)->helperText('Dieses Feld wird automatisch anhand dem Titel generiert'),
                    CheckboxList::make('permissions')->label('Berechtigung')->hint('Wählen Sie die entsprechenden Berechtigungen aus.')->helperText('Damit der User auch im Menü Zugriff auf die einzelnen Sectionen der Anwendung bekommt, benötigt er immer noch die dementsprechende Zugriffs-Berechtigung (z. B. Zugriff auf Kunden). Eine dementsprechende Darstellung ist in Arbeit.')->relationship('permissions', 'title', fn (Builder $query) => $query->orderBy('group'))->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Titel')->sortable(),
                TextColumn::make('description')->label('Beschreibung')->sortable(),
                TextColumn::make('name')->label('Interner Key')->sortable(),
                TextColumn::make('users_count')->label('Benutzer')->counts('users')->sortable(),
                TextColumn::make('permissions_count')->label('Berechtigungen')->counts('permissions')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
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
