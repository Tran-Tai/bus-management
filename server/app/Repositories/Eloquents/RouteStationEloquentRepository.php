<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RouteStationRepository;
use App\Models\RouteStation;

class RouteStationEloquentRepository implements RouteStationRepository
{
    public function getAll()
    {
    }
    public function getByRouteId($route_id)
    {
        $stations = RouteStation::where('route_id', $route_id)
            ->leftJoin('stations', 'route_station.station_id', '=', 'stations.id')
            ->orderBy('number')
            ->select('route_station.*', 'stations.name', 'stations.routes_list')
            ->get();
        return $stations;
    }

    public function getByTrip($route_id, $trip_id)
    {
        $stations = RouteStation::where('route_station.route_id', $route_id)
            ->leftJoin('stations', 'route_station.station_id', '=', 'stations.id')
            ->leftJoin('histories', function ($join) use ($trip_id) {
                $join->on('route_station.station_id', '=', 'histories.station_id')
                    ->where('histories.trip_id', '=', $trip_id);
            })
            ->orderBy('number')
            ->select('route_station.*', 'stations.name', 'stations.routes_list', 'histories.actual_time')
            ->get();
        return $stations;
    }

    public function getByStationId($station_id, $route_id)
    {
        $station = RouteStation::where([
            ['route_id', $route_id],
            ['station_id', $station_id]
        ])
            ->first();
        return $station;
    }

    public function getByNumber($number, $route_id)
    {
        $station = RouteStation::where([
            ['route_id', $route_id],
            ['number', $number]
        ])
            ->first();
        return $station;
    }

    public function create($attributes)
    {
        return RouteStation::create($attributes);
    }
    public function update($route_id, $station_id, $attributes)
    {
    }
    public function delete($route_id, $station_id)
    {
    }
}
