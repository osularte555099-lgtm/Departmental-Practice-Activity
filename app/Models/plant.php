<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = ['user_id', 'name', 'category', 'unit_price', 'description', 'stock_status'];

    // A Plant belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}