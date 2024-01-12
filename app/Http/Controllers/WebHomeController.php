<?php

namespace App\Http\Controllers;

use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Combo;
use App\Models\Event;
use App\Models\Menu;
use App\Models\MenuCombo;
use App\Models\Order;
use App\Models\OrderDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use DB;

class WebHomeController extends Controller
{
    public function index()
    {
        return view("fontend.layouts.home");
    }
    public function menu()
    {
        $menus = Menu::all();
        // dd($menus);
        
        return view("fontend.fixed.menu_section",compact('menus'));
    }
    public function combo()
    {
        $combos = Combo::all();
        $menu_combos = MenuCombo::all();
        return view("fontend.fixed.combo",compact("combos","menu_combos"));
    }
    public function event()
    {
        $events = Event::all();
        return view("fontend.fixed.event",compact("events"));
    }

    public function addToCart($id)
    {
      if(auth('customer')->user()){

        $cart = session()->get('cart');
        // dd($cart);
        $menu = Menu::find($id);
        if (empty($cart)) {
    
          //add product to cart
          $newCart[$id] = [
            'name' => $menu->name,
            'image' => $menu->image,
            'price' => $menu->price,
            'quantity' => 1,
            'sub_total' => $menu->price * 1
          ];
    
          session()->put('cart', $newCart);
        } else {
    
          if (array_key_exists($id, $cart)) {
            // dd("product exist");
    
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
            $cart[$id]['sub_total'] = $cart[$id]['quantity'] * $cart[$id]['price'];
            session()->put('cart', $cart);
          } else {
            // dd("product not exist");
    
            $cart[$id] = [
              'name' => $menu->name,
              'image' => $menu->image,
              'price' => $menu->price,
              'quantity' => 1,
              'sub_total' => $menu->price * 1
            ];
    
            session()->put('cart', $cart);
          }
        }
    
    
        Toastr::success('Product Added to Cart.');
        return redirect()->back();
      }else{
        return redirect()->route('customer.loginForm');
      }
    }
   
  
    public function cartView()
    {
      $myCart = session()->get('cart');
  
      // dd($myCart);
      return view('fontend.fixed.cart', compact('myCart'));
    }
  
    public function cartItemRemove($id)
    {
      // $cart=Session::get('cart')
      $cart = session()->get('cart');
  
      unset($cart[$id]);
  
      //  dd($cart);
      session()->put('cart', $cart);
      return redirect()->back();
    }
  
    public function clearCart()
    {
  
      session()->forget('cart');
      return redirect()->back();
    }
    


    public function checkout()
    {
      return view('fontend.fixed.checkout');
    }

    public function placeOrder(Request $request)
    {

      // dd($request->all());
    $request->validate([
  
    ]);

    $myCart = session()->get('cart');

    try {
      DB::beginTransaction();
      //create order first
      $order = Order::create([
        'customer_id' => auth('customer')->user()->id,
        'name'        => $request->name,
        'time'        => $request->time,
        'date'        => $request->date,
        'email'       => $request->email,
        'address'     => $request->address, 

        'payment_method'  => $request->paymentMethod,
        'total'           => array_sum(array_column($myCart, 'sub_total')),
        'payment_status'  => 'pending',
      ]);


      //order details create
      foreach ($myCart as $key => $cart) {

        OrderDetail::create([
          'order_id' => $order->id,
          'menu_id' => $key,
          'price' => $cart['price'],
          'qty' => $cart['quantity'],
          'subtotal' => $cart['sub_total'],
        ]);
      }

      DB::commit();
      Toastr::success('Order Placed.');

      if ($request->paymentMethod =='ssl') {

        // redirect to payment page
        $this->payNow($order);
      }
      //assume that order placed succssfully. 
      session()->forget('cart');

      return redirect()->route('web.home');
    } catch (\Throwable $e) {
      DB::rollBack();
      Toastr::error('Something went wrong.');
      // dd('error make');
      return redirect()->back();
    }
  } 

  public function payNow($orderData)
  {

    $post_data = array();
    $post_data['total_amount'] = $orderData->total; # You cant not pay less than 10
    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = $orderData->id; // tran_id must be unique

    # CUSTOMER INFORMATION
    $post_data['cus_name'] = $orderData->name;
    $post_data['cus_email'] = $orderData->email;
    $post_data['cus_add1'] = $orderData->address;
    $post_data['cus_add2'] = "";
    $post_data['cus_city'] = "";
    $post_data['cus_state'] = "";
    $post_data['cus_postcode'] = "";
    $post_data['cus_country'] = "Bangladesh";
    $post_data['cus_phone'] = '8801XXXXXXXXX';
    $post_data['cus_fax'] = "";

    # SHIPMENT INFORMATION
    $post_data['ship_name'] = "Store Test";
    $post_data['ship_add1'] = "Dhaka";
    $post_data['ship_add2'] = "Dhaka";
    $post_data['ship_city'] = "Dhaka";
    $post_data['ship_state'] = "Dhaka";
    $post_data['ship_postcode'] = "1000";
    $post_data['ship_phone'] = "";
    $post_data['ship_country'] = "Bangladesh";

    $post_data['shipping_method'] = "NO";
    $post_data['product_name'] = "Computer";
    $post_data['product_category'] = "Goods";
    $post_data['product_profile'] = "physical-goods";

    # OPTIONAL PARAMETERS
    $post_data['value_a'] = "ref001";
    $post_data['value_b'] = "ref002";
    $post_data['value_c'] = "ref003";
    $post_data['value_d'] = "ref004";



    $sslc = new SslCommerzNotification();
    # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
    $payment_options = $sslc->makePayment($post_data, 'hosted');

    if (!is_array($payment_options)) {
      print_r($payment_options);
      $payment_options = array();
    }
  }


}
