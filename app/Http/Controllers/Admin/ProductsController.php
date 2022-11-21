<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Product;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Categories::all();
        $brands = Brands::all();
        $data_products = Product::select('*');
        if ($request->name) {
            $nameSearch = $request->name;
            $data_products->where(function ($query) use ($nameSearch){
                return $query
                    ->where('name', 'LIKE', '%'. $nameSearch .'%');      
            });
        }        
        $data_products = $data_products->paginate(5);
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
        $validator = Validator::make($request->all(), [
            'nameproducts' => 'required|regex:/^([A-Za-z0-9]+)(\s[A-Za-z0-9]+)*$/',
            'product-image' => 'required|array',
            'product-image.*' => 'bail|mimes:jpg,png,jpeg'
        ], [
            'product-image.*.mimes' => 'The filename must be a file of type: jpg.',
        ]);
        if ($validator->fails()) {
            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
        if ($request->hasFile('product-image')) {
            $data = [];
            foreach ($request->file('product-image') as $image) {
                $filename = rand(0, 999) . time();
                $image->move('storage/images/', $filename);
                $data[] =  $filename;
            }  
        }
        $products = new Product;
        $products->name = $request-> input('nameproducts');
        $products->image = json_encode($data);
        $products->price = $request->input('price');
        $products->id_cate = $request->input('id_cate');
        $products->id_brand = $request->input('id_brand');
        $products->save();
        return response()->json(["status" => "success", "code" => 200]);
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
        $validator = Validator::make($request->all(), [
            'nameproducts' => 'required|regex:/^([A-Za-z0-9]+)(\s[A-Za-z0-9]+)*$/',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_cate' => [
                'required',
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query = $query->whereNull('deleted_at');
                    return $query;
                })
            ],
        ]);
        if ($validator->fails()) {
            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
        $products = Product::find($id);
        if (empty($products)) {
            return response()->json(["status" => "fail to update", "code" => 200]);
        }
        $images = $request->file('product-image1');
        if ($images != null) {
            $old_image_array = explode(",", $request->old_images);
            foreach ($old_image_array as $old_image) {
                $image_path =   public_path('storage/images/' . $old_image);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $data_image = [];
            foreach ($request->file('product-image1') as $image) {
                $filename = rand(0, 999) . time();
                $image->move('storage/images/', $filename);
                $data_image[] =  $filename;
            }
            $dataPrepairUpdate = [
                'name' => $request-> nameproducts,
                'image' => json_encode($data_image),
                'price' => $request-> price,
                'id_cate' => $request->id_cate,
                'id_brand' => $request->id_brand
            ];
            $products = Product::where('id', $id)->update($dataPrepairUpdate);
            return response()->json(["status" => "success", "code" => 200]);
        } else {
            $dataPrepairUpdate = [
                'name' => $request->namecategory,
                'price' => $request-> price,
                'id_cate' => $request->id_cate,
                'id_brand' => $request->id_brand
            ];
            $products = Product::where('id', $id)->update($dataPrepairUpdate);
            return response()->json(["status" => "success", "code" => 200]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Product::find($id);
        $image_array = json_decode($deleted->image);
        foreach ($image_array as $image_delete) {
            $image_path = public_path('storage/images/' . $image_delete);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $deleted->delete();
        return redirect()->route('admin.products.index');
    }
}
