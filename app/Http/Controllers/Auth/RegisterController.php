<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\Uppercase;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => [
                'required',
                'string',
                'max:255',
                'alpha',
                // new Uppercase
                // new NameRule()    
                ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
                ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
                ],
            'provinces' =>[
                'required',
                'string',
                'max:255',
                'alpha',
                ],
            
            'first_name' => [
                'required',
                'string',
                'max:255',
                'alpha',
                ],

            'middle_name' => [
                // 'required',
                // 'string',
                // 'max:255',
                // 'alpha',
                ],

            'last_name' => [
                'required',
                'string',
                'max:255',
                'alpha',
                ],
            'date_of_birth' => [
                'required',
                'date',
            ]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'provinces' => $data['provinces'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'date_of_birth' => $data['date_of_birth']
            
            ]);

        $role = Role::select('id')->where('name','user')->first();   
        $user->roles()->attach($role);
           
            return $user;

    }
}