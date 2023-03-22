<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaccinationHistoryResource\Pages;
use App\Filament\Resources\VaccinationHistoryResource\RelationManagers;
use App\Models\Medicine;
use App\Models\VaccinationHistory;
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

class VaccinationHistoryResource extends Resource
{
    protected static ?string $model = VaccinationHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Medicine';

    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    DatePicker::make('date')->required(),
                Select::make('medicine_id')
                ->label('Medicine')
                ->options(Medicine::all()->pluck('name_stock', 'id'))
                ->searchable(),
                    TextInput::make("quantity")->required(),


            ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("medicine.name")->searchable(),
                TextColumn::make("quantity")->sortable(),
                TextColumn::make("date")->sortable()
            ])

            ->filters([Filter::make('created_at')
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
            'index' => Pages\ListVaccinationHistories::route('/'),
            'create' => Pages\CreateVaccinationHistory::route('/create'),
            'edit' => Pages\EditVaccinationHistory::route('/{record}/edit'),
        ];
    }
}
