<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCode extends Model
{
    use HasFactory;
    
    public function result()
    {
        return $this->hasMany('App\Models\Result');
    }
}
