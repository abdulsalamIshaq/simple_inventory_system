<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
        $products = Product::orderBy('id', 'desc')->paginate(10);
        $data = [
            'products'  => $products
        ];

        return view('product', $data);
    }

    public function edit(int $id){
        //$id = Product::findorfail($id);
        $products = Product::where('id', $id)->get();
        
        $data = [
            'products'  =>  $products
        ];

        return view('edit', $data);
    }

    public function update(Request $request, int $id) {
        //$id = Product::findorfail($id);

        $validateor = $request->validate([
            'product_name'      =>  'required|string',
            'product_quantity'      =>  'required|string',
            'product_price'      =>  'required|string'
        ]); 

        Product::where('id', $id)->update($validateor);

        return redirect(route('home'));
    } 

    public function delete(int $id) {
        $id = Product::findOrfail($id);

       Product::where('id', $id)->delete();

        return redirect()->back()->with('danger', 'Removed Successfuly');
    }
}
