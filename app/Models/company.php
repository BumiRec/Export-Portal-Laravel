<?php

namespace App\Models;

use App\Models\ActivityArea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    protected $fillable = [
        'name',
        'keywords',
        'country',
        'web_address',
        'more_info',
        'budged', 
        'type',
        'taxpayer_office',
        'TIN',
        'category_id',
        'subcategory_id',
        'profile_picture',
        'membership',
    ];

    public function activityArea(){
        return $this -> belongsToMany(ActivityArea::class, 'activity_company', 'company_id', 'activity_area_id');
    }  
    
    public function category(){
        return $this -> belongsTo(CompanyCategory::class, 'category_id');
    }

    public function subcategory(){
        return $this -> belongsTo(CompanyCategory::class, 'subcategory_id');
    }

    public function status(){
        return $this -> belongsTo(CompanyStatus::class, 'status_id');
    }

    public function product(){
        return $this -> hasMany(Product::class, 'company_id');
    }
}
