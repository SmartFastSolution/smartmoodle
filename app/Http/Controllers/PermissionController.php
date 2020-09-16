<?php

namespace App\Http\Controllers;

use App\Permission;
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

            'namep'      => 'required|string|max:150',
            'descripcionp' => 'required|string|max:150',
            'estado'      => 'required|in:on,off',
            

        ]);

        $permission = Permission::create($request->all());
   
       return \redirect('sistema/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return \view ('Permissions.showper',['permisos' =>$permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return \view('Permissions.editper',['permission'=>$permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([

            'namep'      => 'required|string|max:150',
            'descripcionp' => 'required|string|max:150',
            'estado'      => 'required|in:on,off',
            
        ]);

        $permission->update($request->all());
   
       return \redirect('sistema/permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission= Permission::find($id);
        $permission->delete();

        return redirect('sistema/permissions')->with('success','Haz eliminado un permiso con exito');
    }
}