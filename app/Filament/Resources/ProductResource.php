<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Kelola Produk';
    protected static ?string $slug = 'produk';
    protected static ?string $pluralLabel = 'Produk';
    protected static ?string $navigationLabel = 'Produk';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Produk')
                    ->description('Masukkan detail produk dengan lengkap')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Produk')
                            ->placeholder('Masukkan nama produk...')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-tag')
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->columnSpanFull(),
                        
                        Textarea::make('deskripsi')
                            ->label('Deskripsi Produk')
                            ->placeholder('Deskripsikan produk dengan detail...')
                            ->required()
                            ->maxLength(255)
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),
                Forms\Components\Section::make('slug')
                    ->description('URL slug untuk produk (otomatis dari nama)')
                    ->icon('heroicon-o-link')
                    ->schema([
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug URL')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-link')
                            ->readonly(fn ($context) => $context === 'create'),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Forms\Components\Section::make('Kontak')
                    ->description('Masukkan kontak penjual produk')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Forms\Components\TextInput::make('no_wa')
                            ->label('Nomor WhatsApp')
                            ->placeholder('Masukkan nomor WhatsApp...')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-phone')
                    ])
                    ->columns(1)
                    ->collapsible(),

                Forms\Components\Section::make('Harga & Media')
                    ->description('Tentukan harga dan upload gambar produk')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Forms\Components\TextInput::make('harga')
                            ->label('Harga Produk')
                            ->placeholder('0')
                            ->integer()
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-currency-dollar')
                            ->prefix('Rp')
                            ->numeric(),
                        
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar Produk')
                            ->maxSize(2048)
                            ->helperText('Ukuran gambar tidak boleh lebih dari 2MB. Format yang diizinkan: JPG, PNG, GIF')
                            ->image()
                            ->disk('public')
                            ->directory('products')
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
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->circular()
                    ->size(60)
                    ->defaultImageUrl('/images/placeholder-product.png'),
                    
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->copyable()
                    ->copyMessage('Nama produk berhasil disalin!')
                    ->tooltip('Klik untuk menyalin nama produk'),
                    
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(function ($record) {
                        return $record->deskripsi;
                    })
                    ->wrap(),
                    
                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->money('idr')
                    ->sortable()
                    ->badge()
                    ->color('success')
                    ->icon('heroicon-o-currency-dollar'),
            ])
            ->defaultSort('nama', 'asc')
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
                        ->modalHeading('Hapus Produk')
                        ->modalDescription('Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.')
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
                        ->modalHeading('Hapus Produk Terpilih')
                        ->modalDescription('Apakah Anda yakin ingin menghapus semua produk yang terpilih?')
                        ->modalSubmitActionLabel('Ya, Hapus Semua'),
                ]),
            ])
            ->emptyStateHeading('Belum Ada Produk')
            ->emptyStateDescription('Mulai dengan menambahkan produk pertama Anda.')
            ->emptyStateIcon('heroicon-o-cube');
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}