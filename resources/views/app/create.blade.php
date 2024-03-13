@extends('layout.main')

@section('content')

				<!-- MIDDLE -->
				<div id="middle" class="flex-fill">


					<!-- Primary -->
					<section class="rounded mb-3">
						
						<div class="portlet">

							<div class="portlet-body">
								<div class="container py-6">

									<form>
										<div class="form-group">
											<label>名称 * </label>
											<input type="text" class="form-control" placeholder="请输入名称,2-30字符">
										</div>
										<div class="form-group">
											<label>短名称 * </label>
											<input type="text" class="form-control" placeholder="请输入名称,2-30字符">
										</div>
										<div class="form-group">
											<label>安装页图标 * </label>
											<input type="text" class="form-control" placeholder="请输入名称,2-30字符">
											<small class="form-text text-muted">512x512尺寸, png格式,大小不超过1MB</small>
										</div>
										<div class="form-group">
											<label>桌页图标 * </label>
											<input type="text" class="form-control" placeholder="请输入名称,2-30字符">
											<small class="form-text text-muted">192x192尺寸, png格式,大小不超过1MB</small>
										</div>
										<div class="form-group">
											<label>游览器网页图标 * </label>
											<input type="text" class="form-control" placeholder="请输入名称,2-30字符">
											<small class="form-text text-muted">192x192尺寸, png格式,大小不超过1MB</small>
										</div>
										<div class="form-group">
											<label>推广网址 * </label>
											<input type="text" class="form-control" placeholder="请输入自已网站地址">
										</div>
										<div class="form-group">
											<label>推广网址 * </label>
											<label class="form-switch form-switch-pill form-switch-primary d-block">
															<input type="radio" name="-" value="1" checked="">
															<i data-on="ON" data-off="OFF"></i>
															Using Text
														</label>
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