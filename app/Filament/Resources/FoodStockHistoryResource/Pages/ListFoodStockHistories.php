<?php

namespace App\Filament\Resources\FoodStockHistoryResource\Pages;

use App\Filament\Resources\FoodStockHistoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFoodStockHistories extends ListRecords
{
    protected static string $resource = FoodStockHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
