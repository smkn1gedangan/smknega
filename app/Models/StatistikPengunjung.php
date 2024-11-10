<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikPengunjung extends Model
{
    protected $fillable = ["ip_address","user_agent","visited_at"];
}
