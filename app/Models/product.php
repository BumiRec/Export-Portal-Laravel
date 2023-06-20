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
}