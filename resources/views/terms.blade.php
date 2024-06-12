
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Insta Order </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="FREEHTML5.CO" />
	



  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" href="{{URL::asset('assets/img/logoinsta.png')}}" type="image/x-icon"/>

	<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('front/css/icomoon.css')}}">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="{{asset('front/css/simple-line-icons.css')}}">
	<!-- Datetimepicker -->
	<link rel="stylesheet" href="{{asset('front/css/bootstrap-datetimepicker.min.css')}}">
	<!-- Flexslider -->
	<link rel="stylesheet" href="{{asset('front/css/flexslider.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}">

	<link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <style>
        /* Loader CSS */
        .loader {
            border: 16px solid #a99c92; /* Light grey */
            border-top: 16px solid #fb6e14; /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            display: none; /* Hidden by default */
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999; /* Ensure it's above all other elements */
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        
        /* Overlay CSS */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            z-index: 9999; /* Ensure it's above all other elements but below the loader */
            display: none; /* Hidden by default */
        }
        
        .success-image {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 10000; /* Ensure it's above all other elements */
        }
        
    </style>

	<!-- Modernizr JS -->
	<script src="{{asset('front/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div id="fh5co-container">
		<div id="fh5co-home" class="js-fullheight" data-section="home">

			<div class="flexslider">
				
				<div class="fh5co-overlay"></div>
				<div class="fh5co-text">
					<div class="container">
						<div class="row">
							<h1 class="to-animate">InstaOrder</h1>
							<h2 class="to-animate">Lovely Designed <span>by</span> <a href="https://www.allsafeeg.com/" target="_blank">All Safe</a></h2>
						</div>
					</div>
				</div>
			  	<ul class="slides">
			   	<li style="background-image: url(public/front/images/slide_1.jpg);" data-stellar-background-ratio="0.5"></li>
			   	<li style="background-image: url(public/front/images/slide_2.jpg);" data-stellar-background-ratio="0.5"></li>
			   	<li style="background-image: url(public/front/images/slide_3.jpg);" data-stellar-background-ratio="0.5"></li>
			  	</ul>

			</div>
			
		</div>
		
		<div class="js-sticky">
			<div class="fh5co-main-nav">
				<div class="container-fluid">
					<div class="fh5co-menu-1">
						<a href="#" data-nav-section="home">Home</a>
						<a href="#" data-nav-section="reservation">Become a partner</a>
					</div>
					<div class="fh5co-logo">
						<a href="index.html">Insta Order</a>
					</div>
					<div class="fh5co-menu-2">
						
						<a href="#" data-nav-section="about">About</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>

    <div id="fh5co-footer">
		<div class="container">
			<div class="row row-padded">
				<div class="col-md-6 text-center">
					<p class="to-animate">&copy; Insta Order  <br> Designed by <a href="https://www.allsafeeg.com/" target="_blank">All Safe</a> 
					</p>
					<p class="text-center to-animate"><a href="#" class="js-gotop">Go To Top</a></p>
				</div>
				<div class="col-md-6 text-center">
					<a href="{{route('TermsPage')}}">Terms</a> 
                    <br>
                    <br>
					<a href="{{route('CommenQuestionPage')}}">F&Q</a> 
                    <br>
                    <br>
					<a href="{{route('landingPage')}}">Home</a> 
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="fh5co-social">
						<li class="to-animate-2"><a href="#"><i class="icon-facebook"></i></a></li>
						<li class="to-animate-2"><a href="#"><i class="icon-twitter"></i></a></li>
						<li class="to-animate-2"><a href="#"><i class="icon-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>


	
	
	
	
	<!-- jQuery -->
	<script src="{{asset('front/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('front/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
	<!-- Bootstrap DateTimePicker -->
	<script src="{{asset('front/js/moment.js')}}"></script>
	<script src="{{asset('front/js/bootstrap-datetimepicker.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('front/js/jquery.waypoints.min.js')}}"></script>
	<!-- Stellar Parallax -->
	<script src="{{asset('front/js/jquery.stellar.min.js')}}"></script>

	<!-- Flexslider -->
	<script src="{{asset('front/js/jquery.flexslider-min.js')}}"></script>
	<script>
		$(function () {
	       $('#date').datetimepicker();
	   });
	</script>
	<!-- Main JS -->
	<script src="{{asset('front/js/main.js')}}"></script>
	
	
	<script>
        $(document).ready(function() {
            console.log('here we go');
            $('#submit-btn').click(function(e) {
                console.log('here we go again');
                e.preventDefault();
                $('#overlay').show();
                $('#loader').show();
                
                $.ajax({
                    url: "{{ route('resturants-requests.store') }}",  // Replace with your route
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: $('#name').val(),
                        email: $('#email').val(),
                        mobile: $('#mobile').val(),
                        business_type: $('#business_type').val()
                    },
                    success: function(response) {
                        $('#overlay').hide();
                        $('#loader').hide();
                        if(response.success) {
                            $('#partner-form').hide();
                            $('#success-message').show();
                            $('#success-image').show();

                        }
                    },
                    error: function(response) {
                        // Handle validation errors
                        console.log('here we go again ya nass');
                        $('#overlay').hide();
                        $('#loader').hide();
                        if(response.status === 422) {
                            let errors = response.responseJSON.errors;
                            // Clear previous error messages
                            $('.form-group .error-message').remove();
                            // Display new error messages
                            for(let field in errors) {
                                let errorMessages = errors[field].join(', ');
                                $(`#${field}`).after(`<span class="text-danger error-message">${errorMessages}</span>`);
                            }
                        }
                    }
                });
            });
        });
    </script>
	

	</body>
</html>

