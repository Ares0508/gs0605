<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // Scope
    public function scopeWhereSearch($query, $first_code, $last_code) {
        $query->where('first_code', intval($first_code))
            ->where('last_code', $last_code);
    }
    
    // Accessor
    public function getFirstCodeAttribute($value) {
        return str_pad($value, 3, '0', STR_PAD_LEFT);
    }

    public function getLastCodeAttribute($value) {
        return str_pad($value, 4, '0', STR_PAD_LEFT);
    }
}
