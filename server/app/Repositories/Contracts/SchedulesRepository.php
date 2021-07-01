<?php
namespace App\Repositories\Contracts;


interface SchedulesRepository {
    public function getAll();
    public function getGroup($route_name_id, $group_number);
}