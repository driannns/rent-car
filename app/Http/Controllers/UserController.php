<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $data = DB::table('cars')->orderBy('name', 'asc')->get();
        $data2 = DB::table('cars')
            ->join('categories', 'cars.id_category', '=', 'categories.id')
            ->orderBy('cars.name', 'asc')
            ->select('cars.*', 'categories.category as category_name')
            ->paginate(5);
    
        
        $category = DB::table('categories')->orderBy('category', 'asc')->get();
        return view ('rent.index', ['data' => $data,'data2' => $data2, 'category' => $category]);
    }

    public function orderStore(){
        
    }

    public function order(){
        $orders = DB::table('orders')->where('id_user', auth()->user()->id)->get();
        $data = DB::table('orders')->orderBy('id', 'desc')->paginate(5);
        return view ('order.index', ['orders' => $orders, 'data' => $data]);
    }

    public function store(Request $request){
       try{
            $credentials = $request->validate([
                'name' => 'required',
                'day' => 'required',
                'hour' => 'required',
                'payment' => 'required'
            ]);

            if($credentials){
                $car = DB::table('cars')->find($request->id_car);
                $dayToHour = $request->day * 24;
                $hours = $request->hour + $dayToHour; 
                $endDate = Carbon::now()->addHour($hours);
                $price = ($hours / 12 * $car->harga);
                Order::create([
                    'id_user' => auth()->user()->id,
                    'name' => $request->name,
                    'id_car' => $request->id_car,
                    'hours' => $hours,
                    'payment' => $request->payment,
                    'price' => $price,
                    'endOrder' => $endDate,
                    'status' => 'Processing'
                ]);

                return redirect()->route('order.index');
            }
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    public function list(){
        $data = DB::table('users')->orderBy('name', 'asc')->paginate(5);
        return view('user_list', ['data' =>$data]);
    }
}
