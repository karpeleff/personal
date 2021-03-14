<?php

namespace App\models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->timezone('Asia/Vladivostok')
            ->toDateTimeString()
            ;
    }
}
