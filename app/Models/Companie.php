<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    use HasFactory;

    // relationship to user
    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }

    // relationship to proposal
    public function proposal()
    {
        return $this->hasMany(Proposal::class, 'company_id');
    }
}

