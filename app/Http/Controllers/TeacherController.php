<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Teacher::orderBy('created_at', 'desc')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

           $request->validate([
            'name'        => 'required',
            'title'       => 'required',
            'institute'   => 'required',
            'image'       => 'required|image',
            'description' => 'required',
            'status'      => 'required',
        ]);

        $data = new Teacher ();
        $data->name = $request->name;
        $data->title = $request->title;
        $data->institute = $request->institute;

        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'backEnd/images/';
            $image->move($imagePath, $imageName);

            $data->image   = $imagePath . $imageName;
        }
        $data->description = $request->description;
        $data->status = $request->status;


        $data->save();

        return response()->json($data);
    }






    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Teacher::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = Teacher::find($id);
        $data->name = $request->name;
        $data->title = $request->title;
        $data->institute = $request->institute;

        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'backEnd/images/';
            $image->move($imagePath, $imageName);

            $data->image   = $imagePath . $imageName;
        }
        $data->description = $request->description;
        $data->status = $request->status;
        $data->update();

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data = Teacher::find($id);
        if (!$data) {
            return response()->json(['error' => 'Data not found'], 404);
        }
        $data->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }

public function status($id){

    $data = Teacher::find($id);

    if( $data->status == 1){
        $data->status = 0;
    }else{
        $data->status = 1;
    }
    $data->update();

    return response()->json(['message' => 'Data status successfully'], 200);
}

}
