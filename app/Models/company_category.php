<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_category extends Model
{
    use HasFactory;

    protected $table = 'company_categories';

    protected $fillable = ['category'];
}
