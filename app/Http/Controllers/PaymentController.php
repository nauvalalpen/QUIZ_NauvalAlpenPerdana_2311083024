<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;


class PaymentController extends Controller
{
  
   public function create()
   {
       return view('payment.create');
   }


   public function store(Request $request)
   {
      
       $data = $request->validate([
           'name'  => 'required|string',
           'email' => 'required|email',
           'phone' => 'required|string',
           'amount' => 'required|numeric|min:1',
       ]);


       
       $order = Order::create([
           'order_id'       => 'ORDER-' . Str::upper(Str::random(8)),
           'amount'         => $data['amount'],
           'customer_name'  => $data['name'],
           'customer_email' => $data['email'],
           'customer_phone' => $data['phone'],
       ]);


      
       Config::$serverKey    = config('services.midtrans.server_key');
       Config::$isProduction = config('services.midtrans.is_production');
       Config::$isSanitized  = config('services.midtrans.is_sanitized');
       Config::$is3ds        = config('services.midtrans.is_3ds');


       
       $params = [
           'transaction_details' => [
               'order_id'     => $order->order_id,
               'gross_amount' => $order->amount,
           ],
           'customer_details' => [
               'first_name' => $order->customer_name,
               'email'      => $order->customer_email,
               'phone'      => $order->customer_phone,
           ],
       ];


       $snapToken = Snap::getSnapToken($params);
       return view('payment.snap', compact('snapToken', 'order'));
   }


   public function callback(Request $request)
   {
       $notif = $request->all();
       $order = Order::where('order_id', $notif['order_id'])->firstOrFail();
       $order->update([
           'status'         => $notif['transaction_status'],
           'payment_type'   => $notif['payment_type'],
           'transaction_id' => $notif['transaction_id'],
           'payment_data'   => $notif,
       ]);
       return response()->json(['success' => true]);
   }




   public function success($orderId)
   {
       $order = Order::where('order_id', $orderId)->firstOrFail();
       return view('payment.success', compact('order'));
   }
   public function history()
   {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);


       return view('payment.history', compact('orders'));
   }


   
   public function detail($orderId)
   {
       $order = Order::where('order_id', $orderId)->firstOrFail();
       return view('payment.detail', compact('order'));
   }
}
