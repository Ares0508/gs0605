<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }
    
    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }
}
