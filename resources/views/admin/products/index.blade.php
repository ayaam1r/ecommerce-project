<!DOCTYPE html>
<html>
  <head> 
    <style>


        h1
        {
            text-align: center;
            margin-bottom: 20px;
        }

        .div_deg 
      {
        display:flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
      }

      .table_deg
      {
        text-align: center;
        margin: auto;
        border: 2px solid #7BCCB5;
        margin-top: 50px;
        width: 600px;
      }

      th
      {
        background-color: #7BCCB5;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
      }

      td
      {
        color: #3C565B;
        padding: 10px;
        border: 1px solid skyblue;
        font-weight: bold;
      }

</style>

    @include('admin.css')
</head>
  <body>

  @include('admin.header')

  <h1>Products</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif




  <div>

<table class="table_deg"> 
  <tr> 

    <th> Cover </th>

    <th> Name </th>

    <th> Description </th>

    <th> Category </th>

    <th> Price </th>

    <th> Quantity </th>



    <th> Edit </th>

    <th> Delete </th>

  </tr>

  <tr>
    @foreach($products as $product)
  </tr>
  <tr>
    <td>
        <img height="150" width="100" src="{{asset('products/'.$product->image)}}">
    </td>
    <td> {{$product->name}} </td>
    <td> {!!Str::limit($product->description, 50)!!} </td>
    <td> {{$product->category->name}} </td>
    <td> {{$product->price}} </td>
    <td> {{$product->quantity}} </td>


    <td><a href="{{route('admin.products.edit',$product)}}" class="btn btn-success">Edit</a>
    <td>
    <form method="POST" action="{{route('admin.products.destroy',$product)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
    </td>

  </tr>

    @endforeach

</table>

</div>

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
