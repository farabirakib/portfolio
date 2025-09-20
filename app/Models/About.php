<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'description',
        'image',
        'cv_link',
    ];

    // You can add any additional methods or relationships here if needed
}
