<?php
namespace App\Repositories\Contracts;

use App\Repositories\RepositoryInterface;

interface OperationsRepository extends RepositoryInterface {
<<<<<<< HEAD
    public function  create($attributes);
    public function  update($route_id, $attributes);
=======
    public function getByOperator($operator_id);
>>>>>>> e5ad60eec85cfb34d4d9a9c1d1e7bff9ebb9b377
}