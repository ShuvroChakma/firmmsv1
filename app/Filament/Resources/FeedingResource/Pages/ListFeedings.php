<?php

namespace App\Filament\Resources\FeedingResource\Pages;

use App\Filament\Resources\FeedingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeedings extends ListRecords
{
    protected static string $resource = FeedingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
