<?php

namespace App\Filament\Resources\Movimientos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Notifications\Notification; // elimina el error de notification
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\DeleteAction;

class MovimientosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->label('#')
                    ->rowIndex(), // como un foreach para enumerar cada campo

                TextColumn::make('user.name') // aqui habia un user_id 
                    ->label('Usuario')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('categoria.nombre')
                    ->label('Categoría')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tipo')
                    ->sortable()
                    ->badge(),

                TextColumn::make('monto')
                    ->numeric()
                    ->sortable(),

                    TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->limit(50)
                    ->html()
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('foto')
                    ->label('Imagen')
                    ->width(100)
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->foto)),

                TextColumn::make('fecha')
                    ->date()
                    ->sortable(),

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
                SelectFilter::make('tipo')
                ->options([
                    'gasto' => 'Gasto',
                    'ingreso' => 'Ingreso',
                ])
                ->placeholder('Filtrar por tipo')
                ->label('Tipo'),
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
                    ->title('Movimiento eliminado')
                    ->body('El movimiento ha sido eliminado correctamente.')
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
