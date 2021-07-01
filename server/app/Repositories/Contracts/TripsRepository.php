<?php
namespace App\Repositories\Contracts;

interface TripsRepository {
    public function getAll($route_id);
    public function getActive($route_id);
    public function getByStaff($staff_id);
    public function getByBus($bus_id);
    public function getByOperator($operator_id, $date);
    public function get($id);
    public function getLastTrip($route_id, $date);
    public function getLastTripInRoute($route_name_id);
    public function getNextTrip($route_id, $station_number);
    public function create($attributes);
    public function update($id, $attributes);
    public function updateStatus($id, $status_attributes);
    public function updatePassenger($id, $passenger);
    public function delete($id);
}