<?php

namespace App\Models;

use App\Models\ExportProduct;
use App\Models\FileUpload;
use App\Models\ImportProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'price',
        'views',
        'type',
        'category_id',
        'subcategory_id',
        'company_id',
        'created_at',
    ];
}
