<?php
namespace App\Repositories\Contracts;

use App\Repositories\RepositoryInterface;

interface HistoriesRepository extends RepositoryInterface {
    public function getByTrip($trip_id);
    public function getByTripStation($trip_id, $station_id);
}