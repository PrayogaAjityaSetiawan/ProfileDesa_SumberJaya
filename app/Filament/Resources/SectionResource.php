<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Section Hero';
    protected static ?string $slug = 'hero-section';
    protected static ?string $pluralLabel = 'Section Hero';
    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero Section')
                    ->description('Kelola konten hero section yang tampil di halaman utama')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Forms\Components\Grid::make(1)
                            ->schema([
                                Forms\Components\TextInput::make('judul')
                                    ->label('Judul Hero')
                                    ->placeholder('Masukkan judul hero section yang menarik')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-sparkles')
                                    ->helperText('Judul utama yang akan tampil besar di hero section')
                                    ->columnSpanFull(),
                                
                                Forms\Components\RichEditor::make('deskripsi')
                                    ->label('Deskripsi Hero')
                                    ->placeholder('Tulis deskripsi yang menggambarkan desa dengan menarik...')
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
                                    ->helperText('Deskripsi yang akan tampil di bawah judul hero')
                                    ->columnSpanFull(),
                                
                                FileUpload::make('gambar')
                                    ->label('Gambar Hero')
                                    ->image()
                                    ->disk('public')
                                    ->directory('gambar')
                                    ->required()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1920')
                                    ->imageResizeTargetHeight('1080')
                                    ->maxSize(3072)
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                                    ->helperText('Upload gambar hero dengan format JPG, PNG, atau WebP. Maksimal 3MB. Rasio optimal: 16:9 (1920x1080px)')
                                    ->columnSpanFull(),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Preview')
                    ->disk('public')
                    ->size(100)
                    ->defaultImageUrl(asset('images/hero-placeholder.png'))
                    ->tooltip('Preview gambar hero section'),
                
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Hero')
                    ->sortable()
                    ->weight('bold')
                    ->wrap()
                    ->copyable()
                    ->copyMessage('Judul disalin!')
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->html()
                    ->limit(100)
                    ->tooltip(function ($record) {
                        return strip_tags($record->deskripsi);
                    })
                    ->wrap()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->icon('heroicon-o-calendar')
                    ->color('gray')
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->icon('heroicon-o-clock')
                    ->color('gray')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('updated_at', 'desc')
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
                        ->icon('heroicon-o-trash')
                        ->requiresConfirmation()
                        ->modalHeading('Hapus Hero Section Terpilih')
                        ->modalDescription('Apakah Anda yakin ingin menghapus hero section yang dipilih? Tindakan ini tidak dapat dibatalkan.')
                        ->modalSubmitActionLabel('Ya, Hapus Semua'),
                ]),
            ])
            ->emptyStateHeading('Belum ada hero section')
            ->emptyStateDescription('Silakan buat hero section pertama untuk tampil di halaman utama website.')
            ->emptyStateIcon('heroicon-o-star')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Hero Section')
                    ->icon('heroicon-o-plus'),
            ])
            ->striped()
            ->poll('60s')
            ->persistSortInSession()
            ->persistSearchInSession()
            ->persistFiltersInSession();
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}