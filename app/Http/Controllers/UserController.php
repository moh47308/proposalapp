<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Package;
use App\Models\Companie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // show register page
    public function index()
    {
        $data['company_types'] = DB::table('company_types')->get();
        return view('frontend.users.register', $data);
    }


    //show login form
    public function login()
    {
        return view('frontend.users.login');
    }


    // Authenticate user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields))
        {
            if(Auth::user() &&  Auth::user()->role_id == 1){
                $request->session()->regenerate();
                return redirect('admin/dashboard');
            } else {
                $user = Auth::user();
                $company_id = $user->company_id;
                $data['company_data'] = Companie::find($company_id);
                $data['user_data'] = User::find($user->id);
                session()->put('company_name', $data['company_data']->name);
                session()->put('first_name', $data['user_data']->first_name);
                session()->put('last_name', $data['user_data']->last_name);
                session()->put('logo', $data['company_data']->logo);
                session()->put('allowed_proposal', $data['company_data']->total_allowed_proposals_in_month);
                session()->put('monthly_proposal', $data['company_data']->total_proposals_in_month);
                $packages = Package::find($data['company_data']->packages_id);
                session()->put('current_plan', $packages->package_name);
                $request->session()->regenerate();
                return redirect('dashboard');
            }

        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }


    // store user registration
    public function store(Request $request)
    {
        $formFields = $this->validate(
            $request,
            [
                'company_name' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'contact' => 'required',
                'password' => 'required|confirmed|min:6',
                'terms' => 'required'
            ]
        );
        $data = $formFields;
        $company["name"] = $data["company_name"];
        $company['created_at'] = Carbon::now();
        $company['updated_at'] = Carbon::now();
        $packages = Package::find(1);
        $company['total_allowed_proposals_in_month'] = $packages->proposal_per_month;
        $company['total_allowed_clients_in_year'] = $packages->client_per_year;
        $company['current_date'] = Carbon::now();
        $company['packages_id'] = 1;
        $company_id = DB::table('companies')->insertGetId($company);
        unset($data["company_name"]);
        unset($data["company_type_id"]);
        unset($data["conf_password"]);
        $data['status'] = '1';
        $data["company_id"] = $company_id;
        $data["role_id"] = '2';
        $data["password"] = bcrypt($data['password']);
        $data["terms"] = $request->input('terms') ? true : false;
        $user = User::create($data);
        auth()->login($user);
        $user_id = Auth::id();
        auth()->login($user, $request->get('remember'));
        $user = Auth::user();
        $company_id = $user->company_id;
        $data['company_data'] = Companie::find($company_id);
        $data['user_data'] = User::find($user->id);
        session()->put('company_name', $data['company_data']->name);
        session()->put('first_name', $data['user_data']->first_name);
        session()->put('last_name', $data['user_data']->last_name);
        session()->put('logo', $data['company_data']->logo);
        session()->put('allowed_proposal', $data['company_data']->total_allowed_proposals_in_month);
        session()->put('monthly_proposal', $data['company_data']->total_proposals_in_month);
        session()->put('current_plan', $packages->package_name);
        return redirect('dashboard');
    }


    // user logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
