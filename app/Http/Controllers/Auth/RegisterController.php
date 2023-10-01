<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show() {
        return view("auth.signup");
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255','regex:/^[a-zA-Z ]+$/' ],
            'lastname' => ['required',  'string', 'max:255','regex:/^[a-zA-Z ]+$/' ],
            'username' => ['required', 'string', 'max:255', 'unique:users','regex:/^[a-zA-Z][a-zA-Z0-9]*(?:\.[a-zA-Z0-9]+)*[a-zA-Z0-9]$/'],
            'password' => ['required', 'string', 'min:8'],
            'consent' => ['required'],
        ]);
    }


    protected function store(Request $request)
    {
        // Validate the input data
        $validator = $this->validator($request->all());

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->route('signup')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('signin')->with('success', 'Your Account has been create. Sign In to continue');

    }
}
