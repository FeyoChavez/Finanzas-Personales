<?php

namespace App\Filament\Resources\Categorias\Pages;

use App\Filament\Resources\Categorias\CategoriaResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;
use Filament\Notifications\Notification;

class CreateCategoria extends CreateRecord
{
    protected static string $resource = CategoriaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // redirecciona al index al crear la categoria
    }


    protected function getCreatedNotification(): ?Notification
    {
       return null;
            
    }


    protected function afterCreate() {
         return Notification::make()
            ->title('Categoría creada')
            ->body('La categoría se ha creado exitosamente.')
            ->success()
            ->send();
    }
}
