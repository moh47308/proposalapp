<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    use HasFactory;

    // relationship to services
    public function services()
    {
        return $this->hasMany(Service::class, 'company_type_id');
    }

    // relationship to company_type_id
    public function clients()
    {
        return $this->hasMany(Client::class, 'company_type_id');
    }
}
