<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Section About';
    protected static ?string $slug = 'About';
    protected static ?string $pluralLabel = 'Section About';
    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Tentang Desa')
                    ->description('Kelola informasi umum dan kontak desa')
                    ->icon('heroicon-o-building-office-2')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('judul')
                                    ->label('Judul About')
                                    ->placeholder('Masukkan judul halaman about')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-document-text')
                                    ->columnSpan(2),
                                
                                Forms\Components\RichEditor::make('deskripsi')
                                    ->label('Deskripsi')
                                    ->placeholder('Tulis deskripsi lengkap tentang desa...')
                                    ->required()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                        'undo',
                                        'redo',
                                    ])
                                    ->columnSpan(2),
                                
                                FileUpload::make('cover')
                                    ->label('Cover Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('covers')
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1920')
                                    ->imageResizeTargetHeight('1080')
                                    ->maxSize(3072)
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                                    ->helperText('Upload gambar cover dengan format JPG, JPEG, atau PNG. Maksimal 3MB.')
                                    ->required()
                                    ->columnSpan(2),
                            ]),
                    ]),
                
                Forms\Components\Section::make('Informasi Kontak')
                    ->description('Kelola informasi kontak dan alamat desa')
                    ->icon('heroicon-o-phone')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Textarea::make('alamat')
                                    ->label('Alamat Lengkap')
                                    ->placeholder('Masukkan alamat lengkap desa')
                                    ->rows(3)                                    ->columnSpan(2),
                                
                                Forms\Components\TextInput::make('telepon')
                                    ->label('Nomor Telepon')
                                    ->placeholder('Contoh: 021-1234567')
                                    ->tel()
                                    ->prefixIcon('heroicon-o-phone')
                                    ->maxLength(20),
                                
                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->placeholder('Contoh: info@desa.go.id')
                                    ->email()
                                    ->prefixIcon('heroicon-o-envelope')
                                    ->maxLength(255),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover')
                    ->label('Cover')
                    ->disk('public')
                    ->size(80)
                    ->square()
                    ->defaultImageUrl(asset('images/placeholder.png'))
                    ->tooltip('Cover Image'),
                
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
                
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->html()
                    ->limit(80)
                    ->tooltip(function ($record) {
                        return strip_tags($record->deskripsi);
                    })
                    ->wrap(),
                
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(20)
                    ->icon('heroicon-o-map-pin')
                    ->tooltip(fn ($record) => $record->alamat)
                    ->wrap()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
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
            ->defaultSort('created_at', 'desc')
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
            ->emptyStateHeading('Belum ada data about')
            ->emptyStateDescription('Silakan tambahkan informasi tentang desa untuk memulai.')
            ->emptyStateIcon('heroicon-o-building-office-2')
            ->striped()
            ->recordTitleAttribute('judul');
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}