@extends('layouts.backend.app')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Quản lý bài viết</li>
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
              <h3>Thêm mới bài viết</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('manage-post.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Tên bài viết</label>
                  <div class="col-sm-10">
                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}" required>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Ảnh đại diện bài viết</label>
                  <div class="col-sm-10">
                    <input type="file" name="filename" accept="image/*" required>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Mô tả</label>
                  <div class="col-sm-10">
                    <textarea name="description" id="" cols="30" rows="10" placeholder="Phần mô tả ngắn sẽ hiện lên trang chủ cùng tiêu đề" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Chi tiết bài viết</label>
                  <div class="col-sm-10">
                    <textarea name="content" rows="10" class="form-control " id="editor1"></textarea>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="" style="margin-left: 50%">
                <button type="submit" class="btn btn-info">Tạo bài viết</button>
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