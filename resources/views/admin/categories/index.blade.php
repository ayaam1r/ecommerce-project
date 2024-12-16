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

  <h1>Categories</h1>
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
    <th> Category Name </th>

    <th> Edit </th>

    <th> Delete </th>

  </tr>

  <tr>
    @foreach($categories as $category)
  </tr>
  <tr>
    <td> {{$category->name}} </td>
    <td><a href="{{route('admin.categories.edit',$category)}}" class="btn btn-success">Edit</a>
    <td>
    <form method="POST" action="{{route('admin.categories.destroy',$category)}}">
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
