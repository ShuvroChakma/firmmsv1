<?php

namespace App\Filament\Resources\MedicineStockHistoryResource\Pages;

use App\Filament\Resources\MedicineStockHistoryResource;
use App\Models\Medicine;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMedicineStockHistory extends CreateRecord
{
    protected static string $resource = MedicineStockHistoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $dataQuantity = $data['quantity'];

        Medicine::find($data['medicine_id'])->increment("stock", $dataQuantity);

        return $data;
    }
}
