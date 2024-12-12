<?php

namespace App\Models\Profil;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waka extends Model
{
    use HasFactory;
    protected $fillable = ["nama","photo","jabatan"];
}
