<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefix extends Model
{
    use HasFactory;

    //prefix -> users - one to many

    protected $table = 'prefixes';

    protected $fillable = ['prefix', 'country'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
