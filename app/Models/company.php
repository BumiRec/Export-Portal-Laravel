<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function user():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_company', 'user_id', 'company_id');
    }

    public function successStories():HasMany{

        return $this->hasMany(SuccessStories::class, 'company_id');
    }
}
