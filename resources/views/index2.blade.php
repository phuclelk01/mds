<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Indext page</title>
</head>
<body>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <h2>Product list</h2>
                <Div style="margin-right: 10%; float:right">
                    <a href="{{url('add')}}" class="btn btn-primary"> Add Product </a>
                </Div>
                @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Details</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $product)
                            <tr>
                                <td>{{$product->productID}}</td>
                                <td>{{$product->productName}}</td>
                                <td>{{$product->productPrice}}</td>
                                <td><img src="images/{{$product->productImage}}" alt="" width="95px" height="95px"></td>
                                <td>{{$product->productDetails}}</td>
                                <td>{{$product->catID}}</td>
                                <td>
                                    <a href="{{url('edit/'.$product->productID)}}"  class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp;
                                    <a href="{{url('delete/'.$product->productID)}}" class="btn btn-danger" ><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>
</html>