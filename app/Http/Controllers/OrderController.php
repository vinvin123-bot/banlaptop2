<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function checkout() {
        return view('checkout');
    }

    public function store(Request $request) {

        $cart = session('cart', []);

        $total = 0;

        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total,
            'payment' => $request->payment, // 
            'payment_status' => 'unpaid',
            'status' => 'pending'
        ]);

        session()->forget('cart');

        return redirect('/')->with('success', '🎉 Đặt hàng thành công!');
    }

    public function admin() {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    public function deliver($id) {
    $order = Order::find($id);

    $order->status = 'delivered';

    // 👇 nếu COD thì tự động thanh toán khi giao
    if($order->payment == 'cod'){
        $order->payment_status = 'paid';
    }

    $order->save();

    return back();
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return back()->with('success', 'Đã xóa đơn hàng!');
    }
    public function paid($id) {
    $order = Order::find($id);

    $order->payment_status = 'paid';
    $order->save();

    return back()->with('success', 'Đã xác nhận thanh toán!');
    }
}