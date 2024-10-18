<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Items;
use App\Models\Order_items;
use App\Models\Orders;


class OrderController
{
    public function items()
    {
        try {
            $items = Order_items::with(['orders_id', 'items_id'])->get();

            return view('index')->with('items', $items);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function modal()
    {
        try {
            $items = Order_items::with(['orders_id', 'items_id'])->get();

            return view('modal')->with('items', $items);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search_input' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $query = $request->input('search_input');
        $filteredOrders = Orders::where('customer_name', 'like', '%' . $query . '%')->get();

        return response()->json($filteredOrders);
    }
}
