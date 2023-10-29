<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */

    
    // public $title = 'puto';

    // public function __construct($title){
    //     $this->title = $title;
    // }
     
    public function render(): View
    {
        return view('layouts.app');
    }
}
