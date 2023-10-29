<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectos = Project::take(3)->inRandomOrder()->where('disponibilidad','=',1)->get();

      
        return view ('welcome',[
            'projects' => $projectos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sendEmail(EmailRequest $request)
    {
      
     $data = $request->validated();

        
     Mail::to('eliasoficialbunnises@gmail.com')->send(new ContactMail($data));

     

     session()->flash('mensaje',"Gracias por tu mensaje, contestaremos lo antes posible.");  
     
     return redirect()->back();
    }

}
