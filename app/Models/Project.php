<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $filtable = [
        'title',
        'description',
        'image_url',
    ];
    // protected $attributes = [
    //     'title' => 'Default Title',
    //     'description' => 'Default Description',
    //     'image_url' => 'Default image_url'

    // ];

}
