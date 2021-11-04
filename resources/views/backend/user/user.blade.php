@extends('layouts.backend.app')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lý người dùng</li>
              </ol>
          </div>
        </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 style="text-align: center">Quản lý người dùng</h3>
            </div>

            @if(session()->has('msg'))
            <div class="alert" style="background: #5CB85C">
              <h4 style="text-align: center">{{ session()->get('msg') }}</h4>
            </div>
            @endif
            <br>

            <!-- /.card-header -->
            <div class="card-body">
              <a href="{{route('create')}}" class="btn btn-primary btn-small" style="width: 17%">
                <span class="btn-label">
                    <i class="fa fa-plus"></i>
                </span>
                Thêm người dùng
              </a>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th style="width: 20%; text-align:center">Vai trò</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->role==0)

                    <td>Admin</td>

                    @elseif($user->role==1)

                    <td>User</td>
                    
                    @endif
                    <td>
                      <div class="row">
                        <div class="col-4">
                            <a href="{{route('detail', $user->id)}}" data-toggle="tooltip" data-placement="bottom" title="View" class="btn btn-icon btn-primary btn-xs"><i class="fas fa-eye"></i> </a>
                        </div>
                        <div class="col-4">
                            <a href="{{route('edit', $user->id)}}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-icon btn-secondary btn-xs"><i class="fas fa-pencil-alt"></i></a>
                        </div>
                        <form action="{{route('delete', $user->id)}}" method="post" class="test col-4">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-icon btn-danger btn-xs" onclick="return confirm('Bạn có muốn xóa người dùng này không?');" data-toggle="tooltip" data-placement="bottom" title="Delete">
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