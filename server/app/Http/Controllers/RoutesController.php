<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\RouteNamesRepository;
use App\Repositories\Contracts\RoutesRepository;
use App\Repositories\Contracts\RouteStationRepository;
use App\Repositories\Contracts\StationsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoutesController extends Controller
{
    protected $routesRepository;
    protected $routeNamesRepository;
    protected $routeStationRepository;
    protected $stationsRepository;

    public function __construct(RoutesRepository $routesRepository, 
                                RouteNamesRepository $routeNamesRepository,
                                RouteStationRepository $routeStationRepository,
                                StationsRepository $stationsRepository)
    {
        $this->routesRepository = $routesRepository;
        $this->routeNamesRepository = $routeNamesRepository;
        $this->routeStationRepository = $routeStationRepository;
        $this->stationsRepository = $stationsRepository;
    }

    public function index() 
    {
        $routes = $this->routesRepository->getAll();

        return view('routes.list', compact('routes'));
    }

    public function show($id) 
    {
        $route = $this->routesRepository->get($id);
        $stations = $this->routeStationRepository->getByRouteId($id);
        switch ($route->direction) {
            case 1:
                $reverse_route_id = $route->second_route_id;
                break;
            case 2:
                $reverse_route_id = $route->first_route_id;
                break;
        }
        return view('routes.detail', compact('route', 'stations', 'reverse_route_id'));
    }

    public function createname()
    {
        return view('routes.createname');
    }

    public function create()
    {
        $stations = $this->stationsRepository->getAll();
        $routenames = $this->routeNamesRepository->getIncomplete();
        return view('routes.create', compact('stations', 'routenames'));
    }

    public function storename(Request $request)
    {
        $time_interval = ($request->time_interval_hour * 3600) + ($request->time_interval_minute * 60) + $request->time_interval_second;
        $attributes = [
            'number' => $request->number,
            'name' => $request->name,
            'time_interval' => $time_interval,
            'status' => 1
        ];
        $store_success = $this->routeNamesRepository->create($attributes);

        if ($store_success) Session::flash('success', 'Đã thêm thông tin tuyến đường thành công');
        else Session::flash('fail', 'Đã có lỗi xảy ra');

        return redirect('/routes/createname');
    }

    public function store(Request $request)
    {
        $total_time = ($request->total_time_hour * 3600) + ($request->total_time_minute * 60) + $request->total_time_second;
        $direction = $request->direction;
        $routename_id = $request->routename_id;
        $last_station_id = 'station_id'.$request->total_station;
        $attributes = [
            'route_name_id' => $routename_id,
            'direction' => $direction,
            'total_station' => $request->total_station,
            'first_station_id' => $request->station_id1,
            'last_station_id' => $request->$last_station_id,
            'total_time' => $total_time,
            'status' => 1
        ];
        $store_success = $route_id = $this->routesRepository->create($attributes);

        $attributes = [
            'route_id' => $route_id,
            'direction' => $direction
        ];
        $this->routeNamesRepository->updateRoute($routename_id, $attributes);

        $time = 0;
        for ($i = 1; $i <= $request->total_station; $i++) {
            $station_id = 'station_id'.$i;
            $number = 'station_number'.$i;
            $minute = 'time_minute'.$i;
            $second = 'time_second'.$i;
            $time += $request->$minute * 60 + $request->$second;
            $attributes = [
                'route_id' => $route_id,
                'station_id' => $request->$station_id,
                'number' => $request->$number,
                'arrive_time' => $time
            ];
            $this->routeStationRepository->create($attributes);

            $route_number = $this->routeNamesRepository->get($routename_id)->number;
            $this->stationsRepository->insertRoute($request->$station_id, $route_id, $route_number, $direction);
        }



        if ($store_success) Session::flash('success', 'Đã thêm thông tin tuyến đường thành công');
        else Session::flash('fail', 'Đã có lỗi xảy ra');

        return redirect('/routes/create');
    }

    public function edit($id)
    {
        $routename = $this->routeNamesRepository->get($id);
        return view('routes.edit', compact('routename'));
    }

    public function update($id, Request $request)
    {
        $attributes = [
            'number' => $request->number,
            'name' => $request->name,
        ];
        $edit_success = $this->routeNamesRepository->update($id, $attributes);

        if ($edit_success) Session::flash('success', 'Đã chỉnh sửa thông tin tuyến đường thành công');
        else Session::flash('fail', 'Đã có lỗi xảy ra');


        return redirect('/routes/'.$id);
    }

    public function delete($id)
    {
        return view('routes.delete', compact('id'));
    }

    public function destroy($id)
    {
        $this->routesRepository->delete($id);

        return redirect('/routes');
    }
}
