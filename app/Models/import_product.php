<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class import_product extends Model
{
    use HasFactory;

    public $table = 'import_product';

    protected $fillable = ['info','product_id'];
}
