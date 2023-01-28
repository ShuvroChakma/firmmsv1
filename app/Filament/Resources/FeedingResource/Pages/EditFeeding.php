<?php

namespace App\Filament\Resources\FeedingResource\Pages;

use App\Filament\Resources\FeedingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeeding extends EditRecord
{
    protected static string $resource = FeedingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
