<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address= Address::all();
        return view('backend.address.address', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.address.address_create');
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
       if(Auth::check() && Auth::user()->role==0){
           $address = new Address();
           $address->ward= $request->get('ward');
           $address->district = $request->get('district');
           $address->city = $request->get('city');
           $address->save();
           return redirect()->route('manage-address.index')->with('msg', "Thêm mới địa chỉ thành công");
       }else{
           return back();
       }
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
        if(Auth::check()&&Auth::user()->role==0){
            $address = Address::find($id);
            return view('backend.address.address_edit', compact('address'));
        }
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
        if(Auth::check()&&Auth::user()->role==0){
            $address = Address::find($id);
            $address->ward= $request->get('ward');
            $address->district= $request->get('district');
            $address->city= $request->get('city');
            $address->save();
            return redirect()->route('manage-address.index')->with('msg', 'Cập nhật địa chỉ thành công');
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
        if(Auth::check()&&Auth::user()->role==0){
            $address= Address::find($id);
            $address->delete();
            return back()->with('msg', 'Xóa địa chỉ thành công');
        }
    }
}
