<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewProduct extends Model {
    // Nonaktifkan timestamp
    public $timestamps = false;

    protected $fillable = ['name', 'image', 'description', 'price'];
}