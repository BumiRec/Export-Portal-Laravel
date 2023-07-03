<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySubcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    public function company(){
        return $this->hasMany(Company::class, 'subcategory_id');
    }

    public function category(){
        return $this->belongsTo(CompanyCategory::class, 'subcategory_id');
    }
}
