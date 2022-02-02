<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimage;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RoomType::all();
        //returning view
        return view('roomtype.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Returning Create view
        return view('roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "price" => "required",
            "detail" => "required"
        ]);

        //Storing New Room Type
        $data  = new RoomType;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();
        foreach ($request->file('imgs') as $img) {
            $imgPath = $img->store('public/images');
            $imaPath = explode('/',$imgPath);
            $imgPathfinal = $imaPath[1].'/'.$imaPath[2];

            $imgData = new Roomtypeimage;
            $imgData->room_type_id = $data->id;
            $imgData->img_src = $imgPathfinal;
            $imgData->img_alt = $request->title;
            $imgData->save();
        }
        return redirect('admin/roomtype/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Showing single item by id
        $data = RoomType::find($id);
        //returning view
        return view('roomtype.show',['data'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //Showing single item by id
       $data = RoomType::find($id);
       //returning view
       return view('roomtype.edit',['data'=> $data]); 
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
        $data  = RoomType::find($id);
        $data->title = $request->title;
        $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();
        if($request->hasFile('imgs')){
            foreach ($request->file('imgs') as $img) {
                $imgPath = $img->store('public/images');
                $imaPath = explode('/',$imgPath);
                $imgPathfinal = $imaPath[1].'/'.$imaPath[2];
    
                $imgData = new Roomtypeimage;
                $imgData->room_type_id = $data->id;
                $imgData->img_src = $imgPathfinal;
                $imgData->img_alt = $request->title;
                $imgData->save();
            }
        }
        return redirect('admin/roomtype/'.$id.'/edit')->with('success','Data has been Successfuly updated.');
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
        RoomType::where('id',$id)->delete();
        return redirect('admin/roomtype')->with('success','Data has been Successfuly deleted.');

    }
    public function destroy_image($img_id)
    {
        //
        Roomtypeimage::where('id',$img_id)->delete();
        return response()->json(['bool'=> true]);
    }
}
