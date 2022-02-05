<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return $data = Customer::all();
        //returns index view with all data
        //return view('customers.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //load insert customer view
        return view('customers.create');
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
            'full_name' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ]);
        //Storing Customer Record
        $imgPath = $request->file('photo')->store('public/images');
        $imaPath = explode('/',$imgPath);
        $data = new Customer;
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->password = sha1($request->mobile);
        $data->address = $request->address;
        $data->photo = $imaPath[1].'/'.$imaPath[2];
        $data->save();

        return redirect('admin/customer/create')->with('success','Customer Record successfuly added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show single customer record 
        $data = Customer::find($id);
        return view('customers.show',['data'=> $data]);
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
        $data = Customer::find($id);
        return view('customers.edit',['data'=>$data]);
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
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ]);

        if( $request->hasFile('photo')){
            $imgPath = $request->file('photo')->store('public/images');
            $imaPath = explode('/',$imgPath);
            $imgPathfinal = $imaPath[1].'/'.$imaPath[2];
        }else{
            $imgPathfinal = $request->prev_photo;
        }
        //Storing Customer Record
        $data = Customer::find($id);
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->photo = $imgPathfinal;
        $data->save();

        return redirect('admin/customer/'.$id.'/edit')->with('success','Customer Record successfuly Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete customer record
        Customer::where('id',$id)->delete();
        return redirect('admin/customer')->with('success','Customer Record successfuly deleted.');
    }
}
