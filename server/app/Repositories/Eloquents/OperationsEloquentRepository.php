<?php

namespace App\Repositories\Eloquents;

use App\Models\Operation;
use App\Repositories\Contracts\OperationsRepository;

class OperationsEloquentRepository implements OperationsRepository
{
    public function getAll() {

    }
    public function get($id){

    }

    public function getByOperator($operator_id) {
        $operations = Operation::where('operator_id', $operator_id)
                               ->leftJoin('route_names', 'operations.route_name_id', '=', 'route_names.id')
                               ->select('operations.*', 'route_names.name', 'route_names.number')
                               ->get();
        return $operations;
    }

    public function create($attributes){
        return Operation::create($attributes);
    }
    public function update($id, $attributes){
        
    }
    public function delete($id){
        
    }
}