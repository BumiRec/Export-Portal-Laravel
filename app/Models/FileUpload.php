<?php

namespace App\Models;

use App\Models\FileType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FileUpload extends Model
{
    use HasFactory;
    public $table       = 'file';
    protected $fillable = ['URL'];

    public function product():BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'file_has_product', 'file_id', 'product_id');
    }

    public function fileType():HasOne
    {
        return $this->hasOne(FileType::class, 'type_id');
    }
}
