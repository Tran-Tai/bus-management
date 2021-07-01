<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intersection extends Model
{
    use HasFactory;
    protected $fillable = ['first_route_id', 'second_route_id', 'station_id', 'first_route_number', 'second_route_number', 'status'];
}
