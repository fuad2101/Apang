<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KlasifikasiArsipResource\Pages;
use App\Filament\Resources\KlasifikasiArsipResource\RelationManagers;
use App\Models\KlasifikasiArsip;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KlasifikasiArsipResource extends Resource
{
    protected static ?string $model = KlasifikasiArsip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Arsip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('primer'),
                TextInput::make('sekunder'),
                TextInput::make('tersier'),
                TextInput::make('deskripsi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListKlasifikasiArsips::route('/'),
            'create' => Pages\CreateKlasifikasiArsip::route('/create'),
            'edit' => Pages\EditKlasifikasiArsip::route('/{record}/edit'),
        ];
    }
}
