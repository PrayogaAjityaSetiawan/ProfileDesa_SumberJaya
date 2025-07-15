<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiResource\Pages;
use App\Filament\Resources\VisiMisiResource\RelationManagers;
use App\Models\VisiMisi;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Visi & Misi';
    protected static ?string $slug = 'visi-misi';
    protected static ?string $pluralLabel = 'Visi & Misi';
    protected static ?string $navigationGroup = 'Struktur Desa';

    public static function form(Form $form): Form
    {
         return $form
            ->schema([
                Forms\Components\Section::make('Visi & Misi Desa')
                    ->description('Kelola visi dan misi desa')
                    ->schema([
                        Forms\Components\Textarea::make('visi')
                            ->label('Visi')
                            ->placeholder('Masukkan visi desa...')
                            ->required()
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Visi desa maksimal 500 karakter'),
                        
                        RichEditor::make('misi')
                            ->label('Misi')
                            ->placeholder('Masukkan misi desa...')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'redo',
                                'undo',
                            ])
                            ->helperText('Gunakan format list untuk menyusun poin-poin misi')
                    ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('visi')
                    ->label('Visi')
                    ->wrap()
                    ->limit(50),
                Tables\Columns\TextColumn::make('misi')
                    ->label('Misi')
                    ->html()
                    ->wrap()
                    ->limit(50),

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
                        ->modalHeading('Hapus Visi & Misi')
                        ->modalDescription('Apakah Anda yakin ingin menghapus visi & misi? Todak bisa dibatalkan.')
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
            'index' => Pages\ListVisiMisis::route('/'),
            'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}
