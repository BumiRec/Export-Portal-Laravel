<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'price',
        'views',
        'type',
        'category_id',
        'subcategory_id',
        'company_id',
        'created_at',
    ];

    public function category(){
        return $this-> belongsTo(ProductCategory::class, 'category_id');
    }

    public function subcategory(){
        return $this-> belongsTo(ProductCategory::class, 'subcategory_id');
    }

    public function company(){
        return $this-> belongsTo(Company::class, 'company_id');
    }

    public function buyer(){
        return $this -> belongsToMany(User::class, 'buyer_list', 'product_id', 'user_id');
    }

    public function sellerConfirmation(){
        return $this-> hasOne(SellerConfirmation::class, 'product_id');
    }
}