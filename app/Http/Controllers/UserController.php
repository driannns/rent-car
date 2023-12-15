<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
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
                'alamat' => 'required',
                'hour' => 'required',
                'payment' => 'required',
                'startDate' => 'required',
            ]);

            if($credentials){

                $order = Order::where('id_user', auth()->user()->id)->get();

                if(count($order) > 1){
                    $status = 0;
                    foreach ($order as $order) {
                        if ($order->status == 'Processing') {
                            $status = $status + 1;
                        }
                    }
                    if ($status > 1) {
                        return redirect()->back()->with('msg', 'Anda hanya dapat memesan 2 mobil per hari');
                    }
                    
                }
                $car = DB::table('cars')->find($request->id_car);
                $dayToHour = $request->day * 24;
                $hours = $request->hour + $dayToHour; 
                $endDate = Carbon::parse($request->startDate)->addHour($hours);
                $price = round($hours / 12 * $car->harga, 2);
                $car = Car::find($request->id_car);
                Order::create([
                    'id_user' => auth()->user()->id,
                    'name' => $request->name,
                    'id_car' => $request->id_car,
                    'alamat' => $request->alamat,
                    'hours' => $hours,
                    'payment' => $request->payment,
                    'price' => $price,
                    'startDate' => $request->startDate,
                    'endDate' => $endDate,
                    'status' => 'Processing'
                ]);

                $car->update([
                    'status' => 'Unavailable'
                ]);

                return redirect()->route('order.index')->with('success', 'Order Berhasil');
            }
        } catch (\Throwable $th) {
            dd($th);
            return back()->withInput()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    public function list(){
        $data = User::with('roles')->orderBy('name')->paginate(5);
        return view('user_list', ['data' =>$data]);
    }

    public function destroy(string $id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect(route('order.index'))->with('success', 'Order telah dihapus');
    }

    public function update(string $id)
    {
        $order = Order::find($id);
        $car = Car::find($order->id_car);

        $order->update([
            'status' => 'Done'
            
        ]);

        $car->update([
            'status' => 'available'
        ]);

        return redirect(route('order.index'))->with('success', 'Mobil telah dikembalikan, order selesai');
    }
}
