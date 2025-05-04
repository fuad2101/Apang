<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pegawai;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PegawaiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PegawaiResource\RelationManagers;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pegawai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama'),
                TextInput::make('nip'),
                DatePicker::make('ttl'),
                TextInput::make('pangkat'),
                Select::make('jabatan')
                    ->options([
                        'pfm'=>'Pengawas Farmasi Makanan',
                        'Tenaga Administrasi'=>'tenaga administrasi',
                    ]),
                Select::make('substansi')
                    ->options([
                        'Tata Usaha'=>'Tata Usaha',
                        'Pengujian'=>'Pengujian',
                        'Pemeriksaan'=>'Pemeriksaan',
                        'Penindakan'=>'Penindakan',
                        'Infokom'=>'Infokom',
                    ])->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('nip'),
                TextColumn::make('ttl'),
                TextColumn::make('pangkat'),
                TextColumn::make('jabatan'),
                TextColumn::make('substansi'),
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
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
        ];
    }
}
