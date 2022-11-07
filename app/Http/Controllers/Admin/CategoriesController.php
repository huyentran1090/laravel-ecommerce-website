<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as Validator;
use File;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_categories = Categories::get();

        return view('admin.categories.index', compact('data_categories'));
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
            'namecategory' => 'required|regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/'
        ]);
        if ($validator->fails()) {
            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
        if($request->hasfile('filename1')) {
            $data = [];
           
            foreach($request->file('filename1') as $image)
            {
                $filename = rand(0, 999) . time();
                $image->move('storage/images/',$filename);
                $data[] =  $filename;  
            }
            
        }
        // dd(json_encode($data));
        $categories = new Categories;
        $categories->name = $request->namecategory;
        $categories->image = json_encode($data);
        $categories->save();
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
        // $categories = Categories::where('id', $id)->first();
        // return view('admin.categories.edit', compact('categories'));
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
            'namecategory' => 'required|regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/',
        ]);

        if ($validator->fails()) {
            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
      
        $categories = Categories::find($id);
        if (empty($categories)) {
            return response()->json(["status" => "fail to update", "code" => 200]);
        }

        $images = $request-> file('filename1');
        if($images != null) {
            //delete old image in storage
            $old_image_array = explode(",",$request->old_images);
            foreach ($old_image_array as $old_image) {
                $image_path =   public_path('storage/images/' .$old_image);
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $data_image = [];
            foreach($request->file('filename1') as $image)
            {
                $filename = rand(0, 999) . time();
                $image->move('storage/images/',$filename);
                $data_image[] =  $filename;  
            }
            $dataPrepairUpdate = ['name' => $request->namecategory,
                                    'image' => json_encode($data_image)];

            $categories = Categories::where('id', $id)->update($dataPrepairUpdate);
            return response()->json(["status" => "succcess", "code" => 200]);
        }else {
            $dataPrepairUpdate = ['name' => $request->namecategory];
            $categories = Categories::where('id', $id)->update($dataPrepairUpdate);
            return response()->json(["status" => "succcess", "code" => 200]);
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
        $deleted = Categories::where('id', $id)->delete();
        return redirect()->route('admin.categories.index');
    }
}
