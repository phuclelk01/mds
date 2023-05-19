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
                        <li class="nav-item">
                            <a href="{{url('Admin/brand')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Brands Lis</p>
                            </a>
                        </li>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <li class="nav-item">
                            <a href="{{url('Admin/category')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Categories List</p>
                            </a>
                        </li>
                    </li>
                </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <li class="nav-item">
                                <a href="{{url('Admin/product')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Products List</p>
                                </a>
                            </li>
                        </li>
                    </ul>
                </li>
            </ul>
            </li>
            </li>
        </nav>

    </li>

  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Products</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <table class="table table-striped projects">
                    @if (Session::has('deletesuccess'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('deletesuccess') }}
                    </div>
                    @endif
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Category ID</th>
                            <th>Brand ID</th>
                            <Th>Image</Th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataproduct as $product)
                            <tr>
                                <td>{{ $product->product_id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ number_format($product->price, 0, '', '.') }}|VND</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category_id }}</td>
                                <td>{{ $product->brand_id }}</td>
                                <td>
                                    <img  src="{{ asset('Model/' . $product->image_path_1) }}" alt="Hình ảnh" style="width:80px; height:100px;">
                                </td>
                                <td class="project-actions text-right" style="display: flex; justify-content: space-between;">
                                    <a class="btn btn-info btn-sm" href="{{ url('edit-product/' . $product->product_id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ url('deleteproduct/' . $product->product_id) }}"onclick="return confirm('Are you sure about this?')">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="d-flex justify-content-center">
                    <ul class="pagination">
                        @if ($dataproduct->onFirstPage())
                            <li class="page-item disa   bled"><a class="page-link">&laquo;</a></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $dataproduct->previousPageUrl() }}">&laquo;</a></li>
                        @endif
                        @foreach ($dataproduct->getUrlRange(max(1, $dataproduct->currentPage() - 2), min($dataproduct->lastPage(), $dataproduct->currentPage() + 2)) as $page => $url)
                            @if ($page == $dataproduct->currentPage())
                                <li class="page-item active"><span
                                        class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        @if ($dataproduct->hasMorePages())
                            <li class="page-item"><a class="page-link"
                                    href="{{ $dataproduct->nextPageUrl() }}">&raquo;</a></li>
                        @else
                            <li class="page-item disabled"><a class="page-link">&raquo;</a></li>
                        @endif
                    </ul>
                </div>
            </table>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="table-responsive">
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('fail'))
                            <div class="alert alert-fail" role="alert">
                                {{ Session::get('fail') }}
                            </div>
                            @endif
                            <div class="md-3">
                                <label class="form-label">Product ID:</label>
                                <input type="text" class="form-control" name="product_id" placeholder="Enter Product ID" required value="{{ old('product_id') }}">
                                @error('product_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="md-3">
                                <label class="form-label">Product Name:</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" required value="{{ old('product_name') }}">
                                @error('product_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="md-3">
                                <label class="form-label">Price:</label>
                                <input type="number" class="form-control" name="price" placeholder="Enter Price" required value="{{ old('price') }}" max="999999999">
                                @error('price')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="md-3">
                                <label class="form-label">Quantity:</label>
                                <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity" required value="{{ old('quantity') }}" max="9999">
                                @error('quantity')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="md-3">
                                <label class="form-label">Description:</label>
                                <textarea class="form-control" name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="md-3">
                                <label class="form-label">Category ID:</label>
                                <input type="text" class="form-control" name="category_id" placeholder="Enter Category ID" required value="{{ old('category_id') }}">
                                @error('category_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="md-3">
                                <label class="form-label">Brand ID:</label>
                                <input type="text" class="form-control" name="brand_id" placeholder="Enter Brand ID" required value="{{ old('brand_id') }}">
                                @error('brand_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="md-3">
                                <label class="form-label">Image Name:</label>
                                <input type="text" class="form-control" name="image_name" placeholder="Enter Image Name" required>
                                @error('image_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="md-3">
                                <label class="form-label">Image Path 1:</label>
                                <input type="file" class="form-control" name="image_path_1" placeholder="Enter Image Path 1" required>
                                @error('image_path_1')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="md-3">
                                <label class="form-label">Image Path 2:</label>
                                <input type="file" class="form-control" name="image_path_2" placeholder="Enter Image Path 2" required>
                                @error('image_path_2')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>
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
