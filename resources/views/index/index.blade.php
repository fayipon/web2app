<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Smarty V3</title>
		<meta name="description" content="...">

        <meta name="viewport" content="width=device-width, maximum-scale=5, initial-scale=1, user-scalable=0">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

        <!-- up to 10% speed up for external res -->
        <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <!-- preloading icon font is helping to speed up a little bit -->
        <link rel="preload" href="assets/fonts/flaticon/Flaticon.woff2" as="font" type="font/woff2" crossorigin>

        <link rel="stylesheet" href="assets/css/core.min.css">
        <link rel="stylesheet" href="assets/css/vendor_bundle.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">

		<!-- favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="apple-touch-icon" href="demo.files/logo/icon_512x512.png">

		<link rel="manifest" href="assets/images/manifest/manifest.json">
		<meta name="theme-color" content="#377dff">

	</head>

	<!--

		Available Body Classes
			.layout-boxed 					- boxed layout (ignored if any .header-* class is present)

			.header-scroll-reveal  			- header : hide on scroll down and reveal on scroll up
			.header-sticky  				- header : always visible on top
			.header-over  					- header : over slider|parallax|image (next section must contain a large image, else will be indistinguishable)

				Possible header combinations:
					.header-over + .header-scroll-reveal
					.header-over + .header-sticky
						* NOTE: if .header-sticky + .header-scroll-reveal are both used, .header-scroll-reveal is ignored


			.bg-cover .bg-fixed 			- both classes used with .layout-boxed to set a background image via style="background-image:url(...)"


		++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++

		SCROLL TO TOP BUTTON [optional styling]

			data-s2t-disable="true"
			data-s2t-position="start|end"
			data-s2t-class="btn-secondary btn-sm" 	(default)
			data-s2t-class="btn-secondary rounded-circle"
			data-s2t-class="btn-warning rounded-circle"

		++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++

		Development : ignore localStorage cache for dropdowns
		Remove this attribute on production or set "false"
			data-dropdown-ajax-cache-ignore="true"
	
	-->
	<body class="header-sticky">

		<div id="wrapper">


			<!-- HEADER -->
			<header id="header" class="shadow-xs">

				<!-- NAVBAR -->
				<div class="container position-relative">


					<!-- 

						[SOW] SEARCH SUGGEST PLUGIN
						++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++
						PLEASE READ DOCUMENTATION
						documentation/plugins-sow-search-suggest.html
						++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++

					-->
					<form 	action="search-result-2.html" 
							method="GET" 
							data-autosuggest="on" 

							data-mode="json" 
							data-json-max-results='10'
							data-json-related-title='Explore Smarty'
							data-json-related-item-icon='fi fi-star-empty'
							data-json-suggest-title='Suggestions for you'
							data-json-suggest-noresult='No results for'
							data-json-suggest-item-icon='fi fi-search'
							data-json-suggest-min-score='5'
							data-json-highlight-term='true'
							data-contentType='application/json; charset=utf-8'
							data-dataType='json'

							data-container="#sow-search-container" 
							data-input-min-length="2" 
							data-input-delay="250" 
							data-related-keywords="" 
							data-related-url="_ajax/search_suggest_related.json" 
							data-suggest-url="_ajax/search_suggest_input.json" 
							data-related-action="related_get" 
							data-suggest-action="suggest_get" 
							class="js-ajax-search sow-search sow-search-over hide d-inline-flex">
						<div class="sow-search-input w-100">

							<div class="input-group-over d-flex align-items-center w-100 h-100 rounded shadow-md">

								<input placeholder="what are you looking today?" aria-label="what are you looking today?" name="s" type="text" class="form-control-sow-search form-control form-control-lg shadow-xs" value="" autocomplete="off">

								<span class="sow-search-buttons">

									<!-- search button -->
									<button aria-label="Global Search" type="submit" class="btn bg-transparent shadow-none m-0 px-2 py-1 text-muted">
										<i class="fi fi-search fs--20"></i>
									</button>

									<!-- close : mobile only (d-inline-block d-lg-none) -->
									<a href="javascript:;" class="btn-sow-search-toggler btn btn-light shadow-none m-0 px-2 py-1 d-inline-block d-lg-none">
										<i class="fi fi-close fs--20"></i>
									</a>

								</span>

							</div>

						</div>

						<!-- search suggestion container -->
						<div class="sow-search-container w-100 p-0 hide shadow-md" id="sow-search-container">
							<div class="sow-search-container-wrapper">

								<!-- main search container -->
								<div class="sow-search-loader p-3 text-center hide">
									<i class="fi fi-circle-spin fi-spin text-muted fs--30"></i>
								</div>

								<!-- 
									AJAX CONTENT CONTAINER 
									SHOULD ALWAYS BE AS IT IS : NO COMMENTS OR EVEN SPACES!
								--><div class="sow-search-content rounded w-100 scrollable-vertical"></div>

							</div>
						</div>
						<!-- /search suggestion container -->

						<!-- 

							overlay combinations:
								overlay-dark opacity-* [1-9]
								overlay-light opacity-* [1-9]

						-->
						<div class="sow-search-backdrop overlay-dark opacity-3 hide"></div>

					</form>
					<!-- /SEARCH -->





					<nav class="navbar navbar-expand-lg navbar-light justify-content-lg-between justify-content-md-inherit">

						<div class="align-items-start">

							<!-- mobile menu button : show -->
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
								<svg width="25" viewBox="0 0 20 20">
									<path d="M 19.9876 1.998 L -0.0108 1.998 L -0.0108 -0.0019 L 19.9876 -0.0019 L 19.9876 1.998 Z"></path>
									<path d="M 19.9876 7.9979 L -0.0108 7.9979 L -0.0108 5.9979 L 19.9876 5.9979 L 19.9876 7.9979 Z"></path>
									<path d="M 19.9876 13.9977 L -0.0108 13.9977 L -0.0108 11.9978 L 19.9876 11.9978 L 19.9876 13.9977 Z"></path>
									<path d="M 19.9876 19.9976 L -0.0108 19.9976 L -0.0108 17.9976 L 19.9876 17.9976 L 19.9876 19.9976 Z"></path>
								</svg>
							</button>

							<!-- 
								Logo : height: 70px max
							-->
							<a class="navbar-brand" href="index.html">
								<img src="assets/images/logo/logo_dark.svg" width="110" height="70" alt="...">
							</a>

						</div>





						<!-- Menu -->
						<!--

							Dropdown Classes (should be added to primary .dropdown-menu only, dropdown childs are also affected)
								.dropdown-menu-dark 		- dark dropdown (desktop only, will be white on mobile)
								.dropdown-menu-hover 		- open on hover
								.dropdown-menu-clean 		- no background color on hover
								.dropdown-menu-invert 		- open dropdown in oposite direction (left|right, according to RTL|LTR)
								.dropdown-menu-uppercase 	- uppercase text (font-size is scalled down to 13px)
								.dropdown-click-ignore 		- keep dropdown open on inside click (useful on forms inside dropdown)

								Repositioning long dropdown childs (Example: Pages->Account)
									.dropdown-menu-up-n100 		- open up with top: -100px
									.dropdown-menu-up-n100 		- open up with top: -150px
									.dropdown-menu-up-n180 		- open up with top: -180px
									.dropdown-menu-up-n220 		- open up with top: -220px
									.dropdown-menu-up-n250 		- open up with top: -250px
									.dropdown-menu-up 			- open up without negative class


								Dropdown prefix icon (optional, if enabled in variables.scss)
									.prefix-link-icon .prefix-icon-dot 		- link prefix
									.prefix-link-icon .prefix-icon-line 	- link prefix
									.prefix-link-icon .prefix-icon-ico 		- link prefix
									.prefix-link-icon .prefix-icon-arrow 	- link prefix

								.nav-link.nav-link-caret-hide 	- no dropdown icon indicator on main link
								.nav-item.dropdown-mega 		- required ONLY on fullwidth mega menu

								Mobile animation - add to .navbar-collapse:
								.navbar-animate-fadein
								.navbar-animate-fadeinup
								.navbar-animate-bouncein

						-->
						<div class="collapse navbar-collapse navbar-animate-fadein" id="navbarMainNav">


							<!-- MOBILE MENU NAVBAR -->
							<div class="navbar-xs d-none"><!-- .sticky-top -->

								<!-- mobile menu button : close -->
								<button class="navbar-toggler pt-0" type="button" data-toggle="collapse" data-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
									<svg width="20" viewBox="0 0 20 20">
										<path d="M 20.7895 0.977 L 19.3752 -0.4364 L 10.081 8.8522 L 0.7869 -0.4364 L -0.6274 0.977 L 8.6668 10.2656 L -0.6274 19.5542 L 0.7869 20.9676 L 10.081 11.679 L 19.3752 20.9676 L 20.7895 19.5542 L 11.4953 10.2656 L 20.7895 0.977 Z"></path>
									</svg>
								</button>

								<!-- 
									Mobile Menu Logo 
									Logo : height: 70px max
								-->
								<a class="navbar-brand" href="index.html">
									<img src="assets/images/logo/logo_dark.svg" width="110" height="70" alt="...">
								</a>

							</div>
							<!-- /MOBILE MENU NAVBAR -->



							<ul class="navbar-nav">
															<!-- Menu -->
								<!--

									Dropdown Classes (should be added to primary .dropdown-menu only, dropdown childs are also affected)
										.dropdown-menu-dark 		- dark dropdown (desktop only, will be white on mobile)
										.dropdown-menu-hover 		- open on hover
										.dropdown-menu-clean 		- no background color on hover
										.dropdown-menu-invert 		- open dropdown in oposite direction (left|right, according to RTL|LTR)
										.dropdown-menu-uppercase 	- uppercase text (font-size is scalled down to 13px)
										.dropdown-click-ignore 		- keep dropdown open on inside click (useful on forms inside dropdown)

										Repositioning long dropdown childs (Example: Pages->Account)
											.dropdown-menu-up-n100 		- open up with top: -100px
											.dropdown-menu-up-n100 		- open up with top: -150px
											.dropdown-menu-up-n180 		- open up with top: -180px
											.dropdown-menu-up-n220 		- open up with top: -220px
											.dropdown-menu-up-n250 		- open up with top: -250px
											.dropdown-menu-up 			- open up without negative class


										Dropdown prefix icon (optional, if enabled in variables.scss)
											.prefix-link-icon .prefix-icon-dot 		- link prefix
											.prefix-link-icon .prefix-icon-line 	- link prefix
											.prefix-link-icon .prefix-icon-ico 		- link prefix
											.prefix-link-icon .prefix-icon-arrow 	- link prefix

										.nav-link.nav-link-caret-hide 	- no dropdown icon indicator on main link
										.nav-item.dropdown-mega 		- required ONLY on fullwidth mega menu

								-->
								<!-- mobile only image + simple search (d-block d-sm-none) -->
								<li class="nav-item d-block d-sm-none">

									<!-- image -->
									<div class="mb-4">
										<img width="600" height="600" class="img-fluid" src="demo.files/svg/artworks/people_crossbrowser.svg" alt="...">
									</div>

									<!-- search -->
									<form method="get" action="#!search" class="input-group-over mb-5 bg-light p-2 form-control-pill">
										<input type="text" name="keyword" value="" placeholder="Quick search..." class="form-control border-dashed">
										<button class="btn btn-primary fi fi-search p-0 ml-2 mr-2 w--50 h--50"></button>
									</form>

								</li>


								<!-- home -->
								<li class="nav-item dropdown active">

									<a href="#" id="mainNavHome" class="nav-link dropdown-toggle" 
										data-toggle="dropdown" 
										aria-haspopup="true" 
										aria-expanded="false">
										Home
									</a>

									<div aria-labelledby="mainNavHome" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover">
									    <ul class="list-unstyled m-0 p-0">
									        <li class="dropdown-item dropdown">
									        	<a href="#" class="dropdown-link" data-toggle="dropdown">Home Landing</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="landing-1.html" class="dropdown-link">Landing 1</a></li>
									                <li class="dropdown-item"><a href="landing-2.html" class="dropdown-link">Landing 2</a></li>
									                <li class="dropdown-item"><a href="landing-3.html" class="dropdown-link">Landing 3</a></li>
									                <li class="dropdown-item"><a href="landing-4.html" class="dropdown-link">Landing 4</a></li>
									                <li class="dropdown-item"><a href="landing-5.html" class="dropdown-link">Landing 5</a></li>
									                <li class="dropdown-item"><a href="landing-6.html" class="dropdown-link">Landing 6</a></li>
									                <li class="dropdown-item"><a href="landing-7.html" class="dropdown-link">Landing 7 (SAAS)</a></li>
									                <li class="dropdown-item">
									                	<a href="landing-8.html" class="dropdown-link">
									                		<span class="badge badge-secondary float-end">new</span>
									                		Landing 8
									                	</a>
									                </li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown">
									        	<a href="#" class="dropdown-link" data-toggle="dropdown">Niche</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="niche.classifieds.html" class="dropdown-link">Classifieds</a></li>
									                <li class="dropdown-item"><a href="niche.realestate.html" class="dropdown-link">Real Estate</a></li>
									                <li class="dropdown-item"><a href="niche.restaurant.html" class="dropdown-link">Restaurant</a></li>
									                <li class="dropdown-item"><a href="niche.caffe.html" class="dropdown-link">Caffe</a></li>
									                <li class="dropdown-item"><a href="niche.lawyer.html" class="dropdown-link">Lawyer</a></li>
									                <li class="dropdown-item"><a href="niche.tattoo.html" class="dropdown-link">Tattoo</a></li>
									                <li class="dropdown-item"><a href="niche.hosting.html" class="dropdown-link">Hosting</a></li>
									                <li class="dropdown-item"><a href="#" class="dropdown-link disabled">More : Soon</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item"><a href="help-center-1-index.html" class="dropdown-link">Help Center 1</a></li>
									        <li class="dropdown-item"><a href="help-center-2-index.html" class="dropdown-link">Help Center 2</a></li>
									        <li class="dropdown-item"><a href="fullajax-index.html" class="dropdown-link" target="_blank">
									        	<span class="badge badge-secondary float-end">new</span>
									        	Full Ajax
									        </a></li>
									        <li class="dropdown-item"><a href="overview.html" class="dropdown-link text-muted">Overview Page</a></li>
									        <li class="dropdown-divider"></li>
									        <li class="dropdown-item"><a href="https://theme.stepofweb.com/Smarty/v2.3.1/HTML_BS4/start_v4.html" class="dropdown-link" target="_blank">Smarty v2.x <i class="fi fi-emoji-smile text-muted"></i> <span class="d-block text-muted pt--6 fs--13 font-weight-light">You also get previous <br> Smarty version. Eh?</span></a></li>
									    </ul>
									</div>

								</li>


								<!-- pages -->
								<li class="nav-item dropdown">

									<a href="#" id="mainNavPages" class="nav-link dropdown-toggle" 
										data-toggle="dropdown" 
										aria-haspopup="true" 
										aria-expanded="false">
										Pages
									</a>

									<div aria-labelledby="mainNavPages" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover">
									    <ul class="list-unstyled m-0 p-0">
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">About</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="about-us-1.html" class="dropdown-link">About Us 1</a></li>
									                <li class="dropdown-item"><a href="about-us-2.html" class="dropdown-link">About Us 2</a></li>
									                <li class="dropdown-item"><a href="about-us-3.html" class="dropdown-link">About Us 3</a></li>
									                <li class="dropdown-item"><a href="about-us-4.html" class="dropdown-link">About Us 4</a></li>
									                <li class="dropdown-item"><a href="about-us-5.html" class="dropdown-link">About Us 5</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="about-me-1.html" class="dropdown-link">About Me 1</a></li>
									                <li class="dropdown-item"><a href="about-me-2.html" class="dropdown-link">About Me 2</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Services</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="services-1.html" class="dropdown-link">Services 1</a></li>
									                <li class="dropdown-item"><a href="services-2.html" class="dropdown-link">Services 2</a></li>
									                <li class="dropdown-item"><a href="services-3.html" class="dropdown-link">Services 3</a></li>
									                <li class="dropdown-item"><a href="services-4.html" class="dropdown-link">Services 4</a></li>
									                <li class="dropdown-item"><a href="services-5.html" class="dropdown-link">Services 5</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Contact</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="contact-1.html" class="dropdown-link">Contact 1</a></li>
									                <li class="dropdown-item"><a href="contact-2.html" class="dropdown-link">Contact 2</a></li>
									                <li class="dropdown-item"><a href="contact-3.html" class="dropdown-link">Contact 3</a></li>
									                <li class="dropdown-item"><a href="contact-4.html" class="dropdown-link">Contact 4</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Pricing</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="pricing-1.html" class="dropdown-link">Pricing 1</a></li>
									                <li class="dropdown-item"><a href="pricing-2.html" class="dropdown-link">Pricing 2</a></li>
									                <li class="dropdown-item"><a href="pricing-3.html" class="dropdown-link">Pricing 3</a></li>
									                <li class="dropdown-item"><a href="pricing-4.html" class="dropdown-link">Pricing 4</a></li>
									                <li class="dropdown-item"><a href="pricing-5.html" class="dropdown-link">Pricing 5</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">FAQ</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="faq-1.html" class="dropdown-link">FAQ 1</a></li>
									                <li class="dropdown-item"><a href="faq-2.html" class="dropdown-link">FAQ 2</a></li>
									                <li class="dropdown-item"><a href="faq-3.html" class="dropdown-link">FAQ 3</a></li>
									                <li class="dropdown-item"><a href="faq-4.html" class="dropdown-link">FAQ 4</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Team</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="team-1.html" class="dropdown-link">Team 1</a></li>
									                <li class="dropdown-item"><a href="team-2.html" class="dropdown-link">Team 2</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Account</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="account-full-signin-1.html" class="dropdown-link">Sign In/Up : Full 1</a></li>
									                <li class="dropdown-item"><a href="account-full-signin-2.html" class="dropdown-link">Sign In/Up : Full 2</a></li>
									                <li class="dropdown-item"><a href="account-onepage-signin.html" class="dropdown-link">Sign In/Up : Onepage</a></li>
									                <li class="dropdown-item"><a href="account-simple-signin.html" class="dropdown-link">Sign In/Up : Simple</a></li>
									                <li class="dropdown-item"><a href="account-modal-signin.html" class="dropdown-link">Sign In/Up : Modal</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="account-orders.html" class="dropdown-link">Account : Orders</a></li>
									                <li class="dropdown-item"><a href="account-favourites.html" class="dropdown-link">Account : Favourites</a></li>
									                <li class="dropdown-item"><a href="account-settings.html" class="dropdown-link">Account : Settings</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Clients / Career</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="clients.html" class="dropdown-link">Clients</a></li>
									                <li class="dropdown-item"><a href="career.html" class="dropdown-link">Career</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Portfolio</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="portfolio-columns-2.html" class="dropdown-link">2 Columns</a></li>
									                <li class="dropdown-item"><a href="portfolio-columns-3.html" class="dropdown-link">3 Columns</a></li>
									                <li class="dropdown-item"><a href="portfolio-columns-4.html" class="dropdown-link">4 Columns</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="portfolio-single-1.html" class="dropdown-link">Single Item 1</a></li>
									                <li class="dropdown-item"><a href="portfolio-single-2.html" class="dropdown-link">Single Item 2</a></li>
									                <li class="dropdown-item"><a href="portfolio-single-3.html" class="dropdown-link">Single Item 3</a></li>
									                <li class="dropdown-item"><a href="portfolio-single-4.html" class="dropdown-link">Single Item 4</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Search Result</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="search-result-1.html" class="dropdown-link">Search Result 1</a></li>
									                <li class="dropdown-item"><a href="search-result-2.html" class="dropdown-link">Search Result 2</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item">
									        	<a href="forum-index.html" class="dropdown-link">Forum / Comunity</a>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Utility</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-up dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="404-1.html" class="dropdown-link">Error 1</a></li>
									                <li class="dropdown-item"><a href="404-2.html" class="dropdown-link">Error 2</a></li>
									                <li class="dropdown-item"><a href="404-3.html" class="dropdown-link">Error 3</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="maintenance-1.html" class="dropdown-link">Maintenance 1</a></li>
									                <li class="dropdown-item"><a href="maintenance-2.html" class="dropdown-link">Maintenance 2</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="comingsoon-1.html" class="dropdown-link">Coming Soon 1</a></li>
									                <li class="dropdown-item"><a href="comingsoon-2.html" class="dropdown-link">Coming Soon 2</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="page-cookie.html" class="dropdown-link">GDPR Page &amp; Cookie Window</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-divider"></li>
									        <li class="dropdown-item"><a href="__junkyard.html" class="dropdown-link text-gray-500" target="smarty">Smarty Junkyard</a></li>
									    </ul>
									</div>

								</li>


								<!-- features -->
								<li class="nav-item dropdown">

									<a href="#" id="mainNavFeatures" class="nav-link dropdown-toggle" 
										data-toggle="dropdown" 
										aria-haspopup="true" 
										aria-expanded="false">
										Features
									</a>

									<div aria-labelledby="mainNavFeatures" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover">
									    <ul class="list-unstyled m-0 p-0">
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Header</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item dropdown"><a href="#" class="dropdown-link font-weight-bold" data-toggle="dropdown">Variants</a>
									                    <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                        <li class="dropdown-item"><a href="header-variant-1.html" class="dropdown-link">Header : Variant : 1</a></li>
									                        <li class="dropdown-item"><a href="header-variant-2.html" class="dropdown-link">Header : Variant : 2</a></li>
									                        <li class="dropdown-item"><a href="header-variant-3.html" class="dropdown-link">Header : Variant : 3</a></li>
									                        <li class="dropdown-item"><a href="header-variant-4.html" class="dropdown-link">Header : Variant : 4</a></li>
									                    </ul>
									                </li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="header-option-light.html" class="dropdown-link">Header : Light <small class="text-muted">(default)</small></a></li>
									                <li class="dropdown-item"><a href="header-option-dark.html" class="dropdown-link">Header : Dark</a></li>
									                <li class="dropdown-item"><a href="header-option-color.html" class="dropdown-link">Header : Color</a></li>
									                <li class="dropdown-item"><a href="header-option-transparent.html" class="dropdown-link">Header : Transparent</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="header-option-centered.html" class="dropdown-link">Header : Centered</a></li>
									                <li class="dropdown-item"><a href="header-option-bottom.html" class="dropdown-link">Header : Bottom</a></li>
									                <li class="dropdown-item"><a href="header-option-floating.html" class="dropdown-link">Header : Floating</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="header-option-fixed.html" class="dropdown-link">Header : Fixed</a></li>
									                <li class="dropdown-item"><a href="header-option-reveal.html" class="dropdown-link">Header : Reveal on Scroll</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="header-option-ajax-search-json.html" class="dropdown-link">Ajax Search : Json</a></li>
									                <li class="dropdown-item"><a href="header-option-ajax-search-html.html" class="dropdown-link">Ajax Search : Html</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Footer</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item dropdown"><a href="#" class="dropdown-link font-weight-bold" data-toggle="dropdown">Variants</a>
									                    <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                        <li class="dropdown-item"><a href="footer-variant-1.html#footer" class="dropdown-link">Footer : Variant : 1</a></li>
									                        <li class="dropdown-item"><a href="footer-variant-2.html#footer" class="dropdown-link">Footer : Variant : 2</a></li>
									                        <li class="dropdown-item"><a href="footer-variant-3.html#footer" class="dropdown-link">Footer : Variant : 3</a></li>
									                        <li class="dropdown-item"><a href="footer-variant-4.html#footer" class="dropdown-link">Footer : Variant : 4</a></li>
									                        <li class="dropdown-item"><a href="footer-variant-5.html#footer" class="dropdown-link">Footer : Variant : 5</a></li>
									                        <li class="dropdown-item"><a href="footer-variant-6.html#footer" class="dropdown-link">Footer : Variant : 6</a></li>
									                    </ul>
									                </li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="footer-option-light.html" class="dropdown-link">Footer : Light</a></li>
									                <li class="dropdown-item"><a href="footer-option-dark.html" class="dropdown-link">Footer : Dark <small class="text-muted">(default)</small></a></li>
									                <li class="dropdown-item"><a href="footer-option-image.html" class="dropdown-link">Footer : Image</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Sliders</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="slider-swiper.html" class="dropdown-link">Swiper Slider</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Page Title</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="page-title-classic.html" class="dropdown-link">Page Title : Classic</a></li>
									                <li class="dropdown-item"><a href="page-title-alternate.html" class="dropdown-link">Page Title : Alternate</a></li>
									                <li class="dropdown-item"><a href="page-title-color.html" class="dropdown-link">Page Title : Color + Nav</a></li>
									                <li class="dropdown-item"><a href="page-title-clean.html" class="dropdown-link">Page Title : Clean</a></li>
									                <li class="dropdown-item"><a href="page-title-parallax-1.html" class="dropdown-link">Page Title : Parallax 1</a></li>
									                <li class="dropdown-item"><a href="page-title-parallax-2.html" class="dropdown-link">Page Title : Parallax 2</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item dropdown"><a href="#" class="dropdown-link" data-toggle="dropdown">Sidebar</a>
									            <ul class="dropdown-menu dropdown-menu-hover dropdown-menu-block-md shadow-lg b-0 m-0">
									                <li class="dropdown-item"><a href="sidebar-float-cart.html" class="dropdown-link">Sidebar : Cart</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="sidebar-float-dark.html" class="dropdown-link">Sidebar : Float : Dark</a></li>
									                <li class="dropdown-item"><a href="sidebar-float-light.html" class="dropdown-link">Sidebar : Float : Light</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><a href="sidebar-static-dark.html" class="dropdown-link">Sidebar : Static : Dark</a></li>
									                <li class="dropdown-item"><a href="sidebar-static-light.html" class="dropdown-link">Sidebar : Static : Light</a></li>
									                <li class="dropdown-divider"></li>
									                <li class="dropdown-item"><span class="d-block text-muted py-2 px-4 fs--13 font-weight-bold">Same as admin</span></li>
									                <li class="dropdown-item"><a href="sidebar-float-admin-color.html" class="dropdown-link">Sidebar : Float</a></li>
									                <li class="dropdown-item"><a href="sidebar-static-admin-color.html" class="dropdown-link">Sidebar : Static</a></li>
									            </ul>
									        </li>
									        <li class="dropdown-item">
									        	<a href="header-dropdown.html" class="dropdown-link font-weight-medium">
									        		Menu Dropdowns
									        	</a>
									        </li>
									        <li class="dropdown-divider"></li>
									        <li class="dropdown-item"><a href="layout-boxed-1.html" class="dropdown-link">Boxed Layout</a></li>
									        <li class="dropdown-item"><a href="layout-boxed-0.html" class="dropdown-link">Boxed + Header Over</a></li>
									        <li class="dropdown-item"><a href="layout-boxed-2.html" class="dropdown-link">Boxed + Background</a></li>
									    </ul>
									</div>

								</li>


								<!-- shop + blog -->
								<li class="nav-item dropdown dropdown-mega">

									<a href="#" id="mainNavShop" class="nav-link dropdown-toggle" 
										data-toggle="dropdown" 
										aria-haspopup="true" 
										aria-expanded="false">
										Shop &amp; Blog
									</a>

									<div aria-labelledby="mainNavShop" class="dropdown-menu dropdown-menu-hover dropdown-menu-clean">
									    <!-- Blog and Shop : Megamenu -->
									    <ul class="list-unstyled m-0 p-0">
									        <li class="dropdown-item bg-transparent">

									            <div class="row col-border-md">

									                <div class="col-12 col-md-3">

									                    <h3 class="h6 text-muted text-uppercase fs--14 mb-3">Shop Homepage</h3>
									                    <ul class="prefix-link-icon prefix-icon-dot">

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-index-1.html">Shop Home 1</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-index-2.html">Shop Home 2</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-index-3.html">Shop Home 3</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-index-4.html">Shop Home 4</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-index-christmas.html">
									                            	<span class="badge badge-secondary float-end">new</span>
									                            	Shop : Christmas
									                           	</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link disabled" href="#!">More : Soon</a>
									                        </li>

									                    </ul>

									                </div>

									                <div class="col-12 col-md-3">

									                    <h3 class="h6 text-muted text-uppercase fs--14 mb-3">Shop Category</h3>
									                    <ul class="prefix-link-icon prefix-icon-dot">

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-category-1.html">Category 1</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-category-2.html">Category 2</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-category-3.html">Category 3</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-category-4.html">Category 4</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-category-lazyload.html">Using Lazyload</a>
									                        </li>

									                    </ul>

									                </div>

									                <div class="col-12 col-md-3">

									                    <h3 class="h6 text-muted text-uppercase fs--14 mb-3">Shop Cart</h3>
									                    <ul class="prefix-link-icon prefix-icon-dot">

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-cart-1.html">Cart</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-cart-2.html">Cart Empty</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-checkout-success.html">Checkout Success</a>
									                        </li>

									                    </ul>

									                    <h3 class="h6 text-muted text-uppercase fs--14 mb-3 mt-5">Shop Product</h3>
									                    <ul class="prefix-link-icon prefix-icon-dot">

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-product-1.html">Product Page 1</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-product-2.html">Product Page 2</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-product-3.html">Product Page 3</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-product-4.html">Product Page 4</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="shop-page-product-5.html">Product Page 5</a>
									                        </li>

									                    </ul>

									                </div>

									                <div class="col-12 col-md-3">

									                    <h3 class="h6 text-muted text-uppercase fs--14 mb-3">Blog Pages</h3>
									                    <ul class="prefix-link-icon prefix-icon-line">

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="blog-page-sidebar.html">With Sidebar</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="blog-page-sidebar-no.html">Without Sidebar</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="blog-page-single-sidebar.html">Single With Sidebar</a>
									                        </li>

									                        <li class="dropdown-item">
									                            <a class="dropdown-link" href="blog-page-single-sidebar-no.html">Single Without Sidebar</a>
									                        </li>

									                    </ul>

									                    <div class="mt-4">
									                        <img width="600" height="600" class="img-fluid" src="demo.files/svg/artworks/undraw_wireframing_nxyi.svg" alt="...">
									                    </div>

									                </div>

									            </div>

									        </li>
									    </ul>
									</div>

								</li>


								<!-- documentation -->
								<li class="nav-item dropdown">

									<a href="#" id="mainNavDocumentation" class="nav-link dropdown-toggle nav-link-caret-hide" 
										data-toggle="dropdown" 
										aria-haspopup="true" 
										aria-expanded="false">
										<span>Documentation</span>
									</a>

									<div aria-labelledby="mainNavDocumentation" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover w--300">										
										<!-- Documentation : no container, direct links! -->
										<a href="documentation/index.html" class="dropdown-item transition-hover-left clearfix text-primary pt-4 pb-4 fs--14">

											<span class="float-start w--50 mr--20">
												<img width="50" height="50" class="img-fluid" src="demo.files/svg/icons/menu_doc_1.svg" alt="...">
											</span>

											DOCUMENTATION
											<span class="d-block text-muted text-truncate fs--14">
												Don't get stuck!
											</span>
										</a>

										<div class="dropdown-divider"></div>
										
										<a href="documentation/changelog.html" class="dropdown-item transition-hover-left clearfix text-primary pt-4 pb-4 fs--14">
											
											<span class="badge badge-secondary badge-soft position-absolute absolute-top right-0 ml-2 mr-2">v3.x</span>

											<span class="float-start w--50 mr--20">
												<img width="50" height="50" class="img-fluid" src="demo.files/svg/icons/menu_doc_2.svg" alt="...">
											</span>

											CHANGELOG
											<span class="d-block text-muted text-truncate fs--14">
												Smarty Reborn Changes
											</span>
										</a>
									</div>

								</li>




								<!-- social : mobile only (d-block d-sm-none)-->
								<li class="nav-item d-block d-sm-none text-center mb-4">

									<h3 class="h6 text-muted">Follow Us</h3>

									<a href="#!" class="btn btn-sm btn-facebook transition-hover-top mb-2 rounded-circle text-white" rel="noopener">
										<i class="fi fi-social-facebook"></i> 
									</a>

									<a href="#!" class="btn btn-sm btn-twitter transition-hover-top mb-2 rounded-circle text-white" rel="noopener">
										<i class="fi fi-social-twitter"></i> 
									</a>

									<a href="#!" class="btn btn-sm btn-linkedin transition-hover-top mb-2 rounded-circle text-white" rel="noopener">
										<i class="fi fi-social-linkedin"></i> 
									</a>

									<a href="#!" class="btn btn-sm btn-youtube transition-hover-top mb-2 rounded-circle text-white" rel="noopener">
										<i class="fi fi-social-youtube"></i> 
									</a>

								</li>



								<!-- Get Smarty : mobile only (d-block d-sm-none)-->
								<li class="nav-item d-block d-sm-none">
									<a target="_blank" href="/login" class="btn btn-block btn-primary shadow-none text-white m-0">
										进入后台
									</a>
								</li>

							</ul>

						</div>





						<!-- OPTIONS -->
						<ul class="list-inline list-unstyled mb-0 d-flex align-items-end">

							<li class="list-inline-item mx-1 dropdown">

								<a href="#" aria-label="Account Options" id="dropdownAccountOptions" class="btn btn-sm rounded-circle btn-light bg-transparent text-muted shadow-none" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
									<span class="group-icon">
										<i class="fi fi-user-male"></i>
										<i class="fi fi-close"></i>
									</span>
								</a>


								<!--
									
									Dropdown Classes
										.dropdown-menu-dark 		- dark dropdown (desktop only, will be white on mobile)
										.dropdown-menu-hover 		- open on hover
										.dropdown-menu-clean 		- no background color on hover
										.dropdown-menu-invert 		- open dropdown in oposite direction (left|right, according to RTL|LTR)
										.dropdown-click-ignore 		- keep dropdown open on inside click (useful on forms inside dropdown)

										Dropdown prefix icon (optional, if enabled in variables.scss)
											.prefix-link-icon .prefix-icon-dot 		- link prefix
											.prefix-link-icon .prefix-icon-line 	- link prefix
											.prefix-link-icon .prefix-icon-ico 		- link prefix
											.prefix-link-icon .prefix-icon-arrow 	- link prefix

											.prefix-icon-ignore 					- ignore, do not use on a specific link

								-->
								<div aria-labelledby="dropdownAccountOptions" class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-clean dropdown-menu-invert dropdown-click-ignore p-0 mt--18 fs--15">
									<div class="dropdown-header">
										John Doe
									</div>
									<div class="dropdown-divider"></div>
									<a href="account-orders.html" title="My Orders" class="dropdown-item text-truncate font-weight-light">
										My Orders <small>(2)</small>
									</a>
									<a href="account-favourites.html" title="My Favourites" class="dropdown-item text-truncate font-weight-light">
										My Favourites <small>(3)</small>
									</a>
									<a href="account-settings.html" title="Account Settings" class="dropdown-item text-truncate font-weight-light">
										Account Settings
									</a>
									<div class="dropdown-divider mb-0"></div>
									<a href="#!" title="Log Out" class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore">
										<i class="fi fi-power float-start"></i>
										Log Out
									</a>
								</div>

							</li>

							<li class="list-inline-item mx-1 dropdown">

								<a href="#" aria-label="website search" class="btn-sow-search-toggler btn btn-sm rounded-circle btn-light bg-transparent text-muted shadow-none">
									<i class="fi fi-search"></i>
								</a>

							</li>

							<li class="list-inline-item ml--6 mr--6 float-start d-none d-lg-inline-block">
								<a target="_blank" href="/login" class="btn btn-sm btn-light bg-transparent text-muted shadow-none m-0">
									进入后台
								</a>
							</li>

						</ul>
						<!-- /OPTIONS -->



					</nav>

				</div>
				<!-- /NAVBAR -->

			</header>
			<!-- /HEADER -->



			<!-- COVER -->
			<section class="p-0">

				<div class="container min-h-75vh d-middle pt-5"> 

					<div class="row text-center-xs align-items-center">
						
						<div class="col-12 col-md-6 order-2 order-md-1 pb-5" data-aos="fade-in" data-aos-delay="0">

							<div class="mb-5">

								<h1 class="font-weight-bold mb-5">
									
									<em class="position-relative display-4 h2-xs font-weight-bold d-block">
										Smarty Multipurpose
									</em> 


									<span class="position-relative h5-xs d-inline-block font-weight-medium">
										<em class="text-danger-gradient">Unlimited</em> Combinations

										<!-- svg drawlines -->
										<svg class="svg-drawlines h--20 position-absolute start-0 bottom-0 mb--n15" viewBox="0 0 154 13">
											<path fill="none" d="M2 2c49.7 2.6 100 3.1 150 1.7-46.5 2-93 4.4-139.2 7.3 45.2-1.5 90.6-1.8 135.8-.6" vector-effect="non-scaling-stroke" stroke-linejoin="round" stroke-linecap="round"></path>
										</svg>
									</span>

								</h1>


								<p class="lead">
									No other template on any market is working the way Smarty does! 
									Lightweight, fast, loading plugins <b>only</b> when needed, <B>where</B> are needed in a dynamic way!
								</p>

								<div class="mt-5">

									<a target="_blank" href="../html_admin/layout_1/" class="btn btn-danger shadow-danger-xlg row-pill font-weight-medium">
										Smarty Admin Included
									</a>

								</div>
							</div>

						</div>

						<!-- image -->
						<div class="col-12 col-md-6 order-1 order-md-2 pb-5 align-items-center" data-aos="fade-in" data-aos-delay="200">
							
							<img width="600" height="400" class="img-fluid lazy px-5" data-src="demo.files/svg/artworks/undraw_new_ideas_jdea.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">

						</div>

					</div>

				</div>
			</section>	
			<!-- /COVER -->






			<!-- COUNTER -->
			<section class="pt-5 pb-0 shadow-xs">
				<div class="container">

					<div class="row col-border text-center text-muted">
						
						<div class="col-6 col-md-3 mb-5">

							<div class="h1">
								<span data-toggle="count" 
									data-count-from="0" 
									data-count-to="7000" 
									data-count-duration="2500" 
									data-count-decimals="0">0</span><span class="font-weight-light">+</span>
							</div>
							
							<h3 class="h6 m-0">TRUSTED CLIENTS</h3>

						</div>


						<div class="col-6 col-md-3 mb-5">

							<div class="h1">
								<span data-toggle="count" 
									data-count-from="0" 
									data-count-to="100" 
									data-count-duration="2500" 
									data-count-decimals="0">0</span><span class="font-weight-light">%</span>
							</div>
							
							<h3 class="h6 m-0">FREE UPDATES</h3>

						</div>


						<div class="col-6 col-md-3 mb-5 b--0-xs">

							<div class="h1">
								<span data-toggle="count" 
									data-count-from="0" 
									data-count-to="100" 
									data-count-duration="2500" 
									data-count-decimals="0">0</span><span class="font-weight-light">%</span>
							</div>
							
							<h3 class="h6 m-0">UPCOMING FEATURES</h3>

						</div>


						<div class="col-6 col-md-3 mb-5">

							<div class="h1">
								<span data-toggle="count" 
									data-count-from="0" 
									data-count-to="5" 
									data-count-duration="1500" 
									data-count-decimals="0">0</span><span class="font-weight-light">/5</span>
							</div>
							
							<h3 class="h6 m-0">RATED</h3>

						</div>

					</div>

				</div>
			</section>
			<!-- /COUNTER -->





			<!-- COLOR SECTION -->
			<section>
				<div class="container container-ignore-breakpoints">

					<!--
						
						bg-gradient-linear-default

					-->
					<div class="py-7 bg-gradient-linear-default text-white rounded-xl">
						<div class="container container-ignore-breakpoints">

							<div class="max-w-800 mx-auto text-white">

								<h2 class="display-4 h2-xs font-weight-bold mb-5 text-shadow-lg">
									Create stuning websites, without writing css/js code!
								</h2>

								<p class="lead h6-xs text-white opacity-8 mb-5">
									No other template on any market is working the way Smarty does! Lightweight, fast, loading plugins only when needed, where are needed in a dynamic way!
								</p>

								<a href="documentation/index.html" class="btn btn-danger shadow-dark-xlg row-pill font-weight-medium">
									Smarty Premium Features
								</a>

								<div class="row mt-7">

									<div class="col-12 col-lg-6">

										<div class="d-flex align-items-center mb-2">

											<div class="flex-none badge badge-danger bg-gradient-danger rounded-circle w--35 h--35 fs--18 d-middle">
												<i class="fi fi-check"></i>
											</div>

											<div class="text-white px-3">
												<b>28+</b> private dedicated plugins
											</div>

										</div>

										<div class="d-flex align-items-center mb-2">

											<div class="flex-none badge badge-danger bg-gradient-danger rounded-circle w--35 h--35 fs--18 d-middle">
												<i class="fi fi-check"></i>
											</div>

											<div class="text-white px-3">
												Extensive <b>documentation</b>.
											</div>

										</div>

										<div class="d-flex align-items-center mb-2">

											<div class="flex-none badge badge-danger bg-gradient-danger rounded-circle w--35 h--35 fs--18 d-middle">
												<i class="fi fi-check"></i>
											</div>

											<div class="text-white px-3">
												<b>Unlimited</b> / lifetime updates.
											</div>

										</div>

									</div>

									<div class="col-12 col-lg-6">

										<div class="d-flex align-items-center mb-2">

											<div class="flex-none badge badge-danger bg-gradient-danger rounded-circle w--35 h--35 fs--18 d-middle">
												<i class="fi fi-check"></i>
											</div>

											<div class="text-white px-3">
												<b>Free</b> support
											</div>

										</div>

										<div class="d-flex align-items-center mb-2">

											<div class="flex-none badge badge-danger bg-gradient-danger rounded-circle w--35 h--35 fs--18 d-middle">
												<i class="fi fi-check"></i>
											</div>

											<div class="text-white px-3">
												<b>Easy</b> to use, start in seconds.
											</div>

										</div>

										<div class="d-flex align-items-center mb-2">

											<div class="flex-none badge badge-danger bg-gradient-danger rounded-circle w--35 h--35 fs--18 d-middle">
												<i class="fi fi-check"></i>
											</div>

											<div class="text-white px-3">
												<b>No Javascript</b> code needed.
											</div>

										</div>

									</div>

								</div>

							</div>

						</div>
					</div>


				</div>
			</section>



			<section class="pt-7 pb--250 mb-3 bg-gradient-linear-indigo text-white">
				<div class="container">

					<div class="row">

						<div class="col-12 col-lg-4 mb-4 d-flex">

							<div class="w--50">
								<i class="text-white fs--40 fi fi-share"></i>
							</div>

							<div class="col">
								<h3 class="h5">
									<a href="#!" class="text-white text-warning-hover text-decoration-none">
										Regular <small>updates</small>
									</a>
								</h3>

								<p class="fs--15 m-0">
									Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
								</p>
							</div>

						</div>


						<div class="col-12 col-lg-4 mb-4 d-flex">

							<div class="w--50">
								<i class="text-white fs--40 fi fi-support"></i>
							</div>

							<div class="col">
								<h3 class="h5">
									<a href="#!" class="text-white text-warning-hover text-decoration-none">
										Free <small>Support</small>
									</a>
								</h3>

								<p class="fs--15 m-0">
									Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
								</p>
							</div>

						</div>


						<div class="col-12 col-lg-4 mb-4 d-flex">

							<div class="w--50">
								<i class="text-white fs--40 fi fi-time"></i>
							</div>

							<div class="col">
								<h3 class="h5">
									<a href="#!" class="text-white text-warning-hover text-decoration-none">
										Start <small>in seconds</small>
									</a>
								</h3>

								<p class="fs--15 m-0">
									Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
								</p>
							</div>

						</div>

					</div>

				</div>
			</section>



			<!-- BRANDS -->
			<section class="p-0">
				<div class="container">

					<!-- BRANDS : GRID : LAZYLOAD -->
					<div class="mt--n180 p-3 bg-white shadow-3d rounded overflow-hidden">
						<div class="bg-white overflow-hidden">
							<div class="row row-grid mt--n1 ml--n1 mr--n1 mb--n1">

								<div class="h--150 col-6 col-md-5th d-flex align-items-center text-center" data-aos="fade-in" data-aos-delay="150" data-aos-offset="0">
									<a href="#!" class="w-100">
										<img class="max-h-60 img-fluid opacity-4 ml-3 mr-3 max-w-180 lazy" data-src="demo.files/svg/vendors/vendor_airbnb.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
									</a>
								</div>

								<div class="h--150 col-6 col-md-5th d-flex align-items-center text-center" data-aos="fade-in" data-aos-delay="200" data-aos-offset="0">
									<a href="#!" class="w-100">
										<img class="max-h-60 img-fluid opacity-4 ml-3 mr-3 max-w-180 lazy" data-src="demo.files/svg/vendors/vendor_netflix.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
									</a>
								</div>

								<div class="h--150 col-6 col-md-5th d-flex align-items-center text-center" data-aos="fade-in" data-aos-delay="250" data-aos-offset="0">
									<a href="#!" class="w-100">
										<img class="max-h-60 img-fluid opacity-4 ml-3 mr-3 max-w-180 lazy" data-src="demo.files/svg/vendors/vendor_coinbase.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
									</a>
								</div>

								<div class="h--150 col-6 col-md-5th d-flex align-items-center text-center" data-aos="fade-in" data-aos-delay="300" data-aos-offset="0">
									<a href="#!" class="w-100">
										<img class="max-h-60 img-fluid opacity-4 ml-3 mr-3 max-w-180 lazy" data-src="demo.files/svg/vendors/vendor_instagram.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
									</a>
								</div>

								<div class="h--150 col-6 col-md-5th d-flex align-items-center text-center" data-aos="fade-in" data-aos-delay="350" data-aos-offset="0">
									<a href="#!" class="w-100">
										<img class="max-h-60 img-fluid opacity-4 ml-3 mr-3 max-w-180 lazy" data-src="demo.files/svg/vendors/vendor_pinterest.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
									</a>
								</div>

								<div class="h--150 col-6 col-md-5th d-flex align-items-center text-center" data-aos="fade-in" data-aos-delay="400" data-aos-offset="0">
									<a href="#!" class="w-100">
										<img class="max-h-60 img-fluid opacity-4 ml-3 mr-3 max-w-180 lazy" data-src="demo.files/svg/vendors/vendor_dribble.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
									</a>
								</div>

								<div class="h--150 col-6 col-md-5th d-flex align-items-center text-center" data-aos="fade-in" data-aos-delay="450" data-aos-offset="0">
									<a href="#!" class="w-100">
										<img class="max-h-60 img-fluid opacity-4 ml-3 mr-3 max-w-180 lazy" data-src="demo.files/svg/vendors/vendor_digitalocean.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
									</a>
								</div>

								<div class="h--150 col-6 col-md-5th d-flex align-items-center text-center" data-aos="fade-in" data-aos-delay="500" data-aos-offset="0">
									<a href="#!" class="w-100">
										<img class="max-h-60 img-fluid opacity-4 ml-3 mr-3 max-w-180 lazy" data-src="demo.files/svg/vendors/vendor_stripe.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
									</a>
								</div>

								<div class="h--150 col-6 col-md-5th d-flex align-items-center text-center" data-aos="fade-in" data-aos-delay="500" data-aos-offset="0">
									<a href="#!" class="w-100">
										<img class="max-h-60 img-fluid opacity-4 ml-3 mr-3 max-w-180 lazy" data-src="demo.files/svg/vendors/vendor_discord.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
									</a>
								</div>

								<div class="h--150 col-6 col-md-5th d-flex align-items-center text-center" data-aos="fade-in" data-aos-delay="500" data-aos-offset="0">
									<a href="#!" class="w-100">
										<img class="max-h-60 img-fluid opacity-4 ml-3 mr-3 max-w-180 lazy" data-src="demo.files/svg/vendors/vendor_slack.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
									</a>
								</div>

							</div>
						</div>
					</div>
					<!-- BRANDS : GRID : LAZYLOAD -->

				</div>
			</section>
			<!-- /BRANDS -->




			<!-- block : services -->
			<section id="section_about">
				<div class="container">
				

					<!-- Services -->
					<div class="row d-flex flex-wrap align-items-center my-7">

						<div class="order-lg-2 col-12 col-lg-6 mb-5">

							<hr class="h--1 bg-success w--50 d-inline-block">
							<h2 class="h1 text-success mb-4">
								Services
							</h2>


							<p class="lead mb-5">
								Answering those questions and more is a tall order, but one you should approach with enthusiasm. After all, this is the one place you can and should sing your own praises.  This is your opportunity to tell the world why your company is awesome. But you’ll need to do it tactfully, and that’s the tricky part.
							</p>

							<a href="contact-1.html" class="btn btn-success btn-pill btn-soft">
								Get in touch with us
							</a>

						</div>

						<div class="order-lg-1 col-12 col-lg-6 mb-5">

							<div class="row gutters-md gutters-xs--xs">

								<div class="col-6 jarallax" data-jarallax-element="-20">

									<div class="bg-white shadow-xs rounded-xl p-4 mb-4 mb-2-xs bg-primary-soft-hover transition-bg-ease-150 text-decoration-none text-gray-800">
										<i class="fi fi-support fs--45"></i>
										<h3 class="h5 py-3">24/7 Support</h3>
										<p>
											Answering those questions and more is a tall order, but one you should approach with enthusiasm.
										</p>
									</div>

								</div>

								<div class="col-6 jarallax" data-jarallax-element="30">

									<div class="bg-white shadow-xs rounded-xl p-4 mb-4 mb-2-xs bg-success-soft-hover transition-bg-ease-150 text-decoration-none text-gray-800">
										<i class="fi fi-cog fs--45"></i>
										<h3 class="h5 py-3">Full Gulp</h3>
										<p>
											Answering those questions and more is a tall order, but one you should approach with enthusiasm.
										</p>
									</div>

								</div>

							</div>

						</div>

					</div>
					<!-- Cloud Hosting -->



					<!-- testimonials -->
					<div class="row mt-6">

						<div class="col-12 col-lg-6 my-5">

							<div class="h-100 bg-white shadow-md rounded">

								<!-- pic/avatar -->
								<span class="mt--n40 w--80 h--80 rounded-circle d-inline-block bg-light bg-cover lazy" data-background-image="demo.files/images/unsplash/team/thumb_330/joseph-gonzalez-iFgRcqHznqg-unsplash.jpg"></span>

								<div class=" px-4 pb-5 pt-4">
									<h3 class="h5 mb-4 font-weight-normal">
										<span class="d-block-xs">Joseph Campbell</span>
										<span class="rating-5 float-end m-0 float-none-xs text-warning fs--14 mt-1"></span>
									</h3>
									<p class="lead">
										Professionals, no doubt! Helped me to win a case in no time, I was hopeless beefore!
									</p>
								</div>

							</div>

						</div>

						<div class="col-12 col-lg-6 my-5">

							<div class="h-100 bg-white shadow-md rounded">

								<!-- pic/avatar -->
								<span class="mt--n40 w--80 h--80 rounded-circle d-inline-block bg-light bg-cover lazy" data-background-image="demo.files/images/unsplash/team/thumb_330/michael-dam-mEZ3PoFGs_k-unsplash.jpg"></span>

								<div class=" px-4 pb-5 pt-4">
									<h3 class="h5 mb-4 font-weight-normal">
										<span class="d-block-xs">Jessica Doe</span>
										<span class="rating-5 float-end m-0 float-none-xs text-warning fs--14 mt-1"></span>
									</h3>
									<p class="lead">
										Recommended by a friend! I never thought I win my case, was complicated! They are a miracle!
									</p>
								</div>

							</div>

						</div>

					</div>
					<!-- /testimonials -->

				</div>
			</section>
			<!-- /block : services -->


			<!-- block : img-stretch : start -->
			<section class="overflow-hidden bg-theme-color-light">
				<div class="container">
				
					<div class="row d-flex flex-wrap align-items-center">
					
						<div class="order-2 col-12 col-md-6 mb-5">

							<h2 class="display-5 font-weight-medium h2-md mb-5">
								Why <span class="text-primary">Smarty</span> exists and where is it going?
							</h2>

							<p class="mb-5">
								Answering those questions and more is a tall order, but one you should approach with enthusiasm. After all, this is the one place you can and should sing your own praises.
							</p>


							<!-- play -->
							<div class="clearfix d-flex align-items-center">

								<!-- play button : based on SOW : Ajax Modal -->
								<span class="d-inline-block rounded-circle border border-light bw--3 p-1 transition-hover-zoom transition-all-ease-150 shadow-primary-lg">
									<a aria-label="See our video" href="https://www.youtube.com/watch?v=iM_KMYulI_s" class="js-ajax-modal d-inline-flex bg-primary text-white rounded-circle w--60 h--60 align-items-center justify-content-center text-decoration-none" 
										data-ajax-modal-type="video" 
										data-ajax-modal-size="modal-xl" 
										data-ajax-modal-centered="true">
										<i class="fi fi-arrow-end-full fs--25 mt--3"></i>
									</a>
								</span> 

								<span class="d-inline-block px-3 text-primary">
									<b>SEE OUR STORY</b>
								</span>

							</div>
							<!-- /play -->

						</div>

						<div class="order-1 col-12 col-md-6 mb-5">

							<div class="stretch-start rounded-xl bg-light">

								<div class="swiper-container swiper-preloader swiper-warning swiper-btn-group swiper-btn-group-end text-white" 
									data-swiper='{
										"slidesPerView": 1,
										"spaceBetween": 0,
										"autoplay": { "delay" : 2500, "disableOnInteraction": false },
										"effect": "fade",
										"loop": true,
										"pagination": { "type": "progressbar" }
									}'>

									<div class="swiper-wrapper">

										<div class="swiper-slide overlay-dark overlay-opacity-5 bg-cover d-middle text-center justify-content-center" style="background:url('demo.files/images/unsplash/covers/cowomen-iA32StXHMzM-unsplash.jpg')">
											
											<!-- required empty image / background used -->
											<img class="w-100 py-5" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAKCAQAAADxnt1TAAAAEUlEQVR42mNkIBowjiodaKUACusAC4zze1kAAAAASUVORK5CYII=" alt="...">
										</div>

										<div class="swiper-slide overlay-dark overlay-opacity-3 bg-cover d-middle text-center justify-content-center" style="background:url('demo.files/images/unsplash/covers/austin-distel-wD1LRb9OeEo-unsplash.jpg')">

											<div class="position-absolute text-center z-index-3">

												<h2 data-swiper-parallax="-300">
													Smarty Team
												</h2>

												<p data-swiper-parallax="-100">
													Lorem ipsum dolor sit amet
												</p>

											</div>

											<!-- required empty image / background used -->
											<img class="w-100 py-5" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAKCAQAAADxnt1TAAAAEUlEQVR42mNkIBowjiodaKUACusAC4zze1kAAAAASUVORK5CYII=" alt="...">
										</div>

									</div>

									<!-- prev/next arrows -->
									<div class="swiper-button-next swiper-button-white"></div>
									<div class="swiper-button-prev swiper-button-white"></div>

									<!-- 
										Add Pagination :: Used as Progressbar
											if .position-relative class used,
											progressbar is on bottom!
									 -->
									<div class="swiper-pagination h--3 mt--1 position-relative"></div>

								</div>

							</div>		

						</div>

					</div>

				</div>
			</section>
			<!-- /block : img-stretch : start -->







			<!-- block : image -->
			<section class="pb-0">
				<div class="container">

					<div class="mb-7 text-center mx-auto max-w-800">
						<h2 class="h1 h2-xs font-weight-normal">
							Unlimited &amp; Modular
						</h2>
						<p>Smarty has powerful options &amp; tools, unlimited designs, responsive framework and amazing support. We are dedicated to providing you with the best experience possible. Read below to find out why the sky's the limit when using Smarty.</p>
					</div>


					<img class="img-fluid lazy" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNiA5IiAvPg==" data-src="demo.files/images/ps_ipad.png" alt="..." data-aos="fade-up" data-aos-delay="300" data-aos-offset="0">
				</div>
			</section>
			<!-- /block : image -->






			<!-- block : icons -->
			<section class="bg-warning-light">
				<div class="container">

					<div class="row">

						<div class="col-6 col-md-4 py-4 my-3 m-0-xs d-lg-flex" data-aos="fade-down" data-aos-delay="50" data-aos-offset="0">

							<div class="flex-none w--80">
								<i class="fi fi-lightbulb fs--45"></i>
							</div>

							<div class="flex-lg-fill">
								<h2 class="h5">New Ideas</h2>
								<p>
									Answering those questions and more is a tall order, but one you should approach with enthusiasm.
								</p>

								<a href="#!">Learn more</a>
							</div>

						</div>


						<div class="col-6 col-md-4 py-4 my-3 m-0-xs d-lg-flex" data-aos="fade-down" data-aos-delay="150" data-aos-offset="0">

							<div class="flex-none w--80">
								<i class="fi fi-graph fs--45"></i>
							</div>

							<div class="flex-lg-fill">
								<h2 class="h5">Organic Growth</h2>
								<p>
									Answering those questions and more is a tall order, but one you should approach with enthusiasm.
								</p>

								<a href="#!">Learn more</a>
							</div>

						</div>


						<div class="col-6 col-md-4 py-4 my-3 m-0-xs d-lg-flex" data-aos="fade-down" data-aos-delay="250" data-aos-offset="0">

							<div class="flex-none w--80">
								<i class="fi fi-brain fs--45"></i>
							</div>

							<div class="flex-lg-fill">
								<h2 class="h5">Brainstorming</h2>
								<p>
									Answering those questions and more is a tall order, but one you should approach with enthusiasm.
								</p>

								<a href="#!">Learn more</a>
							</div>

						</div>


						<div class="col-6 col-md-4 py-4 my-3 m-0-xs d-lg-flex" data-aos="fade-up" data-aos-delay="50" data-aos-offset="0">

							<div class="flex-none w--80">
								<i class="fi fi-truck-speed fs--45"></i>
							</div>

							<div class="flex-lg-fill">
								<h2 class="h5">Delivery Guaranteed</h2>
								<p>
									Answering those questions and more is a tall order, but one you should approach with enthusiasm.
								</p>

								<a href="#!">Learn more</a>
							</div>

						</div>


						<div class="col-6 col-md-4 py-4 my-3 m-0-xs d-lg-flex" data-aos="fade-up" data-aos-delay="150" data-aos-offset="0">

							<div class="flex-none w--80">
								<i class="fi fi-umbrella fs--45"></i>
							</div>

							<div class="flex-lg-fill">
								<h2 class="h5">You got covered</h2>
								<p>
									Answering those questions and more is a tall order, but one you should approach with enthusiasm.
								</p>

								<a href="#!">Learn more</a>
							</div>

						</div>


						<div class="col-6 col-md-4 py-4 my-3 m-0-xs d-lg-flex" data-aos="fade-up" data-aos-delay="250" data-aos-offset="0">

							<div class="flex-none w--80">
								<i class="fi fi-gps fs--45"></i>
							</div>

							<div class="flex-lg-fill">
								<h2 class="h5">To a new destination</h2>
								<p>
									Answering those questions and more is a tall order, but one you should approach with enthusiasm.
								</p>

								<a href="#!">Learn more</a>
							</div>

						</div>

					</div>

				</div>
			</section>
			<!-- /block : icons -->




			<!-- BRANDS -->
			<section class="p-0">
				<div class="container">

					<div class="row">

						<div class="col-4 col-md-2 py-5" data-aos="fade-in" data-aos-delay="150" data-aos-offset="0">
							<img width="200" height="71" class="img-fluid opacity-4 lazy" data-src="demo.files/svg/vendors/vendor_airbnb.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
						</div>

						<div class="col-4 col-md-2 py-5" data-aos="fade-in" data-aos-delay="200" data-aos-offset="0">
							<img width="200" height="71" class="img-fluid opacity-4 lazy" data-src="demo.files/svg/vendors/vendor_netflix.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
						</div>

						<div class="col-4 col-md-2 py-5" data-aos="fade-in" data-aos-delay="250" data-aos-offset="0">
							<img width="200" height="71" class="img-fluid opacity-4 lazy" data-src="demo.files/svg/vendors/vendor_coinbase.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
						</div>

						<div class="col-4 col-md-2 py-5" data-aos="fade-in" data-aos-delay="300" data-aos-offset="0">
							<img width="200" height="71" class="img-fluid opacity-4 lazy" data-src="demo.files/svg/vendors/vendor_instagram.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
						</div>

						<div class="col-4 col-md-2 py-5" data-aos="fade-in" data-aos-delay="350" data-aos-offset="0">
							<img width="200" height="71" class="img-fluid opacity-4 lazy" data-src="demo.files/svg/vendors/vendor_pinterest.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
						</div>

						<div class="col-4 col-md-2 py-5" data-aos="fade-in" data-aos-delay="400" data-aos-offset="0">
							<img width="200" height="71" class="img-fluid opacity-4 lazy" data-src="demo.files/svg/vendors/vendor_dribble.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
						</div>

					</div>

				</div>
			</section>
			<!-- /BRANDS -->







			<!-- PARALLAX -->
			<section class="position-relative jarallax overlay-dark overlay-opacity-7 text-white p-0 bg-cover" style="background-image:url('demo.files/images/unsplash/covers/perry-grone-lbLgFFlADrY-unsplash.jpg')">
				<div class="container pt--250 pb--250 text-center position-relative z-index-2">
					
					<img width="250" height="72" src="assets/images/logo/logo_light.svg" alt="...">

					<h3 class="font-weight-normal fs--16 mt-3 mb-5">
						FIGHTING TOGETHER <span class="text-warning">FOR THE BETTER</span>
					</h3>

					<a href="#!" class="btn btn-pill btn-light shadow-none transition-hover-top">
						<i class="fi fi-layers-middle"></i>
						Join Smarty Comunity
					</a>

				</div>

				<!-- lines, looks like through a glass -->
				<div class="absolute-full w-100 overflow-hidden opacity-5">
					<img class="img-fluid" width="2000" height="2000" src="assets/images/masks/shape-line-lense.svg" alt="...">
				</div>

			</section>
			<!-- /PARALLAX -->







			<!-- QUICK FAQ -->
			<section class="bg-gradient-linear-primary text-white">
				<div class="container">


					<div class="text-center mb-7">
						<span class="badge badge-secondary badge-soft bg-gray-600 text-white badge-pill font-weight-light pl-2 pr-2 pt--6 pb--6">
							HOW DO I START?
						</span>
						<h2 class="h1 mb-5 mt-2 font-weight-normal">Frequently Asked Questions</h2>
					</div>


					<div class="row">

						<div class="col-12 col-md-5 offset-md-1">

							<div class="d-flex mb-3">

								<!-- icon -->
								<div class="w--50 fi mdi-filter_1 fs--25 mt--n6 text-muted"></div>

								<div class="ml-4 mr-4">

									<h3 class="h5 text-white">
										Do I get free updates?
									</h3>

									<p class="mb-6 mb-md-8">
										Yes, all updates are free. Each new version is available for download from your account.
									</p>

								</div>

							</div>


							<div class="d-flex mb-3">

								<!-- icon -->
								<div class="w--50 fi mdi-filter_2 fs--25 mt--n6 text-muted"></div>

								<div class="ml-4 mr-4">

									<h3 class="h5 text-white">
										Is compatible with my framework?
									</h3>

									<p class="mb-6 mb-md-8">
										Yes, because this is a HTML/CSS/JS template, should be compatible with any framework.
									</p>

								</div>

							</div>

						</div>

						<div class="col-12 col-md-5">

							<div class="d-flex mb-3">

								<!-- icon -->
								<div class="w--50 fi mdi-filter_3 fs--25 mt--n6 text-muted"></div>

								<div class="ml-4 mr-4">

									<h3 class="h5 text-white">
										Who can use it?
									</h3>

									<p class="mb-6 mb-md-8">
										You can use it for your own project or for a project for your client. Also, money back is guaranteed!
									</p>

								</div>

							</div>

							<div class="d-flex mb-3">

								<!-- icon -->
								<div class="w--50 fi mdi-filter_4 fs--25 mt--n6 text-muted"></div>

								<div class="ml-4 mr-4">

									<h3 class="h5 text-white">
										Do I get free updates?
									</h3>

									<p class="mb-6 mb-md-8">
										Yes, all updates are free. Each new version is available for download from your account.
									</p>

								</div>

							</div>

						</div>

					</div>



					<div class="text-center mt-5">


						<a href="https://wrapbootstrap.com/theme/smarty-website-admin-rtl-WB02DSN1B" class="btn btn-light btn-pill shadow-none transition-hover-top d-block-xs">
							Get Smarty Now
						</a>

					</div>

				</div>
			</section>
			<!-- /QUICK FAQ -->







			<!-- INFO BOX -->
			<section class="p-0 bg-warning">
				<div class="container py-3">

					<div class="row">

						<div class="col-6 col-lg-3 p--15 d-flex d-block-xs text-center-xs" data-aos="fade-in" data-aos-delay="0" data-aos-offset="0">

							<div class="pl--10 pr--20 fs--50 line-height-1 pt--6">
								<img width="60" height="60" class="lazy" data-src="demo.files/svg/various/trendy.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
							</div>

							<div class="my-2">
								
								<h2 class="font-weight-medium fs--20 mb-0">
									Trendy &amp; Modern
								</h2>

								<p class="m-0">
									Love it! Use it! Reuse it!
								</p>

							</div>

						</div>

						<div class="col-6 col-lg-3 p--15 d-flex d-block-xs text-center-xs border-dashed border-light bw--1 bt-0 br-0 bb-0 b-0-lg" data-aos="fade-in" data-aos-delay="150" data-aos-offset="0">

							<div class="pl--10 pr--20 fs--50 line-height-1 pt--6">
								<img width="60" height="60" class="lazy" data-src="demo.files/svg/various/hot_deal.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
							</div>

							<div class="my-2">
								
								<h2 class="font-weight-medium fs--20 mb-0">
									Free Updates
								</h2>

								<p class="m-0">
									Lifetime <b>free</b> updates!
								</p>

							</div>

						</div>

						<div class="col-6 col-lg-3 p--15 d-flex d-block-xs text-center-xs border-dashed border-light bw--1 bl-0 br-0 bb-0 b-0-lg" data-aos="fade-in" data-aos-delay="250" data-aos-offset="0">

							<div class="pl--10 pr--20 fs--50 line-height-1 pt--6">
								<img width="60" height="60" class="lazy" data-src="demo.files/svg/various/new.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
							</div>

							<div class="my-2">
								
								<h2 class="font-weight-medium fs--20 mb-0">
									Frontend &amp; Admin
								</h2>

								<p class="m-0">
									Sharing the same core!
								</p>

							</div>

						</div>

						<div class="col-6 col-lg-3 p--15 d-flex d-block-xs text-center-xs border-dashed border-light bw--1 bb-0 br-0 b--0-lg" data-aos="fade-in" data-aos-delay="350" data-aos-offset="0">

							<!-- link example -->
							<a href="#!" class="text-dark text-decoration-none d-flex d-block-xs text-center-xs">

								<div class="pl--10 pr--20 fs--50 line-height-1 pt--6">
									<img width="60" height="60" class="lazy" data-src="demo.files/svg/various/ok_like.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
								</div>

								<div class="my-2">
									
									<h2 class="font-weight-medium fs--20 mb-0">
										You're Covered
									</h2>
									
									<p class="m-0">
										Frontend + Admin
									</p>

								</div>

							</a>

						</div>

					</div>

				</div>
			</section>
			<!-- /INFO BOX -->









			<!-- Footer -->
			<footer id="footer" class="footer-dark">
				<div class="container">

					<div class="row">
						
						<div class="bg-distinct col-12 col-md-6 col-lg-4 text-center p-0 py-5">

							<div class="footer-svg-shape position-absolute absolute-top z-index-2 mt--n70 w-100 overflow-hidden pt--5">
								<svg viewBox="0 0 1440 28" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
									<path d="M0 28H1440C1440 28 1154 3.21961e-10 720 1.30487e-09C286 2.28777e-09 0 28 0 28Z"></path>
								</svg>
							</div>

							<form method="post" action="#subscribe_url" class="px-4"> 

								<input type="hidden" name="action" value="subscribe" tabindex="-1"> 
								
								<p id="btnAriaFooterFormTitle" class="text-muted">
									Claim your candy now!
								</p>
								
									
								<div class="input-group-over input-group-pill mb-4"> 
									
									<input required class="form-control b-0" name="subscriber_email" type="email" value="" placeholder="email address..." aria-label="email address...">
									
									<button type="submit" class="btn bg-transparent shadow-none" aria-label="subscribe" aria-labelledby="btnAriaFooterFormTitle"> 
										<i class="fi fi-send fs--18"></i> 
									</button>

								</div>


							</form>

							<div class="mt--12"> 

								<a href="#!" class="btn btn-sm btn-facebook transition-hover-top mb-2 rounded-circle" rel="noopener" aria-label="facebook page">
									<i class="fi fi-social-facebook"></i> 
								</a>

								<a href="#!" class="btn btn-sm btn-twitter transition-hover-top mb-2 rounded-circle" rel="noopener" aria-label="twitter page">
									<i class="fi fi-social-twitter"></i> 
								</a>

								<a href="#!" class="btn btn-sm btn-linkedin transition-hover-top mb-2 rounded-circle" rel="noopener" aria-label="linkedin page">
									<i class="fi fi-social-linkedin"></i> 
								</a>

								<a href="#!" class="btn btn-sm btn-youtube transition-hover-top mb-2 rounded-circle" rel="noopener" aria-label="youtube page">
									<i class="fi fi-social-youtube"></i> 
								</a>

							</div>

						</div>


						<div class="col-12 col-md-6 col-lg-8 py-5 fs--15 text-center-xs">

							<h3 class="fs--15 text-muted">SPY US! WE'VE GOT SECRETS!</h3>

							<ul class="mt--30 mb-0 breadcrumb bg-transparent p-0 block-xs"> 
								<li class="breadcrumb-item"><a href="contact-1.html">Contact</a></li> 
								<li class="breadcrumb-item"><a href="about-us-1.html">About Us</a></li> 
								<li class="breadcrumb-item"><a href="page-terms-and-conditions.html">Terms &amp; Conditions</a></li> 
								<li class="breadcrumb-item"><a href="page-cookie.html">GDPR &amp; Cookies</a></li> 
							</ul>

							<div class="text-muted mt--30">
								<p>
									Frontend? Admin? What if you don't need anymore to learn and work with two different templates on your projects? 
									<b>What would you do if time really matter?</b> Both: frontend and admin uses exactly the same core and all elements can be used in both sides because... actually there are no such thing "two sides" with Smarty!
								</p>
							</div>

						</div>

					</div>

				</div>

				<div class="bg-distinct py-3 clearfix">

					<div class="container clearfix font-weight-light text-center-xs">

						<div class="fs--14 py-2 float-start float-none-xs m-0-xs">
							&copy; My Company Inc.
						</div>

						<ul class="list-inline mb-0 mt-2 float-end float-none-xs m-0-xs"> 
							<li class="list-inline-item m-0"> 
								<img width="38" height="24" class="lazy" data-src="assets/images/credit_card/visa.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="visa credit card icon">
							</li> 

							<li class="list-inline-item m-0"> 
								<img width="38" height="24" class="lazy" data-src="assets/images/credit_card/mastercard.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="mastercard credit card icon">
							</li> 

							<li class="list-inline-item m-0"> 
								<img width="38" height="24" class="lazy" data-src="assets/images/credit_card/discover.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="discover credit card icon">
							</li>

							<li class="list-inline-item m-0"> 
								<img width="38" height="24" class="lazy" data-src="assets/images/credit_card/amazon.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="amazon credit card icon">
							</li>
							
							<li class="list-inline-item m-0"> 
								<img width="38" height="24" class="lazy" data-src="assets/images/credit_card/paypal.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="paypal credit card icon">
							</li>

							<li class="list-inline-item m-0"> 
								<img width="38" height="24" class="lazy" data-src="assets/images/credit_card/skrill.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="skrill credit card icon">
							</li>

							<!-- more vendors on assets/images/credit_card/ -->

						</ul>

					</div>
				</div>

			</footer>
			<!-- /Footer -->


		</div><!-- /#wrapper -->


		<script src="assets/js/core.min.js"></script>

	</body>
</html>