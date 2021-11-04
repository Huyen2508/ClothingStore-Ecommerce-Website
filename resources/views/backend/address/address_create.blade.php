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
                        <form action="{{route('manage-address.store')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                      <label  class="col-sm-2 col-form-label">Xã/Phường</label>
                                      <div class="col-sm-10">
                                        <input type="text" name="ward" class="form-control @error('name') is-invalid @enderror"  required>
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
                                        <input type="text" class="form-control" name="district"required/>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <label  class="col-sm-2 col-form-label">Tỉnh/Thành phố</label>
                                      <div class="col-sm-10">
                                        <input type="text" name="city" class="form-control" required>
                                      </div>
                                    </div>
                                   
                                  </div>
                                  
                                  <!-- /.card-body -->
                                  <div class="" style="margin-left: 50%">
                                    <button type="submit" class="btn btn-info">Tạo địa chỉ mới</button>
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
    
    {{-- <script type="text/javascript">
        $('#country').change(function(){
            var provinceID = $(this).val();    
            if(provinceID){
                $.ajax({
                    type:"GET",
                    url:"{{url('get-district-list')}}?province_id="+provinceID,
                    success:function(res){               
                        if(res){
                            $("#state").empty();
                            $("#state").append('<option value="">Chọn Quận/Huyện</option>');
                            $.each(res,function(key,value){
                                $("#state").append('<option value="'+key+'">'+value+'</option>');
                            });
                            
                        }else{
                            $("#state").empty();
                        }
                    }
                });
            }else{
                $("#state").empty();
                $("#city").empty();
            }      
        });
        $('#state').on('change',function(){
            var districtID = $(this).val();    
            if(districtID){
                $.ajax({
                    type:"GET",
                    url:"{{url('get-ward-list')}}?district_id="+districtID,
                    success:function(res){               
                        if(res){
                            $("#city").empty();
                            $("#city").append('<option value="">Chọn Phường/Xã</option>');
                            $.each(res,function(key,value){
                                $("#city").append('<option value="'+key+'">'+value+'</option>');
                            });
                            
                        }else{
                            $("#city").empty();
                        }
                    }
                });
            }else{
                $("#city").empty();
            }
        });
    </script>  --}}
</section>

<!-- /.content -->
@endsection