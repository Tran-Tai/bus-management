<?php

namespace App\Http\Controllers;


use App\Models\User;

use App\Repositories\Contracts\CodesRepository;
use App\Repositories\Contracts\TicketsRepository;
use App\Repositories\Contracts\TripsRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function signIn(Request $request)
    {
        $user_name = $request->user_name;
        $password = $request->password;
        if (Auth::attempt(['user_name' => $user_name, 'password' => $password])) {
            return view('demo');
        } else {
            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng');
            return redirect('login');
        }
    }

    public function signOut()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function showLoginPage()
    {
        $user = auth()->user();

        return view('auth.login');
    }

    public function showRegisterPage()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {

        Auth::attempt([
            'user_name' => $request->username,
            'password' => $request->password
        ]);

        if (Auth::check()) {
            $res = Auth::user();
            return response()->json($res);
        } else {
            $res = 'khong thanh cong';
            return response()->json($res);
        }
    }

    protected $ticketsRepository;
    protected $tripsRepository;
    protected $codeRepository;

    public function __construct(
        TicketsRepository $ticketsRepository,
        TripsRepository $tripsRepository,
        CodesRepository $codeRepository
    ) {
        $this->ticketsRepository = $ticketsRepository;
        $this->tripsRepository = $tripsRepository;
        $this->codeRepository = $codeRepository;
    }

    // public function signIn(Request $request)
    // {
    //     $user_name = $request->user_name;
    //     $password = $request->password;
    //     if (Auth::attempt(['user_name' => $user_name, 'password' => $password])) {
    //         return view('demo');
    //     } else {
    //         Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng');
    //         return redirect('login');
    //     }
    //     if(!$user){
    //         return redirect('/login');
    //     }else{
    //         $res = Auth::user();
    //         return response()->json($res);
    //     }

    //     $data = json_decode(json_encode($request->all()), true);
    //     $data_check = User::where("user_name","=", $data['user_name'])->get()->toArray();
    //     if(count($data_check) > 0){
    //         if(Hash::check($data['password'], $data_check[0]['password'])){
    //             return response()->json(['success'=>1, "data"=>$data_check,"remember_token"=>""]);
    //         }else{
    //             return response()->json(['success'=>0, "data"=>"Mật khẩu không đúng!","remember_token"=>""]);
    //         }
    //     }
    //     return response()->json(['success' => -1,"data"=>"Tên đăng nhập không đúng!","remember_token"=>""]);
    // }

    public function register(Request $request)
    {
        $name = $request->name;
        $username = $request->username;
        $password = $request->password;
        $age = $request->age;
        $gender = $request->gender;

        $user = new User();
        $user->name = $name;
        $user->user_name = $username;
        $user->password = bcrypt($password);
        $user->age = $age;
        $user->gender = $gender;

        $user->save();

        return redirect('/login');
    }

    // public function signOut()
    // {
    //     Auth::logout();

    //     return redirect('/login');
    // }

    public function buy_ticket($user_id)
    {
        $tickets = $this->ticketsRepository->getByUser($user_id);
        $trip_ticket = 0;
        $week_tickets = [];
        $month_tickets = [];
        foreach ($tickets as $ticket) {
            if ($ticket->ticket_type == 1) {
                $trip_ticket = $ticket->amount;
            } elseif ($ticket->ticket_type == 2) {
                $week_tickets[] = $ticket;
            } elseif ($ticket->ticket_type == 3) {
                $month_tickets[] = $ticket;
            }
        }
        return view('users.buy_ticket', compact('trip_ticket', 'week_tickets', 'month_tickets'));
    }

    public function show_ticket($user_id)
    {
        $tickets = $this->ticketsRepository->getByUser($user_id);
        $trip_ticket = 0;
        $week_tickets = [];
        $month_tickets = [];
        foreach ($tickets as $ticket) {
            if ($ticket->ticket_type == 1) {
                $trip_ticket = $ticket->amount;
            } elseif ($ticket->ticket_type == 2) {
                $week_tickets[] = $ticket;
            } elseif ($ticket->ticket_type == 3) {
                $month_tickets[] = $ticket;
            }
        }
        return view('users.show_ticket', compact('trip_ticket', 'week_tickets', 'month_tickets'));
    }

    public function store_ticket($user_id, Request $request)
    {
        $current_amount = $request->current_amount;
        $amount = $request->amount;
        $week_amount = $request->week_amount;
        $week_start_day = $request->week_start_day;
        $week_end_day = $request->week_end_day;
        $month_amount = $request->month_amount;
        $month_start_day = $request->month_start_day;
        $month_end_day = $request->month_end_day;
        if ($amount > 0) {
            if ($current_amount > 0) {
                $amount += $current_amount;
                $attributes = [
                    'amount' => $amount
                ];
                $this->ticketsRepository->updateTripTicket($user_id, $attributes);
            } else {
                $attributes = [
                    'user_id' => $user_id,
                    'ticket_type' => 1,
                    'amount' => $amount
                ];
                $this->ticketsRepository->createTripTicket($attributes);
            }
        }

        if (($week_amount > 0) && isset($week_start_day)) {
            $attributes = [
                'user_id' => $user_id,
                'ticket_type' => 2,
                'amount' => $week_amount,
                'start_day' => $week_start_day,
                'end_day' => $week_end_day
            ];
            $this->ticketsRepository->createWeekTicket($attributes);
        }

        if (($month_amount > 0) && isset($month_start_day)) {
            $attributes = [
                'user_id' => $user_id,
                'ticket_type' => 3,
                'amount' => $month_amount,
                'start_day' => $month_start_day,
                'end_day' => $month_end_day
            ];
            $this->ticketsRepository->createMonthTicket($attributes);
        }
        return redirect("users/$user_id/buy_ticket");
    }

    public function showTrip()
    {
        $trips = $this->tripsRepository->getAll(1);
        return view('users.trips_list', compact('trips'));
    }

    public function book()
    {
        return view('users.book');
    }

    public function store_book($user_id, Request $request)
    {
        $code = random_int(10000, 99999);
        $attributes = [
            'user_id' => $user_id,
            'trip_id' => $request->trip_id,
            'station_id' => $request->station_id,
            'code' => $code,
            'ticket_type' => $request->ticket_type
        ];
        $this->codeRepository->create($attributes);
    }
}
