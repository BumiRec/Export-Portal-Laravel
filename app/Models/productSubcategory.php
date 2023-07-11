<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    use HasFactory;
    protected $table    = 'product_subcategory';
    protected $fillable = [
        'name',
        'category_id',
    ];

    public function product(){
        return $this->hasMany(Company::class, 'subcategory_id');
    }

    public function category(){
        return $this -> belongsTo(ProductCategory::class, 'category_id');
    }
}
