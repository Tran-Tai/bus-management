@php 
    echo "[ <br>";
    foreach($routestations as $routestation) {
        echo "[ </br>";
        echo "'route_id' => '" . $routestation->route_id . "',</br>";
        echo "'station_id' => '" . $routestation->station_id . "',</br>";
        echo "'number' => '" . $routestation->number . "',</br>";
        echo "'arrive_time' => '" . $routestation->arrive_time . "'</br>";
        echo "], </br>";
    }
    echo "]";
@endphp