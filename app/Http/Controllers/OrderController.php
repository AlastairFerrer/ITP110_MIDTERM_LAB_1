<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Items;
use App\Models\Order_items;
use App\Models\Orders;

class OrderController
{
    public function items(){
        try{
            $items = Order_items::with(['orders_id', 'items_id'])->get();

            return view('index', compact('items'));
            // return response()->json(['data'=> $items]);

        }catch(\Throwable $th){
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function modal(){
        try{
            $items = Order_items::with(['orders_id', 'items_id'])->get();

            return view('modal', compact('items'));        
            
        }catch(\Throwable $th){
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
