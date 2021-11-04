@extends('layouts.backend.app')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Quản lý thẻ tag</li>
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
                <h3 style="text-align: center">Quản lý thẻ tag</h3>
            </div>
            
            @if(session()->has('msg'))
            <div class="alert" style="background: #5CB85C">
                <h4 style="text-align: center">{{ session()->get('msg') }}</h4>
            </div>
            @endif
            <br>
            
            <!-- /.card-header -->
            <div class="card-body">
              <a href="{{route('manage-tag.create')}}" class="btn btn-primary btn-small" style="width: 17%">
                  <span class="btn-label">
                      <i class="fa fa-plus"></i>
                  </span>
                  Thêm thẻ tag
              </a>
              <p></p>
              <table class="table table-bordered" style="width: 50%">
                <thead>
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th style="width: 200px">Tên thẻ tag</th>
                    <th style="width: 70px">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tag as $tag)
                  <tr>
                      <td>{{$tag->id}}</td>
                      <td>{{$tag->name}}</td>
                      <td>
                        <div class="row">
                            
                            <div class="col-4">
                                <a href="{{route('manage-tag.edit', $tag->id)}}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-icon btn-secondary btn-xs"><i class="fas fa-pencil-alt"></i></a>
                            </div>
                            <form action="{{route('manage-tag.destroy', $tag->id)}}" method="post" class="test col-4">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-icon btn-danger btn-xs" onclick="return confirm('Bạn có muốn xóa tag này không?');" data-toggle="tooltip" data-placement="bottom" title="Delete">
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