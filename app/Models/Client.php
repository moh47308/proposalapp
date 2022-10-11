<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // relationship to company types
    public function company_types()
    {
        return $this->hasMany(CompanyType::class, 'id');
    }

    // relationship to proposal
    public function proposal()
    {
        return $this->hasOne(Proposal::class, 'client_id');
    }
}
