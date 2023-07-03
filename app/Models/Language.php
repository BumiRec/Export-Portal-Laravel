<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Language extends Model
{
    use HasFactory;

    public $table = 'language';
    protected $fillable = ['language'];


    public function user():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_language', 'user_id', 'language_id');
    }
}
