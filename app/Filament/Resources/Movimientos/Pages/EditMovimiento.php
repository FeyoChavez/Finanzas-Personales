<?php

namespace App\Filament\Resources\Movimientos\Pages;

use App\Filament\Resources\Movimientos\MovimientoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditMovimiento extends EditRecord
{
    protected static string $resource = MovimientoResource::class;


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
        ->title('Movimiento actualizado')
        ->body('El movimiento se ha actualizado exitosamente.')
        ->success()
        ->send();
    }

    protected function getHeaderActions(): array // guarda y muestra una notificacion cuando se elimina una categoria
    {
        return [
            DeleteAction::make()
            ->successNotification(
                Notification::make()
                ->title('Movimiento eliminado')
                ->body('El movimiento se ha eliminado exitosamente.')
                ->success()
            ),
        ];
    }

}
