<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteProject extends ModalComponent
{

    public ?int $projectId = null;

    public array $projectIds = [];

    public string $confirmationTitle = '';

    public string $confirmationDescription = '';

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function cancel()
    {
        
        $this->closeModal();
    }

    public function confirm()
    {
        
        if ($this->projectId) {
           
           
            Project::query()->find($this->projectId)->delete();
        }

        if ($this->projectIds) {
           
            Project::query()->whereIn('id', $this->projectIds)->delete();
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }
    public function render()
    {
        return view('livewire.delete-project');
    }
}
