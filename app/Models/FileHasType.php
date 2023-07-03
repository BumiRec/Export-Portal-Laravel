<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FileHasType extends Model
{
    use HasFactory;
    public $table       = 'file_has_types';
    protected $fillable = ['file_id', 'type_id'];

    public function file():BelongsTo
    {
        return $this->belongsTo(FileUpload::class, 'file_id');
    }

    public function fileType():BelongsTo
    {
        return $this->belongsTo(FileType::class, 'type_id');
    }
}
