<?php

namespace App\Http\Livewire;

use App\Models\Nivel;
use App\Models\Project;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Tecnologia;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\ProjectTecnologias;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\fileExists;
use Intervention\Image\Facades\Image as Image;

class EditarProyecto extends Component
{
    public $id_Project;
    public $titulo;
    public $imagen;
    public $descripcion;
    public $nuevaImagen;
    public $nivel;
    public $categoria;
    public $tecnologia;
    public $url;

    use WithFileUploads;

    protected $rules = [
        'titulo' => ["required"],
        'descripcion' => ["required"],
        'nuevaImagen' => ["nullable", "image"],
        'nivel' => ['required', 'integer', 'exists:nivels,id'],
        'categoria' => ['required', 'integer', 'exists:categorias,id'],
        'tecnologia' => ['required', 'array', 'exists:tecnologias,id', 'min:1'],
        'url' => ['required','min:5']
    ];

    public function mount($project)
    {
        $this->id_Project = $project->id;
        $this->titulo = $project->titulo;
        $this->imagen = $project->imagen;
        $this->descripcion = $project->descripcion;
        $this->nivel = $project->nivel->id;
        $this->categoria = $project->categoria->id;
        $this->url = $project->url;


        $tecnologias = ProjectTecnologias::where('project_id', $project->id)->get();
        $contador = 0;
        $array = [];

        foreach ($tecnologias as $tecnologia) {

            $array[$contador] = $tecnologia->tecnologia_id;
            $contador++;
        }
        $this->tecnologia = $array;
        // dd($array);


    }

    public function editarProyecto()
    {
        $data = $this->validate();

        //comprobando si no hay  nueva imagen
        if (!$this->nuevaImagen) {

            //asignamos la imagen anterior para guardarla en data
            $data["nuevaImagen"] = $this->imagen;
        } else {
            //en caso de haber eliminamos la imagen anterior

            if (fileExists(storage_path('app/public/proyectos/' . $this->imagen))) {

                try {
                    unlink(storage_path('app/public/proyectos/' . $this->imagen));
                } catch (\Throwable $th) {
                    // throw $th;
                }
            }


            //procesamos la nueva imagen para guardarla

            $imagen = Image::make($this->nuevaImagen);

            $imagen->fit(1000,1000, function ($constraint) {
                $constraint->aspectRatio(); // Mantén la proporción de aspecto
                $constraint->upsize(); // Evita que la imagen se agrande
            });
            
            $generarNombre = Str::random(50) . "." . $imagen->extension;

            $path = (storage_path('app/public/proyectos/' . $generarNombre));


            $imagen->save($path, 100);


            $data['nuevaImagen'] = $generarNombre;
        }

        $project = Project::findorFail($this->id_Project);

        $project->imagen = $data["nuevaImagen"];
        $project->titulo = $data["titulo"];
        $project->descripcion = $data["descripcion"];
        $project->nivel_id = $data['nivel'];
        $project->categoria_id = $data['categoria'];
        $project->url = $data['url'];

        $project->save();

        $eliminarProyectos = ProjectTecnologias::where('project_id', $this->id_Project)->get();

        foreach ($eliminarProyectos as $tecnologia) {
            $tecnologia->delete();
        }
        
        foreach ($data["tecnologia"] as $tecnologia) {
            DB::table('project_tecnologias')->insert([
                'project_id' => $this->id_Project,
                'tecnologia_id' => $tecnologia,
            ]);
        }





        session()->flash('mensaje', 'Se Actualizo El Proyecto Correctamente');

        return redirect()->route('projects');
    }
    public function render()
    {

        $niveles =  Nivel::all();



        return view(
            'livewire.editar-proyecto',
            [
                'niveles' => $niveles,
                'categorias' => Categoria::all(),
                'tecnologias' => Tecnologia::all(),
            ]
        );
    }
}
