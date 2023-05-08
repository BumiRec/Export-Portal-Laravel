<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity_area extends Model
{
    use HasFactory;

    public $table = 'activity_area';

    protected $fillable = ['name'];
}
