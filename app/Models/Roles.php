<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
        'name', 'guard_name'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'roles_user', 'roles_id', 'user_id');
    }

}
