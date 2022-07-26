<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roper extends Model
{
    use HasFactory;
    protected $table = 'role_has_permissions';
    protected $fillable = [
        'permission_id',
        'role_id',
    ];

    public function permission(){
        return $this->belongsTo(Permission::class, 'permission_id','id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id','id');
    }
}
