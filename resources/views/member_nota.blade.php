<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Products :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{url('/assets/store/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('/assets/store/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{url('/assets/store/css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{url('/assets/store/js/jquery-1.11.1.min.js')}}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{url('/assets/store/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/store/js/easing.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
<div class="agileits_header">
	<div class="w3l_offers">
		<a href="{{url('/member/listproduk')}}">Today's special Offers !</a>
	</div>
	<div class="w3l_search">
	</div>
	<div class="product_list_header">  
			<ul>
            	<li class="dropdown profile_details_drop">
                    <a class="nav-link" href="{{url('member/cart')}}">
                        <span class="badge badge-danger" style="position: absolute; margin-left: -15px; margin-top: -15px;">{{$cart->jumlah_keranjang}}</span>
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>
		</div>
	<div class="w3l_header_right">
		<ul>
			<li class="dropdown profile_details_drop">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
				<div class="mega-dropdown-menu">
					<div class="w3ls_vegetables">
						<ul class="dropdown-menu drp-mnu">
							<li><a href="{{url('/sign-out')}}">Log Out</a></li> 
							<!-- <li><a href="login.html">Sign Up</a></li> -->
						</ul>
					</div>                  
				</div>	
			</li>
		</ul>
	</div>
	<div class="clearfix"> </div>
</div>
<!-- script-for sticky-nav -->
<script>
$(document).ready(function() {
	 var navoffeset=$(".agileits_header").offset().top;
	 $(window).scroll(function(){
		var scrollpos=$(window).scrollTop(); 
		if(scrollpos >=navoffeset){
			$(".agileits_header").addClass("fixed");
		}else{
			$(".agileits_header").removeClass("fixed");
		}
	 });
	 
});
</script>
<!-- //script-for sticky-nav -->
<div class="logo_products">
	<div class="container">
		<div class="w3ls_logo_products_left">
			<h1><a href="{{url('/member')}}"><span>ABC</span> Store</a></h1>
		</div>
		<div class="w3ls_logo_products_left1">
			<ul class="special_items">
				<li><a href="{{url('/member/listproduk')}}">Products</a><i>/</i></li>
			</ul>
		</div>
		<div class="w3ls_logo_products_left1">
			<ul class="phone_email">
				<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/member')}}">Home</a><span>|</span></li>
				<li>Checkout</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- about -->
		<div class="privacy about">
			<h3>CART</h3>
			<br>
			<br>
			<br>



			
			<div class="container">
                    <div class="row mb-4">
                    <div class="col-md-6">
                        <h4 class="mb-5 text-capitalize">Nota  {{$nota->jenis_faktur}}</h4>
                        <table>
                            <tr>
                                <th>Nomor <td>:</td></th>
                                <th>{{$nota->id}}</th>
							</tr>
                            <tr>
                                <th>Tanggal <td>:</td></th>
                                <th>{{$tanggal}}</th>
							</tr>
                            <tr>
                                <th>Customer <td>:</td></th>
                                <th>{{session('s_id_user')}} | {{session('s_nama_user')}}</th>
							</tr>
                        </table>
                    </div>
            </div>
			
	      <div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>No </th>	
							<th>Nama </th>
							<th>Harga </th>
							<th>Jumlah</th>						
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>
					@foreach($nota->cart as $c)
						<tr class="rem1">
						<td class="invert">{{$c->produk_id}}</td>
						<td class="invert">{{$c->nama_produk}}</td>
						<td class="invert">Rp. {{$c->harga_satuan}}</td> 
						<td class="invert">
							<div class="quantity"> 
							   <div class="quantity-select">
								   <a class="entry value-minus"href="{{url('/member/cart/minus?produkId=' . $c->produk_id)}}"></a>                           
								   <div class="entry value"><span>{{$c->kuantitas}}</span></div>
								   <a class="entry value-plus" href="{{url('/member/cart/plus?produkId=' . $c->produk_id)}}"></a>
							   </div>
						   </div>
					   </td>
						<td class="invert">{{$c->subtotal}}</td>
					</tr>
					@endforeach
				</tbody></table>
			</div>
			<div class="checkout-right">	
				<div class="col-md-4 checkout-left-basket">
					<h4>RIncian</h4>
					<ul>
						<li>Total         : <span>Rp. {{$nota->total}}</span></li>
						<li>PPN 10%       : <span>Rp. {{$nota->jml}}</span></li>
						<li>TOTAL TAGIHAN : <span>RP. {{$nota->tagihan}}</span></li>
						<li><span><a href="{{url('/member/cart/checkout?notaId='. $nota->id)}}" class="btn btn-warning" style="align-items: center;" target="_blank">CHEKOUT</a></span></li>
					</ul>
				</div>

			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

<!-- footer -->
<div class="footer">
	<div class="container">
		
			<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
				<div class="w3_footer_grid_bottom">
					<h5>connect with us</h5>
					<ul class="agileits_social_icons">
						<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="wthree_footer_copy">
			<p>© 2016 Grocery Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
	</div>
</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="{{url('/assets/store/js/bootstrap.min.js')}}"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="{{url('/assets/store/js/minicart.js')}}"></script>
</body>
</html>