<?php

namespace App\Models\Kesiswaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $fillable = ['nama','tingkat','juara','penyelenggara'];
}
