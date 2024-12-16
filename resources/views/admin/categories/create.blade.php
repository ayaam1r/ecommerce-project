<!DOCTYPE html>
<html>
  <head> 
    <style>


        h1
        {
            text-align: center;
            margin-bottom: 20px;
        }

        .categorycreate_form
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

    .categorycreate_form button  {
    display: block;
    margin: 20px auto;
    }

    .categorycreate_form input  {
        width: 425px;
    }

</style>

    @include('admin.css')
</head>
  <body>

  @include('admin.header')

  <h1>Create Category</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

<form action="{{ route('admin.categories.store') }}" method="POST" class="categorycreate_form">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">

      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Name">
    </div>
   </div>

  <button type="submit" class="btn btn-success">Create</button>
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
