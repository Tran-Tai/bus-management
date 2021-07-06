<?php

namespace App\Repositories\Contracts;

use App\Repositories\RepositoryInterface;

interface RouteNamesRepository extends RepositoryInterface
{
    public function updateRoute($id, $attributes);
    public function getIncomplete();
    public function search($keyword);
}
