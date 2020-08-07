<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function salary()
    {
        return $this->hasMany(Salary::class);
    }
}
