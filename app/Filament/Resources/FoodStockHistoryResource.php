<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodStockHistoryResource\Pages;
use App\Filament\Resources\FoodStockHistoryResource\RelationManagers;
use App\Models\FeedingHistory;
use App\Models\Food;
use App\Models\FoodStockHistory;
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

class FoodStockHistoryResource extends Resource
{
    protected static ?string $model = FoodStockHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Food';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    DatePicker::make('date')->required(),
                    TextInput::make("quantity")->numeric()->required(),
                    TextInput::make("price")->required(),
                    Select::make('food_id')
                        ->label('Food')
                        ->options(Food::all()->pluck('name_stock', 'id'))
                        ->searchable(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("food.name")->searchable(),
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
            'index' => Pages\ListFoodStockHistories::route('/'),
            'create' => Pages\CreateFoodStockHistory::route('/create'),
            'edit' => Pages\EditFoodStockHistory::route('/{record}/edit'),
        ];
    }
}
