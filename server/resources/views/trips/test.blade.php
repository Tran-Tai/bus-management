@php 
    echo "[ <br>";
    foreach($schedules as $schedule) {
        echo "[ </br>";
        echo "'route_name_id' => '" . $schedule->route_name_id . "',</br>";
        echo "'route_id' => '" . $schedule->route_id . "',</br>";
        echo "'number' => '" . $schedule->number . "',</br>";
        echo "'start_time' => '" . $schedule->start_time . "',</br>";
        echo "'group_number' => '" . $schedule->group_number . "'</br>";
        echo "], </br>";
    }
    echo "]";
@endphp