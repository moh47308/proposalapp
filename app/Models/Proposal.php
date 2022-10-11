<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    // relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // relationship with client 
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    // relationship to proposal services
    public function proposal_services()
    {
        return $this->hasMany(ProposalService::class, 'proposal_id');
    }
}
