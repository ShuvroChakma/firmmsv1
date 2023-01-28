<?php

namespace App\Filament\Resources\ExtrasResource\Pages;

use App\Filament\Resources\ExtrasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExtras extends ListRecords
{
    protected static string $resource = ExtrasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
