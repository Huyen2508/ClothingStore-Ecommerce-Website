@extends('layouts.backend.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- /.card-header -->
                <div class="card card-info">
                    <div class="card-header" style="text-align: center">
                        <h3>Chỉnh sửa thông tin voucher</h3>
                    </div>
                    @if(Session::has('msg'))
                    <p class="alert alert-success">{{ Session::get('msg') }}</p>
                    @endif
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('manage-voucher.update', $voucher->id)}}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mã voucher</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="code" value="{{$voucher->code}}" required>
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Số lần sử dụng</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="times_use" value="{{$voucher->times_use}}" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Giá trị </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="value" value="{{$voucher->value}}" required>
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
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection