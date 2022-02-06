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
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rooms = Room::with('Roomtype')->get();

        return view('rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roomTypes = RoomType::all();

        return view('rooms.create',compact('roomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'roomtype' => 'required',
        ]);

        $data =  new Room;
        $data->room_type_id = $request->roomtype;
        $data->title = $request->title;
        $data->save();

        return redirect('admin/rooms/create')
            ->with('success','Room added successfuly.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $roomtypes = RoomType::all();

        return view('rooms.edit',['room'=> $room, 'roomtypes'=>$roomtypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'title' => 'required',
            'roomtype' => 'required',
        ]);

        $room->title = $request->title;
        $room->room_type_id = $request->roomtype;
        $room->save();

         return redirect('admin/rooms/'.$room->id.'/edit')
            ->with('success','Data has been Successfuly updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::find($id)->delete();

        return redirect('admin/rooms')->with('success','Data has been Successfuly deleted.');
    }
}
