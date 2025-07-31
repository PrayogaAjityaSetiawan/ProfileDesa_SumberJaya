<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfografisResource\Pages;
use App\Filament\Resources\InfografisResource\RelationManagers;
use App\Models\Infografis;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InfografisResource extends Resource
{
    protected static ?string $model = Infografis::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    
    protected static ?string $navigationLabel = 'Infografis Demografi';
    
    protected static ?string $modelLabel = 'Infografis';
    
    protected static ?string $pluralModelLabel = 'Infografis';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Data Dasar Penduduk')
                ->description('Masukkan data dasar kependudukan')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextInput::make('jumlah_penduduk')
                                ->numeric()
                                ->label('Jumlah Penduduk')
                                ->required()
                                ->minValue(0)
                                ->placeholder('Contoh: 5000'),
                            TextInput::make('jumlah_kk')
                                ->numeric()
                                ->label('Jumlah Kepala Keluarga')
                                ->required()
                                ->minValue(0)
                                ->placeholder('Contoh: 1250'),
                            TextInput::make('jumlah_rt')
                                ->numeric()
                                ->label('Jumlah RT')
                                ->required()
                                ->minValue(0)
                                ->placeholder('Contoh: 20'),
                            TextInput::make('jumlah_rw')
                                ->numeric()
                                ->label('Jumlah RW')
                                ->required()
                                ->minValue(0)
                                ->placeholder('Contoh: 5'),
                            TextInput::make('jumlah_laki_laki')
                                ->numeric()
                                ->label('Jumlah Laki-laki')
                                ->required()
                                ->minValue(0)
                                ->placeholder('Contoh: 2500'),
                            TextInput::make('jumlah_perempuan')
                                ->numeric()
                                ->label('Jumlah Perempuan')
                                ->required()
                                ->minValue(0)
                                ->placeholder('Contoh: 2500'),

                        ])
                ])
                ->collapsible(),

            Section::make('Kelompok Umur')
                ->description('Data penduduk berdasarkan kelompok umur')
                ->schema([
                    Repeater::make('kelompok_umur')
                        ->label('Kelompok Umur')
                        ->schema([
                            TextInput::make('rentang_umur')
                                ->label('Rentang Umur')
                                ->required()
                                ->placeholder('Contoh: 0-5 tahun'),
                            TextInput::make('laki_laki')
                                ->numeric()
                                ->label('Laki-laki')
                                ->required()
                                ->minValue(0)
                                ->placeholder('0'),
                            TextInput::make('perempuan')
                                ->numeric()
                                ->label('Perempuan')
                                ->required()
                                ->minValue(0)
                                ->placeholder('0'),
                        ])
                        ->columns(3)
                        ->defaultItems(1)
                        ->addActionLabel('Tambah Kelompok Umur')
                        ->reorderableWithButtons()
                        ->collapsible(),
                ])
                ->collapsible(),

            Section::make('Tingkat Pendidikan')
                ->description('Data penduduk berdasarkan tingkat pendidikan')
                ->schema([
                    Repeater::make('tingkat_pendidikan')
                        ->label('Tingkat Pendidikan')
                        ->schema([
                            TextInput::make('jenjang')
                                ->label('Jenjang Pendidikan')
                                ->placeholder('Contoh: SD, SMP, SMA, S1')
                                ->required(),
                            TextInput::make('jumlah')
                                ->numeric()
                                ->label('Jumlah')
                                ->required()
                                ->minValue(0)
                                ->placeholder('0'),
                        ])
                        ->columns(2)
                        ->defaultItems(1)
                        ->addActionLabel('Tambah Tingkat Pendidikan')
                        ->reorderableWithButtons()
                        ->collapsible(),
                ])
                ->collapsible(),

            Section::make('Jenis Pekerjaan')
                ->description('Data penduduk berdasarkan jenis pekerjaan')
                ->schema([
                    Repeater::make('jenis_pekerjaan')
                        ->label('Jenis Pekerjaan')
                        ->schema([
                            TextInput::make('jenis')
                                ->label('Jenis Pekerjaan')
                                ->required()
                                ->placeholder('Contoh: Petani, Pedagang, PNS'),
                            TextInput::make('jumlah')
                                ->numeric()
                                ->label('Jumlah')
                                ->required()
                                ->minValue(0)
                                ->placeholder('0'),
                        ])
                        ->columns(2)
                        ->defaultItems(1)
                        ->addActionLabel('Tambah Jenis Pekerjaan')
                        ->reorderableWithButtons()
                        ->collapsible(),
                ])
                ->collapsible(),

                Section::make('Agama')
                ->description('Data penduduk berdasarkan agama')
                ->schema([
                    Repeater::make('agama_penduduk')
                        ->label('Agama Penduduk')
                        ->schema([
                            TextInput::make('agama')
                                ->label('Agama')
                                ->required()
                                ->placeholder('Contoh: Islam, Kristen, Katolik, Hindu, Budha'),
                            TextInput::make('jumlah')
                                ->numeric()
                                ->label('Jumlah Penduduk')
                                ->required()
                                ->minValue(0)
                                ->placeholder('0'),
                        ])
                        ->columns(3)
                        ->defaultItems(1)
                        ->addActionLabel('Tambah Agama Penduduk')
                        ->reorderableWithButtons()
                        ->collapsible(),
                ])
                ->collapsible(),

                Section::make('pendapatan')
                ->description('pendapatan desa')
                ->schema([
                    Repeater::make('pendapatan')
                        ->label('pendapatan')
                        ->schema([
                            TextInput::make('sumber')
                                ->label('pendapatan')
                                ->required()
                                ->placeholder('Contoh: Pendapatan Usaha, Pendapatan Lainnya'),
                            TextInput::make('jumlah')
                                ->numeric()
                                ->label('jumlah pendapatan')
                                ->required()
                                ->minValue(0)
                                ->placeholder('0'),
                        ])
                        ->columns(3)
                        ->defaultItems(1)
                        ->addActionLabel('Tambah pendapatan')
                        ->reorderableWithButtons()
                        ->collapsible(),
                ])
                ->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_penduduk')
                    ->label('Jumlah Penduduk')
                    ->numeric()
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => number_format($state)),
                Tables\Columns\TextColumn::make('jumlah_kk')
                    ->label('Jumlah KK')
                    ->numeric()
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => number_format($state)),
                Tables\Columns\TextColumn::make('jumlah_rt')
                    ->label('RT')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_rw')
                    ->label('RW')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('jumlah_penduduk_range')
                    ->form([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('min_penduduk')
                                    ->numeric()
                                    ->label('Minimum Penduduk'),
                                Forms\Components\TextInput::make('max_penduduk')
                                    ->numeric()
                                    ->label('Maksimum Penduduk'),
                            ])
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min_penduduk'],
                                fn (Builder $query, $value): Builder => $query->where('jumlah_penduduk', '>=', $value),
                            )
                            ->when(
                                $data['max_penduduk'],
                                fn (Builder $query, $value): Builder => $query->where('jumlah_penduduk', '<=', $value),
                            );
                    })
                    ->label('Filter Jumlah Penduduk'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListInfografis::route('/'),
            'create' => Pages\CreateInfografis::route('/create'),
            'edit' => Pages\EditInfografis::route('/{record}/edit'),
        ];
    }
}