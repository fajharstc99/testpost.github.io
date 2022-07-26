<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Roper;
use Inertia\Inertia;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Role::all();
        $data2 = Permission::all();
        $data3 = Roper::all();
        return Inertia::render('Admins/Roles/index', ['data' => $data, 'data2' => $data2, 'data3' => $data3]);
       
       
        // request()->validate([
        //     "role" => "required",
        //     "permissions" => "array|required"
        //   ]);
        //   $role = Role::find(request('role'));
      
          // $role->permissions()->sync(request("permissions"));
        //   $role->syncPermissions(request("permissions"));
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name'       => ['required'],
            'guard_name' => ['required'],
        ])->validate();

        Role::create($request->all());

        return redirect()->back()
            ->with('message', 'Role Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function roper($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = Roper::where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return Inertia::render('Admins/Roles/roper', compact('role', 'permissions'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'name'       => ['required'],
            'guard_name' => ['required'],
        ])->validate();
  
        if ($request->has('id')) {
            Role::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'Post Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->has('id') ? 
        Role::find($request->input('id'))->delete() :
                redirect()->back()
                    ->with('errors', 'Somethings goes wrong.');
        
        return redirect()->back()
                    ->with('message', 'Role deleted successfully.');
    }

}
