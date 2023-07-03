<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
    use HasFactory;

    protected $table = 'company_categories';

    protected $fillable = ['category'];

    public function company(){
        return $this->hasMany(Company::class, 'category_id');
    }

    public function subcategory(){
        return $this -> hasMany(CompanySubategory::class, 'category_id');
    }
}
