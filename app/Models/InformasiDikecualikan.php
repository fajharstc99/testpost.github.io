<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiDikecualikan extends Model
{
    use HasFactory;  
    protected $table = 'informasi_dikecualikans';
    protected $fillable = [
        'urutan',
        'nama',
        'status',
        'path'
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('urutan', 'like', '%' . $search . '%')
                      ->orWhere('nama', 'like', '%' . $search . '%')  
                      ->orWhere('status', 'like', '%' . $search . '%');
            });
        });
    }
}
