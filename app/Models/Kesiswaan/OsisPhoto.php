<?php

namespace App\Models\Kesiswaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsisPhoto extends Model
{
    use HasFactory;
    protected $fillable =["photo","nama","jabatan"];
}
