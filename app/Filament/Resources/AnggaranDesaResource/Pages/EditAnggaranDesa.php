<?php

namespace App\Filament\Resources\AnggaranDesaResource\Pages;

use App\Filament\Resources\AnggaranDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnggaranDesa extends EditRecord
{
    protected static string $resource = AnggaranDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
