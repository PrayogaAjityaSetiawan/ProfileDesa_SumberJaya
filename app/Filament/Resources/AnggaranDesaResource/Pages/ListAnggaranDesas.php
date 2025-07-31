<?php

namespace App\Filament\Resources\AnggaranDesaResource\Pages;

use App\Filament\Resources\AnggaranDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnggaranDesas extends ListRecords
{
    protected static string $resource = AnggaranDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
