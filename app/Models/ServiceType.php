<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;

    // relationship to services
    public function services()
    {
        return $this->hasMany(Service::class, 'service_type_id');
    }
}

