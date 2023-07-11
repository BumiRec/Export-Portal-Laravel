<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerConfirmation extends Model
{
    use HasFactory;

    protected $table = 'seller_confirm';

    protected $fillable = ['product_id', 'buyer_id', 'confirmation'];

    public function product(){
        return $this -> belongsTo(Product::class, 'product_id');
    }

    public function buyerConfirmation(){
        return $this -> belongsTo(BuyerConfirmation::class, 'buyer_id');
    }

    public function transaction(){
        return $this -> hasOne(Transaction::class, 'seller_id');
    }
}
