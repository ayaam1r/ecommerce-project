<head> 

@include('admin.css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{asset('template/css/normalize.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template/icomoon/icomoon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template/css/vendor.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('template/style.css')}}">

    @php
        $categories=App\Models\Category::all();
        $products=App\Models\Product::all();
    @endphp

    <style>
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





</head>

<header>
    @include('user.header')
</header>



<section id="billboard">

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="main-slider pattern-overlay">
                <div class="slider-item">
                    <div class="banner-content">
                        <h2 class="banner-title">Visit us!</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
                            ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
                            urna, a eu.</p>
                        <div class="btn-wrap">
                            <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
                                    class="icon icon-ns-arrow-right"></i></a>
                        </div>
                    </div><!--banner-content-->
                    <img src="{{asset('images/slide1.jpg')}}" alt="banner" class="banner-image" width="350px">
                </div><!--slider-item-->

            </div><!--slider-->

        </div>
    </div>
</div>
</section>


<section id="popular-books" class="bookshelf py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Our Available Books</span>
						</div>
						<h2 class="section-title">Shop Now</h2>
					</div>

					<ul class="tabs">
						<li data-tab-target="#all-genre" class="active tab">All Genre</li>
                        @foreach($categories as $category)
						<li data-tab-target="#category-{{ strval($category->id) }}" class="tab">{{$category->name}}</li>
                        @endforeach
					</ul>

					<div class="tab-content">
						<div id="all-genre" data-tab-content class="active">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-3">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <img src="{{asset('products/'.$product->image)}}" alt="Books" class="product-item">
                                                @csrf
                                                <button type="submit" class="add-to-cart" data-product-tile="add-to-cart" 
                                                    {{ $product->quantity == 0 ? 'disabled' : '' }}>
                                                    {{ $product->quantity == 0 ? 'Sold Out' : 'Add to Cart' }}
                                            </button>	                                          
                                          </figure>
                                            <figcaption>
                                                <h3>{{$product->name}}</h3>
                                                <div class="quantity-container">
                                                    <button type="button" class="quantity-btn decrease">-</button>
                                                    <input type="number" name="quantity" class="quantity-input" value="1" min="1" max="{{ $product->quantity }}" readonly>
                                                    <button type="button" class="quantity-btn increase">+</button>
                                                </div>
                                                <span>{!!Str::limit($product->description, 50)!!}</span>
                                                <div class="item-price">$ {{$product->price}}</div>
                                                <a href="{{route('product.details', $product->id)}}">More Details</a>
                                            </figcaption>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>

						</div>

                        @foreach($categories as $category)
						<div id="category-{{ strval($category->id) }}" data-tab-content>
							<div class="row">
                            @foreach($products as $product)
                            @if($product->category_id == $category->id)
								<div class="col-md-3">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
									<div class="product-item">
										<figure class="product-style">
											<img src="{{asset('products/'.$product->image)}}" alt="Books" class="product-item">
                                            @csrf
                                            <button type="submit" class="add-to-cart" data-product-tile="add-to-cart" 
                                                    {{ $product->quantity == 0 ? 'disabled' : '' }}>
                                                    {{ $product->quantity == 0 ? 'Sold Out' : 'Add to Cart' }}
                                            </button>			
							              </figure>
										<figcaption>
											<h3>{{$product->name}}</h3>
                                            <div class="quantity-container">
                                        <button type="button" class="quantity-btn decrease">-</button>
                                        <input 
                                            type="number" 
                                            name="quantity" 
                                            class="quantity-input" 
                                            value="1" 
                                            min="1" 
                                            max="{{ $product->quantity }}"
                                            readonly
                                        >
                                        <button type="button" class="quantity-btn increase">+</button>
                                        </div>
											<span>{!!Str::limit($product->description, 50)!!}</span>
											<div class="item-price">$ {{$product->price}}</div>
                                            <a class="" href="{{route('product.details',$product->id)}}">More Details</a>
										</figcaption>
									</div>
                                    </form>
								</div>
                                @endif
                                @endforeach
							</div>
						</div>
                        @endforeach

					</div>

				</div><!--inner-tabs-->

			</div>
		</div>
</section>




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
