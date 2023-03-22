<?php

namespace App\Filament\Resources\FeedingResource\Pages;

use App\Filament\Resources\FeedingResource;
use App\Models\Food;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeeding extends CreateRecord
{
    protected static string $resource = FeedingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // dd($data);

        $dataQuantity = $data['quantity'];

        Food::find($data['food_id'])->decrement("stock", $dataQuantity);

        return $data;
    }
}
