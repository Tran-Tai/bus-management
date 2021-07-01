<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\TicketsRepository;
use App\Models\Ticket;

class TicketsEloquentRepository implements TicketsRepository {
    public function getByUser($user_id)
    {
        $tickets = Ticket::where('user_id', '=', $user_id)
                         ->get();
        return $tickets;
    }

    public function getTripTicket($user_id)
    {
        $ticket = Ticket::where([
                                    ['user_id', '=', $user_id],
                                    ['ticket_type', '=', 1]
                                ])
                        ->first();
        return $ticket;
    }

    public function updateTripTicket($user_id, $attributes)
    {
        $ticket = $this->getTripTicket($user_id);
        $ticket->amount = $attributes['amount'];
        return $ticket->save();
    }

    public function createTripTicket($attributes)
    {
        return Ticket::create($attributes);
    }

    public function createWeekTicket($attributes)
    {
        return Ticket::create($attributes);
    }
    
    public function createMonthTicket($attributes)
    {
        return Ticket::create($attributes);
    }

} 