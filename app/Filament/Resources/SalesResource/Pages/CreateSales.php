<?php

namespace App\Filament\Resources\SalesResource\Pages;

use App\Filament\Resources\SalesResource;
use App\Models\Lot;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSales extends CreateRecord
{
    protected static string $resource = SalesResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $dataQuantity = $data['quantity'];

        Lot::find($data['lot_id'])->decrement("quantity", $dataQuantity);

        return $data;
    }
}
