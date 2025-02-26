<?php

namespace App\Models\Profil;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StrukturOrganisasi extends Model
{
    protected $fillable =["photo","konten","penulis_id"];
    public function penulis() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
