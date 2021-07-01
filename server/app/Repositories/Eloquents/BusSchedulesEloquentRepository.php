<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\BusSchedulesRepository;
use App\Models\BusSchedule;

class BusSchedulesEloquentRepository implements BusSchedulesRepository
{
    public function getWorkingBus($date)
    {
        return BusSchedule::where('date', $date)
                            ->get();
    }
}