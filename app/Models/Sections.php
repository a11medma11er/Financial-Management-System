<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'created_by'
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
    
    public function invoices()
    {
        return $this->belongsTo(Invoices::class);
    }
}
