<?php

namespace App\Filament\Resources\FoodStockHistoryResource\Pages;

use App\Filament\Resources\FoodStockHistoryResource;
use App\Models\Food;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFoodStockHistory extends CreateRecord
{
    protected static string $resource = FoodStockHistoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $dataQuantity = $data['quantity'];

        Food::find($data['food_id'])->increment("stock", $dataQuantity);

        return $data;
    }
}
