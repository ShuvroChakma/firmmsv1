<?php

namespace App\Filament\Resources\MedicineStockHistoryResource\Pages;

use App\Filament\Resources\MedicineStockHistoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicineStockHistories extends ListRecords
{
    protected static string $resource = MedicineStockHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
