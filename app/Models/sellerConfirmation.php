<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerConfirmation extends Model
{
    use HasFactory;

    protected $table = 'seller_confirm';

    protected $fillable = ['product_id', 'buyer_id', 'confirmation'];
}
