<head> 

@include('admin.css')

<style>    
    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    table
    {
        border: 2px solid #C6BA8B;
        text-align: center;
        width: 800px;
        border-collapse: collapse; /* Ensures borders are neatly combined */
    }

    .div_deg th, .div_deg td {
    text-align: center;
    padding: 12px 20px; /* Adds padding to cells to give more space */
   }

    .div_deg th
    {
        border: 2px solid #C6BA8B;
        text-align: center;
        color: white;
        font: 20px;
        font-weight: bold;
        background-color: #C6BA8B;
    }

    .div_deg td
    {
        vertical-align: middle;
    }

</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{asset('template/css/normalize.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template/icomoon/icomoon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template/css/vendor.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template/style.css')}}">


</head> 

@include('user.header');





<body>

<div class="div_deg">
        <table>
            <tr>
                <th>Cover</th>

                <th>Book</th>

                <th>Price</th>

                <th>Quantity</th>

                <th>Remove</th>
            </tr>

            <?php

            $value=0;

            ?>

            @foreach($cart as $cart)
            <tr>
                <td>
                    <img width="75" src="/products/{{$cart->product->image}}">
                </td>
                <td>{{$cart->product->name}}</td>
                <td>{{$cart->product->price}}</td>
                <td>{{$cart->quantity}}</td>
                <td><a class="btn btn-danger" href="{{route('remove.cart.product',$cart->id)}}">Remove</a></td>

            </tr>

            <?php
            $value = $value + ($cart->product->price * $cart->quantity);
            ?>
            @endforeach

        </table>
</div>


    <div class="div_deg">
        <h3>Total: ${{$value}}</h3>
    </div>

    <div class="div_deg">
    <a  href="{{ route('user.dashboard') }} ">Continue Shopping. . .</a>
    </div>

    <div class="div_deg">
    <a class="btn btn-danger" href="{{ route('cart.checkout') }}">Checkout</a>
    </div>


</body>






@include('admin.footer');


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS -->

<script src="{{ asset('template/js/jquery-1.11.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
<script src="{{ asset('template/js/plugins.js') }}"></script>
<script src="{{ asset('template/js/script.js') }}"></script>