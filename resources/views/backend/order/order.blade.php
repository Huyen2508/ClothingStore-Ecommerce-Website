@extends('layouts.backend.app')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lý đơn hàng</li>
              </ol>
          </div>
        </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="card">
            <div class="card-header">
              <h3 style="text-align: center">Quản lý đơn hàng</h3>
            </div>

            @if(session()->has('msg'))
            <div class="alert" style="background: #5CB85C">
              <h4 style="text-align: center">{{ session()->get('msg') }}</h4>
            </div>
            @endif
            <br>

            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Mã đơn</th>
                    <th>Địa chỉ</th>
                    <th style="width: 10%; text-align:center">Tổng giá</th>
                    <th>Mã giảm giá</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($order as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->code}}</td>
                    <td><pre>{{$order->order_info}}</pre></td>
                    <td>{{number_format($order->total_price*1000, 0, ',', '.' )}}đ</td>
                    <td>{{$order->voucher_used}}</td>

                    @if($order->payment_method == 0)
                    <td>Thanh toán chuyển khoản</td>
                    @elseif($order->payment_method == 1)
                    <td>Thanh toán tại nhà (COD)</td>
                    @endif
                    
                    @if($order->status == 0)
                    <td>Đang xử lý</td>
                    @elseif($order->status == 1)
                    <td>Đã xác nhận</td>
                    @elseif($order->status == 2)
                    <td>Đã giao</td>
                    @endif
                    <td>
                      <div class="row">
                        <div class="col-4">
                            <a href="{{route('manage-order.edit', $order->id)}}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-icon btn-secondary btn-xs"><i class="fas fa-pencil-alt"></i></a>
                        </div>
                        <form action="{{route('manage-order.destroy', $order->id)}}" method="post" class="test col-4">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-icon btn-danger btn-xs" onclick="return confirm('Bạn có muốn xóa đơn hàng này không?');" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
    <!-- /.col -->
  </section>
  <!-- /.content -->
@endsection