<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable = [
        'order_id', 'product_id', 'product_quantity','product_price','sub_total'
    ];

    // $table->integer('order_id')->nullable();
    // $table->integer('product_id')->nullable();
    // $table->string('product_quantity')->nullable();
    // $table->string('product_price')->nullable();
    // $table->string('sub_total')->nullable();
}
