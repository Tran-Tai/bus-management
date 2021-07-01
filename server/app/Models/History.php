<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = ['trip_id', 'route_id', 'station_id', 'estimated_time', 'actual_time', 'normal_passenger', 'reserved_passenger', 'passenger_leave', 'passenger'];
}
