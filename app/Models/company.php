<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;

    public $table = 'company';

    protected $fillable = ['name', 'keywords', 'country', 'web_adress', 'more_info', 'budged', 'type', "taxpayer_office",
                            "TIN",'activity_area_id', 'category_id', 'subcategory_id'];
}
