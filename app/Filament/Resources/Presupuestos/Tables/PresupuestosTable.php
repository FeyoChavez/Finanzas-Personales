<?php

namespace App\Filament\Resources\Presupuestos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Notifications\Notification; // elimina el error de notification
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\DeleteAction;

class PresupuestosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->label('#')
                    ->sortable()
                    ->rowIndex(),

                TextColumn::make('user.name')
                    ->label('Usuario')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('categoria.nombre')
                    ->numeric()
                    ->label('Categoria')
                    ->sortable(),

                TextColumn::make('monto_asignado')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('monto_gastado')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('mes')
                    ->searchable(),

                TextColumn::make('anio')
                    ->label('Año')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])


            ->recordActions([
                EditAction::make()
                ->button() // crea un boton para anadir estilo
                ->color('success'),

                DeleteAction::make()
                ->button() 
                ->color('danger')
                ->successNotification(
                    Notification::make()
                    ->title('Presupuesto eliminado')
                    ->body('El presupuesto ha sido eliminado correctamente.')
                    ->success()
                    
                ),
            ])


            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
