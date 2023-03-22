<?php

namespace App\Filament\Resources\FeedingResource\Pages;

use App\Filament\Resources\FeedingResource;
use App\Models\Food;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditFeeding extends EditRecord
{
    protected static string $resource = FeedingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        Food::find($data["food_id"])->increment("stock", $record->quantity - $data['quantity']);
        // dd($data);

        $record->update($data);

        return $record;
    }
}
