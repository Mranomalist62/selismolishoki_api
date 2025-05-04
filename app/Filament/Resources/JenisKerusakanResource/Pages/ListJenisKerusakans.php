<?php

namespace App\Filament\Resources\JenisKerusakanResource\Pages;

use App\Filament\Resources\JenisKerusakanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisKerusakans extends ListRecords
{
    protected static string $resource = JenisKerusakanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
