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
              <h3>Thêm mới người dùng</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('store')}}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Họ tên</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Mật khẩu</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                  <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control"  value="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Vai trò</label>
                  <div class="col-sm-10">

                    <select class="form-control" name="role">
                      <option value="0">Admin</option>
                      <option value="1" selected>User</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Địa chỉ</label>
                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" value="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Số điện thoại</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" value="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Ngày sinh</label>
                  <div class="col-sm-10">
                    <input type="text" name="dob" class="form-control" value="" required>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="" style="margin-left: 50%">
                <button type="submit" class="btn btn-info">Tạo người dùng</button>
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
