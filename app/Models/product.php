<?php

namespace App\Models;

use App\Models\ExportProduct;
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

    public function file(): BelongsToMany
    {
        return $this->belongsToMany(FileUpload::class, 'file_has_product', 'file_id', 'product_id');
    }

    public function importProduct(): BelongsTo
    {
        return $this->belongsTo(ImportProduct::class, 'product_id');
    }

    public function exportProduct(): BelongsTo
    {
        return $this->belongsTo(ExportProduct::class, 'product_id');
    }
}

