<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Schemas\Schema;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema 

            ->components([
                TextInput::make('nombre')
                    ->label('Nombre de la categoria')
                    ->placeholder('Ingrese el nombre de la categoria:')
                    ->required(),
                    
                Select::make('tipo')
                    ->options(['ingreso' => 'Ingreso', 'gasto' => 'Gasto'])
                    ->label('Tipo de movimiento')
                    ->required(),
            ]);
    }
}
