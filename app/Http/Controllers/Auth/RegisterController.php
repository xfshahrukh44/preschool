<?php

namespace App\Http\Controllers\Auth;

use App\Profile;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Session;
use Stripe;
use Stripe\Customer;
use Stripe\Charge;

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
            'name' => 'required|string|max:255',
            'lname' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator, 'registerForm');
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        //        Session::flash('message', 'New Account Created Successfully');
        Session::flash('message', 'Thank you for Enrolling. We look forward to working with you!');
        Session::flash('alert-class', 'alert-success');

        if ($request->get('role') == '3') {
            return redirect()->route('teacher_dashboard');
        }

        return $this->registered($request, $user)
            // ?: redirect($this->redirectPath());
            ?: redirect()->route('provider.dashboard');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $ageacceptedd = implode(',', $data['age_accepted'] ?? []);


        $user = User::create([

            'name' => $data['name'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'current_position ' => $data['current_position'],
            'year_of_experience' => $data['year_of_experience'],
            'age_worked_with' => $data['age_worked_with'],
            'about' => $data['about'],
            'hour_open' => $data['hour_open'],
            'age_accepted' => $ageacceptedd,
            'custom_age' => $data['custom_age'],
            'position_accepted' => $data['position_accepted'],
            'about_preschool' => $data['about_preschool'],
            'payment_method' => $data['payment_method'],
            'amount' => $data['amount'],
            'card_token' => $data['stripeToken'],
            'transaction_id' => $data['payment_id'],
            'payer_id' => $data['payer_id'],
            'paypal_token' => $data['_token'],
            'payment_status' => $data['payment_status'],
            'dob' => $data['dob'],
            'loe' => $data['loe'],
            'do_you_currently_work' => $data['do_you_work'],
            'position' => $data['position'],
            'license_number' => $data['license_number'],
            'expiration_date' => $data['expiration_date'],

        ]);

        // dd($data);
        if($data['role'] == 4){

            // try {


            //     try {
            //         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            //         $customer = \Stripe\Customer::create(array(
            //             'email' => $data['email'],
            //             'name' => $data['name'],
            //             'description' => "Provider Signup",
            //             'source'  => $data['stripeToken'],
            //         ));
            //         $customerId = $customer->id;
            //     } catch (Exception $e) {
            //         return redirect()->back()->with('stripe_error', $e->getMessage());
            //     }

            //     try {
            //         $charge = \Stripe\Charge::create(array(
            //             'customer' => $customer->id,
            //             'amount'   => (int)$data['amount'] * 100,
            //             'currency' => 'USD',
            //             'description' => "Provider Signup",
            //             'metadata' => array("name" => $data['name'], "email" => $data['email']),
            //         ));

            //     } catch (Exception $e) {
            //         return redirect()->back()->with('stripe_error', $e->getMessage());
            //     }
            // } catch (Exception $e) {
            //     return redirect()->back()->with('stripe_error', $e->getMessage());
            // }
            $user->transaction_id = $data['payment_id'];
			$user->order_status = $data['payment_status'];
			$user->card_token = $data['payer_id'];
        }


        if ($data['timings']) {
            $user->timings = json_encode($data['timings']);
            $user->save();
        }

        if ($data['services']) {
            $services = [];
            foreach ($data['services'] as $key => $value) {
                $services[] = $key;
            }
            $user->services = $services;
            $user->save();
        }

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        if ($user->profile == null) {
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->localisation = $request->localisation;
            $profile->dob = $request->dob;
            $profile->save();
        }
        activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('Registered');
        $user->assignRole('user');
    }
}
