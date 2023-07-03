<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $table = 'users';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'password',
        'phone_number',
        'country_id',
        'gender',
        'agreements',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company():BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'user_company', 'user_id', 'company_id');
    }

    public function language()
    {
        return $this->belongsTo(UserLanguage::class);
    }

}
