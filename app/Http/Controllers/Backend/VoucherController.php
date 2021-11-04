<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $voucher = Voucher::all();
            return view('backend.voucher.voucher', compact('voucher'));
        } else {
            return redirect('index');
            exit();
        }
    }

    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $voucher = Voucher::findOrFail($id);
            return view('backend.voucher.voucher_edit', compact('voucher'));
        } else {
            return redirect('index');
            exit();
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $voucher= Voucher::find($id);
            $voucher->code = $request->input('code');
            $voucher->times_use = $request->input('times_use');
            $voucher->value = $request->input('value');
            
            $voucher->save();
            return back()->with('msg', 'Cập nhật thành công');
        } else {
            return redirect('index');
            exit();
        }
    }

    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $voucher = Voucher::findOrFail($id);
            $voucher->delete();
            return back();
        } else {
            return redirect('index');
            exit();
        }
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            return view('backend.voucher.voucher_create');
        } else {
            return redirect('index');
            exit();
        }
    }

    public function store(Request $request)
    {

        if (Auth::check() && Auth::user()->role == 0) {

            $rules = ([
                'code' => ['required'],
                'time_use' => ['required', 'integer'],
                'value' => ['required', 'integer']
            ]);
            $this->validate($request, $rules);
            
            $voucher = Voucher::create([
                'code' => $request->code,
                'times_use' => $request->time_use,
                'value' => $request->value,
                
            ]);

            if ($voucher) {
                return back()->with('msg', 'Thêm voucher dùng thành công');
            } 
        } else {
            return redirect('index');
            exit();
        }
    }
}
