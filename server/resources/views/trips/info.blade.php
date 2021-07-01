<div class="form-group">
    <label for="time">Thời gian kết thúc</label> <br>
    <input id="end_hour" type="number" name="end_hour" min="0" max="23" value="{{$end_hour}}" readonly>
    :
    <input id="end_minute" type="number" name="end_minute" min="0" max="59" value="{{$end_minute}}" readonly>
    :
    <input id="end_second" type="number" name="end_second" min="0" max="59" value="{{$end_second}}" readonly>
</div>
<div class="form-group">
    <label for="bus_id">Xe số</label>
    <select class="form-control col-6" name="bus_id" required>
        @forelse ($buses as $bus)
        <option value="{{$bus->id}}">{{$bus->number}}</option>
        @empty
        <option disabled>Không có xe phù hợp</option>
        @endforelse
    </select>
</div>
<div class="form-group">
    <label for="driver_id">Lái xe</label>
    <select class="form-control col-6" name="driver_id" required>
        @forelse ($drivers as $driver)
        <option value="{{$driver->id}}">{{$driver->name}}</option>
        @empty
        <option disabled>Không có nhân viên phù hợp</option>
        @endforelse
    </select>
</div>
<div class="form-group">
    <label for="ticket_collector_id">Soát vé</label>
    <select class="form-control col-6" name="ticket_collector_id" required>
        @forelse ($ticket_collectors as $ticket_collector)
        <option value="{{$ticket_collector->id}}">{{$ticket_collector->name}}</option>
        @empty
        <option disabled>Không có nhân viên phù hợp</option>
        @endforelse
    </select>
</div>