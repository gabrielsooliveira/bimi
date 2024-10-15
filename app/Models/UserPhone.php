<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserPhone extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_phone';

    protected $fillable = [
        'name', 'email', 'password', 'plan_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function relatedPlans()
    {
        return $this->plan ? $this->plan->service->plans : collect();
    }
}
