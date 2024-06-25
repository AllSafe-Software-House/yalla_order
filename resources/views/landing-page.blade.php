
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Insta Order | Home </title>
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
<link rel="icon" href="{{ asset($info->logo) }}" type="image/x-icon"/>

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
            height: 50px;
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
							<h1 class="to-animate" style="margin-right: -150px;">InstaOrder</h1>
							<h2 class="to-animate">تم التصميم بواسطة <a href="https://www.allsafeeg.com/" target="_blank">All Safe</a></h2>
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
						<a href="#" data-nav-section="home">الرئيسيه</a>
						<a href="#" data-nav-section="reservation">كن شريكا</a>
					</div>
					<div class="fh5co-logo">
						<a href=#>Insta Order</a>
					</div>
					<div class="fh5co-menu-2">
						<a href="#" data-nav-section="about">نبذه عنا</a>
				    </div>
				</div>

			</div>
		</div>


		<div id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate">كن شريكا</h2>
						<p class="sub-heading to-animate">انضمَّ إلينا للوصول إلى المزيد من العملاء، زيادة
                                الإيرادات، وتوسيع عملك عبر الإنترنت - قصة
                                نجاحك تبدأ هنا.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 to-animate-2">
						<h3> معلومات التواصل </h3>
						<ul class="fh5co-contact-info">
							<li class="fh5co-contact-address ">
								<i class="icon-home"></i>
								5555 Love Paradise 56 New Clity 5655, <br>Excel Tower United Kingdom
							</li>
							<li><i class="icon-phone"></i> (123) 465-6789</li>
							<li><i class="icon-envelope"></i>info@freehtml5.co</li>
							<!--<li><i class="icon-globe"></i> <a href="https://www.allsafeeg.com/" target="_blank"></a></li>-->
						</ul>
					</div>

					<!-- Overlay Element -->
                    <div class="overlay" id="overlay"></div>
					<!-- Loader Element -->
                    <div class="loader" id="loader"></div>
					<div class="col-md-6 to-animate-2" >
					    <!-- Success Image Element -->

						<form id="partner-form">
						<h3> أنضم إلينا كـ شريك</h3>
    						<div class="form-group ">
    							<label for="name" class="sr-only">الاسم</label>
    							<input id="name" class="form-control" placeholder="الاسم" type="text">
    						</div>
    						<div class="form-group ">
    							<label for="email" class="sr-only">البريد الالكترونى</label>
    							<input id="email" class="form-control" placeholder="البريد الالكترونى" type="email">
    						</div>
    						<div class="form-group ">
    							<label for="mobile" class="sr-only">الهاتف</label>
    							<input id="mobile" class="form-control" placeholder="الهاتف" type="text">
    						</div>
    						<div class="form-group">
    							<label for="business" class="sr-only">نوع المنشأه</label>
    							<select class="form-control" id="business_type" name>
    							      <option value="">اختر نوع المشأه</option>
        							  <option value="restaurantes">مطعم</option>
        							  <option value="clinic">صيدليه</option>

    							</select>
    						</div>

    						<div class="form-group ">
    							<button class="btn btn-primary" value="Send Message" id="submit-btn" type="submit">
    							    ارسال
    							    </button>
    						</div>
						</form>

						<div class="form-group " id="success-message" style="display:none; top: 50%; left: 50%;">
                            <p style="text-align: center;">شكرا لك! لقد تم إرسال طلبك بنجاح.</p>
                            <div style="text-align: center;margin-top: 330px;">
                                <img src="{{asset('front/images/send-successfully.png')}}" alt="Success" class="success-image" id="success-image">
                            </div>
                        </div>

					</div>

				</div>
			</div>
		</div>

		<div id="fh5co-about" data-section="about">
			<div class="fh5co-2col fh5co-bg to-animate-2" style="background-image: url(public/front/images/res_img_1.jpg)"></div>
			<div class="fh5co-2col fh5co-text">
				<h2 class="heading to-animate">نبذه عنا</h2>
				<p class="to-animate"><span class="firstcharacter">F</span>ar far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
				<!--<p class="text-center to-animate"><a href="#" class="btn btn-primary btn-outline">تواصل معنا</a></p>-->
			</div>
		</div>

		<!--<div id="fh5co-sayings">-->
		<!--	<div class="container">-->
		<!--		<div class="row to-animate">-->

		<!--			<div class="flexslider">-->
		<!--				<ul class="slides">-->

		<!--					<li>-->
		<!--						<blockquote>-->
		<!--							<p>&ldquo;Cooking is an art, but all art requires knowing something about the techniques and materials&rdquo;</p>-->
		<!--							<p class="quote-author">&mdash; Nathan Myhrvold</p>-->
		<!--						</blockquote>-->
		<!--					</li>-->
		<!--					<li>-->
		<!--						<blockquote>-->
		<!--							<p>&ldquo;Give a man food, and he can eat for a day. Give a man a job, and he can only eat for 30 minutes on break.&rdquo;</p>-->
		<!--							<p class="quote-author">&mdash; Lev L. Spiro</p>-->
		<!--						</blockquote>-->
		<!--					</li>-->
		<!--					<li>-->
		<!--						<blockquote>-->
		<!--							<p>&ldquo;Find something you’re passionate about and keep tremendously interested in it.&rdquo;</p>-->
		<!--							<p class="quote-author">&mdash; Julia Child</p>-->
		<!--						</blockquote>-->
		<!--					</li>-->
		<!--					<li>-->
		<!--						<blockquote>-->
		<!--							<p>&ldquo;Never work before breakfast; if you have to work before breakfast, eat your breakfast first.&rdquo;</p>-->
		<!--							<p class="quote-author">&mdash; Josh Billings</p>-->
		<!--						</blockquote>-->
		<!--					</li>-->


		<!--				</ul>-->
		<!--			</div>-->

		<!--		</div>-->
		<!--	</div>-->
		<!--</div>-->


		<!--<div id="fh5co-type" style="background-image: url(public/front/images/slide_3.jpg);" data-stellar-background-ratio="0.5">-->
		<!--	<div class="fh5co-overlay"></div>-->
		<!--	<div class="container">-->
		<!--		<div class="row">-->
		<!--			<div class="col-md-3 to-animate">-->
		<!--				<div class="fh5co-type">-->
		<!--					<h3 class="with-icon icon-1">Fruits</h3>-->
		<!--					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--			<div class="col-md-3 to-animate">-->
		<!--				<div class="fh5co-type">-->
		<!--					<h3 class="with-icon icon-2">Sea food</h3>-->
		<!--					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--			<div class="col-md-3 to-animate">-->
		<!--				<div class="fh5co-type">-->
		<!--					<h3 class="with-icon icon-3">Vegetables</h3>-->
		<!--					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--			<div class="col-md-3 to-animate">-->
		<!--				<div class="fh5co-type">-->
		<!--					<h3 class="with-icon icon-4">Meat</h3>-->
		<!--					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</div>-->






	</div>

	<div id="fh5co-footer">
		<div class="container">
			<div class="row row-padded">
				<div class="col-md-6 text-center">
					<a href="{{route('TermsPage')}}">الشروط والاحكام</a>
                    <br>
                    <br>
					<a href="{{route('CommenQuestionPage')}}">الاسئله الشائعه</a>
                    <br>
                    <br>
					<a href="{{route('landingPage')}}">الرئيسيه</a>
				</div>

				<div class="col-md-6 text-center">
					<p class="to-animate">&copy; Insta Order  <br> تم التصميم بواسطة <a href="https://www.allsafeeg.com/" target="_blank">All Safe</a>
					</p>
					<p class="text-center to-animate"><a href="#" class="js-gotop">انتقل إلى الأعلى</a></p>
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

