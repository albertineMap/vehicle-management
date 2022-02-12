@extends('layouts.main')
@section('content')
    <div class="row" id = "vehicle_info">
        <p><h4>List of vehicles</h4></p><i class="glyphicon glyphicon-user"></i>
        <hr>
        {{-- list --}}
        <div class="align-items-center">
            <table class="table table-bordered  table-hover">
                <thead class='thead-dark'>
                    <tr>
                        <td>Vin</td>
                        <td>Make</td>
                        <td>Model</td>
                        <td>Model Year</td>
                        <td>Trim</td>
                        <td>Body Class</td>
                        <td>Vehicle Type</td>
                        <td>Drive Type</td>
                        <td>Fuel Type</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @if(count($vehicles)>0)
                        @foreach ($vehicles as $data)
                            <tr>
                                <td> {{$data['vin']}}</td>
                                <td> {{$data['make']}}</td>
                                <td> {{$data['model']}}</td>
                                <td> {{$data['model_year']}}</td>
                                <td> {{$data['trim']}}</td>
                                <td> {{$data['body_class']}}</td>
                                <td> {{$data['vehicle_type']}}</td>
                                <td> {{$data['driver_type']}}</td>
                                <td> {{$data['fuel_type_primary']}}</td>
                                <td class='other_link'><a href=" {{ route('edit',$data['id']) }}">edit</a></td>
                                @csrf
                                @method('post')
                                <td class='other_link'><a href="#">suppr</a></td>
                                {{-- <td class='other_link'><a href=" {{ route('delete',$data['id']) }}">suppr</a></td> --}}
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop


