<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room::all();
        return view('rooms.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = RoomType::all();
        // Returning Create view
        return view('rooms.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store Room 
        $data =  new Room;
        $data->room_type_id = $request->roomtype;
        $data->title = $request->title;
        $data->save();

        return redirect('admin/rooms/create')->with('success','Room added successfuly.');

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
        $data = Room::find($id);
        return view('rooms.show',['data'=> $data]);
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
        $roomtypes = RoomType::all();
        $data = Room::find($id);
        return view('rooms.edit',['data'=> $data, 'roomtypes'=>$roomtypes]);
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
         $data  = Room::find($id);
         $data->title = $request->title;
         $data->room_type_id = $request->roomtype;
         $data->save();
         return redirect('admin/rooms/'.$id.'/edit')->with('success','Data has been Successfuly updated.');
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
        Room::where('id',$id)->delete();
        return redirect('admin/rooms')->with('success','Data has been Successfuly deleted.');
    }
}
