<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class GasStation extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "zhanarmai";
    public $timestamps = false;
}
