<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table    = 'product_category';
    protected $fillable = ['name'];

    public function product(){
        return $this->hasMany(Product::class, 'category_id');
    }

    public function subcategory(){
        return $this-> hasMany(ProductSubcategory::class, 'subcategory_id');
    }
}
