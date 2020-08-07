<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'customer_id', 'qty', 'sub_total','vat','total','pay','due','payby','order_date','order_month','order_year'
    ];

//     $table->integer('customer_id');
//     $table->string('qty')->nullable();
//     $table->string('sub_total')->nullable();
//     $table->string('vat')->nullable();
//     $table->string('total')->nullable();
//     $table->string('pay')->nullable();
//     $table->string('due')->nullable();
//     $table->string('payby')->nullable();
//     $table->string('order_date')->nullable();
//     $table->string('order_month')->nullable();
//     $table->string('order_year')->nullable();

}
