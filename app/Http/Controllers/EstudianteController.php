<?php

namespace App\Http\Controllers;

use App\Archivodocente;
use App\Http\Controllers\Controller;
use APp\User;
use App\Contenido;
use App\Curso;
use App\Distribucionmacu;
use App\Distrima;
use App\Assignment;
use App\Instituto;
use App\Materia;
use App\Nivel;
use App\Taller;
use App\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class EstudianteController extends Controller
{

      public function __construct()
    {
        
    $this->middleware('auth');
        $this->middleware('estudiante');
    }

    public function index()
    {
     

        $au =  auth()->user()->assignmets;
         if ($au == null) {
         return view('errors.error'); //ruta estudiante //ruta estudiante       
             
        }
        $p = Post::orderBy('id','Desc')->where('instituto_id', Auth::user()->instituto_id)->paginate(5);
        // $p = Post::orderBy('id','Desc')->paginate(5);
       
        return view('Estudiante.indexes',compact('p'));
           
    }

   
    public function show(User $user){
                
        $user= User::find($user->id);
        $distrima= Distrima::get();
        $instituto = Instituto::get();
        $assignment=Assignment::get();
        $materia=Materia::get();  
        $curso=Curso::get();
        $contenidos=Contenido::get();
        
        return view('Estudiante.perfile',compact('instituto','materia','contenidos','curso','user','distrima','assignment')); //ruta estudiante

    }

    
    public function unidades($id){
              // todos los datos de la bd
         $user =  User::findorfail( Auth::id());
         $institutomate = Materia::find($id)->instituto()->get();
         $contenido=Contenido::get();

         $tallers=Taller::get();
         $completados = $user->tallers;
         $con =Contenido::where('materia_id', $id)->first();
         $ids = [];
          foreach($completados as $act){
                $ids[]=$act->id;
            }

         $tallers = Taller::whereNotIn('id', $ids)->get();
 
         $materia =Materia::where('id', $id)->firstOrfail();
         $cons =Contenido::where('materia_id',$materia->id)->paginate(6);
         $cons2 =Archivodocente::where('materia_id',$materia->id)->paginate(6);
         return view ('Estudiante.contenido',['materia'=>$materia,'contenidos'=>$contenido,'institutomate'=>$institutomate,'tallers'=>$tallers,'cons'=>$cons,'cons2'=>$cons2]);

       // return $tallers;

    }


    public function password(){

        return view('Estudiante.password');
    }
  

    public function updatep(Request $request){

            //dd($request);
      /////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////METODO UNO/////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////
            //metodo funcional 1 pero no verifica el password anterior

      $request->validate([
        // 'password' => ['required'],
        'newpassword' => ['required', 'string', 'min:8', 'confirmed'],
        'newpassword_confirmation'=>['required']
      ]); 
      
        $request->user()->fill([
            'password' => Hash::make($request->newpassword)
        ])->save();

        return redirect('sistema/homees')->with('Password actualizado');
          

     }



     public function VisualizacionPDF($id){
     //documento no descargable 
      $contenido =Contenido::where('id', $id)->firstOrfail();

       return \view('Estudiante.archivopdf',['contenido'=>$contenido]);

   }
   public function VisualizacionPDF3($id){
    //documento  descargable 
      $contenido =Contenido::where('id', $id)->firstOrfail();

      return \view('Estudiante.archivopdf3',['contenido'=>$contenido]);

  }


   public function VisualizacionPDF2($id){
  //visualizar documento del docente
    $contenido =Archivodocente::where('id', $id)->firstOrfail();
     return \view('Estudiante.archivopdf2',['contenido'=>$contenido]);

 }

  public function PostE()
  {

     return \view('Estudiante.postestudiante');

  }


  public function storee(Request $request)
  {
      $request->validate([
          'nombre'              =>  'required|string|max:60',
          'user_id'             =>  'required|integer',
          'abstract'            =>  'required|max:500',
          'body'                =>  'required',    
          'image'            =>  'image|dimensions:min_width=1200, max_with=1200, min_height=490, max_height=490|mimes:jpeg,jpg,png',
        
      ]);

        $urlimage=[];
      if($request->hasFile('image')){

          $image=$request->file('image');
          $nombre=time().$image->getClientOriginalName();
          $ruta= public_path().'/imagenes';
          $image->move($ruta,$nombre);
          $urlimage['url']='/imagenes/'.$nombre;
      }

      $post =New Post;
      $post->user_id  = e($request->user_id);
      $post->instituto_id= Auth::user()->instituto_id;
      $post->nombre   = e($request->nombre);
      $post->abstract = e($request->abstract);
      $post->body = e($request->body);

      $post->save();

      $post->image()->create($urlimage);

      return redirect('sistema/homees')->with('Post Creado!');

  }


  public function destroype(Post $post)
    {
        $post = Post::findOrFail($post->id)->delete();
   

        return redirect('sistema/homees')->with('Post Eliminado!');
    }



 

}