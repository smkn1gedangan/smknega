<?php

namespace App\Models\Kesiswaan;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Osis extends Model
{
    protected $table ="osis";
    protected $fillable = ["konten","penulis_id"];
    public function penulis() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
