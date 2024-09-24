<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MotoResource\Pages;
use App\Filament\Resources\MotoResource\RelationManagers;
use App\Models\ModeloMoto;
use App\Models\Moto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;



class MotoResource extends Resource
{
    protected static ?string $model = Moto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Group::make()
                ->relationship('user')
                ->schema([
                    Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                ]),

                Forms\Components\TextInput::make('matricula')
                    ->required()
                    ->unique()
                    ->maxLength(12),
                Forms\Components\Select::make('marca_id')
                    ->relationship('marca', 'nombre')
                    ->searchable()
                    ->required()
                    ->live(onBlur: true)
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nombre')
                            ->required()]

                    ),
                Forms\Components\Select::make('modelo_moto_id')
                    ->options(fn (Forms\Get $get): Collection => ModeloMoto::query()
                        ->where('marca_id', $get('marca_id'))
                        ->pluck('nombre', 'id'))
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nombre')
                            ->required()]
                    ),







            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMotos::route('/'),
            'create' => Pages\CreateMoto::route('/create'),
            'edit' => Pages\EditMoto::route('/{record}/edit'),
        ];
    }
}
