<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use App\Models\InformasiDikecualikan;
use Inertia\Inertia;


class InformasiDikecualikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data  = InformasiDikecualikan::all();
        //return Inertia::render('Admins/Informasi-Dikecualikans/index', ['data' => $data]);

        return Inertia::render('Admins/Informasi-Dikecualikans/index', [
            'data' => InformasiDikecualikan::all()
            ->map(function($data){
                return [
                    'id'     => $data->id,
                    'urutan' => $data->urutan,
                    'nama'   => $data->nama,
                    'status' => $data->status,
                    'path'   => asset('storage/'.$data->path),
                ];
            })
        ]);
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
            'urutan'   => ['required'],
            'nama'     => ['required'],
            'status'   => ['required'],
            'path'     => ['required'],
        ])->validate();

        //InformasiDikecualikan::create($request->all());
        $path = $request->file('path')->store('documents', 'public');
        InformasiDikecualikan::create([
            'urutan'   => $request->input('urutan'),
            'nama'     => $request->input('nama'),
            'status'   => $request->input('status'),
            'path'     => $path
        ]);

        return redirect()->back()
            ->with('message', 'Data berhasil disimpan.');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InformasiDikecualikan $informasidikecualikan, Request $request)
    {
        Validator::make($request->all(), [
            'urutan'   => ['required'],
            'nama'     => ['required'],
            'status'   => ['required'],
            'path'     => ['required'],
        ])->validate();    
      
        if ($request->has('id')) {   
            $informasidikecualikan = InformasiDikecualikan::find($request->input('id'));
            $path = $informasidikecualikan->path;
            if(!empty($request->file('path')))
            {
                if (File::exists(public_path('storage/' . $path))) {
                    File::delete(public_path('storage/' . $path));
                }
                $informasidikecualikan->path = $request->path->store('documents', 'public');
                $path = $informasidikecualikan->path;
            }
                       
            // $informasidikecualikan = InformasiDikecualikan::find($request->input('id'));
            // if (File::exists(public_path('storage/' . $informasidikecualikan->path))) {
            //     File::delete(public_path('storage/' . $informasidikecualikan->path));
            // }
            // $informasidikecualikan->path = $request->path->store('documents', 'public');

            $informasidikecualikan->find($request->input('id'))->update([
                'urutan'   => $request->input('urutan'),
                'nama'     => $request->input('nama'),
                'status'   => $request->input('status'),
                'path'     => $path

            ]);
            return redirect()->back()->with('message', 'Data berhasil diperbaharui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformasiDikecualikan $informasidikecualikan, Request $request)
    {
        if ($request->has('id')) {
            $informasidikecualikan = InformasiDikecualikan::find($request->input('id'));
            if (File::exists(public_path('storage/' . $informasidikecualikan->path))) {
                File::delete(public_path('storage/' . $informasidikecualikan->path));
            }
            $informasidikecualikan->delete();
            return redirect()->back()->with('message', 'Data berhasil dihapus');
        }else{        
            return redirect()->back()->with('errors', 'Data gagal dihapus');
        }
    }
}

