@extends('layouts.backend.app')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Quản lý người dùng</li>
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
              <h3>Chi tiết người dùng</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('edit', $user->id)}}" method="GET">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Họ tên</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" readonly value="{{$user->name}}">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" readonly value="{{$user->email}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Vai trò</label>
                  <div class="col-sm-10">
                    @if($user->role==0)
                    <input type="email" class="form-control" id="inputEmail3" readonly value="Admin">
                    @else
                    <input type="email" class="form-control" id="inputEmail3" readonly value="User">
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" readonly value="{{$user->address}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Số điện thoại</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" readonly value="{{$user->phone}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Ngày sinh</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" readonly value="{{$user->dob}}">
                  </div>
                </div>
                
              </div>
              <!-- /.card-body -->
              <div class="" style="margin-left: 50%">
                <button type="submit" class="btn btn-info">Chỉnh sửa</button>
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