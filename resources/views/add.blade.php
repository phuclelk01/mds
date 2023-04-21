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
    <title>Add product</title>
</head>
<body>
    <div class="container mt-3">
        <h2>Add new product</h2>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="{{url('save')}}" method="post">
            @csrf
          <div class="mb-3 mt-3">
            <label for="id">Product ID:</label>
            <input type="text" class="form-control" id="id" name="id"
                   placeholder="Enter product id" value="{{old('id')}}">
                   @error('id')
                       <div class="alert alert-danger" role="alert">
                        {{$message}}
                       </div>
                   @enderror
          </div>
          <div class="mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name"
                   placeholder="Enter product name" value="{{old('name')}}">
                   @error('name')
                       <div class="alert alert-danger" role="alert">
                        {{$message}}
                       </div>
                   @enderror
          </div>
          <div class="mb-3">
            <label for="name">Price:</label>
            <input type="number" class="form-control" id="price" name="price"
                   placeholder="Enter product price" value="{{old('price')}}">
                   @error('price')
                       <div class="alert alert-danger" role="alert">
                        {{$message}}
                       </div>
                   @enderror
          </div>
          <div class="mb-3">
            <label for="name">Image:</label>
            <input type="file" class="form-control" id="image"name="image" value="{{old('image')}}">
                   @error('image')
                       <div class="alert alert-danger" role="alert">
                        {{$message}}
                       </div>
                   @enderror
          </div>
          <div class="mb-3">
            <label for="details">Details:</label>
            <textarea class="form-control" rows="5" id="details" name="details">
            </textarea>
          </div>
          <div class="mb-3">
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control">
                @foreach ($category as $cat)
                    <option value="{{$cat->catID}}">{{$cat->catName}}</option>
                @endforeach
                @error('catID')
                       <div class="alert alert-danger" role="alert">
                        {{$message}}
                       </div>
                   @enderror
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{url('index')}}" class="btn btn-primary">Back</a>
        </form>
      </div>      
</body>
</html>