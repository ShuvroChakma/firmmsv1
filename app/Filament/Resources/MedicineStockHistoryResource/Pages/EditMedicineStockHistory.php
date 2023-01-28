<?php

namespace App\Filament\Resources\MedicineStockHistoryResource\Pages;

use App\Filament\Resources\MedicineStockHistoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicineStockHistory extends EditRecord
{
    protected static string $resource = MedicineStockHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
