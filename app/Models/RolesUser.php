<?php

namespace App\Models;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesUser extends Model
{
    use HasFactory;

    protected $table = 'roles_user';

    protected $fillable = ['user_id', 'roles_id'];

    public function roles(){
        return $this->belongsTo(Roles::class, 'roles_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
