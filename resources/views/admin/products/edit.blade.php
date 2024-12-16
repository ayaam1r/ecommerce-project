<!DOCTYPE html>
<html>
  <head> 
    <style>


        h1
        {
            text-align: center;
            margin-bottom: 20px;
        }

        .productedit_form
        {
            width: 500px;
            margin-top: 50px;
             border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
             background-color: #fff;
             margin-left: auto;
             margin-right: auto;
             padding: 20px;
        }

    .productedit_form button  {
    display: block;
    margin: 20px auto;
    }

    .productedit_form input  {
        width: 425px;
    }

</style>

    @include('admin.css')
</head>
  <body>
    @php
        $categories=App\Models\Category::all();
    @endphp

  @include('admin.header')

  <h1>Edit Products</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

<form action="{{ route('admin.products.update' , $product) }}" method="POST" class="productedit_form">
    @csrf
    @method('PATCH')

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}">

      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" placeholder="description" name="description" >{{$product->description}}</textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{$product->price}}" >
  </div>

  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" value="{{$product->quantity}}" >
  </div>

    <div class="form-group col-md-4">
      <label for="category">Category</label>
      <select name="category" id="category" class="form-control">
        @foreach ($categories as $category)
        <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    
    <div>
                <label>Current Image</label>
                <img width="75" src="/products/{{$product->image}}">
            </div>

    <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file" id="image" value="{{$product->image}}">
  </div>
  </div>

  <button type="submit" class="btn btn-success">Update</button>
</form>
</body>



<footer>
    @include('admin.footer')
</footer>


    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>


</html>
