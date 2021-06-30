<?php

namespace App\Repositories\Eloquents;

use App\Models\Intersection;
use App\Repositories\Contracts\IntersectionsRepository;

class IntersectionsEloquentRepository implements IntersectionsRepository
{
    public function getAll()
    {

    }

    public function getAvailable() 
    {
        $intersections = Intersection::where('status', '=', 1)
                                     ->get();
        return $intersections;
    }

    public function getByStation($station_id)
    {
        $intersections = Intersection::where('station_id', '=', $station_id)
                                     ->get();
        return $intersections;
    }

    public function getByRoute($route_id)
    {
        $intersections = Intersection::where('first_route_id', '=', $route_id)
                                     ->orWhere('second_route_id', '=', $route_id)
                                     ->get();
        return $intersections;
    }

    public function getByNumber($route_id, $number)
    {
        $intersections = Intersection::where([
                                                ['first_route_id', '=', $route_id],
                                                ['first_route_number', '=', $number]
                                            ])
                                     ->orWhere([
                                                ['second_route_id', '=', $route_id],
                                                ['second_route_number', '=', $number]
                                            ])
                                     ->get();
        return $intersections;
    }

    public function get($id)
    {
        return Intersection::findOrFail($id);
    }

    public function create($attributes)
    {
        return Intersection::create($attributes);
    }

    public function update($id, $attributes)
    {

    }

    public function updateStatus($id)
    {
        $intersection = $this->get($id);
        $intersection->status = 1;

        return $intersection->save();
    }

    public function delete($id)
    {

    }
}