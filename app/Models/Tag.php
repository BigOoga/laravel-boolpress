<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    //l public function <reference table>()
    public function categories()
    {
        $this->belongsToMany('App\Models\Category');
    }
}
