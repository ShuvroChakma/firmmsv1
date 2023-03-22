<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicineStockHistoryResource\Pages;
use App\Filament\Resources\MedicineStockHistoryResource\RelationManagers;
use App\Models\Medicine;
use App\Models\MedicineStockHistory;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedicineStockHistoryResource extends Resource
{
    protected static ?string $model = MedicineStockHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Medicine';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    DatePicker::make('date')->required(),
                TextInput::make("quantity")->numeric()->required(),
                    TextInput::make("price")->required(),
                Select::make('medicine_id')
                ->label('Medicine')
                ->options(Medicine::all()->pluck('name_stock', 'id'))
                ->searchable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("medicine.name")->searchable(),
                TextColumn::make("quantity")->sortable(),
                TextColumn::make("price")->sortable(),
                TextColumn::make("date")->sortable()
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('date_from'),
                        Forms\Components\DatePicker::make('date_until')->default(now()),
                    ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['date_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                        )
                        ->when(
                            $data['date_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                        );
                })
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
