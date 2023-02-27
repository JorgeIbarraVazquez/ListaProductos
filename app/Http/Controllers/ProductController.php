<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('nombre','ASC')->get();
        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'precio' => 'required|numeric',
        ]);
        $product = Product::create($storeData);
        return redirect('/products')->with('completed', 'Product has been saved!');
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
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'precio' => 'required|numeric',
        ]);
        Product::whereId($id)->update($updateData);
        return redirect('/products')->with('completed', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('completed', 'Product has been deleted');
    }

     /**
     * Filter by name
     */
    public function filters(Request $request)
    {
        $nombre=$request->nombre;
        $precio_minimo=$request->precio_minimo;
        $precio_maximo=$request->precio_maximo;

        if(!empty($nombre)){
            $products = Product::where('nombre','LIKE','%'.$nombre.'%')
            ->get();
        }else{
            $products = Product::whereBetween('precio', [$precio_minimo, $precio_maximo])
            ->get();
        }
        
        return view('index', compact('products'));
    }
}
