<?php

namespace App\Filament\Resources\SalesResource\Pages;

use App\Filament\Resources\SalesResource;
use App\Models\Lot;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditSales extends EditRecord
{
    protected static string $resource = SalesResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        Lot::find($data["lot_id"])->increment("quantity", $record->quantity - $data['quantity']);
        // dd($data);

        $record->update($data);

        return $record;
    }
}
