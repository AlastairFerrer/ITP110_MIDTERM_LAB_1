<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_items extends Model
{   
    use HasFactory;
    
    protected $primary_key = 'id';

    protected $fillable =[
        'order_id',
        'item_id',
        'quantity',
        'unit_price',
    ];

    public function orders_id(){
        return $this->belongsTo(Orders::class, 'order_id', 'order_id');
    }

    public function items_id(){
        return $this->belongsTo(Items::class, 'item_id' , 'item_id');
    }
}
