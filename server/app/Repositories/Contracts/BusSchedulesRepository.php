<?php
namespace App\Repositories\Contracts;


interface BusSchedulesRepository {
    public function getWorkingBus($date);
}