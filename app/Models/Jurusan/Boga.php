<?php

namespace App\Models\Jurusan;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Boga extends Model
{
    protected $fillable =["photo","konten","penulis_id","photo_kaprog","nama_kaprog","ket_kaprog"];
    public function penulis() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
