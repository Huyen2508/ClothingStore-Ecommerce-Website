@extends('layouts.backend.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Quản lý voucher</li>
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
            <h3>Thêm mới voucher</h3>
          </div>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          
          @if(Session::has('msg'))
          <p class="alert alert-success">{{ Session::get('msg') }}</p>
          @endif
          <!-- /.card-header -->
          <!-- form start -->
          <form class="form-horizontal" action="{{route('manage-voucher.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Mã voucher</label>
                <div class="col-sm-10">
                  <input type="text" name="code" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              
              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Số lần sử dụng (*dạng số)</label>
                <div class="col-sm-10">
                  <input type="number" name="time_use" class="form-control" required>
                </div>
              </div>
              
              <div class="form-group row" >
                <label  class="col-sm-2 col-form-label">Giá trị voucher (*dạng số)</label>
                <div class="col-sm-10">
                  <input type="number" name="value" class="form-control" required>
                </div>
              </div>
            </div>
            
            <!-- /.card-body -->
            <div class="" style="margin-left: 50%">
              <button type="submit" class="btn btn-info">Tạo voucher</button>
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
@endsection