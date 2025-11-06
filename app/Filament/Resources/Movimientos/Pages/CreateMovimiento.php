<?php

namespace App\Filament\Resources\Movimientos\Pages;

use App\Filament\Resources\Movimientos\MovimientoResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateMovimiento extends CreateRecord
{
    protected static string $resource = MovimientoResource::class;


        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // redirecciona al index al crear la categoria
    }


    protected function getCreatedNotification(): ?Notification
    {
       return null; // evita la duplicacion de notificaciones
            
    }


    protected function afterCreate() {
         return Notification::make()
            ->title('Movimiento creado')
            ->body('El movimiento se ha creado exitosamente.')
            ->success()
            ->send();
    }


    protected function getFormActions(): array // para modificar el aspecto de edit y delete
    {
        return [
            $this->getCreateFormAction()
            ->label('Registrar')
            ->color('success'), // cambia el color del boton

          //  $this->getCreateFormAction()
           // ->label('Guardar y nuevo'),

            $this->getCreateFormAction()
            ->label('Cancelar'),

        ];
    }





}
