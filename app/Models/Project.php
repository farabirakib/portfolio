<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
     protected $fillable = [
        'title',
        'short_description',
        'project_link',
        'image',
    ];
}
