<?php

namespace App\Filament\Resources\VaccinationHistoryResource\Pages;

use App\Filament\Resources\VaccinationHistoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVaccinationHistory extends EditRecord
{
    protected static string $resource = VaccinationHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
