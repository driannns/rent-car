<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $data = Car::where('name', 'like', '%' . $searchTerm . '%')->get();

        $data2 = DB::table('cars')
            ->join('categories', 'cars.id_category', '=', 'categories.id')
            ->orderBy('cars.name', 'asc')
            ->select('cars.*', 'categories.category as category_name')
            ->paginate(5);

        $category = DB::table('categories')->orderBy('category', 'asc')->get();
        return view('rent.index', ['data' =>$data, 'data2' =>$data2, 'category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('categories')->orderBy('category', 'asc')->get();
        return view ('car.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'deskripsi' => 'required',
                'id_category' => 'required',
                'bbm' => 'required',
                'harga' => 'required',
                'picture' => 'mimes:jpeg,png,jpg',
                
            ]);

            $file = $request->file('picture');
            $filename = uniqid() . "_" . $file->getClientOriginalName();
            $file->storeAs('public/', $filename);
            $id = Str::random('5');
            
            Car::create([
                'code' => $id,
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
                'id_category' => $request->id_category,
                'bbm' => $request->bbm,
                'harga' => $request->harga,
                'picture' => $filename
                
            ]);
    
            return redirect(route('rent.index'))->with('success', 'Mobil Ditambahkan');
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::find($id);
        $category = Category::all();
        return view('rent.edit', ['car' => $car, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'id_category' => 'required',
            'bbm' => 'required',
            'harga' => 'required',
            'picture' => 'mimes:jpeg,png,jpg',
            
        ]);

        $car = Car::find($id);

        if($request->picture){
            $file = $request->file('picture');
            $filename = uniqid() . "_" . $file->getClientOriginalName();
            $file->storeAs('public/', $filename);
            
            $car->update([
                'picture' => $filename
            ]);
        }

        $car->update([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'id_category' => $request->id_category,
            'bbm' => $request->bbm,
            'harga' => $request->harga,
        ]);

        return redirect(route('rent.index'))->with('success', 'Mobil telah diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);

        $car->delete();

        return redirect(route('rent.index'))->with('success', 'Mobil telah dihapus');
    }
}
