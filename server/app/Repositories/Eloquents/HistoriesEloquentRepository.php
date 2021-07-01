<?php

namespace App\Repositories\Eloquents;

use App\Models\History;
use App\Repositories\Contracts\HistoriesRepository;

class HistoriesEloquentRepository implements HistoriesRepository
{
    public function getAll()
    {

    }

    public function getByTrip($trip_id)
    {
        $histories = History::where('trip_id', '=', $trip_id)
                        ->get();
    }

    public function getByTripStation($trip_id, $station_id)
    {
        $history = History::where([
                                    ['trip_id', '=', $trip_id],
                                    ['station_id', '=', $station_id]
                                ])
                        ->first();
        return $history;
    }

    public function get($id)
    {
        return History::findOrFail($id);
    }

    public function create($attributes)
    {
        return History::create($attributes);
    }

    public function update($id, $attributes)
    {
        $history = $this->get($id);
        $history->normal_passenger = $attributes['normal_passenger'];
        $history->reserved_passenger = $attributes['reserved_passenger'];
        $history->passenger_leave = $attributes['passenger_leave'];
        $history->passenger = $attributes['passenger'];        
        return $history->save();
    }

    public function delete($id)
    {

    }
}