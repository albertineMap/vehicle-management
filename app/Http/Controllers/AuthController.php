<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{

    public function __construct() {
        // $this->middleware('guest', ['except' => [
        //     'register', 'login',
        // ]]);
    }

    public function index()
    {
        return view('pages.login');

    }

    public function registration()
    {
        return view('pages.register');
    }

    // public function home()
    // {
    //     return view('pages.home');

    // }

    /**
     * Register a new user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|between:2,500',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validation->fails()) {
            // session(['error' =>$validation->errors()]);
            return redirect()->back()->withErrors(['msg' => 'invalid credentials']);
        }

        User::create(array_merge(
            $validation->validated(),
        ));

        return redirect("login")->with('success');

    }

    /**
     * Generate token
    */
    protected function generateToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 ,
            'user' => auth()->user()
        ]);
    }

    /**
     * login with jwt token.
    */
    public function login(Request $request){
    	$validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validation->fails()) {
            // session(['error' =>$validation->errors()]);
            return redirect()->back()->withErrors(['msg' => 'invalid credentials']);
        }

        $token = auth()->attempt($validation->validated());

        if ($token) {
            session(['current_user' =>Auth::user()]);
            return redirect('create');
        }else{
            session(['error' =>'invalid credentials']);
            return redirect()->back()->withErrors(['msg' => 'invalid credentials']);
        }
    }

    /**
     * get user
    */
    public function user() {
        return response()->json(auth()->user());
    }

    /**
     * Sign out
    */
    public function signout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login")->withSuccess('you are log out');
    }

}
