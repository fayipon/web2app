@extends('layout.main')

@section('content')

				<!-- MIDDLE -->
				<div id="middle" class="flex-fill">


					<!-- Primary -->
					<section class="rounded mb-3">


						<!-- graph header -->
						<div class="clearfix fs--18 pt-2 pb-3 mb-3 border-bottom">

							<!-- save image -->
							<a href="#" data-chartjs-id="visitsvsorders" data-file-name="visitsvsorders" class="btn btn-sm btn-light rounded-circle chartjs-save float-end m-0" title="Save Chart" aria-label="Save Chart">
								<i class="fi fi-arrow-download m-0"></i>
							</a>
							<!-- /save image -->

							Visits &amp; Orders
							<small class="fs--11 text-muted d-block mt-1">MONTHLY REVENUE OF 2019</small>

						</div>
						<!-- /graph header -->



						<div class="row gutters-sm">

							<!-- MAIN GRAPH -->
							<div class="col-12 col-lg-7 col-xl-9 mb-5">

								<div class="position-relative min-h-250 max-h-500 max-h-300-xs h-100">
									<canvas id="visitsvsorders" class="mb-5 chartjs" 
										data-chartjs-dots="false" 
										data-chartjs-legend="top" 
										data-chartjs-grid="true" 
										data-chartjs-tooltip="true" 

										data-chartjs-title="Visits &amp; Orders" 
										data-chartjs-xaxes-label="" 
										data-chartjs-yaxes-label="" 
										data-chartjs-line-width="5" 

										data-chartjs-type="line" 
										data-chartjs-labels='["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]' 
										data-chartjs-datasets='[{															
									        "label": 				"Visits",
									        "data": 				[20, 22, 24, 21, 23, 26, 24, 23, 21, 24, 23, 22],
									        "fill": 				true,
									        "backgroundColor": 			"rgba(255, 206, 86, 0.2)"
										},{
									        "label": 				"Orders",
									        "data": 				[14, 16, 16, 14, 13, 12, 14, 14, 13, 14, 12, 10],
									        "fill": 				true,
									        "backgroundColor": 		"rgba(255, 206, 86, 0.4)"
										}]'></canvas>

								</div>

							</div>
							<!-- /MAIN GRAPH -->

							<div class="col-12 col-lg-5 col-xl-3 mb-5">

								<!-- card -->
								<div class="bg-white shadow-lg p-4 rounded my-3 transition-hover-top transition-all-ease-150">

									<!-- dropdown options -->
									<div class="float-end dropdown">

										<!-- dropdown -->
										<button type="button" class="dropdown-toggle btn btn-sm btn-soft btn-primary px-2 py-1 fs--15 mt--n3" aria-label="Dropdown Options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fi fi-dots-vertical m-0"></i>
										</button>

										<div class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-invert mt-2">

											<a href="#!" class="dropdown-item">
												Export PDF
											</a>

											<a href="#!" class="dropdown-item">
												Export Tasks
											</a>

											<a href="#!" class="dropdown-item">
												Print
											</a>

										</div>
										<!-- /dropdown -->

									</div>
									<!-- /dropdown options -->


									<div class="mb-3">
										<a href="#!" class="w--40 h--40 rounded-circle d-inline-block bg-light bg-cover lazy" data-background-image="../../html_frontend/demo.files/images/unsplash/team/thumb_330/erik-mclean-06vpBIHmiYc-unsplash.jpg"></a>
										<a href="#!" class="w--40 h--40 rounded-circle d-inline-block bg-light bg-cover lazy" data-background-image="../../html_frontend/demo.files/images/unsplash/team/thumb_330/craig-mckay-jmURdhtm7Ng-unsplash.jpg"></a>
										<a href="#!" class="w--40 h--40 rounded-circle d-inline-block bg-light bg-cover lazy" data-background-image="../../html_frontend/demo.files/images/unsplash/team/thumb_330/michael-dam-mEZ3PoFGs_k-unsplash.jpg"></a>
									</div>

									<a href="#!" class="h6 text-dark">
										Project Ikarus
									</a>

									<p class="font-weight-light fs--14">This project has a timeline, we need to finish it as soon as possible!</p>

									<span class="fs--14">39%</span>
									<div class="progress h--2">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 39%" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
									</div>

								</div>


								<!-- card -->
								<div class="bg-white shadow-lg p-4 rounded my-3 transition-hover-top transition-all-ease-150">

									<!-- dropdown options -->
									<div class="float-end dropdown">

										<!-- dropdown -->
										<button type="button" class="dropdown-toggle btn btn-sm btn-soft btn-primary px-2 py-1 fs--15 mt--n3" aria-label="Dropdown Options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fi fi-dots-vertical m-0"></i>
										</button>

										<div class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-invert mt-2">

											<a href="#!" class="dropdown-item">
												Export PDF
											</a>

											<a href="#!" class="dropdown-item">
												Export Tasks
											</a>

											<a href="#!" class="dropdown-item">
												Print
											</a>

										</div>
										<!-- /dropdown -->

									</div>
									<!-- /dropdown options -->


									<div class="mb-3">
										<a href="#!" class="w--40 h--40 rounded-circle d-inline-block bg-light bg-cover lazy" data-background-image="../../html_frontend/demo.files/images/unsplash/team/thumb_330/joseph-gonzalez-iFgRcqHznqg-unsplash.jpg"></a>
										<a href="#!" class="w--40 h--40 rounded-circle d-inline-block bg-light bg-cover lazy" data-background-image="../../html_frontend/demo.files/images/unsplash/team/thumb_330/sage-kirk-Wx2AjoLtpcU-unsplash.jpg"></a>
									</div>

									<a href="#!" class="h6 text-dark">
										Remarketing
									</a>

									<p class="font-weight-light fs--14">
										Our client needs remarketing for his two projects!
									</p>

									<span class="fs--14">78%</span>
									<div class="progress h--2">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
									</div>

								</div>


								<div class="clearfix bg-light p-1 row-pill">
									<a href="#!" class="btn btn-pill btn-sm btn-warning py-1 mb-0 float-start transition-hover-end" title="Detailed Revenue" aria-label="Detailed Revenue">View</a>
									<span class="d-block pt-1 pl-2 pr-2 text-muted text-truncate">
										view all projects
									</span>
								</div>

							</div>

						</div>

					</section>
					<!-- /Primary -->


				</div>
				<!-- /MIDDLE -->

@endsection