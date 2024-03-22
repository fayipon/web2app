<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8">
		<title>Smarty Web2App</title>
		<meta name="description" content="...">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, maximum-scale=5, initial-scale=1, user-scalable=0">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

        <!-- up to 10% speed up for external res -->
        <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <!-- preloading icon font is helping to speed up a little bit -->
        <link rel="preload" href="admin/assets/fonts/flaticon/Flaticon.woff2" as="font" type="font/woff2" crossorigin>

        <!-- non block rendering : page speed : js = polyfill for old browsers missing `preload` -->
        <link rel="stylesheet" href="admin/assets/css/core.min.css">
        <link rel="stylesheet" href="admin/assets/css/vendor_bundle.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">

		<!-- favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="apple-touch-icon" href="demo.files/logo/icon_512x512.png">

		<link rel="manifest" href="admin/assets/images/manifest/manifest.json">
		<meta name="theme-color" content="#377dff">
		<style>
			.message {
				position: fixed;
				top: 10px;
				left: 50%;
				transform: translateX(-50%);
				padding: 10px;
				border-radius: 5px;
				z-index: 9999;
			}

			.success {
				background-color: #4CAF50;
				color: white;
			}

			.error {
				background-color: #f44336;
				color: white;
			}
		</style>
	</head>


	<!--

		Layout Admin
			.layout-admin 	(required)

			.aside-sticky  					- sidebar : fixed and push header
			.header-sticky  				- header : always visible on top (acting as old .header-focus)


		****************************************************************************************************

			NOTES

				1. 	LOGO TO REPLACE
						- logo_light.svg 	: sidebar
						- logo_dark.svg 	: header navbar

		****************************************************************************************************


		++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++

		SCROLL TO TOP BUTTON [optional styling]

			data-s2t-disable="true"
			data-s2t-position="start|end"
			data-s2t-class="btn-secondary btn-sm" 	(default)
			data-s2t-class="btn-secondary rounded-circle"
			data-s2t-class="btn-warning rounded-circle"

		++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++

	-->
	<body class="layout-admin aside-sticky header-sticky" data-s2t-class="btn-primary btn-sm bg-gradient-default rounded-circle b-0">

		<div id="wrapper" class="d-flex align-items-stretch flex-column">



			<!-- 
				HEADER 
				
				.header-match-aside-primary
			-->
			<header id="header" class="shadow-xs">


				<!-- NAVBAR -->
				<div class="container-fluid position-relative">

					<nav class="navbar navbar-expand-lg navbar-light justify-content-lg-between justify-content-md-inherit">

						<div class="align-items-start">
							
							<!-- 
								sidebar toggler 
							-->
							<a href="#aside-main" class="btn-sidebar-toggle h-100 d-inline-block d-lg-none justify-content-center align-items-center p-2">
								<span class="group-icon">
									<i>
										<svg width="25" viewBox="0 0 20 20">
											<path d="M 19.9876 1.998 L -0.0108 1.998 L -0.0108 -0.0019 L 19.9876 -0.0019 L 19.9876 1.998 Z"></path>
											<path d="M 19.9876 7.9979 L -0.0108 7.9979 L -0.0108 5.9979 L 19.9876 5.9979 L 19.9876 7.9979 Z"></path>
											<path d="M 19.9876 13.9977 L -0.0108 13.9977 L -0.0108 11.9978 L 19.9876 11.9978 L 19.9876 13.9977 Z"></path>
											<path d="M 19.9876 19.9976 L -0.0108 19.9976 L -0.0108 17.9976 L 19.9876 17.9976 L 19.9876 19.9976 Z"></path>
										</svg>
									</i>

									<i>
										<svg width="25" viewBox="0 0 47.971 47.971">
											<path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/>
										</svg>
									</i>
								</span>
							</a>


							<!-- 
								Logo : height: 60px max
								visibility : mobile only
							-->
							<a class="navbar-brand d-inline-block d-lg-none" href="/dashboard">
								<img src="admin/assets/images/logo/logo_dark.svg" width="110" height="70" alt="...">
							</a>


						</div>




						<!-- NAVIGATION -->
						<div class="collapse navbar-collapse" id="navbarMainNav">



							<!-- MOBILE MENU NAVBAR -->
							<div class="navbar-xs d-none">

								<!-- mobile menu button : close -->
								<button class="navbar-toggler pt-0" type="button" data-toggle="collapse" data-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
									<svg width="20" viewBox="0 0 20 20">
										<path d="M 20.7895 0.977 L 19.3752 -0.4364 L 10.081 8.8522 L 0.7869 -0.4364 L -0.6274 0.977 L 8.6668 10.2656 L -0.6274 19.5542 L 0.7869 20.9676 L 10.081 11.679 L 19.3752 20.9676 L 20.7895 19.5542 L 11.4953 10.2656 L 20.7895 0.977 Z"></path>
									</svg>
								</button>

								<!-- 
									Optional Mobile Menu Logo 
									Logo : height: 70px max
								-->
								<a class="navbar-brand" href="/dashboard">
									<img src="admin/assets/images/logo/logo_dark.svg" width="110" height="70" alt="...">
								</a>

							</div>
							<!-- /MOBILE MENU NAVBAR -->



							<!-- Dropdowns -->
							<ul class="navbar-nav align-items-center">

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

							</ul>
							<!-- /Dropdowns -->

						</div>
						<!-- /NAVIGATION -->




						<!-- OPTIONS -->
						<ul class="list-inline list-unstyled mb-0 d-flex align-items-end">

							<!-- account -->
							<li class="list-inline-item ml--6 mr--6 dropdown">

								<a href="#" id="dropdownAccountOptions" class="btn btn-sm btn-light dropdown-toggle btn-pill pl--12 pr--12" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
									
									<span class="group-icon m-0">
										<!-- <i class="fi fi-user-female"></i> -->
										<i class="fi w--15 fi-user-male"></i>
										<i class="fi w--15 fi-close"></i>
									</span>

									<span class="fs--14 d-none d-sm-inline-block font-weight-medium">{{ $session['user']['ACCOUNT'] ?? '' }}</span>
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
								<div aria-labelledby="dropdownAccountOptions" class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-clean dropdown-menu-navbar-autopos dropdown-menu-invert dropdown-click-ignore p-0 mt--18 fs--15 w--300">
									
									<div class="dropdown-header fs--14 py-4">

										<!-- profile image -->
										<div class="w--60 h--60 rounded-circle bg-light bg-cover float-start" style="background-image:url('../../html_frontend/demo.files/images/icons/user80.png')"></div>
										
										<!-- initials - no image -->
										<!--
										<div data-initials="John Doe" data-assign-color="true" class="sow-util-initials bg-light rounded h5 w--60 h--60 d-inline-flex justify-content-center align-items-center rounded-circle float-start">
											<i class="fi fi-circle-spin fi-spin"></i>
										</div>
										-->

										<!-- user detail -->
										<span class="d-block font-weight-medium text-truncate fs--16">John Doe</span>
										<span class="d-block text-muted font-weight-medium text-truncate">john.doe@gmail.com</span>
										<small class="d-block text-muted"><b>Last Login:</b> 2019-09-03 01:48</small>

									</div>

									<div class="dropdown-divider"></div>

									<a href="#!" target="_blank" class="dropdown-item text-truncate font-weight-medium">
										Notes
										<small class="d-block text-muted">personal encypted notes</small>
									</a>

									<a href="#!" target="_blank" class="dropdown-item text-truncate font-weight-medium">
										<span class="badge badge-success float-end font-weight-normal mt-1">3 new</span>
										Messages
										<small class="d-block text-muted">internal messaging system</small>
									</a>

									<a href="#!" target="_blank" class="dropdown-item text-truncate font-weight-medium">
										<span class="badge badge-danger float-end font-weight-normal mt-1">1 unpaid</span>
										Invoices
										<small class="d-block text-muted">montly billing</small>
									</a>

									<a href="#!" class="dropdown-item text-truncate font-weight-medium">
										Account Settings
										<small class="d-block text-muted">profile, password and more...</small>
									</a>

									<a href="#!" class="dropdown-item text-truncate font-weight-medium">
										Upgrade
										<small class="d-block text-muted">upgrade your account</small>
									</a>

									<div class="dropdown-divider mb-0"></div>

									<a href="#!" class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore font-weight-medium pt-3 pb-3">
										<i class="fi fi-power float-start"></i>
										Log Out
									</a>
								</div>

							</li>

						</ul>
						<!-- /OPTIONS -->


					</nav>


					<!-- TOP NAVIGATION TOGGLER -->
					<button class="navbar-toggler shadow-xs h-auto w-auto m-0 btn btn-sm bg-white rounded-circle position-absolute end-0 mt-4 mb-1 ml--20 mr--20 z-index-2 d-none d-inline-block d-lg-none" type="button" data-toggle="collapse" data-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fi fi-bars"></i>
					</button>
					<!-- /TOP NAVIGATION TOGGLER -->

				</div>
				<!-- /NAVBAR -->

			</header>
			<!-- /HEADER -->





			<div id="wrapper_content" class="d-flex flex-fill">

@extends('layout.menu')

				<!-- MIDDLE -->

@yield('content')
				<!-- /MIDDLE -->

			</div>


		</div><!-- /#wrapper -->

		<script src="admin/assets/js/core.min.js"></script>
		<script src="admin/assets/js/custom.js"></script>

		<div id="page_js_files"><!-- specific page javascript files here --></div>

	@if (session('success'))
		<div id="successMessage" class="message success">{{ session('success') }}</div>
	@endif

	@if (session('error'))
		<div id="errorMessage" class="message error">{{ session('error') }}</div>
	@endif
	
	</body>
</html>