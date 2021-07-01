<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\TripsRepository;
use App\Models\Trip;

class TripsEloquentRepository implements TripsRepository 
{
    public function getAll($route_id)
    {
        $trips = Trip::where('route_id', $route_id)
                      ->leftJoin('buses', 'trips.bus_id', '=', 'buses.id')
                      ->leftJoin('staff as drivers', 'trips.driver_id', '=', 'drivers.id')
                      ->leftJoin('staff as ticket_collectors', 'trips.ticket_collector_id', '=', 'ticket_collectors.id')
                      ->leftJoin('routes', 'trips.route_id', '=', 'routes.id')
                      ->leftJoin('route_names', 'routes.route_name_id', '=', 'route_names.id')
                      ->select('trips.*', 'buses.number as bus_number', 'drivers.name as driver_name', 'ticket_collectors.name as ticket_collector_name', 
                               'route_names.name as route_name', 'routes.direction as route_direction')
                      ->get();
        return $trips;
    }   

    public function getActive($route_id)
    {
        $trips = Trip::where([
                                ['route_id', $route_id],
                                ['status', 1]
                            ])
                      ->leftJoin('buses', 'trips.bus_id', '=', 'buses.id')
                      ->leftJoin('staff as drivers', 'trips.driver_id', '=', 'drivers.id')
                      ->leftJoin('staff as ticket_collectors', 'trips.ticket_collector_id', '=', 'ticket_collectors.id')
                      ->leftJoin('routes', 'trips.route_id', '=', 'routes.id')
                      ->leftJoin('route_names', 'routes.route_name_id', '=', 'route_names.id')
                      ->select('trips.*', 'buses.number as bus_number', 'drivers.name as driver_name', 'ticket_collectors.name as ticket_collector_name', 
                               'route_names.name as route_name', 'routes.direction as route_direction')
                      ->get();
        return $trips;
    }  

    public function getNextTrip($route_id, $station_number)
    {
        $trips = Trip::where([
                                ['route_id', $route_id],
                                ['next_station_number', '<', $station_number]
                            ])
                      ->leftJoin('buses', 'trips.bus_id', '=', 'buses.id')
                      ->leftJoin('staff as drivers', 'trips.driver_id', '=', 'drivers.id')
                      ->leftJoin('staff as ticket_collectors', 'trips.ticket_collector_id', '=', 'ticket_collectors.id')
                      ->leftJoin('routes', 'trips.route_id', '=', 'routes.id')
                      ->leftJoin('route_names', 'routes.route_name_id', '=', 'route_names.id')
                      ->leftJoin('route_station', function($join) use ($route_id) {
                          $join->on('route_station.number', '=',  'trips.next_station_number')
                               ->where('route_station.route_id', '=', $route_id);
                      })    
                      ->select('trips.*', 'buses.number as bus_number', 'drivers.name as driver_name', 'ticket_collectors.name as ticket_collector_name', 
                               'route_names.name as route_name', 'routes.direction as route_direction', 'route_station.arrive_time as arrive_timepoint')
                      ->orderBy('next_station_number', 'desc')
                      ->first();
        return $trips;
    }

    public function getByStaff($staff_id) 
    {
        $trips = Trip::where('driver_id', $staff_id)
                      ->orWhere('ticket_collector_id', $staff_id)
                      ->leftJoin('buses', 'trips.bus_id', '=', 'buses.id')
                      ->leftJoin('staff as drivers', 'trips.driver_id', '=', 'drivers.id')
                      ->leftJoin('staff as ticket_collectors', 'trips.ticket_collector_id', '=', 'ticket_collectors.id')
                      ->leftJoin('routes', 'trips.route_id', '=', 'routes.id')
                      ->leftJoin('route_names', 'routes.route_name_id', '=', 'route_names.id')
                      ->select('trips.*', 'buses.number as bus_number', 'drivers.name as driver_name', 'ticket_collectors.name as ticket_collector_name', 
                               'route_names.name as route_name', 'routes.direction as route_direction')
                      ->get();
        return $trips;
    }

    public function getByBus($bus_id)
    {
        $trips = Trip::where('bus_id', $bus_id)
                      ->leftJoin('buses', 'trips.bus_id', '=', 'buses.id')
                      ->leftJoin('staff as drivers', 'trips.driver_id', '=', 'drivers.id')
                      ->leftJoin('staff as ticket_collectors', 'trips.ticket_collector_id', '=', 'ticket_collectors.id')
                      ->leftJoin('routes', 'trips.route_id', '=', 'routes.id')
                      ->leftJoin('route_names', 'routes.route_name_id', '=', 'route_names.id')
                      ->select('trips.*', 'buses.number as bus_number', 'drivers.name as driver_name', 'ticket_collectors.name as ticket_collector_name', 
                               'route_names.name as route_name', 'routes.direction as route_direction')
                      ->get();
        return $trips;
    }

    public function getByOperator($operator_id, $date) 
    {
        $trips = Trip::where([
                                ['operator_id', $operator_id ],
                                ['date', $date]
                            ])
                      ->leftJoin('buses', 'trips.bus_id', '=', 'buses.id')
                      ->leftJoin('staff as drivers', 'trips.driver_id', '=', 'drivers.id')
                      ->leftJoin('staff as ticket_collectors', 'trips.ticket_collector_id', '=', 'ticket_collectors.id')
                      ->leftJoin('routes', 'trips.route_id', '=', 'routes.id')
                      ->select('trips.*', 'buses.number as bus_number', 'drivers.name as driver_name', 'ticket_collectors.name as ticket_collector_name', 
                               'routes.name as route_name', 'routes.direction as route_direction')
                      ->get();
        return $trips;
    }

    public function get($id)
    {
        return Trip::where('trips.id', $id)
                    ->leftJoin('buses', 'trips.bus_id', '=', 'buses.id')
                    ->leftJoin('staff as drivers', 'trips.driver_id', '=', 'drivers.id')
                    ->leftJoin('staff as ticket_collectors', 'trips.ticket_collector_id', '=', 'ticket_collectors.id')
                    ->select('trips.*', 'buses.number as bus_number', 'drivers.name as driver_name', 'ticket_collectors.name as ticket_collector_name')
                    ->first();
    }

    public function getLastTrip($route_id, $date)
    {
        $last_trip = Trip::where('date', $date)
                       ->where('route_id', $route_id)
                       ->orderBy('number', 'DESC')
                       ->first();
        return $last_trip;
    }

    public function getLastTripInRoute($route_name_id)
    {
        $last_trip = Trip::leftJoin('route_names', function($join){
                           $join->on('trips.route_id', '=', 'route_names.first_route_id');
                           $join->orOn('trips.route_id', '=', 'route_names.second_route_id');
                       })
                       ->select('trips.*')
                       ->orderBy('id', 'DESC')
                       ->first();
        return $last_trip;
    }

    public function getStatus($route_id, $date, $number)
    {
        $trip = Trip::join('trips_status', 'trips.id', '=', 'trips_status.id')
                       ->where('date', $date)
                       ->where('route_id', $route_id)
                       ->where('number', $number);

        if ($trip === null) return 0;
        else return $$trip->status;
    }



    public function create($attributes)
    {
        return Trip::create($attributes);
    }


    public function update($id, $attributes)
    {

    }

    public function updateStatus($id, $status_attributes)
    {
        $trip = $this->get($id);
        $trip->next_station_id = $status_attributes['next_station_id'];
        $trip->next_station_number = $status_attributes['next_station_number'];
        $trip->arrive_at = $status_attributes['arrive_at'];

        return $trip->save();
    }

    public function updatePassenger($id, $passenger)
    {
        $trip = $this->get($id);
        $trip->passenger = $passenger;

        return $trip->save();
    }

    public function delete($id)
    {
        $trips = $this->get($id);
        $trips->destroy($id);
    }
}
