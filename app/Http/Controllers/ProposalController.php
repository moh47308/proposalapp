<?php

namespace App\Http\Controllers;

use Mail;
use Carbon\Carbon;
use App\Jobs\sendMail;
use App\Models\Client;
use App\Models\Service;
use App\Models\Package;
use App\Models\Proposal;
use App\Models\Companie;
use App\Mail\MailSender;
use App\Mail\contractSend;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ProposalService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProposalController extends Controller
{
    // show proposal list page
    public function index()
    {
        $proposal['proposals'] = auth()->user()->proposal()->get();
        return view('frontend.proposal.list', $proposal);
    }


    // show company
    public function showCompanys()
    {
        $data['clients'] = auth()->user()->client()->get();
        return view('frontend.proposal.create', $data);
    }


    // select company
    public function selectCompany(Request $request)
    {
        if(session()->has('proposal_id')){
            $request->session()->put('client_id', $request->input('client_id'));
            //       client  billing option work
            if ($request->input('btnradio') == "custom"){
                $data["billing_option"] = "custom";
                $data["billing_sub_option"] = $request->input('custom_option');
                $data["billing_custom_option"] = $request->input('custom_value');
            }elseif($request->input('btnradio') == "On Acceptance" || $request->input('btnradio') == "On Completion" ){
                $data["billing_option"] = "time billing";
                $data["billing_sub_option"] = $request->input('btnradio');
                if ($data["billing_sub_option"] == "On Completion"){
                    $data["billing_custom_option"] = $request->input('completion_date');
                }
            }else{
                $data["billing_option"] = "recurring";
                $data["billing_sub_option"] = $request->input('btnradio');
            }

            $user = Auth::user();
            $data["client_id"] = $request->client_id;
            $data["ref_no"] = random_int(100, 999);
            $data["company_id"] = $user->company_id;
            $proposal_id = Proposal::find(session()->get('proposal_id'));
            $proposal_id->update($data);
            $request->session()->put('proposal_id', session()->get('proposal_id'));
            return redirect('proposal/create');
        } else {

            $request->session()->put('client_id', $request->input('client_id'));
            //       client  billing option work
            if ($request->input('btnradio') == "custom"){
                $data["billing_option"] = "custom";
                $data["billing_sub_option"] = $request->input('custom_option');
                $data["billing_custom_option"] = $request->input('custom_value');
            }elseif($request->input('btnradio') == "On Acceptance" || $request->input('btnradio') == "On Completion" ){
                $data["billing_option"] = "time billing";
                $data["billing_sub_option"] = $request->input('btnradio');
                if ($data["billing_sub_option"] == "On Completion"){
                    $data["billing_custom_option"] = $request->input('completion_date');
                }
            }else{
                $data["billing_option"] = "recurring";
                $data["billing_sub_option"] = $request->input('btnradio');
            }
            $user = Auth::user();
            $data["client_id"] = $request->client_id;
            $data["ref_no"] = random_int(100, 999);
            $data["company_id"] = $user->company_id;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $company = Companie::find($user->company_id);
            $start_date = $company->current_date;
            if($data['created_at'] < date('Y-m-d', strtotime('+1 month', strtotime($start_date)))){
                $proposal_id = DB::table('proposals')->insertGetId($data);
                $request->session()->put('proposal_id', $proposal_id);
                if($proposal_id){
                    $user = Auth::user();
                    $company = Companie::find($user->company_id);
                    $company_data['total_proposals_in_month'] = $company->total_proposals_in_month + 1;
                    $company->update($company_data);
                    session()->put('allowed_proposal', $company->total_allowed_proposals_in_month);
                    session()->put('monthly_proposal', $company_data['total_proposals_in_month']);
                }    
            }else{
                $company->current_date = Carbon::now();
                $company->total_proposals_in_month = 0;
                $company->save();
                return redirect('proposal/list')->with('msg', 'Please update solo plan');
            }
            return redirect('proposal/create');

        }
    }

    public function createProposal(){

        Session::forget('proposal_id');
        Session::forget('client_id');
        Session::forget('proposal_services_id');
        return redirect('proposal/create');
    }

    //  create proposal
    public function create(Request $request)
    {
        $data['service_detail'] = null;
        $data['selected_client'] = null;
        if ($request->session()->has("service_id")) {
            $data['service_detail'] = DB::table('services')->find(\session()->get("service_id"));
        }
        $data['selected_service_detail'] = null;
        if ($request->session()->get("proposal_service_id")) {
            $data['selected_service_detail'] = ProposalService::find(\session()->get("proposal_service_id"));
        }
        $data["proposal_details"] = Proposal::find(\session()->get("proposal_id"));

        $data['clients'] = auth()->user()->client()->get();
        if ($request->session()->get("client_id")){
            $data['selected_client'] = Client::find(\session()->get("client_id"));
       }
        $data['services'] = auth()->user()->services()->get();

        return view('frontend.proposal.create', $data);
    }


    // select service
    public function selectService(Request $request)
    {
        if ($request->input('service_id'))
        {
            $request->session()->put('service_id', $request->input('service_id'));
            $service_type = DB::table('services')->find($request->input('service_id'));
            $request->session()->put('service_type_id', $service_type->service_type_id);
        }
        return redirect('proposal/create');
    }


    // add service to proposal
    public function addServiceToProposal(Request $request)
    {
        $service_detail =  Service::find(\session()->get("service_id"));

        if (\session()->get('service_type_id') == 1 || \session()->get('service_type_id') == 2 || \session()->get('service_type_id') == 3 || \session()->get('service_type_id') == 4)
        {
            $data["price"] = $service_detail->value;
            $data["service_id"] =  \session()->get("service_id");
            $data["proposal_id"] = \session()->get("proposal_id");
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            if ($request->session()->get('proposal_service_id'))
            {
                $proposal_service=ProposalService::find(\session()->get('proposal_service_id'));
                $proposal_service->price = $service_detail->value;
                $proposal_service->service_id =  \session()->get("service_id");
                $serviceEdit = $proposal_service->save();
            }
            else
            {
                $serviceCreate = DB::table("proposal_services")->insertGetId($data);
                $request->session()->put('proposal_services_id', $serviceCreate);
            }
        }
        elseif (\session()->get('service_type_id') == 5)
        {
            $data["price"] = $request->input("volume_value") * $service_detail->value;
            $data["service_id"] =  \session()->get("service_id");
            $data["proposal_id"] = \session()->get("proposal_id");
            if (\session()->get('proposal_service_id'))
            {
                $proposal_service=ProposalService::find(\session()->get('proposal_service_id'));
                $proposal_service->price = $service_detail->value;
                $proposal_service->service_id =  \session()->get("service_id");
                $serviceEdit = $proposal_service->save();
            }
            else
            {
                $serviceCreate = DB::table("proposal_services")->insertGetId($data);
                $request->session()->put('proposal_services_id', $serviceCreate);
            }
        }
        else
        {
            $data["price"] = $request->input("turnover_range");
            $data["service_id"] =  \session()->get("service_id");
            $data["proposal_id"] = \session()->get("proposal_id");
            if ($request->session()->get('proposal_service_id'))
            {
                $proposal_service=ProposalService::find(\session()->get('proposal_service_id'));
                $proposal_service->price = $service_detail->value;
                $proposal_service->service_id =  \session()->get("service_id");
                $serviceEdit = $proposal_service->save();
            }
            else
            {
                $serviceCreate = DB::table("proposal_services")->insertGetId($data);
                $request->session()->put('proposal_services_id', $serviceCreate);
            }
        }
        Session::forget('service_id');
        Session::forget('service_type_id');
        Session::forget('proposal_service_id');
        if ($serviceCreate)
        {
            return redirect('proposal/create')->with('success', 'Successfully service added!!');
        }
        elseif($serviceEdit)
        {
            return redirect('proposal/create')->with('success', 'Successfully service edit!!');
        }
        else
        {
            return redirect('proposal/create')->with('danger', 'Try again!!');
        }
    }


    // add goals to proposal
    public function goals(Request $request)
    {
        if($request->session()->has('proposal_id') && $request->session()->has('proposal_services_id')){
            $formFields = $request->validate([
                'goals' => 'required'
            ]);
            $proposal_details = Proposal::find($request->session()->get('proposal_id'));
            $proposal_details->goals = $formFields['goals'];
            $proposal_details->save();
            return redirect('proposal');
            
        } elseif(!$request->session()->has('proposal_id') && !$request->session()->has('proposal_services_id')){
            return redirect('proposal/create')->with('danger', 'please select client!!');  
        } else{
            return redirect('proposal/create')->with('danger', 'please select service !!');  
        }

    }


    // proposal Preview
    public function proposalPreview(Request $request, $proposal_id)
    {
        $request->session()->put('proposal_id', $proposal_id);
        $proposal_details =  Proposal::find($proposal_id);
        $request->session()->put('client_id', $proposal_details['client_id']);
        return redirect('proposal');
    }


    // show proposal
    public function showProposal(Request $request)
    {
        $user = Auth::user();
        $company_id = $user->company_id;
        $data["company_detail"] = Companie::find($company_id);
        $data["client_detail"] = Client::find($request->session()->get('client_id'));
        $data["proposal_details"] = Proposal::find($request->session()->get('proposal_id'));
        return view('frontend.proposal.index', $data);
    }


    // delete proposal
    public function delete(Proposal $proposal)
    {
        $proposal->delete();
        return redirect("/proposal/list");
    }


    // show edit proposal
    public function showEdit(Request $request, $proposal_id)
    {
        $request->session()->put('proposal_id', $proposal_id);
        $proposal_details = Proposal::find(session()->get('proposal_id'));
        $request->session()->put('client_id', $proposal_details->client_id);
        $request->session()->put('proposal_services_id', $proposal_id);
        return redirect('/proposal/create');
    }


    // edit select service
    public function editSelectedService(Request $request, $proposal_service_id)
    {
        $proposal_service = ProposalService::find($proposal_service_id);
        $request->session()->put('proposal_service_id', $proposal_service_id);
        $request->session()->put('service_id', $proposal_service["service_id"]);
        $service_detail = Service::find($proposal_service["service_id"]);
        $request->session()->put('service_type_id', $service_detail["service_type_id"]);
        return redirect('proposal/create');
    }


    // deleteSelectedService
    public function deleteSelectedService($proposal_service)
    {
        ProposalService::destroy($proposal_service);
        return redirect("/proposal/create")->with('deleted', "Successfully deleted");
    }


    // send proposal
    public function sendProposal(Request $request, $proposal_id)
    {
        $request->session()->put('proposal_id', $proposal_id);
        $data["proposal_details"] = Proposal::find($request->session()->get('proposal_id'));
        session()->put('client_id', $data["proposal_details"]->client_id);
        $user = Auth::user();
        $company_id = $user->company_id;
        $data["company_detail"] = Companie::find($company_id);
        $data["client_detail"] = Client::find($request->session()->get('client_id'));
        sendMail::dispatch(Mail::to($data['client_detail']['email'])->send(new MailSender($data)))->delay(now()->addMinutes(10));
        if (Mail::failures())
        {
            $request->session()->flash('alert-danger', 'Sorry! Please try again latter!');
            return redirect('proposal/list');
        }
        else
        {
            $proposal_id = $request->session()->get('proposal_id');
            $proposal = Proposal::find($proposal_id);
            $proposal->status = "Sent/Waiting";
            $proposal->type = "Proposal";
            $proposal->save();
            Session::forget('proposal_id');
            Session::forget('client_id');
            return redirect('proposal/list');
        }
     }


     // proposal response save in DB
    public function proposalResponse($proposal_id, $action)
    {
        if ($action == 1)
        {
            $proposal = Proposal::find($proposal_id);
            $proposal->status = "Accepted";
            $proposal->type = "Contract";
            $proposal->save();
        }

        if ($action == 2)
        {
            $proposal = Proposal::find($proposal_id);
            $proposal->status = "Modification";
            $proposal->type = "Proposal";
            $proposal->save();
        }

        if ($action == 3)
        {
            $proposal = Proposal::find($proposal_id);
            $proposal->status = "Rejected";
            $proposal->type = "Draft";
            $proposal->save();
        }
        session()->put('action', $action);
        return redirect("proposal/response/send");
    }


    // proposal response send
    public function proposalResponseSend()
    {
        $data["client_details"] = Client::find(session()->get('client_id'));
        $data["proposal_details"] = Proposal::find(session()->get('proposal_id'));
        return view('frontend.proposal.response', $data);
    }


    // proposal suggetions comment
    public function suggetions(Request $request, $proposal_id)
    {
        if($request->input())
        {
            $proposal = Proposal::find($proposal_id);
            $proposal->comment = $request->input('suggetions');
            $proposal->save();
        }
        $data["client_details"] = Client::find(session()->get('client_id'));
        $data["proposal_details"] = Proposal::find(session()->get('proposal_id'));
        return view('frontend.proposal.thanks', $data);
    }


    // show proposal contract
    public function showContract(Request $request, $proposal_id)
    {

        session()->put('proposal_id', $proposal_id);
        $data["proposal_details"] = Proposal::find(session()->get('proposal_id'));
        session()->put('client_id', $data["proposal_details"]->client_id);
        $user = Auth::user();
        $company_id = $user->company_id;
        $data["company_detail"] = Companie::find($company_id);
        $data["client_detail"] = Client::find(session()->get('client_id'));
        return view('frontend.contract.index', $data);
    }


    // send proposal contract
    public function sendContract(Request $request)
    {
        $user = Auth::user();
        $company_id = $user->company_id;
        $data["company_detail"] = Companie::find($company_id);
        $data["client_detail"] = Client::find(session()->get('client_id'));
        $data["proposal_details"] = Proposal::find(session()->get('proposal_id'));
        sendMail::dispatch(Mail::to($data['client_detail']['email'])->send(new contractSend($data)))->delay(now()->addMinutes(10));
        if (Mail::failures())
        {
            $request->session()->flash('alert-danger', 'Sorry! Please try again latter!');
            return redirect('proposal/list');
        }
        else
        {
            $proposal_id = $request->session()->get('proposal_id');
            return redirect('proposal/list');
        }
    }
}
