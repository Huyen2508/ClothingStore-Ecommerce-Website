<?php

namespace App\Http\Controllers\Backend;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{

    public function index()
    {
        $data = Product::all();
        return view('backend.excel', compact('data'));
    }

    public function export()
    {

        return Excel::download(new UsersExport, 'san_pham.xlsx');
    }

    public function import(Request $request)
    {
        
        $extension = $request->file->getClientOriginalExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {
            Excel::import(new UsersImport, request()->file('file'));

            return back()->with('msg', 'Thêm dữ liệu từ file thành công');
        }else{
            return back()->with('msg', 'Thêm dữ liệu không thành công, kiểm tra lại dữ liệu của file hoặc định dạng của file');
        }
    }
}
