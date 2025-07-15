<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SejarahResource\Pages;
use App\Filament\Resources\SejarahResource\RelationManagers;
use App\Models\Sejarah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SejarahResource extends Resource
{
    protected static ?string $model = Sejarah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Struktur Desa';
    protected static ?string $navigationLabel = 'Sejarah Desa';
    protected static ?string $slug = 'sejarah';
    protected static ?string $pluralLabel = 'Sejarah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Sejarah Desa')
                    ->description('Kelola informasi dan dokumentasi sejarah desa')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Sejarah')
                            ->placeholder('Masukkan judul sejarah desa')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('deskripsi')
                            ->label('Deskripsi Sejarah')
                            ->placeholder('Tulis deskripsi lengkap tentang sejarah desa...')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'undo',
                                'redo',
                            ])
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar Sejarah')
                            ->required()
                            ->image()
                            ->disk('public')
                            ->directory('sejarah')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                            ->helperText('Upload gambar dengan format JPG, JPEG, atau PNG. Maksimal 2MB.')
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul'),
                Tables\Columns\ImageColumn::make('gambar')
            ])
            ->filters([
                //
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
            'index' => Pages\ListSejarahs::route('/'),
            'create' => Pages\CreateSejarah::route('/create'),
            'edit' => Pages\EditSejarah::route('/{record}/edit'),
        ];
    }
}
