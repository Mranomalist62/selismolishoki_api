<?php

namespace App\Filament\Resources\JenisKerusakanResource\Pages;

use App\Filament\Resources\JenisKerusakanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisKerusakan extends EditRecord
{
    protected static string $resource = JenisKerusakanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
