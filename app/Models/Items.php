<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Items extends Model
{
    use HasFactory;
    
    protected $primary_key = 'item_id';

    protected $fillable = [
        'item_name',
        'price',
        'quantity',
        'is_active'
    ];

}
