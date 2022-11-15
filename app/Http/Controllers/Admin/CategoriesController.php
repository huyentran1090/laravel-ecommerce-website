<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_categories = Categories::select('*');
        if ($request->name) {
            $nameSearch = $request->name;
            $data_categories->where(function ($query) use ($nameSearch){
                return $query
                    ->where('name', 'LIKE', '%'. $nameSearch .'%');
            });
        }        
        $data_categories = $data_categories->paginate(5);
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
            'namecategory' => 'required|regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/',
            'filename' => 'required|array',
            'filename.*' => 'bail|mimes:jpg,png,jpeg'
        ], [
            'filename.*.mimes' => 'The filename must be a file of type: jpg.',
        ]);
        if ($validator->fails()) {
            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
        if ($request->hasFile('filename')) {
            $data = [];
            foreach ($request->file('filename') as $image) {
                $filename = rand(0, 999) . time();
                $image->move('storage/images/', $filename);
                $data[] =  $filename;
            }
        }
        $categories = new Categories;
        $categories->name = $request->namecategory;
        $categories->image = json_encode($data);
        $categories->save();
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
        $validator = Validator::make($request->all(), [
            'namecategory' => 'required|regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/',
            // 'filename1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
        $imageRules = array(
            'filename1' => 'required|array',
            'filename1.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048'
        );
        foreach ($request->file('filename1') as $image) {
            $image = array('filename1' => $image);
            $imageValidator = Validator::make($image, $imageRules);
            if ($imageValidator->fails()) {
                $messages = $imageValidator->errors();
            }
        }
        $categories = Categories::find($id);
        if (empty($categories)) {
            return response()->json(["status" => "fail to update", "code" => 200]);
        }

        $images = $request->file('filename1');
        if ($images != null) {
            $old_image_array = explode(",", $request->old_images);
            foreach ($old_image_array as $old_image) {
                $image_path =   public_path('storage/images/' . $old_image);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $data_image = [];
            foreach ($request->file('filename1') as $image) {
                $filename = rand(0, 999) . time();
                $image->move('storage/images/', $filename);
                $data_image[] =  $filename;
            }
            $dataPrepairUpdate = [
                'name' => $request->namecategory,
                'image' => json_encode($data_image)
            ];
            $categories = Categories::where('id', $id)->update($dataPrepairUpdate);
            return response()->json(["status" => "succcess", "code" => 200]);
        } else {
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
        $deleted = Categories::find($id);
        $image_array = json_decode($deleted->image);
        foreach ($image_array as $image_delete) {
            $image_path = public_path('storage/images/' . $image_delete);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $deleted->delete();
        return redirect()->route('admin.categories.index');
    }
}
