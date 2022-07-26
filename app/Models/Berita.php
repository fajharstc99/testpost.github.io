<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Berita extends Model
{
    use HasFactory;  
    use Sluggable; 

    protected $guarded = [];
    protected $table = 'beritas';
    protected $fillable = [
        'judul',
        'isi',
        'status',
        'path',
        'iduser'
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('nama', 'like', '%' . $search . '%')  
                      ->orWhere('status', 'like', '%' . $search . '%');
            });
        });
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
           ->format('d F Y, H:i');
    }
    
    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
           ->diffForHumans();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    
}
