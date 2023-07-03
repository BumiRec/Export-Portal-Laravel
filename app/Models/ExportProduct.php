<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExportProduct extends Model
{
    use HasFactory;

    public $table = 'export_product';

    protected $fillable = ['product_id'];

    public function product():HasMany
    {
        return $this->hasMany(Product::class, 'product_id');
    }
}
