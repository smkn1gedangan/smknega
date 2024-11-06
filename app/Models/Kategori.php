<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kategori extends Model
{
    protected $fillable = ["nama"];
    public function articles() : BelongsToMany {
        return $this->belongsToMany(Article::class,"kategori_artikel");
    }
}
