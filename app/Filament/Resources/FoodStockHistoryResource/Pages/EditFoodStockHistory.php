<?php

namespace App\Filament\Resources\FoodStockHistoryResource\Pages;

use App\Filament\Resources\FoodStockHistoryResource;
use App\Models\Food;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditFoodStockHistory extends EditRecord
{
    protected static string $resource = FoodStockHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        Food::find($data["food_id"])->decrement("stock", $record->quantity - $data['quantity']);
        // dd($data);

        $record->update($data);

        return $record;
    }
}
