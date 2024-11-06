<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ["title","slug","writer_id","text_content","image"];

    public function writer() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function kategoris() : BelongsToMany {
        return $this->belongsToMany(Kategori::class,"kategori_artikel");
    }
}
