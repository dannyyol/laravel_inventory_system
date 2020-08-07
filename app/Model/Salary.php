<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    protected $fillable = [
        'employee_id', 'amount', 'salary_date','salary_month','salary_year'
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
