<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function isSucced()
    {
        return $this->id == 3;
    }
}
