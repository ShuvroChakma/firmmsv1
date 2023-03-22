<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExtrasResource\Pages;
use App\Filament\Resources\ExtrasResource\RelationManagers;
use App\Models\Extras;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExtrasResource extends Resource
{
    protected static ?string $model = Extras::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Others';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form

                ->schema([
                    Card::make()->schema([
                        TextInput::make("types")->required(),
                        DatePicker::make('date')->required(),
                TextInput::make("price")->required(),
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([TextColumn::make("types")->searchable(),
            TextColumn::make("date")->sortable(),
            TextColumn::make("price")->sortable(),

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
            'index' => Pages\ListExtras::route('/'),
            'create' => Pages\CreateExtras::route('/create'),
            'edit' => Pages\EditExtras::route('/{record}/edit'),
        ];
    }
}
