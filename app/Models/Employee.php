<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }
    
    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }
    
    public function results()
    {
        return $this->hasMany('App\Models\Result');
    }
    
    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }
}
