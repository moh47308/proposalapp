<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // relationship to servicetype
    public function service_type()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    // relationship to companytype
    public function company_type()
    {
        return $this->belongsTo(CompanyType::class, 'company_type_id');
    }
}
