<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Projects</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('Connect/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('Connect/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('Admin/dashboard')}}" class="nav-link">Home</a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="logout"  href="{{ route('logout') }}" role="button">
          Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="{{url('Connect/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin 4SFigure</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{url('Connect/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
                  <nav class="mt-2">
                      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Dashboard -->
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                          </p>
                          </a>
                          <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('Admin/dashboard')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Manager User</p>
                              </a>
                          </li>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Pages
                              <i class="fas fa-angle-left right"></i>
                          </p>
                          </a>
                          <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-edit"></i>
                              <p>Brands</p>
                              <i class="fas fa-angle-left right"></i>
                              </a>
                              <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="../examples/project-add.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Brands List</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="../examples/project-edit.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Brand</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="../examples/project-edit.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Edit Brand</p>
                                  </a>
                              </li>
                              </li>
                              </ul>
                          </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{url('Admin/projects')}}" class="nav-link">
                                  <i class="nav-icon fas fa-edit"></i>
                                  <p>Categories</p>
                                  <i class="fas fa-angle-left right"></i>
                                  </a>
                                  <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="../examples/project-add.html" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Categories List</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="../examples/project-edit.html" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Add Category</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="../examples/project-edit.html" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Edit Category</p>
                                      </a>
                                  </li>
                                  </li>
                                  </ul>
                              </li>
                              </ul>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="#" class="nav-link">
                                      <i class="nav-icon fas fa-edit"></i>
                                      <p>Products</p>
                                      <i class="fas fa-angle-left right"></i>
                                      </a>
                                      <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                          <a href="{{url('Admin/product')}}" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Products List</p>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                        <a href="{{url('Admin/addproduct')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Product</p>
                                        </a>
                                    </li>
                                      <li class="nav-item">
                                          <a href="../examples/project-edit.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Edit Product</p>
                                          </a>
                                      </li>
                                      </ul>
                                  </li>
                                  </ul>
                      </li>

                  </ul>
              </li>

    </li>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit account customer</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Project Edit</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      @if (session('success'))
      <div class="alert alert-success">
      {{ session('success') }}
      </div>
      @endif
      <!-- Main content -->
      <section class="content">
          <form action="{{url('update')}}" method="post">
              @csrf
              <input type="hidden" name="id" value="{{$dataUser->user_id}}">
            <div class="mb-3 mt-3">
              <label for="id">Customer ID:</label>
              <input type="text" class="form-control" id="id" name="id"
                     value="{{$dataUser->user_id}}" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="name">Customer Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $dataUser->user_name }}">
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3 mt-3">
                <label for="birthday">Date of birth:</label>
                <input type="date" class="form-control" placeholder="birthday" name="birthday" value="{{ $dataUser->birthday }}">
                @error('birthday')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        <div class="mb-3 mt-3">
            <label for="name">Gender:</label>
            <input type="text" class="form-control" id="gender" name="gender" value="{{ $dataUser->gender }}">
            @error('gender')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
            <div class="mb-3 mt-3">
              <label for="email">Email:</label>
              <input type="text" class="form-control" id="email" name="email"
                     value="{{$dataUser->email}}" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url('Admin/dashboard')}}" class="btn btn-primary">Back</a>
          </form>



            <!-- /.card -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('Connect/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('Connect/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('Connect/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('Connect/dist/js/demo.js')}}"></script>
</body>
</html>
