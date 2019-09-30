<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Modist - My Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontcss/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontcss/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('frontcss/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontcss/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontcss/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('frontcss/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontcss/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontcss/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontcss/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('frontcss/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontcss/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontcss/style.css') }}">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Modist</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{ url('/shop') }}">Shop</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="{{ url('/cart') }}">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[{{ Session::get('cart_number') }}]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
		
		<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Cart</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
								<th>Quantity</th>
								<th>Size</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
								@foreach($product as $product)
								
						      <tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><a href="images/menu-2.jpg" class="image-popup"><img src="{{ url('/getImage/'.$product->id) }}" class="img-fluid" alt="Colorlib Template"></a></td>
						        
						        <td class="product-name">
						        	<h3>{{ $product->name }}</h3>
						        	<p>{{ $product->description }}</p>
						        </td>
						        
						        <td class="price">{{ $product->price }}</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
											<span class="input-group-btn mr-2">
													<button type="button"  data-value="{{ $product->id }}" class="quantity-left-minus btn dec" >
												   <i class="ion-ios-remove"></i>
													</button>
													</span>
												<input type="text" id="{{ $product->id }}" name="quantity" class="quantity form-control input-number" value="{{$product->quantity->quantity}}" >
									 <span class="input-group-btn ml-2">
											<button type="button"  data-value="{{ $product->id }}" class="quantity-right-plus btn inc" >
											 <i class="ion-ios-add"></i>
										 </button>
										 </span>
					          	</div>
					          </td>
						        <td>

										
												<select name="" id="" class="form-control" style="width:110px;margin:20px;">
													<option value="">Small</option>
												  <option value="">Medium</option>
												  <option value="">Large</option>
												  <option value="">Extra Large</option>
												</select>
											  


								</td>
						        <td class="total" id="total">{{ $product->price }}</td>
						      </tr><!-- END TR-->
@endforeach

						      
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span class="totall">{{ $products_total }}</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$0.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span class="totall"> {{ $products_total }} </span>
    					</p>
    				</div>
    				<p class="text-center"><a href="{{ url('/checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>

    <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big">Products</h1>
            <h2 class="mb-4">Related Products</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" alt="Colorlib Template"></a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Young Woman Wearing Dress</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    							</p>
	    						</div>
	    					</div>
	    					<hr>
    						<p class="bottom-area d-flex">
    							<a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-2.jpg" alt="Colorlib Template"></a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Young Woman Wearing Dress</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    							</p>
	    						</div>
	    					</div>
	    					<hr>
    						<p class="bottom-area d-flex">
    							<a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-3.jpg" alt="Colorlib Template"></a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Young Woman Wearing Dress</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    							</p>
	    						</div>
	    					</div>
	    					<hr>
    						<p class="bottom-area d-flex">
    							<a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-4.jpg" alt="Colorlib Template"></a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Young Woman Wearing Dress</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    							</p>
	    						</div>
	    					</div>
	    					<hr>
    						<p class="bottom-area d-flex">
    							<a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
            	<h1 class="big">Subscribe</h1>
              <h2>Subcribe to our Newsletter</h2>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer bg-light ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Modist</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
	<div id="system-message-container"></div>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  
  <script src="{{ asset('frontjs/jquery.min.js') }}"></script>
  <script src="{{ asset('frontjs/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('frontjs/popper.min.js') }}"></script>
  <script src="{{ asset('frontjs/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontjs/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('frontjs/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('frontjs/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('frontjs/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontjs/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('frontjs/aos.js') }}"></script>
  <script src="{{ asset('frontjs/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('frontjs/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('frontjs/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('frontjs/google-map.js') }}"></script>
  <script src="{{ asset('frontjs/main.js') }}"></script>
	
  <script>
  
  $(document).ready(function(){

$(document).on('click','.dec',function(){
	
	var id =$(this).attr('data-value');
	var inputs = $(".quantity");
	
	
	for(var i = 0; i < inputs.length; i++){
    	
		if($(inputs[i]).attr('id')==id){ 
		
var q =$(inputs[i]).val();

if(q>1){
	var v =	$(inputs[i]).val() -1 ;
	$(inputs[i]).val(v) ;

		$.ajax({

url: "{{ url('/decream') }}/"+id ,
type: "get",
data : {id:id } ,

success: function(data){

	 var  t =$(".totall").html();
	 var tt = t - data ; 
  
	 $(".totall").html(tt);
 //$("#message").html(data.message);
 //<span  class="icon-shopping_cart"></span>
 //$("#cartnumber").html('<span  class="icon-shopping_cart"></span>['+data.number+']');





},
error:function(data)
{
console.log(data);
}
});


	}

			
		
		}
}
	

	
	/*
	if(q>1){
	var v =	$(".quantity").val() -1 ;
	$(".quantity").attr('value') = v;

		$.ajax({

url: "{{ url('/decream') }}/"+id ,
type: "get",
data : {id:id } ,

success: function(data){

	 var  t =$(".totall").html();
	 var tt = t - data ; 
  
	 $(".totall").html(tt);
 //$("#message").html(data.message);
 //<span  class="icon-shopping_cart"></span>
 //$("#cartnumber").html('<span  class="icon-shopping_cart"></span>['+data.number+']');





},
error:function(data)
{
console.log(data);
}
});


	}
*/

});



/*
$(document).on('keyup','.quantity',function(){
	var quantity =$(this).siblings('.quantity').val();

	var total = $("#total").text();
	var new_total =  quantity * total ;
console.log(new_total);


	});
*/







    //you can use this to access the current item




	$(document).on('click','.inc',function(){
	
	var id =$(this).attr('data-value');
	var inputs = $(".quantity");
	


	
	for(var i = 0; i < inputs.length; i++){
    	
		if($(inputs[i]).attr('id')==id){ 
		
var q =$(inputs[i]).val();


	var v =	$(inputs[i]).val()  ;
	
	$(inputs[i]).val(Number(v) +1) ;

		$.ajax({

url: "{{ url('/incream') }}/"+id ,
type: "get",
data : {id:id } ,

success: function(data){

	 var  t =$(".totall").html();
	 var tt = Number(t) + data ; 
  
	 $(".totall").html(tt);
 //$("#message").html(data.message);
 //<span  class="icon-shopping_cart"></span>
 //$("#cartnumber").html('<span  class="icon-shopping_cart"></span>['+data.number+']');





},
error:function(data)
{
console.log(data);
}
});


	

			
		
		}
}
	

	
	/*
	if(q>1){
	var v =	$(".quantity").val() -1 ;
	$(".quantity").attr('value') = v;

		$.ajax({

url: "{{ url('/decream') }}/"+id ,
type: "get",
data : {id:id } ,

success: function(data){

	 var  t =$(".totall").html();
	 var tt = t - data ; 
  
	 $(".totall").html(tt);
 //$("#message").html(data.message);
 //<span  class="icon-shopping_cart"></span>
 //$("#cartnumber").html('<span  class="icon-shopping_cart"></span>['+data.number+']');





},
error:function(data)
{
console.log(data);
}
});


	}
*/

});











  });
  
  
  
  </script>
    
  </body>
</html>