<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    public $table = 'token_coin';

    protected $fillable = ['amount'];

    public function userToken(){
        return $this->hasOne(UsersToken::class, 'token_id');
    }

}
