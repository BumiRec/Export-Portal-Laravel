<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyStatus extends Model
{
    use HasFactory;

    public $table = 'company_status';

    protected $fillable = ['status'];

    public function company(){
        return $this -> hasOne(Company::class, 'status_id');
    }
}
