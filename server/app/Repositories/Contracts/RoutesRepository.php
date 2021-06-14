<?php
namespace App\Repositories\Contracts;

use App\Repositories\RepositoryInterface;

interface RoutesRepository extends RepositoryInterface {
    public function getStationList($id);
}

