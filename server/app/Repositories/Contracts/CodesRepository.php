<?php
namespace App\Repositories\Contracts;

use App\Repositories\RepositoryInterface;

interface CodesRepository extends RepositoryInterface {
    public function getByTripStation($trip_id, $station_id);
}