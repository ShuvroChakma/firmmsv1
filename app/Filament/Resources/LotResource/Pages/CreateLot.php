<?php

namespace App\Filament\Resources\LotResource\Pages;

use App\Filament\Resources\LotResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLot extends CreateRecord
{
    protected static string $resource = LotResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['quantity_actual'] = $data['quantity'];

        return $data;
    }
}
