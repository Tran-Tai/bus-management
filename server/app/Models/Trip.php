<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'route_id', 'number', 'status', 'start_time', 'end_time', 'bus_id', 'driver_id', 'ticket_collector_id', 'operator_id', 'next_station_id', 'next_station_number', 'arrive_at', 'passenger', 'create_by'];
}
