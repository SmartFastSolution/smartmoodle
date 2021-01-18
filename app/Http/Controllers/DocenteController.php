<?php

namespace App\Http\Controllers;

use App\Assignment;
use APp\User;
use App\Contenido;
use App\Curso;
use App\Distribuciondo;
use App\Distribucionmacu;
use App\Distrima;
use App\Http\Controllers\Controller;
use App\Instituto;
use App\Materia;
use App\Nivel;
use App\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Post;
use Illuminate\Support\Facades\Hash;

class DocenteController extends Controller
{

  

       public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('docente');
    }

   public function Perfil()
    {

                $au = User::find(Auth::id())->distribuciondos;
                // if ($au == null) {
                // return redirect()->route('welcome'); 
                
                // }
                
                if (isset($au->materias)) {
                    $ids =[];
                        foreach ($au->materias as $value) {
                            foreach ($value->contenidos as $conte) {
                            $ids[] = $conte->id;
                                
                    }
                }
                // $materias = $au->materias;
                $users = DB::table('tallers')
                ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
                ->join('users', 'users.id', '=', 'taller_user.user_id')
                ->join('cursos', 'users.curso_id', '=', 'cursos.id')
                ->join('nivels', 'users.nivel_id', '=', 'nivels.id')
                ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
                ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
                ->whereIn('tallers.contenido_id', $ids)
                // ->wherein('tallers.contenido_id','==', 1)
                ->where('taller_user.status', 'completado')
                ->select('tallers.*','taller_user.*','cursos.nombre as cur_nombre','nivels.nombre as nivel_nombre', 'materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno')
                ->paginate(10);
            

                    $calificado = DB::table('tallers')
                    ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
                    ->join('users', 'users.id', '=', 'taller_user.user_id')
                    ->join('cursos', 'users.curso_id', '=', 'cursos.id')
                    ->join('nivels', 'users.nivel_id', '=', 'nivels.id')
                    
                    ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
                    ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
                    ->whereIn('tallers.contenido_id', $ids)
                    // ->wherein('tallers.contenido_id','==', 1)
                    ->where('taller_user.status', 'calificado')
                    ->select('tallers.*','taller_user.*','cursos.nombre as cur_nombre' ,'nivels.nombre as nivel_nombre',  'materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno')
                    ->paginate(10);


                    // return $users;
                            return view('Docente.Pcurso', compact('users','au', 'calificado')); //ruta docente
                            }else{


                            return view('Docente.Pcurso'); //ruta docente
                
                        } 



    }
    public function index()
    {           
                $p = Post::all();
               
                return view('Docente.indexd',compact('p'));
      }
    
    public function contenidos($id)
    {
        // todos los datos de la bd
        $user =  User::findorfail( Auth::id());
        $institutomate = Materia::find($id)->instituto()->get();
      
        $materia =Materia::where('id', $id)->firstOrfail();
        $contenidos=Contenido::get();
        $cons =Contenido::where('materia_id',$materia->id)->paginate(6);

        $users = DB::table('tallers')
            ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
            ->join('users', 'users.id', '=', 'taller_user.user_id')
            ->join('cursos', 'users.curso_id', '=', 'cursos.id')
            ->join('nivels', 'users.nivel_id', '=', 'nivels.id')

            ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
            ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->where('contenidos.materia_id', $id)
            // ->wherein('tallers.contenido_id','==', 1)
            ->where('taller_user.status', 'completado')
            ->select('tallers.*','taller_user.*','cursos.nombre as cur_nombre', 'nivels.nombre as nivel_nombre','materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno')
            ->paginate(10);

            $calificado = DB::table('tallers')
            ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
            ->join('users', 'users.id', '=', 'taller_user.user_id')
            ->join('cursos', 'users.curso_id', '=', 'cursos.id')
            ->join('nivels', 'users.nivel_id', '=', 'nivels.id')

            ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
            ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->where('contenidos.materia_id', $id)
            // ->wherein('tallers.contenido_id','==', 1)
            ->where('taller_user.status', 'calificado')
            ->select('tallers.*','taller_user.*' ,'cursos.nombre as cur_nombre','nivels.nombre as nivel_nombre', 'materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno')
            ->paginate(10);

            // return $calificado;
                return view ('Docente.contenidodocente',compact('user','institutomate','materia','contenidos', 'users', 'calificado','cons'));

    }

    public function cursos($id)
    {
        $materia =Materia::where('id', $id)->firstOrfail(); 
       
        $curso = Curso::get();
        $assignment= Assignment::get();
        $mate = $materia->assignments;
        
     return view ('Docente.cursos', compact('materia','curso', 'mate','assignment'));

    }
    public function talleres($id)
    {
        $contenidos=Contenido::where('materia_id', $id)->get();
        $materia = Materia::select('nombre')->where('id', $id)->first();
      
        $tallers=Taller::paginate(10);
        $talleres =[];
        foreach ($contenidos as $key => $value) {
            $talleres[$key] = array(
            'nombre' => $value->nombre,
            'talleres' =>$value->tallers
        );
        }
       
     return view('Docente.talleres',compact('tallers', 'contenidos', 'talleres', 'id', 'materia'));

    }
    public function registro(Request $request)
    {
            $contenidos=Contenido::where('materia_id', $request->materia)->get();
            $talleres =[];
            
            $taller = Taller::find($request->taller_id);
            $estado = $request->estado;
            // return $estado;
            if ($estado == true) {
                $taller->estado = 1; 
                $taller->fecha_entrega = $request->fecha; 
                $taller->save(); 

                foreach ($contenidos as $key => $value) {
                    $talleres[$key] = array(
                    'nombre' => $value->nombre,
                    'talleres' =>$value->tallers
                );

                }

                return response(array(
                        'success' => true,
                        'message' => 'Taller activado correctamente',
                        'talleres' => $talleres

                    ),200,[]);  

            }elseif ($estado == false) {

        $taller->estado = 0; 
        $taller->fecha_entrega = $request->fecha; 
        $taller->save();  
          foreach ($contenidos as $key => $value) {
            $talleres[$key] = array(
            'nombre' => $value->nombre,
            'talleres' =>$value->tallers
        );
            }
                return response(array(
                        'success' => true,
                        'message' => 'Taller desactivado correctamente',
                        'talleres' => $talleres
                        
                    ),200,[]);   
            }

    }



    public function VerPDF($id){

        $contenido =Contenido::where('id', $id)->firstOrfail();
         return \view('Docente.archivopdf',['contenido'=>$contenido]);
  
    }



    public function password(){

        return view('Docente.password');
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

        return redirect('sistema/homedoc')->with('Password actualizado');
          

     }



     
  public function PostD()
  {
     return \view('Docente.postdocente');
  }



  public function stored(Request $request)
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
      $post->nombre   = e($request->nombre);
      $post->abstract = e($request->abstract);
      $post->body = e($request->body);

      $post->save();

      $post->image()->create($urlimage);

      return redirect('sistema/homedoc')->with('Post Creado!');

  }

  public function destroyped(Post $post)
  {
      $post = Post::findOrFail($post->id)->delete();
 

      return redirect('sistema/homedoc')->with('Post Eliminado!');
  }


}