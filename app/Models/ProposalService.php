<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalService extends Model
{
    use HasFactory;

    // relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // relationship to service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
