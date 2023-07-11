<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ActivityCompany extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table       = 'activity_company';
    protected $fillable = ['activity_area_id', 'company_id'];

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function activityArea(){
        return $this->belongTo(ActivityArea::class, 'activity_area_id');
    }
    
}
