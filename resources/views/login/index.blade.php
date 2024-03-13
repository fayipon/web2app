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

	</head>
	<body>

		<div id="wrapper">


			<!-- light logo -->
			<a aria-label="go back" href="index.html" class="position-absolute top-0 start-0 my-2 mx-4 z-index-3 h--70 d-inline-flex align-items-center">
				<img src="admin/assets/images/logo/logo_light.svg" width="110" alt="...">
			</a>


			<div class="d-lg-flex text-white min-h-100vh bg-gradient-default">

				<div class="col-12 col-lg-5 d-lg-flex">
					<div class="w-100 align-self-center">


						<div class="py-7">
							<h1 class="d-inline-block text-align-end text-center-md text-center-xs display-4 h2-xs w-100 max-w-600 w-100-md w-100-xs">
								Sign in
								<span class="display-3 h1-xs d-block font-weight-medium">
									Smarty
								</span>
							</h1>
						</div>


					</div>
				</div>


				<div class="col-12 col-lg-7 d-lg-flex">
					<div class="w-100 align-self-center text-center-md text-center-xs py-2">


						<!-- optional class: .form-control-pill -->
						<form novalidate action="#" method="POST" class="bs-validate p-5 py-6 rounded d-inline-block bg-white text-dark w-100 max-w-600">

							<!--
							<p class="text-danger">
								Ups! Please check again
							</p>
							-->

							<div class="form-label-group mb-3">
								<input required placeholder="Email" id="account_email" name="account_email" type="email" class="form-control">
								<label for="account_email">Email</label>
							</div>

							<div class="input-group-over">
								<div class="form-label-group mb-3">
									<input required placeholder="Password" id="account_password" name="account_password" type="password" class="form-control">
									<label for="account_password">Password</label>
								</div>

								<a href="account-signin-password.html" class="btn fs--12">
									FORGOT?
								</a>

							</div>



							<div class="row">

								<div class="col-12 col-md-6 mt-4">
									<button type="submit" class="btn btn-primary btn-block transition-hover-top">
										Sign In
									</button>
								</div>

								<div class="col-12 col-md-6 mt-4 text-align-end text-center-xs">
									<a href="account-signup.html" class="btn px-0">
										Don't have an account yet?
									</a>
								</div>

							</div>

						</form>


						<!-- cookie alert -->
						<div class="alert bg-white text-dark p-3 my-2 b-0 rounded d-inline-block w-100 max-w-600">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span class="fi fi-close" aria-hidden="true"></span>
							</button>
							Smarty uses cookies for best experience! <a href="#!" class="link-muted">Learn more</a>
						</div>

					</div>
				</div>



			</div>



		</div><!-- /#wrapper -->

		<script src="admin/assets/js/core.min.js"></script>
		<script src="admin/assets/js/vendor_bundle.min.js"></script>

	</body>
</html>