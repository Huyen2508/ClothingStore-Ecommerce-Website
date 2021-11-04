@extends('layouts.backend.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            {{-- <div class="col-sm-12">
                <h1 style="text-align: center">Quản lý ngươi</h1>
            </div> --}}
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản lý Voucher</li>
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
                        <h3>Thêm mới địa chỉ</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-12">
                        <div class="private-information">
                        <form action="{{route('manage-address.update', $address->id)}}" method="post">
                            @method('PATCH')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                      <label  class="col-sm-2 col-form-label">Xã/Phường</label>
                                      <div class="col-sm-10">
                                        <input type="text" name="ward" value="{{$address->ward}}" class="form-control @error('name') is-invalid @enderror"  required>
                                        {{-- @error('name')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror --}}
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                      <label  class="col-sm-2 col-form-label">Huyện/Quận</label>
                                      <div class="col-sm-10">
                                        <input type="text" value="{{$address->district}}"class="form-control" name="district"required/>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <label  class="col-sm-2 col-form-label">Tỉnh/Thành phố</label>
                                      <div class="col-sm-10">
                                        <input type="text" name="city" value="{{$address->city}}" class="form-control" required>
                                      </div>
                                    </div>
                                   
                                  </div>
                                  
                                  <!-- /.card-body -->
                                  <div class="" style="margin-left: 50%">
                                    <button type="submit" class="btn btn-info">Cập nhật địa chỉ</button>
                                  </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
                
            </div>
            
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<!-- /.content -->
@endsection