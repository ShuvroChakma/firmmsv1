<?php

namespace App\Filament\Resources\VaccinationHistoryResource\Pages;

use App\Filament\Resources\VaccinationHistoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVaccinationHistories extends ListRecords
{
    protected static string $resource = VaccinationHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
