<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Categories::select(['categories.*'])
            ->with('products')->get();
        $user = $request->user();
        $data_profile = $user->profile;
        
        return view('profile', compact('data_profile', 'data'));
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
        dd($request);
        $profile = Profile::find($id);
        if (empty($profile)) {
            return response()->json(["status" => "fail to update", "code" => 200]);
        }
            if ($request->hasFile('profile-image')) {
                    $images = $request->file('profile-image');
                    $filename = rand(0, 999) . time();
                    $images->move('storage/images/', $filename);       
            }
            $dataPrepairUpdate = [
                'full_name' => $request->fullname,
                'image' => $filename,
                // 'date_of_birth' => $request->date,
                // 'gender' => $request->gender,
                'phone_number' => $request->phone,
                'address' => $request->address,
                'social_network' => $request->social,
                'id_user' => $id,
            ];
            $profile = Profile::where('id', $id)->update($dataPrepairUpdate);
            return response()->json(["status" => "success", "code" => 200]);
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
