<?php

namespace App\Http\Controllers\Controladores;

use App\Modelos\Role;
use App\Modelos\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles= Role::orderBy('id','Asc')->paginate(5);
    
        return view('Roles.indexr',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /// añadido la linea de permision y el compact
     $permissions =Permission::get();

        return view('Roles.createroler', compact('permissions'));
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
        
            'name' => [ 'string', 'max:50','unique:roles,name'],
            'slug' => [ 'string', 'max:50','unique:roles,slug'],
            'fullacces' => ['required' ,'in:yes,no'],


        ]);


        $role = Role::create($request->all());
    
        if ($request->get('permission')) {
           

            $role->permissions()->sync($request->get('permission'));
        }
        return redirect ('sistema/iniciorole '); // en el accion tenemos el index ya que de aqui nos redireccion al index 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return \view('Roles.showr',['rol'=> $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

     $permission_role=[];
    
     foreach($role->permissions as $permission){
         $permission_role[]=$permission->id;

     }
    
        $permissions=Permission::get();
       return view('Roles.editr', compact('permissions', 'role','permission_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $request->validate([
        
            'name' => [ 'string', 'max:50','unique:roles,name,' .$role->id,],
            'slug' => [ 'string', 'max:50','unique:roles,slug,' .$role->id,],
            'fullacces' => ['required' ,'in:yes,no'],


        ]);
        
        $role->update($request->all());
    
        if ($request->get('permission')) {
           

            $role->permissions()->sync($request->get('permission'));
        }
        return redirect ('sistema/iniciorole '); // en el accion tenemos el index ya que de aqui nos redireccion al index 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= Role::find($id);
        $user->delete();

        return redirect('sistema/iniciorole')->with('success','Haz eliminado un rol con exito');
    }
}