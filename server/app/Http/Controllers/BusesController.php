<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BusesRepository;
use App\Repositories\Contracts\RouteNamesRepository;
use App\Repositories\Contracts\TripsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BusesController extends Controller
{
    protected $busesRepository;
    protected $routeNamesRepository;
    protected $tripsRepository;

    public function __construct(BusesRepository $busesRepository, RouteNamesRepository $routeNamesRepository, TripsRepository $tripsRepository)
    {
        $this->busesRepository = $busesRepository;
        $this->routeNamesRepository = $routeNamesRepository;
        $this->tripsRepository = $tripsRepository;
    }

    public function index()
    {
        $buses = $this->busesRepository->getAll();

        return view('buses.list', compact('buses'));
    }

    public function show($id) 
    {
        $bus = $this->busesRepository->get($id);
        $route_name = $this->routeNamesRepository->get($bus->route_name_id);
        // $trips = $this->tripsRepository->getByBus($id);
        return view('buses.detail', compact('bus', 'route_name'));
    }

    public function create()
    {
        $route_names = $this->routeNamesRepository->getAll();
        return view('buses.create', compact('route_names'));
    }

    public function store(Request $request)
    {
        $attributes = [
            'number' => $request->number,
            'seat' => $request->seat,
            'capacity' => $request->capacity,
            'route_name_id' => $request->route_name_id,
            'last_worktime' => strtotime(date("Y-m-d H:i:s")), 
            'status' => 1
        ];
        $store_success = $this->busesRepository->create($attributes);
        if ($store_success) Session::flash('success', 'Đã thêm thông tin xe thành công');
        else Session::flash('fail', 'Đã có lỗi xảy ra');

        return redirect('/buses/create');
    }

    public function edit($id)
    {
        $bus = $this->busesRepository->get($id);
        $route_names = $this->routeNamesRepository->getAll();
        return view('buses.edit', compact('bus', 'route_names'));
    }

    public function update($id, Request $request)
    {
        $attributes = [
            'number' => $request->number,
            'seat' => $request->seat,
            'capacity' => $request->capacity,
            'route_name_id' => $request->route_name_id
        ];
        
        $edit_success = $this->busesRepository->update($id, $attributes);

        if ($edit_success) Session::flash('success', 'Đã chỉnh sửa thông tin xe thành công');
        else Session::flash('fail', 'Đã có lỗi xảy ra');

        return redirect('/buses/'.$id);
    }

    public function delete($id)
    {
        return view('buses.delete', compact('id'));
    }

    public function destroy($id)
    {
        $this->busesRepository->delete($id);

        return redirect('/buses');
    }
}


