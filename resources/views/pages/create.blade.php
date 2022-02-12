@extends('layouts.main')
@section('content')
    <div class="row  main_menu">
        <p><h4>Find a vehicle</h4></p>
        <hr>
        {{-- form --}}
        <div class="align-items-center">
            {{-- <form> --}}
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <div class="row ">
                    <div class="col-3 form-group">
                        <label>Vin</label>
                        <input type="text" class="form-control" name = 'vin' id = 'vin' value="{{ $vehicle->vin }}">
                    </div>
                    <div class="col">
                        <button class="btn btn-secondary btn-sm" id = 'btn_find_vehicle'>Find</button>
                    </div>
                </div><hr>

                <div class="row">
                    <div class="col form-group">
                        <label>Make</label>
                        <input type="text" class="form-control" name = 'make' id = 'make' value="{{ $vehicle->make }}">
                    </div>
                    <div class="col form-group">
                        <label>Model</label>
                        <input type="text" class="form-control" name = 'model' id = 'model' value="{{ $vehicle->model }}">
                    </div>
                    <div class="col form-group">
                        <label>ModelYear</label>
                        <input type="text" class="form-control" name = 'model_year' id = 'model_year' value="{{ $vehicle->model_year }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label>Trim</label>
                        <input type="text" class="form-control" name = 'trim' id = 'trim' value="{{ $vehicle->trim }}">
                    </div>
                    <div class="col form-group">
                        <label>Driver Type</label>
                        <input type="text" class="form-control" name = 'driver_type' id ='driver_type' value="{{ $vehicle->drive_type }}">
                    </div>
                    <div class="col form-group">
                        <label>Fuel Type Primary</label>
                        <input type="text" class="form-control" name = 'fuel_type_primary' id ='fuel_type_primary' value="{{ $vehicle->fuel_type_primary }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label>Body Class</label>
                        <input type="text" class="form-control" name = 'body_class' id = 'body_class' value="{{ $vehicle->body_class }}">
                    </div>
                    <div class="col form-group">
                        <label>Vehicle Type</label>
                        <input type="text" class="form-control" name = 'vehicle_type' id ='vehicle_type' value="{{ $vehicle->vehicle_type }}">
                    </div>
                </div><hr>
                <button id="btn_add_vehicle" class='btn btn-secondary btn-sm'>Submit</button>
            </form>
        </div>
    </div>
@stop


