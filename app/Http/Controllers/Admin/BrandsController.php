<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_brands = Brands::get();
        
        return view('admin.brands.index', compact('data_brands'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.brands.create');

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
            'namebrands' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
        ]);
        if ($validator->fails()) {
            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
        if($request->hasfile('filename')) {
            $data_image = "";
            foreach($request->file('filename') as $image)
            {
                $name = $image->getClientOriginalName();
                $filename = time() . $name;
                $image->move('storage/images/',$filename);
                $data[] = $name;  
            }
        }
        $brands = new Brands();
        $brands->name = $request->namebrands;
        $brands->image = json_encode($data);
        $brands->save();
        return response()->json(["status" => "succcess", "code" => 200]);
        //return redirect()->route('admin.brands.index');
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
        // $brands = Brands::where('id', $id)->first();
        // return view('admin.brands.edit', compact('brands'));
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
        $brands = Brands::find($id);
        $validator = Validator::make($request->all(), [
            'namebrands' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
        ]);
        if ($validator->fails()) {

            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
        $dataPrepairUpdate = ['name'=> $request->namebrands];
        $brands = Brands::where('id', $id)->update($dataPrepairUpdate);
        return response()->json(["status" => "succcess", "code" => 200]);
        // return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Brands::where('id', $id)->delete();
        return redirect()->route('admin.brands.index');
    }
}
