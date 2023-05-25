<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index(){
        $sessionId = Auth::user()->id;

        return view ('product.index', [
            'products' => DB::table('products')->where('id_supplier', '=', $sessionId)->get(),
        ]);
    }

    public function add(){
        return view ('product.add');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'product_name' => 'required | max:255',
            'image' => 'required | max:255',
            'stock' => 'required',
            'price' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('product-images','public');
        }
        $image = $request->file('image')->store('product-images','public');
        $sessionId = Auth::user()->id;

        Product::create([
            'id_supplier' => $sessionId,
            'product_name' => $request->input('product_name'),
            'image' => $image,
            'stock' =>$request->input('stock'),
            'price' => $request->input('price')
        ]);

        return redirect('product')->with('success', 'Product successfully added');
    }

    public function destroy($id)
    {

        $data = Product::where('id', $id)->first();
        if ($data == null) {
            return redirect('product');
        }

        $data->delete();

        return redirect('product');
    }
    public function edit($id){
        $data = Product::whereId($id)->first();
        // dd($data);
        return view ('product.edit',[
            'product' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'product_name' => 'required | max:255',
            'stock' => 'required',
            'price' => 'required'
        ]);

        $test = Product::where('id', $id)
        ->update($validatedData);


        return redirect('product')
        ->with('success', 'Data Berhasil diupdate');

    }


}
