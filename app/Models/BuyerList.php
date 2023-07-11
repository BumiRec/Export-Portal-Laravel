<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerList extends Model
{
    use HasFactory;

    protected $table = 'buyer_list';

    protected $fillable = [
        'product_id',
        'user_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
