<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = ['buyer_id', 'seller_id', 'product_id'];

    public function sellerConfirmation(){
        return $this->belongsTo(SellerConfirmation::class, 'seller_id');
    }

    public function buyerConfirmation(){
        return $this->belongsTo(BuyerConfirmation::class, 'buyer_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
