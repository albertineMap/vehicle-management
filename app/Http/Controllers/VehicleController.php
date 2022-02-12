<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserVehicles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class VehicleController extends Controller
{

    public function __construct() {
        $this->middleware('is_connect');
    }

    // list of all vehicles
    public function index()
    {
        $vehicles = UserVehicles::all();
        return view('pages.vehicles')->with(compact('vehicles'));
    }

    //return view of list of vehicle
    public function list()
    {
        return view('pages.vehicles');
    }

    /**
     * Get all of the vehicles for the user.
     */
     public function user_vehicles(Request $request)
     {
        $user =  $request->session()->get('current_user');
        $vehicles = UserVehicles::where('user_id',$user->id)
                    ->orderBy('id', 'desc')
                    ->get()
                    ->toArray();
        return view('pages.vehicles')->with(compact('vehicles'));
     }

     /**
     * return view to create a new vehicle user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle =new UserVehicles();
        return view('pages.create', compact('vehicle'));
    }


    /**
     * Store a new vehicle user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vin' => 'required|max:255'
        ]);
        $vehicle = new UserVehicles();
        $user =  $request->session()->get('current_user');

        $vehicle->fill($request->all());
        $vehicle->user_id = $user->id;
        $vehicle->save();
        return redirect("user/list")->withSuccess('success');
    }

    /**
     * return view to edit a vehicle.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = UserVehicles::findOrFail($id);
        return view('pages.edit', compact('vehicle'));
    }

    // edit a vehicle .
    public function update(Request $request, $id)
    {
        $request->validate([
            'vin' => 'required|max:255'
        ]);
        $data = request()->except(['_token']);
        UserVehicles::whereId($id)->update($data);
        return redirect("user/list")->withSuccess('success');

    }
    /**
     * delete a vehicle .
     */
    public function destroy(Request $request,UserVehicles $userVehicles)
    {
        $userVehicles->delete();
        return redirect("user/list")->withSuccess('success');
    }

}
