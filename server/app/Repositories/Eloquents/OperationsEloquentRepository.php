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
    public function create($attributes){
        return Operation::create($attributes);
    }
    public function update($id, $attributes){
        
    }
    public function delete($id){
        
    }
}