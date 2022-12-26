<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categories::select(['categories.*'])
                ->with('products')->get();
        // $data = Categories::select(['categories.id', 'categories.name as cate_name', 'product.name as product_name', 'product.image as image', 'product.price', 'brands.name as brand_name'])
        //         ->Join('product', 'categories.id', '=', 'product.id_cate')
        //         ->join('brands', 'brands.id', '=', 'product.id_brand')
        //         ->get();
        // $data_cate = [];
        // foreach ($data as $key => $value) {
        //     if (array_key_exists($value['id'], $data_cate)) {
        //         array_push($data_cate[$value['id']]['product'],  [
        //             "name" => $value['product_name'],
        //             "brand_name" => $value['brand_name'],
        //             "image" => json_decode($value['image'])
        //         ]);
        //     } 
        //     else {
        //         $data_cate[$value['id']]['name_cate'] = $value['cate_name'];
        //         $data_cate[$value['id']]['product'] = [
        //             [
        //                 "name" => $value['product_name'],
        //                 "brand_name" => $value['brand_name'],
        //                 "image" => json_decode($value['image'])
        //             ]
        //         ];
        //     }
        // }
        // dd($data);
        return view('include.body', compact('data'));
    }

    public function shopping()
    {
        $data = Categories::select(['categories.*'])
                ->with('products')->get();
        return view('shopping-cart', compact('data'));
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
