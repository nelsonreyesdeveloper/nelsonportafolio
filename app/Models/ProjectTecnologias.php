<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectTecnologias extends Model
{
    use HasFactory;


    public function tecnologia(){
        return $this->belongsTo(Tecnologia::class);
    }
}
