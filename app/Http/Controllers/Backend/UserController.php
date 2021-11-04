<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $user = User::all();
            return view('backend.user.user', compact('user'));
        } else {
            return redirect('index');
            exit();
        }
    }

    public function detail($id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $user = User::findOrFail($id);
            return view('backend.user.user_detail', compact('user'));
        } else {
            return redirect('index');
            exit();
        }
    }

    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $user = User::findOrFail($id);
            return view('backend.user.user_edit', compact('user'));
        } else {
            return redirect('index');
            exit();
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->emaiL = $request->input('email');
            $user->role = $request->input('role');
            $user->address = $request->input('address');
            $user->phone = $request->input('phone');
            $user->dob = $request->input('dob');
            $user->save();
            return redirect()->route('user');
        } else {
            return redirect('index');
            exit();
        }
    }

    public function delete($id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $user = User::findOrFail($id);
            $user->delete();
            return back();
        } else {
            return redirect('index');
            exit();
        }
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            return view('backend.user.user_create');
        } else {
            return redirect('index');
            exit();
        }
    }

    public function store(Request $request)
    {
        //    dd($request);

        if (Auth::check() && Auth::user()->role == 0) {

            $rules = ([
                'name' => ['required', 'string', 'min:3', 'max:255', 'unique:users'],      //'regex:/^[a-z0-9._-]{4,16}$/i'
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/i'],
                'password' => ['required', 'string',  'confirmed']
            ]);

            $this->validate($request, $rules);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'address' => $request->address,
                'phone' => $request->phone,
                'dob' => $request->dob
            ]);

            if ($user) {
                return redirect()->route('user')->with('msg', 'Thêm người dùng thành công');
            } else {
                dd('error');
            }
        } else {
            return redirect('index');
            exit();
        }
    }
}
