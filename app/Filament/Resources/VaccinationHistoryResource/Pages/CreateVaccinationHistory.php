<?php

namespace App\Filament\Resources\VaccinationHistoryResource\Pages;

use App\Filament\Resources\VaccinationHistoryResource;
use App\Models\Medicine;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVaccinationHistory extends CreateRecord
{
    protected static string $resource = VaccinationHistoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // dd($data);

        $dataQuantity = $data['quantity'];

        Medicine::find($data['medicine_id'])->decrement("stock", $dataQuantity);

        return $data;
    }
}
