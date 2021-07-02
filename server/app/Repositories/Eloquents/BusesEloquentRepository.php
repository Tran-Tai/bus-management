<?php

namespace App\Repositories\Eloquents;

use App\Models\Bus;
use App\Repositories\Contracts\BusesRepository;

class BusesEloquentRepository implements BusesRepository
{
    public function getAll()
    {
        $buses = Bus::leftJoin('route_names', 'buses.route_name_id', '=', 'route_names.id')
                    ->select('buses.*', 'route_names.name as route_name', 'route_names.number as route_number')
                    ->get();
        return $buses;
    }
    
    public function getAvailableBuses($route_name_id)
    {
        $buses = Bus::where('route_name_id', $route_name_id)
                    ->orWhereNull('route_name_id')
                    ->get();
        return $buses;

    }

    public function get($id)
    {
        return Bus::findOrFail($id);
    }

    public function create($attributes)
    {
        return Bus::create($attributes);
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

    public function updatePosition($id, $attributes)
    {
        $bus = $this->get($id);
        $bus->last_worktime = $attributes['last_worktime'];
        $bus->last_station_id = $attributes['last_station_id'];
        
        return $bus->save();
    }

    public function delete($id)
    {
        $bus = $this->get($id);
        $bus->destroy($id);
    }
}

