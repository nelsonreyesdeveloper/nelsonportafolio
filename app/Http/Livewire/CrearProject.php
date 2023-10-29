<?php

namespace App\Http\Livewire;

use App\Models\Nivel;
use App\Models\Project;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\ProjectTecnologias;
use App\Models\Tecnologia;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

class CrearProject extends Component


{

    public $titulo;
    public $descripcion;
    public $imagen;

    public $nivel;
    public $categoria;
    public $tecnologia = [];

    public $url;

    use WithFileUploads;
    protected $rules = [
        'titulo' => ['required', 'min:3'],
        'descripcion' => ['required', 'min:5'],
        'imagen' => ['required', 'image'],
        'nivel' => ['required','integer','exists:nivels,id'],
        'categoria' => ['required','integer','exists:categorias,id'],
        'tecnologia' => ['required', 'array', 'exists:tecnologias,id','min:1'],
        'url' => ['required','min:5']
    ];

    public function crearProyecto()
    {
       
        $data = $this->validate();

        if ($this->imagen) {
            /* Almacenando La Imagen En la Ruta Store/app/public/proyectos */

            $imagen = Image::make($this->imagen);

            $generarNombre = Str::random(50) . "." . $imagen->extension;

            $path = (storage_path('app/public/proyectos/' . $generarNombre));


            $imagen->save($path, 60);


            $data['imagen'] = $generarNombre;
        }

        //Almacenando en La Base de datos
        // dd($data['url']);
        $project = Project::create([
            'titulo' => $data["titulo"],
            'descripcion' => $data["descripcion"],
            'imagen' => $data["imagen"],
            'user_id' => auth()->user()->id,
            'nivel_id' => $data["nivel"],
            'categoria_id' => $data["categoria"],
            'url' => $data['url']
            
        ]);

        

        $id = $project->id;
       
        $project->save();


        foreach ($data["tecnologia"] as $tecnologia) {
            DB::table('project_tecnologias')->insert([
                'project_id' => $id,
                'tecnologia_id' => $tecnologia,
            ]);
        }

        session()->flash('mensaje', 'Se Creo El Proyecto Correctamente');

        return redirect()->route('projects');
    }
    public function render()
    {
        return view(
            'livewire.crear-project',
            [
                'niveles' => Nivel::all(),
                'categorias' => Categoria::all(),
                'tecnologias' => Tecnologia::all(),
            ]
        );
    }
}
