<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_products = Product::get();
        $categories = Categories::all();
        $brands = Brands::all();
        return view('admin.products.index', compact('data_products','categories','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'nameproducts' => 'required|regex:/^([A-Za-z0-9]+)(\s[A-Za-z0-9]+)*$/',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        if ($validator->fails()) {
            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
        $products = new Product;
        $products->name = $request-> input('nameproducts');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/',$filename);
            $products->image = $filename;
            
        } 
        
        // $path = $request->file('image')->store('public/images');
        // $path_image = substr($path,7);
        // $products->image = $path_image;
        $products->price = $request->input('price');
        $products->id_cate = $request->input('id_cate');
        $products->id_brand = $request->input('id_brand');
        
        $products->save();
        
        return response()->json(["status" => "succcess", "code" => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $categories = Categories::all();
        // $brands = Brands::all();
        // $products = Product::where('id', $id)->first();
        // return view('admin.products.edit', compact('products','categories','brands'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = Categories::all();
        $data_brands = Brands::all();
        $validator = Validator::make($request->all(), [
            'nameproducts' => 'required|regex:/^([A-Za-z0-9]+)(\s[A-Za-z0-9]+)*$/',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
        
       
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file ->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/',$filename);
        } 
        $dataPrepairUpdate = ['name'=> $request->input('nameproducts'),
                                'image' => $filename,
                                'price' => $request->input('price'),
                                'id_cate' => $request->input('id_cate'),
                                'id_brand' => $request->input('id_brand')
                            ];
        $products = Product::where('id', $id)->update($dataPrepairUpdate);
        return response()->json(["status" => "succcess", "code" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Product::where('id', $id)->delete();
        return redirect()->route('admin.products.index');
    }
}
