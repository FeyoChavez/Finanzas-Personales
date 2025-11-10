<?php

namespace App\Filament\Resources\Presupuestos\Pages;

use App\Filament\Resources\Presupuestos\PresupuestoResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreatePresupuesto extends CreateRecord
{
    protected static string $resource = PresupuestoResource::class;


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
            ->title('Presupuesto creado')
            ->body('El presupuesto se ha creado exitosamente.')
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
