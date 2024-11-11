<?php

namespace App\Models\Profil;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Potensi extends Model
{
    protected $fillable = ["penulis_id","konten"];
    public function penulis() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
