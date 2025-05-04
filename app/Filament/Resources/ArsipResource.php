<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArsipResource\Pages;
use App\Filament\Resources\ArsipResource\RelationManagers;
use App\Models\Arsip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArsipResource extends Resource
{
    protected static ?string $model = Arsip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pemberkasan';

    protected static ?string $navigationGroup = 'Arsip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('jenis_arsip')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_berkas')
                    ->required()
                    ->maxLength(255)
                    ->label('No. Arsip'),
                Forms\Components\TextInput::make('kode_klasifikasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('uraian_berkas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggal_berkas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('unit_pengolah')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis_arsip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('no_berkas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_klasifikasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uraian_berkas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_berkas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit_pengolah')
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
            'index' => Pages\ListArsips::route('/'),
            'create' => Pages\CreateArsip::route('/create'),
            'edit' => Pages\EditArsip::route('/{record}/edit'),
        ];
    }
}
