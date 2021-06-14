<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RouteNamesRepository;
use App\Models\RouteName;

class RouteNamesEloquentRepository implements RouteNamesRepository
{
    public function getAll()
    {
        return RouteName::all();
    }    

    public function getIncomplete()
    {
        return RouteName::whereNull('first_route_id')
                        ->whereNull('second_route_id')
                        ->get();
    }
    
    public function get($id)
    {
        return RouteName::find($id);
    }

    public function create($attributes)
    {
        return RouteName::create($attributes)->id;
    }

    public function update($id, $attributes)
    {
        $routename = $this->get($id);
        $routename->routename_id = $attributes['routename_id'];
        $routename->direction = $attributes['direction'];
        $routename->total_station = $attributes['total_station'];
        $routename->first_station_id = $attributes['first_station_id'];
        $routename->last_station_id = $attributes['last_station_id'];
        $routename->total_time = $attributes['total_time'];
        $routename->status = $attributes['status'];
        
        return $routename->save();
    }

    public function updateRoute($id, $attributes)
    {
        $routename = $this->get($id);
        if ($attributes['direction'] == 1) {
            $routename->first_route_id = $attributes['route_id'];
        }
        if ($attributes['direction'] == 2) {
            $routename->second_route_id = $attributes['route_id'];
        }

        return $routename->save(); 
    }

    public function delete($id)
    {
        $route = $this->get($id);
        $route->destroy($id);
    }
}

