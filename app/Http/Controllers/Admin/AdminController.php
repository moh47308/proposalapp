<?php

namespace App\Http\Controllers\Admin;

use Stripe\Plan;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        return view('backend/dashboard');
    }

    // admin package all
    public function allPackage(Request $request)
    {
        $data['packages'] = Package::all();
        return view('backend.package.list', $data);
    }

    // show package create page
    public function show()
    {
        return view('backend/package/create');
    }

    // store package data
     public function store(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $formFields = $this->validate(
            $request,
            [
                'package_name' => 'required',
                'no_of_proposal' => 'required',
                'no_of_client' => 'required',
                'price' => 'required'
            ]
        );
        $data = $formFields;
        $stripe_id = Plan::create([
            'amount' => $data['price'],
            'currency' => 'gbp',
            'interval' => 'month',
            'product' => [
                'name' => $data['package_name'],
            ],
        ]);
        $package['package_name'] = $data['package_name'];
        $package['proposal_per_month'] = $data['no_of_proposal'];
        $package['client_per_year'] = $data['no_of_client'];
        $package['price'] = $data['price'];
        $package['plan_id'] = $stripe_id->id;
        $package['status'] = '1';
        package::create($package);
        return redirect('admin/package/all');
    }

    // admin package edit
    public function editPackage(Request $request, $package)
    {
        $data['package'] = Package::find($package);
        return view('backend.package.edit', $data);
    }

    // admin package edit
    public function updateEditPackage(Request $request, Package $package)
    {
        $formFields = $this->validate(
            $request,
            [
                'package_name' => 'required',
                'no_of_proposal' => 'required',
                'no_of_client' => 'required',
                'price' => 'required'
            ]
        );
        $data = $formFields;
        $packages['package_name'] = $data['package_name'];
        $packages['proposal_per_month'] = $data['no_of_proposal'];
        $packages['client_per_year'] = $data['no_of_client'];
        $packages['price'] = $data['price'];
        $packages['status'] = '1';
        $package->update($packages);
        return redirect('admin/package/all');
    }

    // admin package delete
    public function deletePackage(Package $package)
    {
        $package->delete();
        return redirect('admin/package/all');
    }
}
