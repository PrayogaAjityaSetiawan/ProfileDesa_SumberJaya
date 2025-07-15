<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;


class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationLabel = 'Kategori Artikel';
    protected static ?string $slug = 'kategori-artikel';
    protected static ?string $pluralLabel = 'Kategori Artikel';
    protected static ?string $navigationGroup = 'Kelola Artikel';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Jumlah Kategori Artikel';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kategori')
                    ->description('Kelola kategori untuk mengelompokkan artikel')
                    ->icon('heroicon-o-bookmark')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Kategori')
                                    ->placeholder('Masukkan nama kategori')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->prefixIcon('heroicon-o-tag')
                                    ->helperText('Nama kategori akan otomatis menghasilkan slug'),
                                
                                Forms\Components\TextInput::make('slug')
                                    ->label('Slug URL')
                                    ->placeholder('slug-url-kategori')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->prefixIcon('heroicon-o-link')
                                    ->helperText('URL slug untuk kategori (otomatis dari nama)')
                                    ->readonly(fn ($context) => $context === 'create'),
                            ]),
                        
                        Forms\Components\Grid::make(1)
                            ->schema([
                                Select::make('status')
                                    ->label('Status Kategori')
                                    ->options([
                                        '1' => 'Aktif',
                                        '0' => 'Tidak Aktif',
                                    ])
                                    ->default('1')
                                    ->required()
                                    ->prefixIcon('heroicon-o-check-circle')
                                    ->helperText('Status aktif memungkinkan kategori digunakan untuk artikel baru')
                                    ->selectablePlaceholder(false),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-tag'),
                    
                
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug URL')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-link')
                    ->color('gray')
                    ->copyable()
                    ->copyMessage('Slug berhasil disalin!')
                    ->prefix('/')
                    ->fontFamily('mono'),
                
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Aktif' : 'Tidak Aktif')
                    ->badge()
                    ->color(fn ($state) => $state == 1 ? 'success' : 'danger')
                    ->icon(fn ($state) => $state == 1 ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                    ->sortable(),
                

                
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
            ->striped()
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        '' => 'Semua',
                        '1' => 'Aktif',
                        '0' => 'Tidak Aktif',
                    ])
                    ->placeholder('Semua Status'),
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
                
            ])
            ->emptyStateHeading('Belum ada kategori')
            ->emptyStateDescription('Mulai dengan membuat kategori artikel pertama Anda.')
            ->emptyStateIcon('heroicon-o-folder')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Kategori Baru')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
