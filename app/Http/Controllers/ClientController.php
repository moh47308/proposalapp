<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Proposal;
use App\Models\Companie;
use App\Models\CompanyType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    // show proposal list page
    public function index()
    {       /* $data['clients'] = auth()->user()->client()->get();*/
        $user = Auth::user();
        $company_id = $user->company_id;
        $data['company'] = Companie::find($company_id);
        $data['clients'] = Client::where('company_id',$company_id)->get();
        return view('frontend.client.list',  $data);
    }


    // show create form
    public function create()
    {
        $company_types = DB::table('company_types')->get();
        return view("frontend.client.create", ['company_types' => $company_types]);
    }


    // store client info
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email',  Rule::unique('clients', 'email')],
            'phone' => 'required',
//            'address_line_1' => 'required',
//            'address_line_2' => 'required',
            'address_line_3' => 'required',
            'city' => 'required',
            'post_code' => 'required',
            'country' => 'required'
        ]);
        if($request->input('middle_name')){
            $formFields['middle_name'] = $request->input('middle_name');   
        }else{
            $formFields['middle_name'] = null;
        }
        if($request->input('middle_name')){
            $formFields['middle_name'] = $request->input('middle_name');   
        }else{
            $formFields['middle_name'] = null;
        }
        if($request->input('address_line_1')){
            $formFields['address_line_1'] = $request->input('address_line_1');   
        }else{
            $formFields['address_line_1'] = null;
        }
        if($request->input('address_line_2')){
            $formFields['address_line_2'] = $request->input('address_line_2');   
        }else{
            $formFields['address_line_2'] = null;
        }
        $formFields["company_id"] = Auth::user()->company_id;
        $client = Client::create($formFields);
        if($client)
        {
                $user = Auth::user();
                $company = Companie::find($user->company_id);
                $company_data['total_clients_in_year'] = $company->total_clients_in_year + 1;
                $company->update($company_data);
            return redirect('client/list')->with('success', 'Successfully created!!');
        }
        else
        {
            return redirect('client/list')->with('danger', 'Try again!!');
        }
    }


    // show edit client
    public function edit(Request $request, $client_id)
    {
        $client['clients'] = Client::find($client_id);
        $client['company_types'] = CompanyType::all();
        return view("frontend.client.edit", $client);
    }


    //update client
    public function update(Request $request, Client $client)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
//            'address_line_1' => 'required',
//            'address_line_2' => 'required',
            'address_line_3' => 'required',
            'city' => 'required',
            'post_code' => 'required',
            'country' => 'required'
        ]);
        if($request->input('middle_name')){
            $formFields['middle_name'] = $request->input('middle_name');   
        }else{
            $formFields['middle_name'] = null;
        }
        if($request->input('address_line_1')){
            $formFields['address_line_1'] = $request->input('address_line_1');   
        }else{
            $formFields['address_line_1'] = null;
        }
        if($request->input('address_line_2')){
            $formFields['address_line_2'] = $request->input('address_line_2');   
        }else{
            $formFields['address_line_2'] = null;
        }
        $clients = $client->update($formFields);
        if($clients)
        {
            return redirect('client/list')->with('success', 'Successfully updated!!');
        }
        else
        {
            return redirect('client/list')->with('danger', 'Try again!!');
        }
    }


    //delete client
    public function delete(Client $client)
    {
        $client->delete();
        return redirect("/client/list");
    }
}
