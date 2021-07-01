<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\SchedulesRepository;
use App\Models\Schedule;

class SchedulesEloquentRepository implements SchedulesRepository
{
    public function getAll()
    {
        return Schedule::all();
    }

    public function getGroup($route_name_id, $group_number)
    {
        return Schedule::where('route_name_id', $route_name_id)
                       ->where('group_number', $group_number)
                       ->get();
    }
}