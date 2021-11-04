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
                  <h3>Chi tiết sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('manage-product.edit', $product->id)}}" method="GET">
                  <div class="card-body">
                      <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                          <div class="col-sm-10">
                              <input class="form-control" type="text" name="title" value="{{$product->name}}" required disabled>
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Danh mục sản phẩm</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control"  readonly value="{{$product->category_id}}">
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Tag của sản phẩm</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control"  readonly value="{{$product->tag_id}}">
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
                          <label  class="col-sm-2 col-form-label">Số lượng</label>
                          <div class="col-sm-10">
                              <input type="text" name="quantity" class="form-control" disabled value="{{$product->quantity}}">
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Các màu của sản phẩm (nếu có)</label>
                          <div class="col-sm-10">
                              <input type="text" name="color" class="form-control" disabled value="{{$product->color}}">
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Các size của sản phẩm (nếu có)</label>
                          <div class="col-sm-10">
                              <input type="text" name="size" class="form-control" disabled value="{{$product->size}}">
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Giá gốc 1 sản phẩm (nghìn VNĐ)</label>
                          <div class="col-sm-10">
                              <input type="text" name="price" class="form-control" disabled value="{{number_format( $product->price*1000, 0, ',', ' ' )}}">
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Giá khuyến mại 1 sản phẩm (nếu có) (nghìn VNĐ)</label>
                          <div class="col-sm-10">
                              <input type="text" name="promition" class="form-control" disabled 
                              value="@isset($product->promotion)
                              {{number_format( $product->promotion*1000, 0, ',', ' ' )}}
                              @endisset">
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Mô tả</label>
                          <div class="col-sm-10">
                              <textarea name="description" id="editor2" cols="30" rows="10" 
                              class="form-control" disabled>{{$product->description}}</textarea>
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Chi tiết sản phẩm</label>
                          <div class="col-sm-10">
                              <textarea name="content" class="form-control" id="editor1" disabled>{{$product->detail}}</textarea>
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
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection