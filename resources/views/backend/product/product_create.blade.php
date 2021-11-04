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
            <h3>Thêm mới sản phẩm</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form class="form-horizontal" action="{{route('manage-product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Tên sản phẩm</label>
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
                <label  class="col-sm-2 col-form-label">Danh mục</label>
                <div class="col-sm-10">
                  <select class="form-control" name="category">
                    @foreach($category as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Chọn tag</label>
                <div class="col-sm-10">

                  <select class="form-control" name="tag">
                    @foreach($tag as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Ảnh</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="filename[]" id="file" accept="image/*" multiple required/>
                </div>
              </div>

              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Số lượng</label>
                <div class="col-sm-10">
                  <input type="number" name="quantity" class="form-control" required>
                </div>
              </div>

              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Các màu của sản phẩm (nếu có)</label>
                <strong>ghi tên màu sản phẩm dưới dạng: đỏ, xanh, vàng, tím,...</strong>
                <div class="col-sm-10" style="margin-left:173px">
                  <input type="text" name="color" class="form-control">
                </div>
              </div>

              <div class="form-group row" >
                <label  class="col-sm-2 col-form-label">Các size của sản phẩm (nếu có)</label>
                <strong>ghi tên size sản phẩm dưới dạng: S, X, XL,... hoặc 35, 38, 40...</strong>
                <div class="col-sm-10" style="margin-left:173px">
                  <input type="text" name="size" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Giá gốc 1 sản phẩm (nghìn VNĐ):</label>
                <div class="col-sm-10">
                  <input type="text" name="price" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Giá khuyến mại 1 sản phẩm (nếu có) (nghìn VNĐ):</label>
                <div class="col-sm-10">
                  <input type="text" name="promotion" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-10">
                  <textarea name="description" id="editor1" cols="30" rows="10"
                  placeholder="Điền các thông số như là:
                  Thương hiệu:
                  Xuất xứ:
                  ..."
                  class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Chi tiết sản phẩm</label>
                <div class="col-sm-10">
                  <textarea name="detail" rows="10" class="form-control @error('detail') is-invalid @enderror" id="editor2">{{ old('description') }}</textarea>
                </div>
              </div>
            </div>

            <!-- /.card-body -->
            <div class="" style="margin-left: 50%">
              <button type="submit" class="btn btn-info">Tạo sản phẩm</button>
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
