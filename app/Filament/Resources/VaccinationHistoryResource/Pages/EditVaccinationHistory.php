<?php

namespace App\Filament\Resources\VaccinationHistoryResource\Pages;

use App\Filament\Resources\VaccinationHistoryResource;
use App\Models\Medicine;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditVaccinationHistory extends EditRecord
{
    protected static string $resource = VaccinationHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        Medicine::find($data["medicine_id"])->increment("stock", $record->quantity - $data['quantity']);
        // dd($data);

        $record->update($data);

        return $record;
    }
}
