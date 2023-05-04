<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    // public $table = 'products';

    protected $table = 'product';

    protected $fillable = ['name', 'description', 'price', 'imageURL', 'views', 'type', 'category_id', 'copmapy_id', 'created_at'];
}
