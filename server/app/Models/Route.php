<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['route_name_id', 'direction', 'total_station', 'first_station_id', 'last_station_id', 'total_time', 'status', 'last_update_by'];
}
