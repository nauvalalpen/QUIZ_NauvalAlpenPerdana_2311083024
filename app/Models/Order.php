<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Order extends Model
{


   protected $fillable = [
       'order_id',
       'amount',
       'customer_name',
       'customer_email',
       'customer_phone',
       'status',
       'payment_type',
       'transaction_id',
       'payment_data',
   ];


}
