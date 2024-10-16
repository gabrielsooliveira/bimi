<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plans';

    protected $fillable = [
        'service_id',
        'name',
        'price',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
