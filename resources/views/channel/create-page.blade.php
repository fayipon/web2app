@extends('layout.main')

@section('content')

				<!-- MIDDLE -->
				<div id="middle" class="flex-fill">


					<!-- Primary -->
					<section class="rounded mb-3">
						
						<div class="portlet">

							<div class="portlet-header">

								<div class="float-start dropdown">

									<a href="/app" class="btn btn-sm btn-light px-2 py-1 fs--15 mt--n3">
										返回
									</a>

								</div>
							</div>
							<div class="portlet-body">
								<div class="container py-6">

									<form action="/channel-create" method="POST">
										@csrf
										<div class="form-group">
											<label>渠道名称 * </label>
											<input type="text" name="CHANNEL_NAME" class="form-control" placeholder="请输入名称,2-30字符">
										</div>
										<button type="submit" class="btn btn-primary">提交</button>
									</form>
										

								</div>
							</div>

						</div>
					</section>
					<!-- /Primary -->


				</div>
				<!-- /MIDDLE -->

@endsection