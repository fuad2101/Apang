<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Arsip;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\ArsipResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArsipResource\RelationManagers;

class ArsipResource extends Resource
{
    protected static ?string $model = Arsip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pencipta Arsip';

    protected static ?string $navigationGroup = 'Arsip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('jenis_arsip')
                    ->required()
                    ->maxLength(255),
                TextInput::make('no_berkas')
                    ->required()
                    ->maxLength(255)
                    ->label('No. Berkas')->disabled(),
                TextInput::make('kode_klasifikasi')
                    ->required()
                    ->maxLength(255),
                Select::make('klasifikasi_arsips_id')
                    ->relationship() ,
                TextInput::make('uraian_berkas')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('tanggal_berkas')
                ->required(),
                Select::make('Unit Pengolah')
                    ->options([
                        'infokom'=>'Infokom',
                        'pengujian'=>'Pengujian',
                        'pemeriksaan'=>'Pemeriksaan',
                        'penindakan'=>'Penindakan',
                        'tata usaha'=>'Tata Usaha',
                    ]),

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
