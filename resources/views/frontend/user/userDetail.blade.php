@extends('layouts.frontend.app')
@section('content')
<div class="main-body-content">
    <div class="row py-2 mt-2 px-4" id="background-infor">
        <img src="assets/img/arashmil.jpg" class="rounded-circle" alt="Cinque Terre" width="125px" height="" > 
        <div id="pesonal-infor" style="padding-top: 27px; padding-left: 12px;">
            <p >Xin chào <b>{{$user->name}}</b></p>
            {{-- <p><i class="fas fa-pen" style="margin-right: 3px;"></i>Sửa hồ sơ</p> --}}
        </div>
    </div>
    <div class="row">

        <!-- left category -->
        <div class=" py-4 col-3 d-lg-block d-none">
            <div class="list-group" id="text-hidden-category">
                <a href="" class="list-group-item list-group-item-action"><b><i class="fas fa-user" style="margin-right:10px;"></i>Thông tin lịch sử đơn hàng</b></a>
                {{-- <a href="user-details.html" class="list-group-item list-group-item-action" ><i class="fas fa-circle" style="margin-right: 3px;margin-top: 7px; font-size: 6px;"></i>Thông tin cá nhân</a> --}}
            </div>
        </div>
        
        <div class="card col-lg-9 col-12 mt-4" style="height: 72%">
            <div class="row no-gutters" >
                <div class="px-2 pt-3 col-md-12" >
                    <h5 style="border-left: 3px solid #f09819; padding-left:5px;"><b>Lịch sử đơn hàng </b></h5>
                    <hr width=100%>
                    <!-- <img src="assets/img/tick.png" class="card-img" alt="..." style="padding:10px; width: 70px; height:70px;" > -->
                </div>
                <div class="col-12">
                    <div class="private-information">
                        <div class="table-responsive d-lg-block d-none">
                            <table class="table table-hover">
                                <thead> 
                                    <tr>
                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Khuyến mãi</th>
                                        <th scope="col">Tổng tiền đơn hàng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Ngày tạo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row" id="number-code"><a href="{{route('order-detail',$order->id)}}">{{$order->code}}</a></th>
                                            <td id="text-discount">{{$order->voucher_used}}</td>
                                            <td id="total-cost">{{number_format($order->total_price*1000, 0, ',', '.' )}}đ</td>
                                            <td style="color: rgb(5, 170, 5);">
                                                @if ($order->status == 0)
                                                    Đang chờ
                                                @elseif($order->status == 1)
                                                    Đã duyệt
                                                @else
                                                    Đã giao
                                                @endif
                                            </td>
                                            <td id="date">
                                                <p>{{$order->created_at}}</p>
                                            </td>
                                            <td><a href="{{route('order-detail',$order->id)}}">Xem chi tiết</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
