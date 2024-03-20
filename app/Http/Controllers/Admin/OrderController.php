<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        // $todayDate = Carbon::now();
        // $orders = Order::whereDate('created_at',$todayDate)->paginate(10);

        $todayDate = Carbon::now()->format("Y-m-d");
        $orders = Order::when($request->date != null, function ($query) use ($request) {

                            return $query->whereDate("created_at", $request->date);
                        }, function ($query) use ($todayDate){
                            
                            $query->whereDate('created_at',$todayDate);
                        })
                        ->when($request->status != null, function ($query) use ($request) {

                            return $query->where("status_message", $request->status);
                        })
                        ->paginate(10);

        return view("admin.orders.index", compact("orders"));
    }

    public function show(int $orderId)
    {
        $order = Order::where("id",$orderId)->first();
        if ($order) {

            return view("admin.orders.view", compact("order"));
        }else{

            return redirect("admin/orders")->with("message","Order is Not Found");
        }
        
    }

    public function updateOrderStatus(Request $request, int $orderId)
    {
        $order = Order::where("id",$orderId)->first();
        if ($order) {
            
            $order->update([
                "status_message" => $request->order_status
            ]);
            return redirect("admin/orders/".$orderId)->with("message","Order Status Updated");
        }else{

            return redirect("admin/orders/".$orderId)->with("message","Order is Not Found");
        }
    }
}