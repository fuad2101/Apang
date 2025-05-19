<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KlasifikasiArsipResource\Pages;
use App\Filament\Resources\KlasifikasiArsipResource\RelationManagers;
use App\Models\KlasifikasiArsip;
use Filament\Forms;
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

    protected static ?string $navigationGroup = 'Kearsipan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_fungsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fungsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kode_kegiatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kegiatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kode_transaksi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('aktif')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('inaktif')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('uraian_arsip')
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('kode_fungsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fungsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_transaksi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('aktif')
                    ->searchable(),
                Tables\Columns\TextColumn::make('inaktif')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uraian_arsip')
                    ->searchable(),
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
