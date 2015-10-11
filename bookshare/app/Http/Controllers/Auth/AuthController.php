<?php
namespace BookShare\Http\Controllers\Auth;

use BookShare\Student;
use Validator;
// use BookShare\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use View;
use Input;
use Auth;

use Socialite;
use Illuminate\Routing\Controller;
use Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = 'index';
    protected $loginPath = 'login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        // $this->middleware('guest', ['except' => 'getLogout']);
        $this->student = $student;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        \Log::info('yes');
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        \Log::info('yes');
        $user = Socialite::driver('facebook')->user();

        $token = $user->token;

        $id = $user->getId();
        $name = $user->getName();
        $email = $user->getEmail();
        $avatar = $user->getAvatar();

        \Session::flash('message', 'Welcome '.$name);

        return view('index');


    }

    public function postLogin(Request $request) {

        //pass through validation rules
        $this->validate($request, ['email' => 'required', 'password' => 'required']);

        $credentials = [
            'email' => trim($request->get('email')),
            'password' => trim($request->get('password'))
        ];

        $remember = $request->has('remember');

        //log in the user
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended($this->redirectPath);
        }

        //show error if invalid data entered
        return redirect()->back()->withErrors('Login/Pass do not match')->withInput();
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            \Log::info('register failed');
            $this->throwValidationException($request, $validator);
        }

        Auth::login($this->create($request->all()));

        return redirect('index');
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
            'email' => 'required|email|max:255|unique:students',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'sex' => 'required|max:6',
            'dob' => 'required',
            'phone' => 'required|max:10',
            'street' => 'required|max:255',
            'suburb' => 'required|max:255',
            'post_code' => 'required|max:4',
            'state' => 'required|max:3',
            'password' => 'required|confirmed|min:6',
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
        return Student::create([
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'sex' => $data['sex'],
            'dob' => $data['dob'],
            'phone' => $data['phone'],
            'street' => $data['street'],
            'suburb' => $data['suburb'],
            'post_code' => $data['post_code'],
            'state' => $data['state'],
            'password' => bcrypt($data['password']),
        ]);
    }
}