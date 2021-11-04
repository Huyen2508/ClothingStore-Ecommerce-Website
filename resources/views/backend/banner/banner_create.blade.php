@extends('layouts.backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý banner</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">

            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header" style="text-align: center">
                <h3>Thêm mới banner</h3>
              </div>
              <div class="card">
                <h4 style="margin-left:10px">Vị trí hiển thị banner</h4>
                <div class="row">
                  <div class="col-8">
                    <h4 style="margin-left:10px">Trang chủ</h4>
                    <img src="{{asset('images/index_section.png')}}" alt="" height="400" width="500" >
                  </div>
                  <div class="col-4">
                    <h4 >Trang chi tiết sản phẩm</h4>
                    <img src="{{asset('images/detail_section.png')}}" alt="" height="600" width="300">
                  </div>
                  <div class="col-8">
                    <h4>Trang danh mục sản phẩm</h4>
                    <img src="{{asset('images/cate_section.png')}}" alt="" height="400" width="500">
                  </div>
                  <div class="col-4">
                    <h4>Quy tắc</h4>
                    <table class="text-center table table-bordered table-striped">
                      <tr>
                        <td>Khu vực</td>
                        <td>Số lượng banner tối đa</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>5</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>4</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>2</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>5</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h3>Thêm mới Banner</h3>
                </div>

                <form action="{{route('manage-banner.store')}}" method="POST" enctype="multipart/form-data" class="form-group">
                  <div class="card-body">
                    @csrf
                    <label>Chọn khu vực: </label>
                    <select class="form-control @error('section') is-invalid @enderror" name="section" value="">
                      <option selected value="0"></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                    </select>
                    @error('section')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label>Tên banner: </label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label>Upload Banner</label><br>
                    <strong>định dạng: jpeg,png,jpg,gif,svg | tối đa: 2MB mỗi ảnh</strong>
                    <input type="file" class="form-control" name="filename[]" id="file" accept="image/*" multiple />
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-6 text-right">
                        <a href="{{route('manage-banner.index')}}" class="btn btn-danger">Hủy</a>
                      </div>
                      <div class="col-6 text-left">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
{{--            <footer class="main-footer">--}}
{{--              <div class="float-right d-none d-sm-block">--}}
{{--                <b>Version</b> 3.0.4--}}
{{--              </div>--}}
{{--              <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights--}}
{{--              reserved.--}}
{{--            </footer>--}}

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
          </div>
        </div>
      </div>
    </section>
@endsection
