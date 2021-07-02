<?php
namespace App\Repositories\Contracts;

use App\Repositories\RepositoryInterface;

interface IntersectionsRepository extends RepositoryInterface {
    public function getAll();
    public function getAvailable();
    public function getByStation($station_id);
    public function getByRoute($route_id);
    public function getByNumber($route_id, $number);
    public function updateStatus($id);
}
