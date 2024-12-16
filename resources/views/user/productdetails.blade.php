<head> 

@include('admin.css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{asset('template/css/normalize.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template/icomoon/icomoon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template/css/vendor.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template/style.css')}}">

</head>

<header>
    @include('user.header')
</header>

<style>
 .product-item-container {
    margin-left:auto;
    margin-right:auto;
    }

    .product-item {
        text-align: center;
    }

    /* Adjusted container with shorter top and bottom borders */
.product-item .quantity-container {
    display: flex;
    align-items: center;
    justify-content: center;
    border-left: 1px solid white;
    border-right: 1px solid white;
    border-top: 1px solid white;
    border-bottom: 1px solid white;
    border-width: 1px 1px 0.5px; /* Top and bottom borders shorter */
    padding: 4px 8px; /* Reduced padding for smaller size */
    margin: 10px auto;
    width: fit-content;
    height: auto; /* Adjust height */
    overflow: hidden;
    border-radius: 4px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

/* Button styles */
.product-item .quantity-btn {
    background-color: #d3bba8; /* Pretty beige */
    border: none;
    padding: 15px 20px; /* Adjusted padding for smaller buttons */
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    height: auto; /* Ensure it adapts to padding */
    line-height: 1;
}

.product-item .quantity-btn:hover {
    background-color: #d6c4af; /* Darker beige on hover */
    transform: scale(1.1); /* Slight scaling effect on hover */
}

/* Input styles */
.product-item .quantity-input {
    width: 40px; /* Smaller input box */
    text-align: center;
    border: none;
    font-size: 14px;
    padding: 4px;
}

/* Optional: Slightly reduce the entire quantity container height */
.product-item .quantity-container {
    height: auto;
    line-height: 1.2; /* Adjust line spacing */
}

</style>
</style>




                                <div class="col-md-3 product-item-container">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
									<div class="product-item">
										<figure class="product-style">
											<img src="{{asset('products/'.$product->image)}}" alt="Books" class="product-item">
                                            <button type="submit" class="add-to-cart" data-product-tile="add-to-cart" 
                                                    {{ $product->quantity == 0 ? 'disabled' : '' }}>
                                                    {{ $product->quantity == 0 ? 'Sold Out' : 'Add to Cart' }}
                                            </button>	
										</figure>
										<figcaption>
											<h3>{{$product->name}}</h3>
                                            <div class="item-price">$ {{$product->price}}</div>
											<span>{{($product->description)}}</span>
                                            <p style="font-weight: bold; color: #473810; margin-top:10px;">available quantity: {{$product->quantity}}</p>
										</figcaption>
                                        <div class="quantity-container">
                                                    <button type="button" class="quantity-btn decrease">-</button>
                                                    <input type="number" name="quantity" class="quantity-input" value="1" min="1" max="{{ $product->quantity }}" readonly>
                                                    <button type="button" class="quantity-btn increase">+</button>
                                        </div>
									</div>
                                </form>
								</div>


<footer>
    @include('admin.footer')
</footer>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS -->

<script src="{{ asset('template/js/jquery-1.11.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
<script src="{{ asset('template/js/plugins.js') }}"></script>
<script src="{{ asset('template/js/script.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all quantity containers
    const quantityContainers = document.querySelectorAll('.quantity-container');

    quantityContainers.forEach(container => {
        const decreaseBtn = container.querySelector('.quantity-btn.decrease');
        const increaseBtn = container.querySelector('.quantity-btn.increase');
        const quantityInput = container.querySelector('.quantity-input');
        const maxQuantity = parseInt(quantityInput.getAttribute('max'));

        decreaseBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue < maxQuantity) {
                quantityInput.value = currentValue + 1;
            }
        });
    });
});
</script>
