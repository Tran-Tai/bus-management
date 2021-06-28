<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\RouteNamesRepository;
use App\Repositories\Contracts\RoutesRepository;
use App\Repositories\Contracts\RouteStationRepository;
use App\Repositories\Contracts\StationsRepository;
use App\Repositories\Contracts\IntersectionsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoutesController extends Controller
{
    protected $routesRepository;
    protected $routeNamesRepository;
    protected $routeStationRepository;
    protected $stationsRepository;
    protected $intersectionsRepository;

    public function __construct(
        RoutesRepository $routesRepository,
        RouteNamesRepository $routeNamesRepository,
        RouteStationRepository $routeStationRepository,
        StationsRepository $stationsRepository,
        IntersectionsRepository $intersectionsRepository
    ) {
        $this->routesRepository = $routesRepository;
        $this->routeNamesRepository = $routeNamesRepository;
        $this->routeStationRepository = $routeStationRepository;
        $this->stationsRepository = $stationsRepository;
        $this->intersectionsRepository = $intersectionsRepository;
    }

    public function index()
    {
        $routes = $this->routesRepository->getAll();

        return view('routes.list', compact('routes'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $routes = $this->routesRepository->search($keyword);

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

    public function createStation($id, $number)
    {
        $list_stations = $this->stationsRepository->getAll();
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
        return view('routes.createstation', compact('id', 'number', 'route', 'stations', 'list_stations'));
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

    public function storeStation($id, $number, Request $request)
    {
        $station_id = $request->station_id;
        if ($number == 1) {
            $time = 0;
            $attributes = [
                'first_station_id' => $station_id
            ];
            $this->routesRepository->updateFirst($id, $attributes);
        } else {
            $time = $this->routeStationRepository->getByNumber($number - 1, $id)->arrive_time;
        }
        $minute = $request->minute;
        $second = $request->second;
        $time += $minute * 60 + $second;

        $route = $this->routesRepository->get($id);
        
        $direction = $route->direction;
        $route_name_id = $route->route_name_id;
        $route_number = $this->routeNamesRepository->get($route_name_id)->number;
        $this->stationsRepository->insertRoute($station_id, $id, $route_number, $direction);

        $attributes = [
            'total_station' => $number,
            'last_station_id' => $station_id,
            'total_time' => $time
        ];
        $this->routesRepository->updateLast($id, $attributes);
        $route_stations = $this->routeStationRepository->getRoutesByStation($station_id);
        $intersections = $this->intersectionsRepository->getByNumber($id, $number - 1);
        // dd($intersections);
        $prev_array = [];
        foreach ($intersections as $intersection) {
            if ($intersection->first_route_id == $id) {
                if (!isset($prev_array[$intersection->second_route_id])) {
                    $prev_array[$intersection->second_route_id] = [];
                }
                $prev_array[$intersection->second_route_id][] = $intersection->second_route_number;
                // $prev_route = $intersections->second_route_id;
                // $prev_number = $intersections->second_route_number;
            }
            if ($intersection->second_route_id == $id) {
                if (!isset($prev_array[$intersection->first_route_id])) {
                    $prev_array[$intersection->first_route_id] = [];
                }
                $prev_array[$intersection->first_route_id][] = $intersection->first_route_number;
                // $prev_route = $intersections->first_route_id;
                // $prev_number = $intersections->first_route_number;
            }

            // if ($intersection->status == 0) {
            //     $continue = false;
            //     foreach ($route_stations as $route_station) {
            //         if ($route_station->route_id == $prev_route && $route_station->number - 1 == $prev_number) {
            //             $continue = true;
            //             break;
            //         }
            //     }
            //     if (!$continue) {
            //         $this->intersectionsRepository->updateStatus($intersection->id);
            //     }
            // }
        }

        foreach ($route_stations as $route_station) {
            if (isset($prev_array[$route_station->route_id]) && ($prev_array[$route_station->route_id] == $route_station->number - 1)) {
                $attributes = [
                    'first_route_id' => $route_station->route_id,
                    'second_route_id' => $id,
                    'station_id' => $station_id,
                    'first_route_number' => $route_station->number,
                    'second_route_number' => $number,
                    'status' => 0
                ];
                $this->intersectionsRepository->create($attributes);
            } else {
                $attributes = [
                    'first_route_id' => $route_station->route_id,
                    'second_route_id' => $id,
                    'station_id' => $station_id,
                    'first_route_number' => $route_station->number,
                    'second_route_number' => $number,
                    'status' => 1
                ];
                $this->intersectionsRepository->create($attributes);
            }
        }

        $attributes = [
            'route_id' => $id,
            'station_id' => $station_id,
            'number' => $number,
            'arrive_time' => $time
        ];
        $this->routeStationRepository->create($attributes);

        return redirect('/routes/create/' . $id . '/' . $number + 1);
    }

    public function store(Request $request)
    {
        $direction = $request->direction;
        $routename_id = $request->routename_id;
        $attributes = [
            'route_name_id' => $routename_id,
            'direction' => $direction,
            'total_station' => 0,
            'first_station_id' => 1,
            'last_station_id' => 1,
            'total_time' => 0,
            'status' => 1
        ];
        $route_id = $this->routesRepository->create($attributes);
        $store_success = $route_id;

        $attributes = [
            'route_id' => $route_id,
            'direction' => $direction
        ];
        $this->routeNamesRepository->updateRoute($routename_id, $attributes);


        if ($store_success) Session::flash('success', 'Đã thêm thông tin tuyến đường thành công');
        else Session::flash('fail', 'Đã có lỗi xảy ra');

        return redirect('/routes/create/' . $route_id . '/1');
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


        return redirect('/routes/' . $id);
    }

    public function delete($id)
    {
        $route = $this->routesRepository->get($id);
        $id = $route->route_name_id;
        return view('routes.delete', compact('id'));
    }

    public function destroy($id)
    {
        $routes = $this->routesRepository->getByRouteName($id);
        foreach ($routes as $route) {
            $this->routesRepository->delete($route->id);
        }
        $this->routeNamesRepository->delete($id);

        return redirect('/routes');
    }
}
