<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicineStockHistoryResource\Pages;
use App\Filament\Resources\MedicineStockHistoryResource\RelationManagers;
use App\Models\MedicineStockHistory;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedicineStockHistoryResource extends Resource
{
    protected static ?string $model = MedicineStockHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    DatePicker::make('date')->required(),
                    TextInput::make("quantity")->required(),
                    TextInput::make("price")->required(),
                    TextInput::make("medicine_id")->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")->searchable(),
                TextColumn::make("stock")->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedicineStockHistories::route('/'),
            'create' => Pages\CreateMedicineStockHistory::route('/create'),
            'edit' => Pages\EditMedicineStockHistory::route('/{record}/edit'),
        ];
    }
}
