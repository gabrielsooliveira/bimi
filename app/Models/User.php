<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function servicePlans()
    {
        return $this->hasMany(UserServicePlan::class, 'user_id');
    }

    public function hasAccessToServicePlan(int $serviceId, ?int $planId = null): bool
    {
        // Verificar se o usuário tem acesso ao serviço
        $servicePlan = $this->servicePlans()->where('service_id', $serviceId);

        // Se o plano for especificado, verificar se também corresponde
        if ($planId !== null) {
            $servicePlan->where('plan_id', $planId);
        }

        return $servicePlan->exists();
    }
}
