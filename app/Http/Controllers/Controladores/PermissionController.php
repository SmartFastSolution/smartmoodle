<?php

namespace App\Http\Controllers\Controladores;

use App\Modelos\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission= Permission::orderBy('id','Asc')->paginate(5);
    
        return view('Permissions.indexper',['permissions'=>$permission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('Permissions.createper');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        
            'name' => [ 'string', 'max:50','unique:permissions,name'],
            'slug' => [ 'string', 'max:50','unique:permissions,slug'],
            


        ]);

        $permission = Permission::create($request->all());
        return redirect ('sistema/permisos ')->with('success','Haz creado un permiso con exito');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {

        
        return view('Permissions.showper', ['permission' =>$permission]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('Permissions.editper',['permission' =>$permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        
        $request->validate([
        
            'name' => [ 'string', 'max:50','permissions,name' ],
            'slug' => [ 'string', 'max:50','permissions,slug' ],
            


        ]);

        $permission->name=$request->name;
        $permission->slug=$request->slug;
        $permission->save();
       
      // redireccionamos a sistema y el enlace que tenemos como url ya 
      //que sistema es nuestra base para la seguridad
       return redirect('sistema/inicioper')->with('success','Haz editado un permiso con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission= Permission::find($id);
        $permission->delete();

        return redirect('sistema/permisos')->with('success','Haz eliminado un permiso con exito');
    }
}
