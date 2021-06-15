<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'gender','birthday', 'identity_number', 'role_code', 'route_name_id', 'last_worktime', 'last_station_id', 'status', 'last_update_by'];
}
