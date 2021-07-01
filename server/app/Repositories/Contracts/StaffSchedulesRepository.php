<?php
namespace App\Repositories\Contracts;


interface StaffSchedulesRepository {
    public function getWorkingStaff($date);
}