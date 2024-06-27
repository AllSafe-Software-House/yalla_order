<?php

namespace App\Http\Controllers\Dashboard;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Size;
use App\Models\User;
use App\Models\Places;
use App\Models\Addons;
use App\Models\Reservationes;
use App\Models\OrderTrake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TableExport;



class OrderListController extends Controller
{
    public function listall(){
        $admin = Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        $placeid = $user_place->place_id;
        if($user_place->place_id !== null){
            $transction = Order::where('place_id',$placeid)->paginate(10);

        }else{
            $transction = Order::where('status','1')->paginate(10);
        }
        return view('Order.transaction' , compact('transction'));
    }
    
    public function index()  {
        $admin = Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        if($user_place->place_id !== null){
            $order = Order::where('status','1')->where('place_id',$user_place->place_id)->paginate(10);
        }else{
            $order = Order::where('status','1')->paginate(10);
        }
        $trackorders = [];
            foreach($order as $data){
                $trackorder = OrderTrake::where('order_id',$data->id)->first();
                $trackorders[] = $trackorder;
            }
        return view('Order.indexorder' , compact('order','trackorders'));
    }
    
    public function transaction(){
        $admin = Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        if($user_place->place_id !== null){
            $placeid = $user_place->place_id;
            $placedata = Places::where('id',(int) $placeid)->first();
            if($placedata->type == 'clinic'){
                $reservation = Reservationes::where('place_id',$placeid)->paginate(10);
                return view('Reservation.index' , compact('reservation'));
            }else{
                $transction = Order::where('place_id',$placeid)->paginate(10);
                return view('Order.transaction' , compact('transction'));
            }
        }else{
            $transction = Order::paginate(10);
            return view('Order.transaction' , compact('transction'));
        }
    }
    
    
    public function transactiondelete($id){
        $transction = Order::where('id',$id)->first();
        if(!$transction){
            return redirect()->back()->with('fail','this not valid');
        }
        $transction->delete();
        return redirect()->back()->with('done','delete sucess');

    }
    
    public function reset($id)
    {
        $order = Order::find($id);
        if($order->delivery_method == 'delivery'){
            $fees = $order->place->delivery_fee;
        }else{
            $fees = 0;
        }
        $addtion = [];
        $adddd = json_decode($order->addanos);
        foreach($adddd as $item){
            if($item != null){
                $dataitem = Addons::where('id', (int)$item)->first(['id', 'name','price']);;
                $addtion[] = [
                    "name" => $dataitem->name,
                    "price" => $dataitem->price,
                ];
            }
        };
       
        $data = [
            'placeName' => $order->place->name,
            'invoiceNumber' => $order->numberOrder,
            'username' => $order->user->name,
            'email' => $order->user->email,
            'address' => $order->address,
            'phone' => $order->user->phone,
            'created_at' => $order->created_at,
            'prodactname' => $order->menue->product->name,
            'prodactsize' => $order->size->size,
            'prodactprice' => $order->size->price,
            'Qty' => $order->Qty,
            'addtions' => $addtion,
            'totalprice' => $order->price,
            'fees' => $fees,
        ];
        return response()->json($data);
    }

    public function filter(Request $request){
        $transction = [];
        $admin = Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        if(isset($request->placename)){
            $place = Places::where('name','like',"%$request->placename%")->where('type','restaurantes')->get();
            if($place){
                foreach($place as $item){
                    $transactiondataplace = Order::where('place_id',$item->id)->get();
                    if ($transactiondataplace != NULL) {
                        foreach($transactiondataplace as $transactiondataplace){
                            $transction[] = $transactiondataplace;
                        }
                    }
                }
            }
        }
        if(isset($request->username)){
             $users = User::where('name', 'like', "%{$request->username}%")
                 ->where('role','user')
                 ->get();
            if($users){
                foreach($users as $data){
                    if($user_place->place_id !== null){
                        $transactiondatauser = Order::where('user_id',$data->id)->where('place_id',$user_place->place_id)->get();
                    }else{
                        $transactiondatauser = Order::where('user_id',$data->id)->get();
                    }
                    if ($transactiondatauser != NULL) {
                        foreach($transactiondatauser as $transactiondatauser){
                                $transction[] = $transactiondatauser;
                        }
                    }
                }
            }
        }
        if(isset($request->userphone)){
             $users = User::where('phone', 'like', "%{$request->userphone}%")
                 ->where('role','user')
                 ->get();
            if($users){
                foreach($users as $data){
                    if($user_place->place_id !== null){
                        $transactiondatauser = Order::where('user_id',$data->id)->where('place_id',$user_place->place_id)->get();
                    }else{
                        $transactiondatauser = Order::where('user_id',$data->id)->get();
                    }
                    if ($transactiondatauser != NULL) {
                        foreach($transactiondatauser as $transactiondatauser){
                                $transction[] = $transactiondatauser;
                        }
                    }
                }
            }
        }



        return view('Order.transaction' , compact('transction'));

    }
    
    
    public function export()
    {
        $admin = Auth::user();
        $user_place = Admin::where('user_id',$admin->id)->first();
        if($user_place->place_id !== null){
            $transactions = Order::where('place_id',$user_place->place_id)->get();

        }else{
            $transactions = Order::where('status','1')->get();
        }
        return Excel::download(new TableExport($transactions), 'transactions.xlsx');
    }

}
