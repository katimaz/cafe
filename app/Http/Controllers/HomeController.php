<?php

namespace App\Http\Controllers;

use App\Menu;
use App\MenuProduct;
use App\OrderFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;
use DB;
use App\Order;
use Response;
use Carbon\Carbon;
use App\PrintCode;
use App\Traits\Printer;

class HomeController extends Controller
{
    use Printer;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $cart;
    public function __construct(Request $request)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $this->cart = new Cart($oldCart);
//        $this->middleware('auth');
    }

    public function home(){

        return view('home.index_cn');
    }

    public function enghome(){

        return view('home.index');
    }

    public function checkout(){
        return view('checkout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Session::has('tableId')?Session::get('tableId'):Session::put('tableId',$request->tableId);

        $menus = Menu::all();
        $promotions = DB::table('restaurant_promotions')
            ->join('menu_products', 'menu_products.id', '=', 'restaurant_promotions.product_id')
            ->select('menu_products.*', 'restaurant_promotions.*')
            ->get();

        return view('index',compact('menus','promotions'));
    }

    public function validCode(Request $request){

        $printCode = PrintCode::where('code',$request->print_code)->first();

        if(count($printCode)){

            if($request->tableId){
                Session::put('tableId',$request->tableId);
            }

            if(!$printCode->used_time){
                $printCode->table_id = Session::get('tableId');
                $printCode->used_time = Carbon::now()->timezone('Asia/Taipei')->addHours('2')->toDateTimeString();
                $printCode->save();
                Session::put('printCode',$request->print_code);
            }else{
                if(Carbon::now()->timezone('Asia/Taipei')->toDateTimeString() < $printCode->used_time){
                    if(Session::get('tableId') == $printCode->table_id){
                        Session::put('printCode',$request->print_code);
                    }
                }
            }
        }
        return redirect()->back();
    }

    public function menu()
    {
        $menus = Menu::all();

        $productMenus = DB::table('menus')
            ->join('menu_products', 'menus.id', '=', 'menu_products.menu_id')
            ->select('menu_products.*', 'menus.*','menu_products.id as product_id','menu_products.name as product_name','menu_products.image_url as product_image_url')
            ->where('active','1')
            ->orderBy('menu_id', 'desc')
            ->orderBy('product_name', 'asc')
            ->get();

        return view('menu',compact('menus','productMenus'));
    }
    

    public function getAddToList(Request $request){
        $product = MenuProduct::find($request->id);
        $this->cart->add($product,$product->id,$request->qty,$request->price);
        $request->session()->put('cart',$this->cart);
//        return redirect('order/menu');

//        dd($this->cart);
//        $totalqty = count($this->cart->items);
//        $total_price =$this->cart->totalPrice;
        $result = json_encode($this->cart);
        return $result;
    }

    public function changeQty(Request $request){
        $this->cart->changeQty($request->id,$request->qty,$request->price);
        $request->session()->put('cart',$this->cart);

        $jsonBody = json_encode(
            [
                'totalQty'=>$this->cart->totalQty,
                'totalPrice' => $this->cart->totalPrice,
                'price'=>($request->qty*$request->price)
            ]
        );

        return $jsonBody;

    }

    public function remove(Request $request){
        $this->cart->remove($request->id);
        $request->session()->put('cart',$this->cart);
        return "Success";

    }

    public function orderList(Request $request){

        $orderFoods = DB::table('orders')
            ->join('order_foods', 'order_foods.order_id', '=', 'orders.id')
            ->join('menu_products', 'menu_products.id', '=', 'order_foods.product_id')
            ->select('orders.*', 'order_foods.*','menu_products.*','orders.quantity as total_quantity')
            ->where('table_id',Session::get('tableId'))
            ->where('paid','0')
            ->get();

        return view('orderList',compact('orderFoods'));
    }

    public function detail(Request $request){

        return view('orderDetail');
    }
    public function confirm(Request $request){
//        if(Session::has('tableId') && Session::has('printCode')){

            if($this->cart->items !=null){
                $printData = '<CB>QuickOrder</CB><BR><BR>';
                if($request->order_type ==1){
                    $order = Order::where('table_id', $request->table_id)->where('paid','0')->first();
                    if($order === null){

                        $order = new Order;
                        $order->table_id = $request->table_id;
                        $order->restaurant_id = $request->restaurant_id;
                        $order->order_type_id = $request->order_type;
                        $order->payment_type = $request->payment_type;
                    }

                    $order->quantity += $this->cart->totalQty;
                    $order->price += $this->cart->totalPrice;
                    $order->save();

                    $printData .= '<B>堂食單</B><BR><BR>';
                    $printData .= '<B>枱號 : '.$order->table_id.'</B><BR><BR>';

                }elseif($request->order_type ==2){

                    $order = new Order;
                    $order->table_id = 0;
                    $order->restaurant_id = $request->restaurant_id;
                    $order->order_type_id = $request->order_type;

                    $order->customer_name = $request->name;
                    $order->customer_email = $request->email;
                    $order->customer_phone = $request->phone;
                    $order->customer_pickup_time = $request->pickup_time;
                    $order->payment_type = $request->payment_type;

                    $order->quantity = $this->cart->totalQty;
                    $order->price = $this->cart->totalPrice;
                    $order->save();

                    $printData .= '<B>外賣單</B><BR><BR>';
                    $printData .= '<B>訂單號 : '.$order->id.'</B><BR><BR>';
                    $printData .= '客人名稱 : '.$request->name.'<BR><BR>';
                    $printData .= '客人電話 : '.$request->phone.'<BR><BR>';
                    $printData .= '取餐時間 : '.$request->pickup_time.'<BR><BR>';

                }else{

                }

                $kitchenData = '<CB>QuickOrder</CB><BR><BR>';
                $kitchenData .= '<RIGHT>名稱　　　　　     數量</RIGHT><BR>';
                foreach($this->cart->items as $item){

                    $orderFood = new OrderFood;
                    $orderFood->order_id = $order->id;
                    $orderFood->product_id = $item['items']->id;
                    $orderFood->quantity = $item['qty'];
                    $orderFood->price = $item['price'];
                    $orderFood->save();

                    $kitchenData .= '<RIGHT>'.$item['items']->name. '　　　　 　     ' . $item['qty'] . '</RIGHT><BR>';
                }

                    $kitchenData .= '--------------------------------<BR>';

                $this->setPrinter("bjtuwangjia@gmail.com", "ebIRPMY3Zr5ISM2u", "918508667");
                $this->getPrint($kitchenData);

                $this->setPrinter("bjtuwangjia@gmail.com", "ebIRPMY3Zr5ISM2u", "718500818");
                $this->getPrint($kitchenData);

                $orderFoods = OrderFood::join('orders', 'orders.id', 'order_foods.order_id')
                    ->join('menu_products', 'menu_products.id', 'order_foods.product_id')
                    ->select('*', 'order_foods.quantity as order_food_quantity','order_id as orders.id')
                    ->where('order_id', $order->id)
                    ->get();


                $printData .= '<RIGHT>名稱　　　　　 金額  數量</RIGHT><BR>';
                $printData .= '--------------------------------<BR>';

                foreach($orderFoods as $orderFood){
                    $printData .= '<RIGHT>'.$orderFood->name . '　　　　 　' . $orderFood->price . '   ' . $orderFood->order_food_quantity . '</RIGHT><BR>';
                }

                $printData .= '--------------------------------<BR>';
                $printData .= '<QR>http://www.hkqos.com</QR>';//把二维码字符串用标签套上即可自动生成二维码;

                $this->setPrinter("bjtuwangjia@gmail.com", "ebIRPMY3Zr5ISM2u", "918508667");
                $this->getPrint($printData);

                $this->setPrinter("bjtuwangjia@gmail.com", "ebIRPMY3Zr5ISM2u", "718500818");
                $this->getPrint($printData);

                $request->session()->put('cart',$this->cart);
                $request->session()->forget('cart');
                return view('confirmation',compact('order'));
            }
//        }

        return redirect('order/menu');
    }

    public function kitchen(){

        $orderFoods = DB::table('orders')
            ->join('order_foods', 'order_foods.order_id', '=', 'orders.id')
            ->join('menu_products', 'menu_products.id', '=', 'order_foods.product_id')
            ->select('orders.table_id','orders.id as order_id','order_foods.quantity','menu_products.name','menu_products.description','order_foods.id as id')
            ->where('printed','0')
            ->where('order_type_id','1')
            ->where('paid','0')
            ->get();

        return view('kitchen',compact('orderFoods'));
    }

    public function getOrder(Request $request){

        $orderFoods  = DB::select('SELECT orders.id,order_foods.product_id,sum(order_foods.quantity) as sum_quantity,sum(order_foods.price) as sum_price,menu_products.name,menu_products.description,menu_products.image_url,orders.paid FROM `orders`,`order_foods`,menu_products
                   WHERE orders.id = order_foods.order_id
                   and order_foods.product_id = menu_products.id
                   and orders.customer_phone = :phone_number
                   and orders.paid = :paid
                   group by orders.id,order_foods.product_id,order_foods.quantity', ['phone_number' => $request->order_phone,'paid'=>0]);

        $order = Order::where('customer_phone',$request->order_phone)->first();

        return view('orderList',compact('orderFoods','order'));
    }
}
