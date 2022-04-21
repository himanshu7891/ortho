@php
$hours = Admin::HoursArray();
$hoursDetail = [];
if($location->id){
    $hoursDetail = App\Models\LocationHoursDetail::where('location_id',$location->id)->get();
    foreach($hoursDetail as $hD){
        echo '<input type="hidden" name="hourId[]" value="'.$hD->id.'">';
    }
}
@endphp

<div class="form-group">
    <label class="required"><b>{{ trans('cruds.location.fields.hours') }}</b></label><br>
    <label><b>{{ trans('cruds.location.fields.monday') }} : </b></label>
    <select name="opening_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[0])) {{ $hour == $hoursDetail[0]['opening_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>
    <select name="closing_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[0])) {{ $hour == $hoursDetail[0]['closing_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>

    <br>
    <label><b>{{ trans('cruds.location.fields.tuesday') }} : </b></label>
    <select name="opening_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[1])) {{ $hour == $hoursDetail[1]['opening_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>
    <select name="closing_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[1])) {{ $hour == $hoursDetail[1]['closing_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>

    <br>
    <label><b>{{ trans('cruds.location.fields.wednesday') }} : </b></label>
    <select name="opening_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[2])) {{ $hour == $hoursDetail[2]['opening_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>
    <select name="closing_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[2])) {{ $hour == $hoursDetail[2]['closing_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>

    <br>
    <label><b>{{ trans('cruds.location.fields.thursday') }} : </b></label>
    <select name="opening_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[3])) {{ $hour == $hoursDetail[3]['opening_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>
    <select name="closing_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[3])) {{ $hour == $hoursDetail[3]['closing_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>

    <br>
    <label><b>{{ trans('cruds.location.fields.friday') }} : </b></label>
    <select name="opening_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[4])) {{ $hour == $hoursDetail[4]['opening_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>
    <select name="closing_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[4])) {{ $hour == $hoursDetail[4]['closing_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>
    
    <br>
    <label><b>{{ trans('cruds.location.fields.saturday') }} : </b></label>
    <select name="opening_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[5])) {{ $hour == $hoursDetail[5]['opening_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>
    <select name="closing_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[5])) {{ $hour == $hoursDetail[5]['closing_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>

    <br>
    <label><b>{{ trans('cruds.location.fields.sunday') }} : </b></label>
    <select name="opening_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[6])) {{ $hour == $hoursDetail[6]['opening_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>
    <select name="closing_time[]" class="form-control">
        <option value=""></option>
        @foreach($hours as $hour)
            <option value="{{$hour}}" @if(isset($hoursDetail[6])) {{ $hour == $hoursDetail[6]['closing_time'] ? 'selected' : '' }} @endif>{{$hour}}</option>
        @endforeach
    </select>
</div>