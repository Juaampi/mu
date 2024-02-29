<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = '/';

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
            'username' => 'required|min:4|max:10',     
            'name' => 'required|min:4|max:15',
            'code' => 'required|min:4|max:4',
            'password' => 'required|min:6|max:10|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $request = request();                
        if($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img-perfil/', $name);            
        }else{
            $name = 'avatar.jpg';
        }
       
        
        return User::create([
            'memb___id' => $data['username'],            
            'memb__pwd' => bcrypt($data['password']),
            'memb_name' => $data['name'],
            'mail_addr' => $data['email'],
            'sno__numb' => 'sno',            
			'bloc_code' => '0',
			'ctl1_code' => '0',
            'memb__pwd' => $data['password'],
            'img' => $name,
            'security' => $data['code'],
            'country' => $data['pais']
        ]);
    }
}
