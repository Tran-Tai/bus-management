<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\StaffSchedulesRepository;
use App\Models\StaffSchedule;

class StaffSchedulesEloquentRepository implements StaffSchedulesRepository
{
    public function getWorkingStaff($date)
    {
        return StaffSchedule::where('date', $date)
                            ->get();
    }
}