<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ActivityArea extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $table = 'activity_area';

    protected $fillable = ['name'];

    public function company(){
        return $this -> belongsToMany(Company::class, 'activity_company', 'company_id', 'activity_area_id');
    }
}
