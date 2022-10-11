<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Package;
use App\Models\Service;
use App\Models\Proposal;
use App\Models\Companie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Dashboard extends Controller
{
    // Show register create form
    public function index()
    {
        $user = Auth::user();
        $company_id = $user->company_id;
        if($user)
        {
            $date = \Carbon\Carbon::today()->subDays(30);
            $data['company_data'] = Companie::find($company_id);
            $data['user_data'] = User::find($user->id);
            session()->put('logo', $data['company_data']->logo);



            // work on proposals on dashboard
            $company_id = $user->company_id;
            $data['proposals'] = Proposal::where('company_id', $company_id)->where('created_at', '>=',$date)->count();
            $data['proposals_accepted'] = Proposal::where('company_id', $company_id)->where('status', 'Accepted')->where('created_at', '>=',$date)->count();
            $data['proposals_waiting'] = Proposal::where('company_id', $company_id)->where('status', 'Send')->where('created_at', '>=',$date)->count();
            $data['proposals_rejected'] = Proposal::where('company_id', $company_id)->where('status', 'Rejected')->where('created_at', '>=',$date)->count();



            // work on services on dashboard
            $data['services'] = Service::where('company_id', $company_id)->where('created_at', '>=',$date)->count();
            $data['fix_fee'] = Service::where('company_id', $company_id)->where('service_type_id', 1)->where('created_at', '>=',$date)->count();
            $data['volume_base'] = Service::where('company_id', $company_id)->where('service_type_id', 2)->where('created_at', '>=',$date)->count();
            $data['turn_over'] = Service::where('company_id', $company_id)->where('service_type_id', 3)->where('created_at', '>=',$date)->count();


            $data['clients'] = Client::where('company_id',$company_id)->where('created_at', '>=',$date)->count();
            $data['l_company'] = Client::where('company_id', $company_id)->where('created_at', '>=',$date)->count();
            $data['l_l_partnership'] = Client::where('company_id', $company_id)->where('created_at', '>=',$date)->count();
            $data['s_trader'] = Client::where('company_id', $company_id)->where('created_at', '>=',$date)->count();
            return view('frontend.users.dashboard', $data); 
        }
        else
        {
            return redirect('login');
        }

    }
}
