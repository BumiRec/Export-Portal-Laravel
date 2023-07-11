<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerConfirmation extends Model
{
    
    use HasFactory;

    protected $table = 'buyer_confirm';

    protected $fillable = ['user_id', 'product_id', 'confirmation'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function sellerConfiramtion(){
        return $this->hasOne(SellerConfirmation::class, 'buyer_id');
    }

    public function transaction(){
        return $this->hasOne(Transaction::class, 'buyer_id');
    }
}
