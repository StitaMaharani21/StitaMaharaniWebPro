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
    public function user(){
        return $this->belongsTo('app\Models\User');
        return $this->belongsTo('app\Model\Category');
    }

}
