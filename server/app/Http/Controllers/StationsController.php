<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\StationsRepository;
use App\Repositories\Contracts\RouteStationRepository;
use App\Http\Controllers\TripsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StationsController extends Controller
{
    protected $stationsRepository;
    protected $routeStationRepository;
    protected $tripsRepository;

    public function __construct(StationsRepository $stationsRepository,
                                RouteStationRepository $routeStationRepository,
                                TripsController $tripsRepository)
    {
        $this->stationsRepository = $stationsRepository;
        $this->routeStationRepository = $routeStationRepository;
        $this->tripsRepository = $tripsRepository;
    }

    public function index() 
    {
        $stations = $this->stationsRepository->getAll();

        return view('stations.list', compact('stations'));
    }

    public function search(Request $request) 
    {
        $keyword = $request->keyword;
        $stations = $this->stationsRepository->search($keyword);
        return view('stations.list', compact('stations'));
    }

    public function show($id) 
    {
        $station = $this->stationsRepository->get($id);
        $routes = $this->routeStationRepository->getRoutesByStation($id);
        $trips = [];
        // foreach ($routes as $route) {
        //     $trip = $this->tripsRepository->getNextTrip($route->route_id, $route->number);
        //     $trip->arrive_timepoint = $trip->arrive_at + $route->arrive_time - $trip->arrive_timepoint;
        //     $trips[] = $trip;
        // }
        return view('stations.detail', compact('station'));
    }

    public function create()
    {
        $stations = $this->stationsRepository->getAll();
        $shorts = $this->stationsRepository->getShort();
        return view('stations.create', compact('stations', 'shorts'));
    }

    public function store(Request $request)
    {
        $attributes = [
            'name' => $request->name,
            'status' => 1
        ];
        $store_success = $this->stationsRepository->create($attributes);

        if ($store_success) Session::flash('success', 'Đã thêm thông tin trạm thành công');
        else Session::flash('fail', 'Đã có lỗi xảy ra');

        return redirect('/stations/create');
    }

    public function edit($id)
    {
        $station = $this->stationsRepository->get($id);
        return view('stations.edit', compact('station'));
    }

    public function update($id, Request $request)
    {
        $attributes = [
            'name' => $request->name
        ];
        $edit_success = $this->stationsRepository->update($id, $attributes);

        if ($edit_success) Session::flash('success', 'Đã chỉnh sửa thông tin trạm thành công');
        else Session::flash('fail', 'Đã có lỗi xảy ra');


        return redirect('/stations/'.$id);
    }

    public function delete($id)
    {
        return view('stations.delete', compact('id'));
    }

    public function destroy($id)
    {
        $this->stationsRepository->delete($id);

        return redirect('/stations');
    }
}
