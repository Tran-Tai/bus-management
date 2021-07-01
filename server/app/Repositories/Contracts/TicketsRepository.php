<?php
namespace App\Repositories\Contracts;

use App\Repositories\RepositoryInterface;

interface TicketsRepository {
    public function getByUser($user_id);
    public function updateTripTicket($user_id, $attributes);
    public function createTripTicket($attributes);
    public function createWeekTicket($attributes);
    public function createMonthTicket($attributes);
}