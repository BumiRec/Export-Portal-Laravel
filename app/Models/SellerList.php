<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerList extends Model
{
    use HasFactory;

    public $table = 'seller_list';
 
    protected $fillable = ['product_id', 'buyer_id'];
}
