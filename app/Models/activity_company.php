<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity_company extends Model
{
    use HasFactory;

    public $table = 'activity_company';
    protected $fillable = ['activity_area_id', 'company_id'];
}
