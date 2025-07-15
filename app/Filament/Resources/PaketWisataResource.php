<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaketWisataResource\Pages;
use App\Filament\Resources\PaketWisataResource\RelationManagers;
use App\Models\PaketWisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaketWisataResource extends Resource
{
    protected static ?string $model = PaketWisata::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationGroup = 'Kelola Paket Wisata';
    protected static ?string $slug = 'paket-wisata';
    protected static ?string $pluralLabel = 'Paket Wisata';
    protected static ?string $navigationLabel = 'Paket Wisata';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Paket Wisata')
                    ->description('Masukkan detail paket wisata dengan lengkap')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Forms\Components\TextInput::make('nama_paket')
                            ->label('Nama Paket Wisata')
                            ->placeholder('Masukkan nama paket wisata...')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-map-pin')
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('harga')
                            ->label('Harga Paket')
                            ->placeholder('0')
                            ->required()
                            ->numeric()
                            ->prefixIcon('heroicon-o-currency-dollar')
                            ->prefix('Rp')
                            ->minValue(0)
                            ->step(1000),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Forms\Components\Section::make('Media & Deskripsi')
                    ->description('Upload gambar dan tulis deskripsi paket wisata')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('gambar_paket')
                            ->label('Gambar Paket Wisata')
                            ->image()
                            ->disk('public')
                            ->required()
                            ->maxSize(2048)
                            ->helperText('Ukuran gambar tidak boleh lebih dari 2MB. Format yang diizinkan: JPG, PNG, GIF')
                            ->directory('paket-wisata')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                            ->panelLayout('integrated')
                            ->uploadingMessage('Mengupload gambar...')
                            ->columnSpanFull(),

                        RichEditor::make('deskripsi')
                            ->label('Deskripsi Paket Wisata')
                            ->placeholder('Deskripsikan paket wisata dengan detail: itinerary, fasilitas, dan hal menarik lainnya...')
                            ->columnSpanFull()
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'link',
                                'undo',
                                'redo',
                            ])
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('paket-wisata/attachments'),
                    ])
                    ->columns(1)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar_paket')
                    ->label('Gambar')
                    ->circular()
                    ->size(60)
                    ->defaultImageUrl('/images/placeholder-tourism.png'),
                    
                Tables\Columns\TextColumn::make('nama_paket')
                    ->label('Nama Paket')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->copyable()
                    ->copyMessage('Nama paket berhasil disalin!')
                    ->tooltip('Klik untuk menyalin nama paket')
                    ->wrap(),
                    
                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->money('idr')
                    ->sortable()
                    ->badge()
                    ->color('success')
                    ->icon('heroicon-o-currency-dollar'),
                    
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->html()
                    ->limit(80)
                    ->tooltip(function ($record) {
                        return strip_tags($record->deskripsi);
                    })
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('nama_paket', 'asc')
            ->striped()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->label('Lihat')
                        ->color('info')
                        ->icon('heroicon-o-eye'),
                    Tables\Actions\EditAction::make()
                        ->label('Edit')
                        ->color('warning')
                        ->icon('heroicon-o-pencil-square'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Hapus')
                        ->requiresConfirmation()
                        ->modalHeading('Hapus Paket Wisata')
                        ->modalDescription('Apakah Anda yakin ingin menghapus paket wisata ini? Tindakan ini tidak dapat dibatalkan.')
                        ->modalSubmitActionLabel('Ya, Hapus')
                        ->modalCancelActionLabel('Batal')
                        ->icon('heroicon-o-trash'),
                ])
                ->label('Aksi')
                ->icon('heroicon-m-ellipsis-vertical')
                ->size('sm')
                ->color('gray')
                ->button()
                ->tooltip('Pilih aksi'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->modalHeading('Hapus Paket Wisata Terpilih')
                        ->modalDescription('Apakah Anda yakin ingin menghapus semua paket wisata yang terpilih?')
                        ->modalSubmitActionLabel('Ya, Hapus Semua'),
                ]),
            ])
            ->emptyStateHeading('Belum Ada Paket Wisata')
            ->emptyStateDescription('Mulai dengan menambahkan paket wisata pertama Anda.')
            ->emptyStateIcon('heroicon-o-map-pin');
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
            'index' => Pages\ListPaketWisatas::route('/'),
            'create' => Pages\CreatePaketWisata::route('/create'),
            'edit' => Pages\EditPaketWisata::route('/{record}/edit'),
        ];
    }
}