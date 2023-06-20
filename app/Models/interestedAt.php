<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedAt extends Model
{
    use HasFactory;

    protected $table = 'buyer_list';

    protected $fillable = [
        'product_id',
        'user_id'
    ];
}
