<?php

namespace App\Filament\Resources\Presupuestos\Pages;

use App\Filament\Resources\Presupuestos\PresupuestoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditPresupuesto extends EditRecord
{
    protected static string $resource = PresupuestoResource::class;

 protected function getRedirectUrl(): string
        {
            return $this->getResource()::getUrl('index'); // redirecciona al index al crear la categoria
        }

 
    protected function getSavedNotification(): ?Notification // se desactiva la doble notificacion
        {
        return null;     
        }

    
    protected function afterSave() {  // Guarda y muestra notificacion cuando se actualiza una categoria
        return Notification::make()
        ->title('Presupuesto actualizado')
        ->body('El presupuesto se ha actualizado exitosamente.')
        ->success()
        ->send();
    }

    protected function getHeaderActions(): array // guarda y muestra una notificacion cuando se elimina una categoria
    {
        return [
            DeleteAction::make()
            ->successNotification(
                Notification::make()
                ->title('Presupuesto eliminado')
                ->body('El presupuesto se ha eliminado exitosamente.')
                ->success()
            ),
        ];
    }

}
