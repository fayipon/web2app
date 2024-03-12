<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="UTF-8">
    <title>Smarty v5</title>
    <meta name="description" content="...">

    <meta name="viewport" content="width=device-width, maximum-scale=5, initial-scale=1">

    <!-- up to 10% speed up for external res -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <!-- preloading icon font is helping to speed up a little bit -->
    <link rel="preload" href="{{ asset('assets/fonts/flaticon/Flaticon.woff2') }}" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" href="{{ asset('assets/css/core.min.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor_bundle.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap">

    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    @stack('styles')
  </head>


  <!--

    Layout Admin
      .layout-admin   (required)

      .aside-sticky           - sidebar : fixed and push header
      .header-sticky          - header : always visible on top (acting as old .header-focus)

    ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++

    SCROLL TO TOP BUTTON [optional styling]

      data-s2t-disable="true"
      data-s2t-position="start|end"
      data-s2t-class="btn-secondary btn-sm"   (default)
      data-s2t-class="btn-secondary rounded-circle"
      data-s2t-class="btn-warning rounded-circle"

    ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++ ++

  -->
  <body class="layout-admin aside-sticky header-sticky" data-s2t-class="btn-primary btn-sm bg-gradient-default rounded-circle border-0">

    <div id="wrapper" class="d-flex align-items-stretch flex-column">


      <!--  header -->
      <header id="header" class="d-flex align-items-center shadow-xs header-match-aside-primary">

        <!-- Navbar -->
        <div class="container-fluid position-relative">

          <nav class="navbar navbar-expand-lg navbar-dark justify-content-between">

            <!-- logo, navigation toggler -->
            <div class="align-items-start">
              
              <!-- sidebar toggler -->
              <a href="#aside-main" class="btn-sidebar-toggle h-100 d-inline-block d-lg-none justify-content-center align-items-center p-2">
                <span>
                  <svg width="25" height="25" viewBox="0 0 20 20">
                    <path d="M 19.9876 1.998 L -0.0108 1.998 L -0.0108 -0.0019 L 19.9876 -0.0019 L 19.9876 1.998 Z"></path>
                    <path d="M 19.9876 7.9979 L -0.0108 7.9979 L -0.0108 5.9979 L 19.9876 5.9979 L 19.9876 7.9979 Z"></path>
                    <path d="M 19.9876 13.9977 L -0.0108 13.9977 L -0.0108 11.9978 L 19.9876 11.9978 L 19.9876 13.9977 Z"></path>
                    <path d="M 19.9876 19.9976 L -0.0108 19.9976 L -0.0108 17.9976 L 19.9876 17.9976 L 19.9876 19.9976 Z"></path>
                  </svg>
                </span>
              </a>

              <!-- logo : mobile only -->
              <a class="navbar-brand d-inline-block d-lg-none mx-2" href="/">
                <img src="{{ asset('assets/images/logo/logo_sm.svg') }}" width="38" height="38" alt="...">
              </a>

            </div>

            <!-- navbar : navigation -->
            <div class="collapse navbar-collapse" id="navbarMainNav">

              <!-- navbar : mobile menu -->
              <div class="navbar-xs d-none">

                <!-- close button -->
                <button class="navbar-toggler pt-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
                  <svg width="20" viewBox="0 0 20 20">
                    <path d="M 20.7895 0.977 L 19.3752 -0.4364 L 10.081 8.8522 L 0.7869 -0.4364 L -0.6274 0.977 L 8.6668 10.2656 L -0.6274 19.5542 L 0.7869 20.9676 L 10.081 11.679 L 19.3752 20.9676 L 20.7895 19.5542 L 11.4953 10.2656 L 20.7895 0.977 Z"></path>
                  </svg>
                </button>

                <!-- logo -->
                <a class="navbar-brand" href="/">
                  <img src="{{ asset('assets/images/logo/logo_dark.svg') }}" width="110" height="38" alt="...">
                </a>

              </div>
              <!-- /navbar : mobile menu -->


            </div>
            <!-- /navbar : navigation -->

            <!-- options -->
            <ul class="list-inline list-unstyled mb-0 d-flex align-items-end">

              <!-- account -->
              <li class="list-inline-item mx-1 dropdown">

                <!-- has avatar -->
                <a href="#" id="dropdownAccountOptions" class="btn btn-sm btn-icon bg-gray-700 text-white rounded-circle dropdown-toggle shadow bg-cover" style="background-image:url({{ asset('html_frontend/demo.files/images/unsplash/team/thumb_330/joseph-gonzalez-iFgRcqHznqg-unsplash.jpg') }})" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" aria-haspopup="true" aria-label="Account options"></a>

                <!-- no avatar -->
                <!--
                <a href="#" id="dropdownAccountOptions" class="btn btn-sm btn-icon btn-light dropdown-toggle rounded-circle" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                  <span class="small fw-bold">JD</span>
                </a>
                -->

                <div aria-labelledby="dropdownAccountOptions" class="dropdown-menu dropdown-menu-clean dropdown-menu-navbar-autopos dropdown-menu-invert dropdown-fadeindown p-0 mt-2 w-300">
                  
                  <!-- user detail -->
                  <div class="dropdown-header bg-primary bg-gradient rounded rounded-bottom-0 text-white small p-4">
                    <span class="d-block fw-medium text-truncate">{{ session('admin.account') }}</span>
                    <span class="d-block smaller fw-medium text-truncate">john.doe@gmail.com</span>
                    <span class="d-block smaller"><b>最後登入:</b> {{ session('admin.last_login') }}</span>
                  </div>

                  <div class="dropdown-divider mb-3"></div>

                  <a href="#" class="dropdown-item text-truncate">
                    <span class="fw-medium">My profile</span>
                    <small class="d-block text-muted smaller">account settings and more</small>
                  </a>

                  <a href="#" class="dropdown-item text-truncate">
                    <small class="badge bg-success-soft float-end">1 new</small>
                    <span class="fw-medium">My Messages</span>
                    <small class="d-block text-muted smaller">inbox, projects, tasts</small>
                  </a>

                  <a href="#" class="dropdown-item text-truncate">
                    <small class="badge bg-danger-soft float-end">1 unpaid</small>
                    <span class="fw-medium">My billing</span>
                    <small class="d-block text-muted smaller">your monthly billing</small>
                  </a>

                  <a href="#" class="dropdown-item text-truncate">
                    <span class="fw-medium">Account Settings</span>
                    <small class="d-block text-muted smaller">profile, password and more...</small>
                  </a>

                  <a href="#" class="dropdown-item text-truncate">
                    <span class="fw-medium">Upgrade</span>
                    <small class="d-block text-muted smaller">upgrade your account</small>
                  </a>

                  <div class="dropdown-divider mb-0 mt-3"></div>

                  <a href="/logout" class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore fw-medium py-3 px-4">
                    <i class="fi fi-power float-start"></i>
                    登出
                  </a>
                </div>

              </li>

              <!-- navigation toggler (mobile) -->
              <li class="list-inline-item d-inline-block d-lg-none">
                <button class="btn p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fi fi-bars m-0"></i>
                </button>
              </li>

            </ul>
            <!-- /options -->

          </nav>

        </div>
        <!-- /Navbar -->

      </header>
      <!-- /Header -->


      <!-- content -->
    <div id="wrapper_content" class="d-flex flex-fill">


    <!-- menu -->
    @extends('layout.menu')

        @yield('content')

    </div>
      <!-- /content -->


      <!-- footer -->
      <footer id="footer" class="bg-white shadow">
        <div class="p-3">

          <span class="small fw-medium">&copy; FT Gaming Inc</span>

          <div class="d-inline-block float-end dropdown">
            <ul class="list-inline m-0">

              <!-- LANGUAGE -->
              <li class="dropdown list-inline-item m-0">

                <a id="topDDLanguage" href="#" class="d-inline-block" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                  <i class="flag flag-us"></i> 
                  <span class="small px-2">English</span>
                </a>

                <div aria-labelledby="topDDLanguage" class="dropdown-menu dropdown-menu-clean shadow-lg small m-0 max-vh-50 scrollable-vertical dropdown-menu-right">
                  <a href="#" class="dropdown-item text-primary-hover active">
                    <i class="flag flag-us"></i> 
                    English
                  </a>
                  <a href="#" class="dropdown-item text-primary-hover">
                    <i class="flag flag-de"></i> 
                    German
                  </a>
                  <a href="#" class="dropdown-item text-primary-hover">
                    <i class="flag flag-fr"></i> 
                    Francaise
                  </a>
                </div>

              </li>
              <!-- /LANGUAGE -->

            </ul>
          </div>

        </div>
      </footer>
      <!-- /footer -->


    </div><!-- /#wrapper -->

<!-- on page load, via html code -->

    <!-- Core javascripts -->
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor_bundle.min.js') }}"></script>

    <!-- Your custom javascripts -->
@stack('main_js')
    <script>
      // toast
			var error_message = "{{ Session::get('error') }}";
			if (error_message != "") {
        $.SOW.core.toast.show('danger', '', error_message, 'top-end', 0, true);
			}
			
			var success_message = "{{ Session::get('success') }}";
			if (success_message != "") {
        $.SOW.core.toast.show('success', '', success_message, 'top-end', 0, true);
			}

    </script>

  </body>
</html>