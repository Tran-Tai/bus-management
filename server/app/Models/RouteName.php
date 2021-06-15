<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteName extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['number', 'name', 'number', 'time_interval', 'first_route_id', 'second_route_id', 'status', 'last_update_by'];
}
