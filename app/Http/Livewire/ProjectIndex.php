<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProjectIndex extends Component
{
    public $projects;

    public function mount($projects){
        $this->projects = $projects;
    }
    public function render()
    {
        return view('livewire.project-index');
    }
}
