<?php
namespace App\Repositories\Contracts;

use App\Repositories\RepositoryInterface;

interface OperationsRepository extends RepositoryInterface {
    public function getByOperator($operator_id);
}