<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersToken extends Model
{
    use HasFactory;

    public $table = 'users_token';

    protected $fillable = ['user_id', 'token_id'];

    public function user(){
        return $this-> belongsTo(User::class, 'user_id');
    }

    public function tokenCoin(){
        return $this -> belongsTo(Token::class, 'token_id');
    }
}