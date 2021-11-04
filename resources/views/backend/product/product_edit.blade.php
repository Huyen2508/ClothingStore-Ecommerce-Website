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
                        <h3>Chỉnh sửa thông tin sản phẩm</h3>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('manage-product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{$product->name}}" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Danh mục sản phẩm</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category">
                                        @foreach($category as $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tag của sản phẩm</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="tag">
                                        @foreach($tag as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ảnh</label>
                                <div class="col-sm-10">
                                    @foreach ($image as $img)
                                    <img src="{{asset('images/'.$img)}}" alt="" height="100" width="100">
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Thay ảnh (không bắt buộc)</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="filename[]" id="file" accept="image/*" multiple/>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Số lượng</label>
                                <div class="col-sm-10">
                                    <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Các màu của sản phẩm (nếu có)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="color" class="form-control" value="{{$product->color}}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Các size của sản phẩm (nếu có)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="size" class="form-control" value="{{$product->size}}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Giá gốc 1 sản phẩm (nghìn VNĐ)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="price" class="form-control" value="{{number_format( $product->price, 0, ',', ' ' )}}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Giá khuyến mại 1 sản phẩm (nếu có) (nghìn VNĐ)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="promition" class="form-control" 
                                    value="@isset($product->promotion){{number_format( $product->promotion, 0, ',', ' ')}}@endisset">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="editor2" cols="30" rows="10" 
                                    class="form-control">{{$product->description}}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Chi tiết sản phẩm</label>
                                <div class="col-sm-10">
                                    <textarea name="detail" class="form-control" id="editor1">{{$product->detail}}</textarea>
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