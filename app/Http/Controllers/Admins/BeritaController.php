<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use File;
use App\Models\Berita;
use Inertia\Inertia;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Berita::filter(Request::only('search'));
        if(Request::has('sort_by')){
            $query = $query->orderBy(Request::input('sort_by'), Request::input('sort_dir', 'asc'));
        }
        return Inertia::render('Admins/Beritas/index', [
            'filters'  => Request::all('search', 'per_page', 'sort_by', 'sort_dir'),
            'beritas' => $query->paginate(Request::input('per_page', 50))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admins/Beritas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make(Request::all(), [
            'judul'  => ['required'],
            'isi'    => ['required'],
            'status' => ['required'],
            'path'   => ['required'],
        ])->validate('storeData');

        $path = Request::file('path')->store('berita', 'public');
        $id = Auth::user()->id;
        $insert = Berita::create([
            'judul'   => Request::get('judul'),
            'isi'     => Request::get('isi'),
            'status'  => Request::get('status'),
            'path'    => $path,
            'iduser'  => $id,
        ]);

        return Redirect::route('admin.beritas.index');
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
    public function edit(Berita $berita)
    {
        return Inertia::render('Admins/Beritas/edit', [
            'editData' => [
                'id'      => $berita->id,
                'judul'   => $berita->judul,
                'isi'     => $berita->isi,
                'status'  => $berita->status,
                'path'    => $berita->path,
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
    public function update(Berita $berita)
    {
        Validator::make(Request::all(), [
            'judul'  => ['required'],
            'isi'    => ['required'],
            'status' => ['required'],
            'path'   => ['required', 'mimes:pdf'],
        ])->validate('updateData');    
       

        if (Request::has('id')) {   
            $berita = Berita::find(Request::get('id')); 
            $path = $berita->path;           
            if(!empty(Request::file('path')))
            {
            //     $path = $berita->path;    
            // } else {
                if (File::exists(public_path('storage/' . $berita->path))) {
                    File::delete(public_path('storage/' . $berita->path));
                }
                $path = Request::file('path')->store('berita', 'public');
            }
            $id = Auth::user()->id;
            $berita->update([
                'judul'   => Request::get('judul'),
                'isi'     => Request::get('isi'),
                'status'  => Request::get('status'),
                'path'    => $path,
                'iduser'  => $id,
            ]);
            return Redirect::route('admin.beritas.index');
            //dd($id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        if (File::exists(public_path('storage/' . $berita->path))) {
            File::delete(public_path('storage/' . $berita->path));
        }
        $berita->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}
