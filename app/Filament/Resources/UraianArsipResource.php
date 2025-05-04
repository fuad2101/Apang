<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UraianArsipResource\Pages;
use App\Filament\Resources\UraianArsipResource\RelationManagers;
use App\Models\UraianArsip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UraianArsipResource extends Resource
{
    protected static ?string $model = UraianArsip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Arsip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('arsip_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('no_berkas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('isi_informasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tingkat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lokasi_unit')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sifat_arsip')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kondisi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('media')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ket')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_arsip')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nilai_guna')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('arsip_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_berkas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isi_informasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tingkat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lokasi_unit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sifat_arsip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kondisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('media')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ket')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_arsip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nilai_guna')
                    ->searchable(),
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
            'index' => Pages\ListUraianArsips::route('/'),
            'create' => Pages\CreateUraianArsip::route('/create'),
            'edit' => Pages\EditUraianArsip::route('/{record}/edit'),
        ];
    }
}
