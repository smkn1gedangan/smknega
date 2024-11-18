<?php

namespace App\Models\Kesiswaan;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = ['nama','tingkat','juara','penyelenggara','prestasi'];
}
