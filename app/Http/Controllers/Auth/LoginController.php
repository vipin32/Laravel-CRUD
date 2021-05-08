<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\UserActivity;

use Log;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = '/home';

    protected function redirectTo()
    {
        if (auth()->user()) {


            $userCheck = UserActivity::where('user_id', auth()->user()->id)->first();

            // dd(auth()->user()->id);

            // Log::info($userCheck);

            if(empty($userCheck))
            {
                $userActivity = new UserActivity;
                $userActivity->user_id = auth()->user()->id;
                $userActivity->login_type = 'Login';
                $userActivity->save();
            }
            else
            {
                $userCheck->login_type = 'Login';
                $userCheck->updated_at = now();
                $userCheck->update();
            }
           

            return route('user.edit', auth()->user()->id);
        }
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
