<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable=['location','members','name','members','creator','tourDescription'];
}
