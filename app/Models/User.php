<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relationship with service 
    public function services()
    {
        return $this->hasMany(Service::class,'company_id');
    }

    // relationship with client 
    public function client()
    {
        return $this->hasMany(Client::class,'company_id');
    }

    // relationship with client 
    public function company()
    {
        return $this->belongsTo(Companie::class, 'id');
    }

    // relationship with proposal 
    public function proposal()
    {
        return $this->hasMany(Proposal::class,'company_id');
    }

    // relationship with proposal 
    public function proposal_services()
    {
        return $this->hasMany(ProposalServiec::class,'service_id');
    }
}
