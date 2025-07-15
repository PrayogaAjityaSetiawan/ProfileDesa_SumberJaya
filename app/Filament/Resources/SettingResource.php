<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\SettingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingResource\RelationManagers;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';
    protected static ?string $navigationLabel = 'Pengaturan Beranda';
    protected static ?string $slug = 'pengaturan-beranda';
    protected static ?string $pluralLabel = 'Pengaturan Beranda';

    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Pengaturan Website')
                    ->tabs([
                        Tabs\Tab::make('Navbar & Branding')
                            ->icon('heroicon-o-identification')
                            ->badge('Header')
                            ->schema([
                                Forms\Components\Section::make('Identitas Website')
                                    ->description('Kelola judul dan logo website')
                                    ->icon('heroicon-o-globe-alt')
                                    ->schema([
                                        Forms\Components\Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('judul')
                                                    ->label('Judul Website')
                                                    ->placeholder('Masukkan judul website')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->prefixIcon('heroicon-o-document-text')
                                                    ->helperText('Judul ini akan tampil di header website'),
                                                
                                                FileUpload::make('logo')
                                                    ->label('Logo Website')
                                                    ->disk('public')
                                                    ->directory('logo')
                                                    ->required()
                                                    ->image()
                                                    ->imageResizeMode('contain')
                                                    ->imageResizeTargetWidth('200')
                                                    ->imageResizeTargetHeight('80')
                                                    ->maxSize(1024)
                                                    ->acceptedFileTypes(['image/png', 'image/svg+xml', 'image/jpeg'])
                                                    ->helperText('Upload logo dengan format PNG, SVG, atau JPEG. Maksimal 1MB. Ukuran optimal: 200x80px'),
                                            ]),
                                    ]),
                            ]),
                        
                        Tabs\Tab::make('Footer & Kontak')
                            ->icon('heroicon-o-phone')
                            ->badge('Kontak')
                            ->schema([
                                Forms\Components\Section::make('Informasi Kontak')
                                    ->description('Kelola informasi kontak yang tampil di footer')
                                    ->icon('heroicon-o-map-pin')
                                    ->schema([
                                        Forms\Components\Grid::make(1)
                                            ->schema([
                                                Forms\Components\Textarea::make('alamat')
                                                    ->label('Alamat Lengkap')
                                                    ->placeholder('Masukkan alamat lengkap kantor desa')
                                                    ->rows(3)
                                                    ->maxLength(500)
                                                    // ->prefixIcon('heroicon-o-map-pin')
                                                    ->helperText('Alamat lengkap kantor desa yang akan ditampilkan di footer'),
                                            ]),
                                        
                                        Forms\Components\Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('telepon')
                                                    ->label('Nomor Telepon')
                                                    ->placeholder('(021) 1234-5678')
                                                    ->tel()
                                                    ->prefixIcon('heroicon-o-phone')
                                                    ->mask('(999) 9999-9999')
                                                    ->helperText('Format: (021) 1234-5678'),
                                                
                                                Forms\Components\TextInput::make('email')
                                                    ->label('Alamat Email')
                                                    ->placeholder('admin@desa.go.id')
                                                    ->email()
                                                    ->prefixIcon('heroicon-o-envelope')
                                                    ->helperText('Email resmi kantor desa'),
                                            ]),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->size(60)
                    ->defaultImageUrl(asset('images/logo-placeholder.png'))
                    ->tooltip('Logo Website'),
                
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Website')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap()
                    ->copyable()
                    ->copyMessage('Judul disalin!')
                    ->copyMessageDuration(1500),
                
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->alamat)
                    ->icon('heroicon-o-map-pin')
                    ->wrap()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('telepon')
                    ->label('Telepon')
                    ->icon('heroicon-o-phone')
                    ->copyable()
                    ->copyMessage('Nomor telepon disalin!')
                    ->badge()
                    ->color('success'),
                
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->icon('heroicon-o-envelope')
                    ->copyable()
                    ->copyMessage('Email disalin!')
                    ->badge()
                    ->color('info')
                    ->url(fn ($record) => $record->email ? "mailto:{$record->email}" : null)
                    ->openUrlInNewTab(),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
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
                    Tables\Actions\DeleteBulkAction::make()->after(function (Collection $records) {
                        foreach ($records as $key => $value) {
                            if ($value ->logo) {
                                Storage::disk('public')->delete($value->logo);
                            }
                        }
                    })
                        ->label('Hapus Terpilih')
                        ->icon('heroicon-o-trash')
                        ->requiresConfirmation()
                        ->modalHeading('Hapus Pengaturan Terpilih')
                        ->modalDescription('Apakah Anda yakin ingin menghapus pengaturan yang dipilih? Tindakan ini tidak dapat dibatalkan.')
                        ->modalSubmitActionLabel('Ya, Hapus Semua'),
                ]),
            ])
            ->emptyStateHeading('Belum ada pengaturan')
            ->emptyStateDescription('Silakan tambahkan pengaturan beranda untuk memulai konfigurasi website.')
            ->emptyStateIcon('heroicon-o-cog-8-tooth')
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
            'index' => Pages\ListSettings::route('/'),
            // 'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}