<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RoutesRepository;
use App\Models\Route;
use App\Models\RouteStation;

use function PHPUnit\Framework\isNull;

class RoutesEloquentRepository implements RoutesRepository
{
    public function getAll()
    {
        return Route::leftJoin('route_names', 'routes.route_name_id', '=', 'route_names.id')
                    ->select('routes.*', 'route_names.name', 'route_names.number', 'route_names.time_interval', 'route_names.first_route_id', 'route_names.second_route_id','route_names.status')
                    ->get();
    }   

    public function search($keyword) 
    {
        return Route::leftJoin('route_names', 'routes.route_name_id', '=', 'route_names.id')
                    ->select('routes.*', 'route_names.name', 'route_names.number', 'route_names.time_interval', 'route_names.first_route_id', 'route_names.second_route_id','route_names.status')
                    ->where('route_names.name', 'like', '%' . $keyword . '%')
                    ->orWhere('route_names.number', 'like', '%' . $keyword . '%')
                    ->get();
    }

    public function getStationList($id)
    {
        
    }

    public function getByRouteName($route_name_id) {
        return Route::where('route_name_id', $route_name_id)
                    ->get();
    }  
    
    public function getByDirection($route_name_id, $direction)
    {
        return Route::where([
                                ['route_name_id', $route_name_id],
                                ['direction', $direction]
                            ])
                    ->first();
    }
    
    public function get($id)
    {
        return Route::where('routes.id',$id)
                    ->leftJoin('route_names', 'routes.route_name_id', '=', 'route_names.id')
                    ->select('routes.*', 'route_names.name', 'route_names.number', 'route_names.time_interval', 'route_names.first_route_id', 'route_names.second_route_id','route_names.status')
                    ->first();
    }

    public function create($attributes)
    {
        return Route::create($attributes)->id;
    }

    public function update($id, $attributes)
    {
        $route = $this->get($id);
        $route->name = $attributes['name'];
        $route->gender = $attributes['gender'];
        $route->birthday = $attributes['birthday'];
        $route->address = $attributes['address'];
        $route->role_code = $attributes['role_code'];
        
        return $route->save();
    }

    public function updateFirst($id, $attributes)
    {
        $route = $this->get($id);
        $route->first_station_id = $attributes['first_station_id'];
        
        return $route->save();
    }

    public function updateLast($id, $attributes)
    {
        $route = $this->get($id);
        $route->total_station = $attributes['total_station'];
        $route->last_station_id = $attributes['last_station_id'];
        $route->total_time = $attributes['total_time'];
        
        return $route->save();
    }

    public function delete($id)
    {
        $route = $this->get($id);
        $route->destroy($id);
    }
}

