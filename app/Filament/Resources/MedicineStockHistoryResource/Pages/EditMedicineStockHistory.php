<?php

namespace App\Filament\Resources\MedicineStockHistoryResource\Pages;

use App\Filament\Resources\MedicineStockHistoryResource;
use App\Models\Medicine;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditMedicineStockHistory extends EditRecord
{
    protected static string $resource = MedicineStockHistoryResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        Medicine::find($data["medicine_id"])->decrement("stock", $record->quantity - $data['quantity']);
        // dd($data);

        $record->update($data);

        return $record;
    }
}
