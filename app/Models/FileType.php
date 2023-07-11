<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FileType extends Model
{
    use HasFactory;
    public $table       = 'file_type';
    protected $fillable = ['file_id', 'type'];


    public function file():HasOne
    {
        return $this->hasOne(FileUpload::class, 'file_id');
    }
}
