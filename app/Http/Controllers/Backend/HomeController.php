<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $user = User::all()->count();
            $orders = Order::all()->count();
            
            $handledOrder = Order::where('status',2)->get();
            $orderDone = $handledOrder->count();
            $revenue = 0;

            //number of users registered
            $range = \Carbon\Carbon::now()->subYears(1);
            $countUser = DB::table('users')
                        ->select(DB::raw('month(created_at) as getMonth'),DB::raw('year(created_at) as getYear'), DB::raw('COUNT(*) as value'))
                        ->where('created_at', '>=', $range)
                        ->groupBy('getMonth','getYear')
                        ->orderBy('getMonth', 'ASC')
                        ->get();

            //number of order in latest 12 months
            $countOrder = DB::table('orders')
                        ->select(DB::raw('month(created_at) as getMonth'),DB::raw('year(created_at) as getYear'), DB::raw('COUNT(*) as value'))
                        ->where('created_at', '>=', $range)
                        ->groupBy('getMonth','getYear')
                        ->orderBy('getMonth', 'ASC')
                        ->get();
            
            //count profit
            $countProfit = DB::table('orders')
                        ->select(DB::raw('month(created_at) as getMonth'),DB::raw('year(created_at) as getYear'), DB::raw('SUM(total_price) as value'))
                        ->where([['created_at', '>=', $range],['status',2]])
                        ->groupBy('getMonth','getYear')
                        ->orderBy('getMonth', 'ASC')
                        ->get();
            
            foreach($handledOrder as $order)
            {
                $revenue = $revenue + $order->total_price;
            }

            //20 loyal customers
            $loyalUser = DB::table('orders')
                        ->select('user_id',DB::raw('COUNT(*) as value'))->whereNotNull('user_id')
                        ->groupBy('user_id')
                        ->orderBy('value','DESC')
                        ->limit(20)
                        ->get();
            

            return view('backend/index',compact('user','orders','orderDone','revenue','countUser','countOrder','countProfit','loyalUser'));
        } else {
            return redirect ('login');
        }
    }
}
