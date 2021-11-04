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
                    <li class="breadcrumb-item active">Quản lý banner</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 style="text-align: center">Quản lý banner</h3>
                      </div>

                      @if(session()->has('msg'))
                      <div class="alert" style="background: #5CB85C">
                          <h4 style="text-align: center">{{ session()->get('msg') }}</h4>
                      </div>
                      @endif
                      <br>

                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="col-md-12">
                          <div class="card">
                              <h1>Vị trí hiển thị banner</h1>
                              <div class="row">
                                  <div class="col-8">
                                      <h2>Trang chủ</h2>
                                      <img src="{{asset('images/index_section.png')}}" alt="" height="400" width="500" >
                                  </div>
                                  <div class="col-4">
                                      <h2>Trang chi tiết sản phẩm</h2>
                                      <img src="{{asset('images/detail_section.png')}}" alt="" height="600" width="300">
                                  </div>
                                  <div class="col-8">
                                      <h2>Trang danh mục sản phẩm</h2>
                                      <img src="{{asset('images/cate_section.png')}}" alt="" height="400" width="500">
                                  </div>
                                  <div class="col-4">
                                      <h2>Quy tắc</h2>
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
                                  <h4 class="card-title">Danh sách Banner</h4>
                              </div>
                              <div class="card-body">
                                  <div class="table-responsive">
                                      <div class="row">
                                          {{-- <div class="btn-group col-6">     
                                              <button type="button" id="bulk" class="btn btn-primary dropdown-toggle btn-small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                                                  Lựa chọn
                                              </button>
                                              <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="#">Xóa</a>
                                              </div>
                                              
                                          </div> --}}
                                          <div class="col-6">
                                          <a href="{{route('manage-banner.create')}}" class="btn btn-primary btn-small">
                                                  <span class="btn-label">
                                                      <i class="fa fa-plus"></i>
                                                  </span>
                                                  Thêm Banner
                                              </a>
                                          </div>
                                          <div class="col-12">
                                              <hr>
                                          </div>
                                      </div>
                                      <table id="multi-filter-select" class="display table table-striped table-hover">
                                          <!-- Example single danger button -->
                                          <thead>
                                              <tr>
                                                  {{-- <th>
                                                      <input type="checkbox" onClick="toggle(this)" class="checkall"/><br/>
                                                  </th> --}}
                                                  <th>Tên banner</th>
                                                  <th>Nơi hiển thị</th>
                                                  <th>Hành động</th>
                                              </tr>
                                          </thead>
                                          
                                          <tbody>
                                              @foreach ($banner as $bn)
                                              <tr>
                                                  {{-- <td><input type="checkbox" name="foo" value="" class="checkbox"></td> --}}
                                                  <td>
                                                      {{$bn->name}}
                                                      {{-- teen banner --}}
                                                  </td>
                                                  <td>
                                                      {{$bn->section}}
                                                      {{-- section banner --}}
                                                  </td>
                                                  <td>
                                                      <div class="row">
                                                          {{-- <div class="col-4">
                                                          <a href="{{route('manage-banner.show', $bn->id)}}"  data-toggle="tooltip" data-placement="bottom"  title="View" class="btn btn-icon btn-primary btn-xs"><i class="fas fa-eye"></i> </a>
                                                          </div> --}}
                                                          <div class="col-4">
                                                              <a href="{{route('manage-banner.edit', $bn->id)}}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-icon btn-secondary btn-xs"><i class="fas fa-pencil-alt"></i></a>
                                                          </div>
                                                          <form action="{{route('manage-banner.destroy', $bn->id)}}" method="post" class="test col-4">
                                                              @method('DELETE')
                                                              @csrf
                                                              <button type="submit" class="btn btn-icon btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                                      <i class="fas fa-trash"></i>  
                                                              </button>
                                                          </form>
                                                      </div>
                                                  </td>
                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
          </div>
      </div>
      <!-- /.col -->
  </section>
  <!-- /.content -->
@endsection