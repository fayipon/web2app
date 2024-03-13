@extends('layout.main')

@section('content')

				<!-- MIDDLE -->
				<div id="middle" class="flex-fill">


					<!-- Primary -->
					<section class="rounded mb-3">

						<div class="col-12 col-xl-12 mb-3">

							<div class="portlet">
								
								<div class="portlet-header">

									<div class="float-end dropdown">

										<a href="#!" class="btn btn-sm btn-light px-2 py-1 fs--15 mt--n3">
											新增应用
										</a>

									</div>


									<span class="d-block text-muted text-truncate font-weight-medium">
										搜寻条件区块	
									</span>

								</div>


								<!-- content loaded via ajax! -->
								<div class="portlet-body max-h-500 scrollable-vertical scrollable-styled-dark">

									<!-- item -->
									<div class="d-flex align-items-center p-3 border-bottom border-light">


										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">应用ID</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">应用ID</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">应用ID</span>
										</div>


									</div>
									<!-- /item -->



									<!-- item -->
									<div class="d-flex align-items-center p-3 border-bottom border-light">

										<div class="flex-none w--40">
											<img width="40" height="40" class="img-fluid lazy" data-src="../../html_frontend/demo.files/svg/icons/files/csv.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="text-muted">12 items imported, 67 updated, 1 ignored</span>
											<span class="fs--13 d-block text-gray-500">15 February, 2020 / 16:51</span>
										</div>

										<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
											<a href="#!">view log</a>
										</div>

									</div>
									<!-- /item -->



									<!-- item -->
									<div class="d-flex align-items-center p-3 border-bottom border-light">

										<div class="flex-none w--40">
											<img width="40" height="40" class="img-fluid lazy" data-src="../../html_frontend/demo.files/svg/icons/files/jpg.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="text-muted">384 images imported to 281 products</span>
											<span class="fs--13 d-block text-gray-500">1 February, 2020 / 13:43</span>
										</div>

										<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
											<a href="#!">view log</a>
										</div>

									</div>
									<!-- /item -->

								</div>

								<div class="d-flex align-self-baseline w-100 py-2">
									<a href="#!" class="btn btn-sm text-gray-500 b-0 fs--16 shadow-none font-weight-light">
										<i class="fi fi-arrow-end-slim"></i>
										<span>View All</span>
									</a>
								</div>

							</div>

						</div>
					</section>
					<!-- /Primary -->


				</div>
				<!-- /MIDDLE -->

@endsection