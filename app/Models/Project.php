<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'disponibilidad',
        'user_id',
        'nivel_id',
        'categoria_id',
        'url'
    ];

    public function user(){
        /* Siempre Colocar Return */
     return  $this->belongsTo(User::class);
    }

    public function nivel(){
        /* Siempre Colocar Return */
     return  $this->belongsTo(Nivel::class);
    }

    public function categoria(){
        /* Siempre Colocar Return */
     return  $this->belongsTo(Categoria::class);
    }

    public function tecnologias (){
        return $this->belongsToMany(Tecnologia::class, 'project_tecnologias','project_id','tecnologia_id');
    }
}
