<?php

namespace App\Repositories\Eloquents;

use App\Models\ReservedCode;
use App\Repositories\Contracts\CodesRepository;
use Prophecy\Prophecy\RevealerInterface;

class CodesEloquentRepository implements CodesRepository
{
    public function getAll()
    {
        $buses = ReservedCode::leftJoin('route_names', 'buses.route_name_id', '=', 'route_names.id')
                    ->select('buses.*', 'route_names.name as route_name', 'route_names.number as route_number')
                    ->get();
        return $buses;
    }

    public function getByTripStation($trip_id, $station_id)
    {
        $codes = ReservedCode::where([
                                ['trip_id', $trip_id],
                                ['station_id', $station_id]
                             ])
                             ->get();
        return $codes;
    }

    public function getByUser($user_id)
    {
        $codes = ReservedCode::where('user_id', '=', 'user_id')
                             ->get();
        return $codes;
    }

    public function get($id)
    {
        return ReservedCode::findOrFail($id);
    }

    public function create($attributes)
    {
        return ReservedCode::create($attributes);
    }

    public function update($id, $attributes)
    {
        $bus = $this->get($id);
        $bus->number = $attributes['number'];
        $bus->seat = $attributes['seat'];
        $bus->capacity = $attributes['capacity'];
        $bus->route_name_id = $attributes['route_name_id'];
        
        return $bus->save();
    }

    public function delete($id)
    {
        $bus = $this->get($id);
        $bus->destroy($id);
    }
}

