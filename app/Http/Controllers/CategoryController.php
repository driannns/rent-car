<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('categories')->orderBy('category', 'asc')->paginate(5);
        return view('category', ['data' =>$data]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $data = Category::where('category', 'like', '%' . $searchTerm . '%' )->paginate(5);
        return view('category', ['data' =>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('car.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'category' => 'required|unique:category,category',
            ]);
    
            Category::create([
                'category' => $request->category,
            ]);
    
            return redirect()->route('category')->with('success', 'Category Ditambahkan');
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
        $data = Category::find($id);
        return view('edit_category', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required',
            
            
        ]);

        $category = Category::find($id);

        $category->update([
            'category' => $request->category,
            
        ]);

        return redirect(route('category'))->with('success', 'Category telah diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect(route('category'))->with('success', 'Kategori telah dihapus');
    }
}
