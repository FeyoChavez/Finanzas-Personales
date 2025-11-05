<?php

namespace App\Filament\Resources\Categorias\Pages;

use App\Filament\Resources\Categorias\CategoriaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditCategoria extends EditRecord
{
    protected static string $resource = CategoriaResource::class;

    protected function getRedirectUrl(): string
        {
            return $this->getResource()::getUrl('index'); // redirecciona al index al crear la categoria
        }


    protected function getCreatedNotification(): ?Notification // se desactiva la doble notificacion
        {
        return null;     
        }

    
    protected function afterSave() {  // Guarda y muestra notificacion cuando se actualiza una categoria
        Notification::make()
        ->title('Categoría actualizada')
        ->body('La categoría se ha actualizado exitosamente.')
        ->success()
        ->send();
    }

    protected function getHeaderActions(): array // guarda y muestra una notificacion cuando se elimina una categoria
    {
        return [
            DeleteAction::make()
            ->successNotification(
                Notification::make()
                ->title('Categoría eliminada')
                ->body('La categoría se ha eliminado exitosamente.')
                ->success()
            ),
        ];
    }


}
