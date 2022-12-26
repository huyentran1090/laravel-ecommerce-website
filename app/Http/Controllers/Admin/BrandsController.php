<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Response;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_brands = Brands::select('*');
        if ($request->name) {
            $nameSearch = $request->name;
            $data_brands->where(function ($query) use ($nameSearch) {
                return $query->where('name', 'LIKE', '%' . $nameSearch . '%');
            });
        }
        $data_brands = $data_brands->paginate(5);
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
            'filename' => 'required|array',
            'filename.*' => 'bail|mimes:jpg,png,jpeg|max:1024'
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
        $brands = new Brands();
        $brands->name = $request->namebrands;
        $brands->image = json_encode($data);
        $brands->save();
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
        $validator = Validator::make($request->all(), [
            'namebrands' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'filename1' => 'required|array',
            'filename1.*' => 'bail|mimes:jpg,png,jpeg|max:1024'
        ], [
            'filename1.*.mimes' => 'The filename must be a file of type: jpg.',
        ]);
        if ($validator->fails()) {
            return response()->json(["validator" => $validator->errors(), "code" => 422]);
        }
        $brands = Brands::find($id);
        if (empty($brands)) {
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
                'name' => $request->namebrands,
                'image' => json_encode($data_image)
            ];
            $categories = Brands::where('id', $id)->update($dataPrepairUpdate);
            return response()->json(["status" => "succcess", "code" => 200]);
        } else {
            $dataPrepairUpdate = ['name' => $request->namebrands];
            $categories = Brands::where('id', $id)->update($dataPrepairUpdate);
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
        $deleted = Brands::find($id);
        $image_array = json_decode($deleted->image);
        foreach ($image_array as $image_delete) {
            $image_path = public_path('storage/images/' . $image_delete);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $deleted->delete();
        return redirect()->route('admin.brands.index');
    }
}
