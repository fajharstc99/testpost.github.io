<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Permission;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Permission::filter(Request::only('search'));
        if(Request::has('sort_by')){
            $query = $query->orderBy(Request::input('sort_by'), Request::input('sort_dir', 'asc'));
        }
        return Inertia::render('Admins/Permissions/index', [
            'filters'  => Request::all('search', 'per_page', 'sort_by', 'sort_dir'),
            'permissions' => $query->paginate(Request::input('per_page', 50))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admins/Permissions/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Validator::make(Request::all(), [
            'name' => ['required', 'string', 'max:255'],
            'guard_name' => ['required', 'string', 'max:255'],
        ])->validate('storeData');

        $insert = Permission::create([ 
            'name' => Request::get('name'),
            'guard_name' => Request::get('guard_name'),
        ]);

        return Redirect::route('admin.permissions.index');
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
    public function edit(Permission $permission)
    {
        return Inertia::render('Admins/Permissions/edit', [
            'editData' => [
                'id'          => $permission->id,
                'name'        => $permission->name,
                'guard_name'  => $permission->guard_name,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Permission $permission)
    {
        Validator::make(Request::all(), [
            'name' => ['required', 'string', 'max:255'],
            'guard_name'    => ['required', 'string', 'max:255'],
        ])->validate('updateData');

        $permission->update([ 
            'name' => Request::get('name'),
            'guard_name' => Request::get('guard_name'),
        ]);

        return Redirect::route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return Redirect::route('admin.permissions.index')->with('message', 'Data Berhasil Dihapus!');
    }
}
