<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class export_product extends Model
{
    use HasFactory;

    public $table = 'export_product';

    protected $fillable = ['name','product_id'];
}
