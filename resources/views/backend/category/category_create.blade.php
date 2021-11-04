@extends('layouts.backend.app')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Quản lý danh mục</li>
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
              <h3>Thêm mới sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('manage-category.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Tên danh mục</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="" required>
                  </div>
                </div>
                
              </div>
              <!-- /.card-body -->
              <div class="" style="margin-left: 50%">
                <button type="submit" class="btn btn-info">Tạo mới danh mục</button>
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