<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiDikecualikan;
use App\Models\Berita;
use Inertia\Inertia;

class PublicController extends Controller
{
///////Halaman Utama/Dashboard
    public function index()
    {
        $data = Berita::select('judul', 'slug', 'isi', 'path', 'created_at', 'updated_at')
                ->where([['status','0']])
                ->orderBy('updated_at','DESC')
                ->skip(0)
                ->take(3)
                ->get();
        return Inertia::render('Dashboard', ['data' => $data]);
    }

    ///////Halaman Daftar Berita
    public function list()
    {
        // $data = Berita::where([['status','0']])
        //         ->orderBy('updated_at','DESC')
        //         ->get();
        $data = Berita::select('judul', 'slug', 'isi', 'path', 'created_at', 'updated_at')
                ->where([['status','0']])
                ->orderBy('updated_at','DESC')
                ->get();
        return Inertia::render('Publics/Berita/index', ['data' => $data]);
    }

    ///////Halaman Detail Berita
    public function detail($slug)
    {
        $data = Berita::select('judul', 'slug', 'isi', 'path', 'created_at', 'updated_at')
                ->where('slug', $slug)
                ->first();
        return Inertia::render('Publics/Berita/detail', ['data' => $data]);
    }

    ///////Halaman Profil
    public function sejarah()
    {
        $data = 'Sejarah';
        return Inertia::render('Publics/Profil/index', [
            'datas' => $data
        ]);
    }

    public function vm()
    {
        $data = 'Visi dan Misi';
        return Inertia::render('Publics/Profil/index', [
            'datas' => $data
        ]);
    }

    public function tf()
    {
        $data = 'Tugas dan Fungsi';
        return Inertia::render('Publics/Profil/index', [
            'datas' => $data
        ]);
    }

    public function so()
    {
        $data = 'Struktur Organisasi';
        return Inertia::render('Publics/Profil/index', [
            'datas' => $data
        ]);
    }


///////Halaman Profil
    public function dip()
    {
        return Inertia::render('Publics/DIP');
    }


///////Halaman Informasi Publik
    public function ip1()
    {
        $data = 'Informasi Secara Berkala';
        return Inertia::render('Publics/InformasiPublik/index', [
            'datas' => $data
        ]);
    }

    public function ip2()
    {
        $data = 'Informasi Serta Merta';
        return Inertia::render('Publics/InformasiPublik/index', [
            'datas' => $data
        ]);
    }

    public function ip3()
    {
        $data = 'Informasi Setiap Saat';
        return Inertia::render('Publics/InformasiPublik/index', [
            'datas' => $data
        ]);
    }

    public function ip4()
    {
        $data = 'Tata Cara Permohonan';
        return Inertia::render('Publics/InformasiPublik/index', [
            'datas' => $data
        ]);
    }

    public function ip5()
    {
        $data = 'Hak dan Kewajiban Badan Publik';
        return Inertia::render('Publics/InformasiPublik/index', [
            'datas' => $data
        ]);
    }

    public function ip6()
    {
        $data = 'Hak dan Kewajiban Pemohon';
        return Inertia::render('Publics/InformasiPublik/index', [
            'datas' => $data
        ]);
    }


///////Halaman Informasi Dikecualikan
    public function id1()
    {
        $title = 'Hasil Uji Konsekuensi Yang Diterima';
        return Inertia::render('Publics/InformasiDikecualikan/index', [
            'data' => InformasiDikecualikan::where('status', '0')
            ->orderBy('urutan','ASC')
            ->get()
            ->map(function($data){
                return [
                    'nama'   => $data->nama,
                    'path'   => asset('storage/'.$data->path),
                    'urutan' => $data->urutan,
                ];
            }),
            'title' => $title
        ]);
    }

    public function id2()
    {
       $title = 'Hasil Uji Konsekuensi Yang Ditolak';
       //$data  = InformasiDikecualikan::where('status', '1')->get();
       //return Inertia::render('Publics/InformasiDikecualikan/index', ['data' => $data, 'title' => $title]);
        return Inertia::render('Publics/InformasiDikecualikan/index', [
            'data' => InformasiDikecualikan::where('status', '1')
            ->orderBy('urutan','ASC')
            ->get()
            ->map(function($data){
                return [
                    'nama'   => $data->nama,
                    'path'   => asset('storage/'.$data->path),
                    'urutan' => $data->urutan,
                ];
            }),
            'title' => $title
        ]);
    }


///////Halaman Layanan Publik
    public function lp1()
    {
        $data = 'Form Permohonan Informasi Publik';
        return Inertia::render('Publics/LayananPublik/index', [
            'datas' => $data
        ]);
    }
    
    public function lp2()
    {
        $data = 'Form Penyampaian Keberatan';
        return Inertia::render('Publics/LayananPublik/index', [
            'datas' => $data
        ]);
    }
    
    public function lp3()
    {
        $data = 'Form Survey Layanan Informasi Publik';
        return Inertia::render('Publics/LayananPublik/index', [
            'datas' => $data
        ]);
    }
    
    public function lp4()
    {
        $data = 'Form Survey Kepuasan Masyarakat';
        return Inertia::render('Publics/LayananPublik/index', [
            'datas' => $data
        ]);
    }
    
}
