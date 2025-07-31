<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggaranDesaResource\Pages;
use App\Filament\Resources\AnggaranDesaResource\RelationManagers;
use App\Models\AnggaranDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnggaranDesaResource extends Resource
{
    protected static ?string $model = AnggaranDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
        Forms\Components\TextInput::make('tahun')
            ->numeric()
            ->required(),

        Forms\Components\Repeater::make('pendapatan')
            ->label('Pendapatan Desa')
            ->schema([
                Forms\Components\TextInput::make('sumber')->required(),
                Forms\Components\TextInput::make('jumlah')->numeric()->required(),
            ])
            ->columns(2),

        Forms\Components\Repeater::make('belanja')
            ->label('Belanja Desa')
            ->schema([
                Forms\Components\TextInput::make('sumber')->required(),
                Forms\Components\TextInput::make('jumlah')->numeric()->required(),
            ])
            ->columns(2),
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAnggaranDesas::route('/'),
            'create' => Pages\CreateAnggaranDesa::route('/create'),
            'edit' => Pages\EditAnggaranDesa::route('/{record}/edit'),
        ];
    }
}
