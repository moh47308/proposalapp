<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Companie;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    // view services list
    public function index()
    {
        $services = auth()->user()->services()->get();
        return view('frontend.service.list', ['services' => $services]);
    }


    // create service
    public function create()
    {
        $data['service_types'] = DB::table('service_types')->get();
        return view("frontend.service.create", $data);
    }


    // store service info
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'service_title' => 'required',
            'service_type_id' => 'required',
            'description' => 'required',
        ]);

        $data = $request->input();
            if (!$request->input("one_off")) {
                unset($data["one_off"]);
            } else {
                $data["value"] = $data["one_off"];
                unset($data["oneo_ff"]);
            }
            if (!$request->input("monthly")) {
                unset($data["monthly"]);
            } else {
                $data["value"] = $data["monthly"];
                unset($data["monthly"]);
            }
            if (!$request->input("quarterly")) {
                unset($data["quarterly"]);
            } else {
                $data["value"] = $data["quarterly"];
                unset($data["quarterly"]);
            }
            if (!$request->input("annual")) {
                unset($data["annual"]);
            } else {
                $data["value"] = $data["annual"];
                unset($data["annual"]);
            }
            if (!$request->input("volume_base")) {
                unset($data["volume_base"]);
            } else {
            $data["value"] = $data["volume_base"];
                unset($data["volume_base"]);
            }

            $range_based = array();
            if ($request->input("service_type_id") != 6) {
                unset($data["range[]"]);
                unset($data["price[]"]);
            } else {
                $i = 0;
                foreach ($data["range"] as $range){
                    $range_data["range"] = $range;
                    $range_data["price"] = $data["price"][$i];
                    array_push($range_based,$range_data);
                    $i++;
                }
                $data["value"] = json_encode($range_based);
                unset($data["range[]"]);
                unset($data["price[]"]);
            }
            $service["service_title"] =$data["service_title"];
            $service["service_type_id"] =  $data["service_type_id"];
            $service["company_id"] = Auth::user()->company_id;
            $service["value"] =$data["value"];
            $service["description"] = $data["description"];
            $count = Service::create($service);
            if($count)
            {
                return redirect('service/list')->with('success', 'Successfully created!!');
            }
            else
            {
                return redirect('service/list')->with('danger', 'Try again!!');
            }
    }


    // edit service
    public function edit(Service $service)
    {
        $service['service'] = $service;
        $service['service_types'] = DB::table('service_types')->get();
        return view("frontend.service.edit", $service);
    }


    //update service
    public function update(Request $request, Service $service)
    {
        $formFields = $request->validate([
            'service_title' => 'required',
            'service_type_id' => 'required',
            'description' => 'required',
        ]);
        $data = $request->input();
            if ($request->input("service_type_id")== 1) {
               $data["value"] = $data["one_off"];
            }
            elseif ($request->input("service_type_id")==2) {
                $data["value"] = $data["monthly"];
            }
            elseif ($request->input("service_type_id")==3) {
                $data["value"] = $data["quarterly"];
            }
            elseif ($request->input("service_type_id")==4) {
                $data["value"] = $data["annual"];
            }
            elseif ($request->input("service_type_id")==5) {
                $data["value"] = $data["volume_base"];
            }else {
                $i = 0;
                $range_based = array();
                foreach ($data["range"] as $range){
                    $range_data["range"] = $range;
                    $range_data["price"] = $data["price"][$i];

                    array_push($range_based,$range_data);
                    $i++;
                }
                $data["value"] = json_encode($range_based);
            }
            unset($data["one_off"]);
            unset($data["monthly"]);
            unset($data["quarterly"]);
            unset($data["annual"]);
            unset($data["volume_base"]);
            unset($data["range[]"]);
            unset($data["price[]"]);
            $formFields["service_title"] =$data["service_title"];
            $formFields["service_type_id"] =  $data["service_type_id"];
            $formFields["value"] =$data["value"];
            $formFields["description"] = $data["description"];
            $services = $service->update($formFields);
            if($services)
            {
                return redirect('service/list')->with('success', 'Successfully updated!!');
            }
            else
            {
                return redirect('service/list')->with('danger', 'Try again!!');
            }
    }


    //delete service
    public function delete(Service $service)
    {
        $service->delete();
        return redirect("/service/list");
    }
}
