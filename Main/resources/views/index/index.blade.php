@extends('layout.app')

@section('content')


<!-- main -->
<main id="middle" class="flex-fill mx-auto">


  <!-- PAGE TITLE -->
  <header>
	<h1 class="h4">Good morning, John! {{ $controller }}</h1>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb small">
		<li class="breadcrumb-item text-muted active" aria-current="page">You've got 2 new sales today</li>
	  </ol>
	</nav>
  </header>
	

  <!-- widgets -->
  <div class="row g-3 mb-3">
	
	<div class="col-12 col-md-6 col-xl-3">

	  <!-- small graph widget -->
	  <div class="bg-white shadow-md text-dark p-5 rounded text-center">

		<!-- icon -->
		<span class="d-inline-flex align-items-center justify-content-center bg-light text-gray-900 rounded-circle" style="width: 100px;height:100px">
		  <svg width="54px" height="54px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			  <polygon points="0 0 24 0 24 24 0 24"></polygon>
			  <path fill="currentColor" opacity="0.3" fill-rule="nonzero" d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"></path>
			  <path fill="currentColor" fill-rule="nonzero" d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"></path>
			</g>
		  </svg>
		</span>

		<h3 class="fs-5 mt-4">New Customers</h3>
		<p>Last 30 days</p>

		<!-- chart -->
		<div class="position-relative" style="height:100px">
		  <canvas class="chartjs" 
			data-chartjs-dots="false" 
			data-chartjs-legend="false" 
			data-chartjs-grid="false" 
			data-chartjs-tooltip="true" 

			data-chartjs-line-width="3" 
			data-chartjs-type="line" 

			data-chartjs-labels='["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]' 
			  data-chartjs-datasets='[{                                                           
				  "label": "Customers",
				  "data": [11, 11, 17, 11, 15, 12, 13, 12, 11, 12, 7, 8],
				  "fill": false,
				  "backgroundColor": "rgba(255, 159, 64, 1)"
			  }]'></canvas>
		</div>

	  </div>
	  <!-- /small graph widget -->

	</div>

	<div class="col-12 col-md-6 col-xl-3">

	  <!-- small graph widget -->
	  <div class="bg-white shadow-md text-dark p-5 rounded text-center">

		<!-- icon -->
		<span class="d-inline-flex align-items-center justify-content-center bg-light text-gray-900 rounded-circle" style="width: 100px;height:100px">
		  <svg width="54px" height="54px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			  <rect x="0" y="0" width="24" height="24"></rect>
			  <path fill="currentColor" opacity="0.3" fill-rule="nonzero" d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"></path>
			  <path fill="currentColor" d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z"></path>
			</g>
		  </svg>
		</span>

		<h3 class="fs-5 mt-4">Monthly Orders</h3>
		<p>Last 30 days</p>

		<!-- chart -->
		<div class="position-relative" style="height:100px">
		  <canvas class="chartjs" 
			data-chartjs-dots="false" 
			data-chartjs-legend="false" 
			data-chartjs-grid="false" 
			data-chartjs-tooltip="true" 

			data-chartjs-line-width="3" 
			data-chartjs-type="line" 

			data-chartjs-labels='["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]' 
			data-chartjs-datasets='[{                                                           
				"label": "Orders",
				"data": [11, 11, 17, 11, 15, 12, 13, 16, 11, 18, 20, 21],
				"fill": false,
				"backgroundColor": "rgba(54, 162, 235, 1)"
			}]'></canvas>
		</div>

	  </div>
	  <!-- /small graph widget -->
	  
	</div>


  </div>
  <!-- /widgets -->


</main>
<!-- /main -->

@endsection