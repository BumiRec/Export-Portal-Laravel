<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileHasProduct extends Model
{
    use HasFactory;
    public $table       = 'file_has_product';
    protected $fillable = ['file_id', 'product_id'];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function file():BelongsTo
    {
        return $this->belongsTo(FileUpload::class, 'file_id');
    }
}
