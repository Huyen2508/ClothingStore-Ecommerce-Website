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
              <form class="form-horizontal" action="{{route('update', $user->id)}}" method="post">
                @method('PATCH')
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Họ tên</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputEmail3" value="{{old('name')? old('name'): $user->name}}" required>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputEmail3" value="{{old('email')? old('email'): $user->email}}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Vai trò</label>
                    <div class="col-sm-10">
                      @if($user->role==0)
                      <select class="form-control" name="role">
                        <option value="0" selected>Admin</option>
                        <option value="1">User</option>
                      </select>
                      @else
                      <select class="form-control" name="role">
                        <option value="0">Admin</option>
                        <option value="1" selected>User</option>
                      </select>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ</label>
                    <div class="col-sm-10">
                      <input type="text" name="address" class="form-control" id="inputEmail3" value="{{old('address')? old('address'): $user->address}}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                      <input type="text" name="phone" class="form-control" id="inputEmail3" value="{{old('phone')? old('phone'): $user->phone}}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Ngày sinh</label>
                    <div class="col-sm-10">
                      <input type="text" name="dob" class="form-control" id="inputEmail3" value="{{old('dob')? old('dob'): $user->dob}}" required>
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