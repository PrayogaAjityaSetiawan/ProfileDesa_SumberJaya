<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;


class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Kelola Artikel';
    protected static ?string $slug = 'artikel';
    protected static ?string $pluralLabel = 'Artikel';
    protected static ?string $navigationLabel = 'Artikel';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Jumlah Artikel';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Artikel')
                    ->description('Kelola informasi dasar artikel')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Judul Artikel')
                                    ->placeholder('Masukkan judul artikel')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->prefixIcon('heroicon-o-document-text')
                                    ->helperText('Judul akan otomatis menghasilkan slug URL'),
                                
                                Forms\Components\TextInput::make('slug')
                                    ->label('Slug URL')
                                    ->placeholder('slug-url-artikel')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->prefixIcon('heroicon-o-link')
                                    ->helperText('URL slug untuk artikel (otomatis dari judul)')
                                    ->readonly(fn ($context) => $context === 'create'),
                            ]),
                        
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Select::make('category_id')
                                    ->label('Kategori Artikel')
                                    ->options(Category::where('status', 1)->pluck('name', 'id'))
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->prefixIcon('heroicon-o-folder')
                                    ->helperText('Pilih kategori untuk mengelompokkan artikel'),
                                
                                Forms\Components\TextInput::make('author')
                                    ->label('Penulis')
                                    ->placeholder('Masukkan nama penulis')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-user')
                                    ->helperText('Nama penulis artikel'),
                            ]),
                        
                        Forms\Components\Grid::make(1)
                            ->schema([
                                Select::make('status')
                                    ->label('Status Artikel')
                                    ->options([
                                        '1' => 'Aktif',
                                        '0' => 'Tidak Aktif',
                                    ])
                                    ->default('1')
                                    ->required()
                                    ->prefixIcon('heroicon-o-check-circle')
                                    ->helperText('Status aktif akan menampilkan artikel di website')
                                    ->selectablePlaceholder(false),
                            ]),
                    ]),
                
                Forms\Components\Section::make('Gambar Artikel')
                    ->description('Upload gambar untuk artikel')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar Utama')
                            ->image()
                            ->disk('public')
                            ->directory('articles')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Upload gambar maksimal 2MB (JPEG, PNG, WebP)')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Konten Artikel')
                    ->description('Tulis konten artikel menggunakan editor')
                    ->icon('heroicon-o-pencil-square')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Isi Artikel')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'blockquote',
                                'codeBlock',
                            ])
                            ->helperText('Tulis konten artikel dengan format yang menarik')
                            ->columnSpanFull(),
                    ]),
            ]);
    
    }

    public static function table(Table $table): Table
    {
       return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->height(60)
                    ->width(80)
                    ->defaultImageUrl(url('/images/placeholder.png'))
                    ->circular(false),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Artikel')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->weight('bold'),
                
                
                Tables\Columns\TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-user'),
                
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Aktif' : 'Tidak Aktif')
                    ->badge()
                    ->color(fn ($state) => $state == 1 ? 'success' : 'danger')
                    ->icon(fn ($state) => $state == 1 ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->color('gray')
                    ->icon('heroicon-o-calendar'),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->color('info'),
                    Tables\Actions\EditAction::make()
                        ->color('warning'),
                    Tables\Actions\DeleteAction::make()
                        ->requiresConfirmation()
                        ->modalHeading('Hapus Artikel')
                        ->modalDescription('Apakah Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan.')
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
            ])
            ->emptyStateHeading('Belum ada artikel')
            ->emptyStateDescription('Mulai dengan membuat artikel pertama Anda.')
            ->emptyStateIcon('heroicon-o-newspaper')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Artikel Baru')
                    ->icon('heroicon-o-plus'),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
