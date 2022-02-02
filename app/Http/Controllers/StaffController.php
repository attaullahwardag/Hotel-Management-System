<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;
use App\Models\StaffPayment;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Staff::all();
        return view('staff.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Department::all();
        return view('staff.create',['department'=>$data]);
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
        $imagePath = $request->file('photo')->store('public/images');
        $imagePath = explode('/',$imagePath);
        $data = new Staff;
        $data->full_name = $request->full_name;
        $data->department_id = $request->department_id;
        $data->photo = $imagePath[1].'/'.$imagePath[2];
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amount = $request->salary_amount;
        $data->save();

        return redirect('admin/staff/create')->with('success','Staff Record successfuly added.');
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
        $data = Staff::find($id);
        return view('staff.show',['data'=> $data]);
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
        $depart = Department::all();
        $data =  Staff::find($id);
        return view('staff.edit',['data'=>$data, 'department'=>$depart]);
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
        $request->validate([
            'full_name' => 'required',
            'salary_amount' => 'required',
        ]);

        if( $request->hasFile('photo')){
            $imgPath = $request->file('photo')->store('public/images');
            $imaPath = explode('/',$imgPath);
            $imgPathfinal = $imaPath[1].'/'.$imaPath[2];
        }else{
            $imgPathfinal = $request->prev_photo;
        }
        //Storing Customer Record
        $data = Staff::find($id);
        $data->full_name = $request->full_name;
        $data->department_id = $request->department_id;
        $data->photo = $imgPathfinal;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amount = $request->salary_amount;
        $data->save();

        return redirect('admin/staff/'.$id.'/edit')->with('success','Customer Record successfuly Updated.');
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
        Staff::where('id',$id)->delete();
        return redirect('admin/staff')->with('success','Staff record has been Successfuly deleted.');
    }

    public function add_payment($id){
        return view('staffpayment.create',['staff_id'=>$id]);
    }
    public function save_payment (Request $request, $staf_id){
        $data = new StaffPayment;
        $data->Staff_id = $staf_id;
        $data->amount = $request->amount;
        $data->payment_date = $request->payment_date;
        $data->save();
        return redirect('admin/staff/payment/'.$staf_id.'/add')->with('success','Payment successfuly made');
    }
}
