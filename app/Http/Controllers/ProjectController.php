<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

use function Pest\Laravel\get;
use function PHPUnit\Framework\isType;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

     
        $this->authorize('viewAny',Project::class);

        $projects = Project::orderBy('id', 'asc')->get();

        // $projects = Project::find(34);


        // dd($projects->tecnologias);

      
     

        return view(
            'projects.projectIndex',[
                'projects' => $projects
            ]
           
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Project::class);
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $this->authorize('update',[Project::class,$project]);

        return view('projects.edit',[
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Project $project)
    // {
    //    $project->delete();


    //    session()->flash('mensaje', 'Proyecto Eliminado');

    //    return redirect()->back();
    // }
}
