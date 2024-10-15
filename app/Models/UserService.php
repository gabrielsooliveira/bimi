<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserService extends Pivot
{
    use HasFactory;

    protected $table = 'user_service';

    protected $fillable = [
        'user_id',
        'service_id',
        'plan_id',
    ];
}
