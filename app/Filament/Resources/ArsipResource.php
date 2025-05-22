<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Arsip;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Awcodes\TableRepeater\Header;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\ArsipResource\Pages;
use Awcodes\TableRepeater\Components\TableRepeater;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArsipResource\RelationManagers;

class ArsipResource extends Resource
{
    protected static ?string $model = Arsip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pencipta Arsip';

    protected static ?string $navigationGroup = 'Kearsipan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('no_berkas')
                    ->required()
                    ->maxLength(255)
                    ->label('No. Berkas')->disabled(),

                Select::make('klasifikasi_arsips_id')
                    ->relationship(name:'klasifikasiArsip', titleAttribute:'kode_transaksi')
                    ->label('Kode Klasifikasi')
                    ->required()
                    ->searchable(),

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

                TextInput::make('uraian_berkas')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),

                Section::make('Isi Berkas')
                    ->description('Isi dengan berkas-berkas yang berkaitan')
                    ->schema([
                        TableRepeater::make('Uraian Berkas')
                        ->headers([
                            Header::make('Isi Informasi')
                                ->width('250px')
                                ->align(Alignment::Center),
                            Header::make('Jumlah')
                                ->width('5px')
                                ->align(Alignment::Center),
                            Header::make('Jenis')
                                ->align(Alignment::Center),
                            Header::make('Tanggal')
                                ->width('130px')
                                ->align(Alignment::Center),
                            Header::make('Tingkat')
                                ->align(Alignment::Center),
                            Header::make('Lokasi Unit')
                                ->align(Alignment::Center),
                            Header::make('Sifat Arsip')
                                ->align(Alignment::Center),
                            Header::make('Kondisi')
                                ->align(Alignment::Center),
                            Header::make('Media')
                                ->align(Alignment::Center),
                            Header::make('Ket')
                                ->align(Alignment::Center),
                            Header::make('Jenis Arsip')
                                ->align(Alignment::Center),
                            Header::make('Nilai Guna')
                                ->align(Alignment::Center),
                        ])
                        ->schema([
                            TextInput::make('Isi Informasi'),
                            TextInput::make('Jumlah'),
                            Select::make('Jenis')
                                ->options([
                                    'berkas'=>'Berkas',
                                    'dokumen'=>'Dokumen',
                                    'lembar'=>'Lembar',
                                    'folder'=>'Folder',
                                    'laporan'=>'Laporan',
                                    'buku'=>'Buku',
                                ]),
                            DatePicker::make('Tanggal'),
                            Select::make('Tingkat')
                                ->options([
                                    'asli'=>'Asli',
                                    'copy'=>'Copy',
                                ]),
                            TextInput::make('Lokasi Unit'),
                            Select::make('Sifat Arsip')
                                ->options([
                                    'biasa/terbuka'=>'Biasa/Terbuka',
                                    'terbatas'=>'Terbatas',
                                    'rahasia'=>'Rahasia',
                                    'sangat rahasia'=>'Sangat Rahasia',
                                ]),
                            Select::make('Kondisi')
                                ->options([
                                    'baik'=>'Baik',
                                    'perlu_diperbaiki'=>'Perlu Diperbaiki',
                                    'rusak'=>'Rusak',
                                ]),
                            Select::make('Kondisi')
                                ->options([
                                    'softcopy'=>'Softcopy',
                                    'hardcopy'=>'Hardcopy',
                                    'softhardcopy'=>'Softcopy dan Hardcopy',
                                ]),
                            TextInput::make('Ket'),
                            TextInput::make('Jenis Arsip'),
                            Select::make('Nilai Guna')
                                ->options([
                                    'hukum'=>'Hukum',
                                    'keuangan'=>'Keuangan',
                                    'administrasi'=>'Administrasi',
                                    'ilmiah dan teknologi'=>'Ilmiah dan Teknologi',
                                ]),
                        ])
                    ->streamlined()
                    ->required()
                    ->collapsed()
                    ->columns(2)
                ]),
        ])
            ->columns(3);
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
