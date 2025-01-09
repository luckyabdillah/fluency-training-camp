<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName() {
        return 'uuid';
    }
}
