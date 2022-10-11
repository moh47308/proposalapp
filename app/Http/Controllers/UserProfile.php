<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Companie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Controller
{
    // show profile page
    public function show()
    {
        $user_id = Auth::id();
        $user['user_data'] = User::find($user_id);
        return view('frontend.users.profile', $user);
    }


    // edit profile page
    public function edit(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'company_name' => 'required',
            'website' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'required',
            'address_line_3' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'logo' => 'required'
        ]);
        if($request->hasFile('logo'))
        {
            $imageName = time().'.'.$request->logo->extension(); 
            $request->logo->storeAs('public/company_images', $imageName);
        }
        $user_id = Auth::id();
        $data = User::find($user_id);
        $data->first_name = $formFields['first_name'];
        $data->last_name = $formFields['last_name'];
        $data->email = $formFields['email'];
        $data->save();
        $company_data = Companie::find($data->company_id);
        $company_data->name = $formFields['company_name'];
        $company_data->website = $formFields['website'];
        $company_data->address_line_1 = $formFields['address_line_1'];
        $company_data->address_line_2 = $formFields['address_line_2'];
        $company_data->address_line_3 = $formFields['address_line_3'];
        $company_data->phone = $formFields['phone'];
        $company_data->city = $formFields['city'];
        $company_data->country = $formFields['country'];
        $company_data->zipcode = $formFields['zipcode'];
        $company_data->logo = $imageName;
        $company_data->save();
        return redirect('dashboard')->with('success', "Successfully updated");
    }
}
