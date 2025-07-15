<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerangkatDesaResource\Pages;
use App\Filament\Resources\PerangkatDesaResource\RelationManagers;
use App\Models\PerangkatDesa;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerangkatDesaResource extends Resource
{
    protected static ?string $model = PerangkatDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Struktur Desa';
    protected static ?string $slug = 'perangkat-desa';
    protected static ?string $pluralLabel = 'Perangkat Desa';
    protected static ?string $navigationLabel = 'Perangkat Desa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Perangkat Desa')
                    ->description('Kelola informasi perangkat desa')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Lengkap')
                                    ->placeholder('Masukkan nama lengkap')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-user'),
                                
                                Forms\Components\TextInput::make('jabatan')
                                    ->label('Jabatan')
                                    ->placeholder('Masukkan jabatan')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-briefcase'),
                            ]),
                        
                        FileUpload::make('foto')
                            ->label('Foto Perangkat Desa')
                            ->image()
                            ->disk('public')
                            ->directory('perangkat-desa')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                            ->helperText('Upload foto dengan format JPG, JPEG, atau PNG. Maksimal 2MB. Foto akan di-crop menjadi persegi.')
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->size(60)
                    ->circular()
                    ->defaultImageUrl(asset('images/avatar-placeholder.png'))
                    ->tooltip('Foto Perangkat Desa'),
                
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
                
                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'kepala desa', 'kades' => 'success',
                        'sekretaris desa', 'sekdes' => 'info',
                        'bendahara' => 'warning',
                        'kaur' => 'primary',
                        'kasi' => 'secondary',
                        default => 'gray',
                    })
                    ->icon('heroicon-o-briefcase')
                    ->wrap(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->icon('heroicon-o-calendar'),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->icon('heroicon-o-clock'),
            ])
            ->defaultSort('nama', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('jabatan')
                    ->label('Filter Jabatan')
                    ->options([
                        'Kepala Desa' => 'Kepala Desa',
                        'Sekretaris Desa' => 'Sekretaris Desa',
                        'Bendahara' => 'Bendahara',
                    ])
                    ->multiple()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->color('info'),
                    Tables\Actions\EditAction::make()
                        ->color('warning'),
                    Tables\Actions\DeleteAction::make()
                        ->requiresConfirmation()
                        ->modalHeading('Hapus Kategori')
                        ->modalDescription('Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.')
                        ->modalSubmitActionLabel('Ya, Hapus'),
                ])
                ->label('Aksi')
                ->icon('heroicon-m-ellipsis-vertical')
                ->size('sm')
                ->color('gray')
                ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Terpilih')
                        ->icon('heroicon-o-trash'),
                ]),
            ])
            ->emptyStateHeading('Belum ada data perangkat desa')
            ->emptyStateDescription('Silakan tambahkan data perangkat desa untuk memulai.')
            ->emptyStateIcon('heroicon-o-users')
            ->striped();
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
            'index' => Pages\ListPerangkatDesas::route('/'),
            'create' => Pages\CreatePerangkatDesa::route('/create'),
            'edit' => Pages\EditPerangkatDesa::route('/{record}/edit'),
        ];
    }
}