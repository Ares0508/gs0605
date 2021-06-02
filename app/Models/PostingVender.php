<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostingVender extends Model
{
    use HasFactory;
    
    public function postings()
    {
        return $this->hasMany('App\Models\Posting');
    }
}
