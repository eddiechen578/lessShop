<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login (){
        $input = request()->all();

        $rule = [
            'username'=>[
                'required',
            ],
            'password'=>[
                'required',
            ],
        ];
        $validator = Validator::make($input,$rule);

        if($validator->fails()){
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        if ($validator->passes()) {
            $attempt = Auth::attempt([
                'name' => $input['username'],
                'password' => $input['password']
            ]);

            if ($attempt) {
                return redirect('/admin/home');
            }else{
                return redirect('/login')
                    ->withErrors(['fail'=>'Email or password is wrong!']);
            }

        }

    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }


}
