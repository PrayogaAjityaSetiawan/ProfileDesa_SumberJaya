<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use App\Models\About;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditAbout extends EditRecord
{
    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(About $about) {
                    if ($about->cover) {
                        Storage::disk('public')->delete($about->cover );
                    }
                }
            ),
        ];
    }
}
