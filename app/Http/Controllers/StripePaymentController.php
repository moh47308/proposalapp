<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use Carbon\Carbon;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Bundel;
use App\Models\Companie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request, $package)
    {
        $pack['show_package'] = Package::find($package);
        return view('frontend.stripes.stripe-subscription', $pack);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $transaction_id = Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);
        if($transaction_id)
        {
            $payment_data['payment'] = Carbon::now();
            $payment_data['transaction_id'] = $transaction_id->id;
            $payment_data['status'] = 1;
            $payment_data['type'] = 'subscription';
            $payment_id = Payment::create($payment_data);
            session()->put('payment_id', $payment_id->id);
            return redirect('update/subscription/2');
        }
        Session::flash('danger', 'Try Again!');
        return redirect('dashboard');
    }


    public function updateSubscription(Request $request, $package)
    {
        $data = null;
        $packages = Package::find($package);
        $data['total_allowed_proposals_in_month'] = $packages->proposal_per_month;
        $data['total_allowed_clients_in_year'] = $packages->client_per_year;
        $data['packages_id'] = $packages->id;
        $user = Auth::user();
        $company = Companie::find($user->company_id);
        $data['current_date'] = Carbon::now();
        $company->update($data);
        $payments = Payment::find(session()->get('payment_id'));
        $payments->company_id = $user->company_id;
        $payments->price = $packages->price;
        $payments->user_id = Auth::id();
        $payments->save();
        session()->put('current_plan', $packages->package_name);
        session()->put('allowed_proposal', $company->total_allowed_proposals_in_month);
        session()->put('monthly_proposal', $company->total_proposals_in_month);
        return redirect('dashboard');
    }


    public function bundels(Request $request, $bundels)
    {
        $bundel['show_buldel'] = Bundel::find($bundels);
        return view('frontend.stripes.stripe-bundel', $bundel);
    }


    public function bundelPost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $transaction_id = null;
        $transaction_id = Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);
        if($transaction_id)
        {
            $bundel_data['payment'] = Carbon::now();
            $bundel_data['transaction_id'] = $transaction_id->id;
            $bundel_data['status'] = 1;
            $bundel_data['type'] = 'bundel';
            $bundel_data['user_id'] = Auth::id();
            $bundel_id = Payment::create($bundel_data);
            session()->put('bundel_id', $bundel_id->id);
            return redirect('buy/bundels/1');
        }
        Session::flash('danger', 'Try Again!');
        return redirect('dashboard');
    }

    public function buyBundel(Request $request, $bundel)
    {
        $data = null;
        $user = Auth::user();
        $company = Companie::find($user->company_id);
        $total_allowed_proposals_in_month = $company->total_allowed_proposals_in_month;
        $bundels = Bundel::find($bundel);
        $data['total_allowed_proposals_in_month'] = $total_allowed_proposals_in_month + $bundels->number_allowed;
        $company->update($data);
        $payments = null;
        $payments = Payment::find(session()->get('bundel_id'));
        $payments->price = $bundels->price;
        $payments->save();
        return redirect('dashboard');
    }

}
