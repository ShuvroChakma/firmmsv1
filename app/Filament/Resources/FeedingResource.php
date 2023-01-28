<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedingResource\Pages;
use App\Filament\Resources\FeedingResource\RelationManagers;
use App\Models\Feeding;
use App\Models\FeedingHistory;
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

class FeedingResource extends Resource
{
    protected static ?string $model = FeedingHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    DatePicker::make('date')->required(),
                    TextInput::make("price")->required(),
                    TextInput::make("food_id")->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make("date"),
                TextColumn::make("price"),
                TextColumn::make("food_id"),

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
            'index' => Pages\ListFeedings::route('/'),
            'create' => Pages\CreateFeeding::route('/create'),
            'edit' => Pages\EditFeeding::route('/{record}/edit'),
        ];
    }
}
