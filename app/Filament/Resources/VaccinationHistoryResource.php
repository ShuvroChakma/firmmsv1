<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaccinationHistoryResource\Pages;
use App\Filament\Resources\VaccinationHistoryResource\RelationManagers;
use App\Models\VaccinationHistory;
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

class VaccinationHistoryResource extends Resource
{
    protected static ?string $model = VaccinationHistory::class;

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
            'index' => Pages\ListVaccinationHistories::route('/'),
            'create' => Pages\CreateVaccinationHistory::route('/create'),
            'edit' => Pages\EditVaccinationHistory::route('/{record}/edit'),
        ];
    }
}
