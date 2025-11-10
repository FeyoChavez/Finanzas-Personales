<?php

namespace App\Filament\Resources\Presupuestos\Schemas;


use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\User;
use App\Models\Categoria;


class PresupuestoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Usuarios')
                    ->required()
                    ->options(User::all()->pluck('name', 'id')),

                Select::make('categoria_id')
                    ->label('Categorias')
                    ->required()
                    ->options(Categoria::all()->pluck('nombre', 'id')),

                TextInput::make('monto_asignado')
                    ->required()
                    ->numeric(),

                TextInput::make('monto_gastado')
                    ->required()
                    ->numeric()
                    ->disabled()
                    ->default(0.0),

                TextInput::make('mes')
                    ->required(),

                TextInput::make('anio')
                    ->label('Año')
                    ->required(),
            ]);
    }
}
