<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservedCode extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'trip_id', 'station_id', 'code', 'ticket_type'];
}
