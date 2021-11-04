@extends('layouts.backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý đơn hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header" style="text-align: center">
                <h3>Chi tiết đơn hàng <b>{{$order->code}}</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('manage-order.update', $order->id)}}" method="post">
                @method('PATCH')
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Thông tin người nhận</label>
                    <div class="col-sm-10">
                      <textarea cols="60" rows="10" disabled>
                          {{$order->order_info}}
                      </textarea>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Voucher sử dụng</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control"  value="{{$order->voucher_used}}" disabled>
                    </div>
                  </div>
                  
                  <p><b>Các sản phẩm đã lựa chọn</b></p>
                  <div class="row">
                    @foreach ($orderProduct as $product)
                    <div class="col-4">
                      <div class="card">
                          <img src="{{asset('images/'.json_decode($product->productOrder->image)[0])}}" style="width: 80px; height: 80px;" alt="" class="img-fluid">
                            
                          <a href="{{ route('detail-product',$product->productOrder->slug) }}">
                            <p>{{$product->productOrder->name}}</p>
                          </a>
                          
                          Đã chọn màu: <b>{{$product->color}}</b>
                          Đã chọn size: <b>{{$product->size}}</b>
  
                          Số lượng: {{$product->quantity}}
                          <br>
                          Giá:
                          @if ($product->productOrder->promotion != null)
                          {{number_format( $product->productOrder->promotion*1000*$product->quantity, 0, ',', '.' )}}đ
                          @else
                          {{number_format( $product->productOrder->price*1000*$product->quantity, 0, ',', '.' )}}đ
                          @endif
                      </div>
                    </div>
                    @endforeach
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tổng tiền</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" value="{{number_format($order->total_price*1000, 0, ',', '.' )}}" disabled>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phương thức thanh toán</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="payment">
                        <option value="0" <?php $method = ($order->payment_method == 0) ? "selected" : ''?>{{$method}}>Thanh toán chuyển khoản</option>
                        <option value="1" <?php $method = ($order->payment_method == 1) ? "selected" : ''?>{{$method}}>Thanh toán tại nhà (COD)</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Trạng thái đơn hàng</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="status">
                        <option value="0" <?php $status = ($order->status) == 0 ? "selected" : ''?>{{$status}}>Đang xử lý</option>
                        <option value="1" <?php $status = ($order->status) == 1 ? "selected" : ''?>{{$status}}>Đã xác nhận</option>
                        <option value="2" <?php $status = ($order->status) == 2 ? "selected" : ''?>{{$status}}>Đã giao</option>
                      </select>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="" style="margin-left: 50%">
                  <button type="submit" class="btn btn-info">Cập nhật</button>
                </div>
                <br>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection