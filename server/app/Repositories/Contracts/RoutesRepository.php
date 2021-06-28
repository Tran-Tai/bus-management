<?php
namespace App\Repositories\Contracts;

use App\Repositories\RepositoryInterface;

interface RoutesRepository extends RepositoryInterface {
    public function getStationList($id);
    public function getByRouteName($route_name_id);
    public function getByDirection($route_name_id, $direction);
    public function updateFirst($id, $attributes);
    public function updateLast($id, $attributes);
    public function search($keyword);
}

