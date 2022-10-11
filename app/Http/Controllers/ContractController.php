<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    // contract get response and save in DB
    /*public function contractResponse(Request $request, $proposal_id, $action)
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
            $proposal->status = "Modify";
            $proposal->type = "Contract";
            $proposal->save();
        }
        $request->session()->put('action', $action);
        return redirect(url("proposal/response/send"));
    }*/
}
