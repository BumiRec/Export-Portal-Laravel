<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuccessStories extends Model
{
    use HasFactory;

    protected $table = 'success_stories';

    protected $fillable = ['company_id', 'topic', 'representative', 'position', 'message', 'image_URL'];

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
