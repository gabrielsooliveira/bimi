<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserServicePlan extends Model
{
    protected $table = 'user_service_plan';

    protected $fillable = [
        'user_id',
        'service_id',
        'plan_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
