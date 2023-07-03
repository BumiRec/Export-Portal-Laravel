<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Company;
use App\Models\Language;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function company(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'user_company', 'user_id', 'company_id');
    }

    public function language(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'user_language', 'user_id', 'language_id');
    }

    public function notification(): HasOne
    {
        return $this->hasOne(Notification::class, 'notification_id');
    }

}
