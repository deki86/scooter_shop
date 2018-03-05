<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\verifyMail;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/register';

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
            'name' => 'required|string|min:3|max:255',
            'lastname' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|min:3',
            'city' => 'required|min:3',
            'country' => 'required|min:3',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'verification_token' => User::generateVerificationCode(),
        ]);

        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
        ?: redirect($this->redirectPath())->with('status', 'You are successfully registered, Please verify your account!');
    }
    /**
     * Send verification email to users who just registered
     * @param  array $user
     * @return void
     */
    public function sendEmail($user)
    {
        Mail::to($user['email'])->send(new verifyMail($user));
    }

    /**
     * Verification users
     * @param  string $email
     * @param  string $verification_token
     * @return mixed
     */
    public function sendEmailDone($email, $verification_token)
    {
        $user = User::where(['email' => $email, 'verification_token' => $verification_token])->first();
        if ($user) {
            $updated = User::where(['email' => $email, 'verification_token' => $verification_token])
                ->update(['verified' => User::VERIFIED_USER, 'verification_token' => null]);
            return redirect('/login')->with('success', 'Your email is now activated!');
        } else {
            return redirect('/login')->with('error', 'Something goes wrong!');
        }
    }
}
