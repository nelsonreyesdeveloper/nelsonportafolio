<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    use HasFactory;

    public function proyectos (){
        return $this->belongsToMany(Project::class, 'project_tecnologias');
    }
}

