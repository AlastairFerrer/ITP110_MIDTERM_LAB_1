<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{   
    use HasFactory;

    protected $primary_key = 'order_id';

    protected $fillable = [
        'transaction_no',
        'customer_name',
        'order_status',
    ];

    public function getStateAttribute(){
        switch($this->order_status){
            case 0: return 'Cancelled';
            case 1: return 'Served';
            case 2: return 'Ready to Serve';
            case 3: return 'Pending'; 
            default: return '';    
        }
    }
}
