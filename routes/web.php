<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admins\HomeController;
use App\Http\Controllers\Admins\PermissionsController;
use App\Http\Controllers\Admins\RolesController;
use App\Http\Controllers\Members\MemberController;
use App\Http\Controllers\Members\BiodataController;
use App\Http\Controllers\Admins\InformasiDikecualikanController;
use App\Http\Controllers\Admins\BeritaController;
use App\Http\Controllers\PublicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [PublicController::class, 'index'])->name('dashboard');
//Route::get('/dashboard', [PublicController::class, 'index'])->name('dashboard');

Route::prefix('berita')->name('berita.')->group(function(){
    Route::get('/', [PublicController::class, 'list'])->name('index'); 
    Route::get('/{slug}', [PublicController::class, 'detail'])->name('detail');
});

Route::prefix('profil')->name('profil.')->group(function(){
    Route::get('/', [PublicController::class, 'sejarah'])->name('index');    
    Route::get('/sejarah', [PublicController::class, 'sejarah'])->name('sejarah');  
    Route::get('/visi-dan-misi', [PublicController::class, 'vm'])->name('vm');  
    Route::get('/tugas-dan-fungsi', [PublicController::class, 'tf'])->name('tf');  
    Route::get('/struktur-organisasi', [PublicController::class, 'so'])->name('so');  
});

Route::get('/daftar-informasi-publik', [PublicController::class, 'dip'])->name('dip');

Route::prefix('informasi-publik')->name('informasi-publik.')->group(function(){
    Route::get('/', [PublicController::class, 'ip1'])->name('index');    
    Route::get('/informasi-secara-berkala', [PublicController::class, 'ip1'])->name('ip1');  
    Route::get('/informasi-serta-merta', [PublicController::class, 'ip2'])->name('ip2');  
    Route::get('/informasi-setiap-saat', [PublicController::class, 'ip3'])->name('ip3');  
    Route::get('/tata-cara-permohonan', [PublicController::class, 'ip4'])->name('ip4');  
    Route::get('/hak-dan-kewajiban-badan-publik', [PublicController::class, 'ip5'])->name('ip5'); 
    Route::get('/hak-dan-kewajiban-pemohon', [PublicController::class, 'ip6'])->name('ip6'); 
});

Route::prefix('informasi-dikecualikan')->name('informasi-dikecualikan.')->group(function(){
    Route::get('/', [PublicController::class, 'id1'])->name('index');    
    Route::get('/hasil-uji-konsekuensi-yang-diterima', [PublicController::class, 'id1'])->name('id1');  
    Route::get('/hasil-uji-konsekuensi-yang-ditolak', [PublicController::class, 'id2'])->name('id2');  
});

Route::prefix('layanan-publik')->name('layanan-publik.')->group(function(){
    Route::get('/', [PublicController::class, 'lp1'])->name('index');    
    Route::get('/form-permohonan-informasi-publik', [PublicController::class, 'lp1'])->name('lp1');  
    Route::get('/form-penyampaian-keberatan', [PublicController::class, 'lp2'])->name('lp2');  
    Route::get('/form-survey-layanan-informasi-publik', [PublicController::class, 'lp3'])->name('lp3');  
    Route::get('/form-survey-kepuasan-masyarakat', [PublicController::class, 'lp4'])->name('lp4');  
});
    


Route::middleware(['auth:sanctum','verified'])->group(function() {
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('/', [HomeController::class, 'index'])->name('index');

        Route::prefix('roles')->name('roles.')->middleware(['role:super-admin'])->group(function(){
            Route::get('/', [RolesController::class, 'index'])->name('index');
            Route::post('/', [RolesController::class, 'store'])->name('store');
            Route::patch('/edit/{id}', [RolesController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [RolesController::class, 'destroy'])->name('destroy');
            Route::get('/roper/{id}', [RolesController::class, 'roper'])->name('roper');
        });

        Route::prefix('permissions')->name('permissions.')->middleware(['role:super-admin'])->group(function(){
            Route::get('/', [PermissionsController::class, 'index'])->name('index');
            Route::get('/create', [PermissionsController::class, 'create'])->name('create');
            Route::post('/', [PermissionsController::class, 'store'])->name('store');
            Route::get('{permission}/edit', [PermissionsController::class, 'edit'])->name('edit');
            Route::put('{permission}', [PermissionsController::class, 'update'])->name('update');
            Route::delete('/{permission}', [PermissionsController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('informasi-dikecualikans')->name('informasi-dikecualikans.')->middleware(['role:super-admin|admin'])->group(function(){
            Route::get('/', [InformasiDikecualikanController::class, 'index'])->name('index');
            Route::post('/', [InformasiDikecualikanController::class, 'store'])->name('store');
            Route::patch('/edit/{id}', [InformasiDikecualikanController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [InformasiDikecualikanController::class, 'destroy'])->name('destroy');
        });
        
        Route::prefix('beritas')->name('beritas.')->middleware(['role:super-admin|admin'])->group(function(){
            Route::get('/', [BeritaController::class, 'index'])->name('index');
            Route::get('/create', [BeritaController::class, 'create'])->name('create');
            Route::post('/', [BeritaController::class, 'store'])->name('store');
            Route::get('{berita}/edit', [BeritaController::class, 'edit'])->name('edit');
            Route::put('{berita}', [BeritaController::class, 'update'])->name('update');
            Route::delete('/{berita}', [BeritaController::class, 'destroy'])->name('destroy');
        });

        Route::post('/', function () {
            App\Models\Berita::create(['judul' => request('judul')]);
            return redirect()->back();  
        });

        Route::prefix('/homes')->name('homes.')->group(function(){
            Route::get('/', [HomeController::class, 'index'])->name('index');
        });
    });

    Route::prefix('member')->name('member.')->middleware(['role:member'])->group(function(){
        Route::prefix('biodatas')->name('biodatas.')->group(function() {
            Route::get('/', [BiodataController::class, 'index'])->name('index');
        });

        Route::prefix('/homes')->name('homes.')->group(function(){
            Route::get('/', [MemberController::class, 'index'])->name('index');
        });
    });

});