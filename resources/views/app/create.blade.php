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

									<form action="/app-post" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label>名称 * </label>
											<input type="text" name="APP_NAME" class="form-control" placeholder="请输入名称,2-30字符">
										</div>
										<div class="form-group">
											<label>短名称 * </label>
											<input type="text" name="APP_SORT_NAME" class="form-control" placeholder="请输入名称,2-30字符">
										</div>
										<div class="form-group">
											<label>安装页图标 * </label>
											<input type="file" name="APP_SETUP_ICON" class="form-control" placeholder="请输入名称,2-30字符">
											<small class="form-text text-muted">512x512尺寸, png格式,大小不超过1MB</small>
										</div>
										<div class="form-group">
											<label>桌页图标 * </label>
											<input type="text" name="APP_DESKTOP_ICON" class="form-control" placeholder="请输入名称,2-30字符">
											<small class="form-text text-muted">192x192尺寸, png格式,大小不超过1MB</small>
										</div>
										<div class="form-group">
											<label>游览器网页图标 * </label>
											<input type="text" name="APP_BROWSER_ICON" class="form-control" placeholder="请输入名称,2-30字符">
											<small class="form-text text-muted">192x192尺寸, png格式,大小不超过1MB</small>
										</div>
										<div class="form-group">
											<label>推广网址 * </label>
											<input type="text" name="APP_URL" class="form-control" placeholder="请输入自已网站地址">
										</div>
										<div class="form-group">
											<label>网址是否允许修改</label>
											<label class="form-switch form-switch-pill form-switch-primary d-block">
												<input type="checkbox" name="IS_APP_URL_EDIT" value="1" checked="">
												<i data-on="允许" data-off="不允许"></i>
											</label>
										</div>
										<div class="form-group">
											<label>在iframe打开</label>
											<label class="form-switch form-switch-pill form-switch-primary d-block">
												<input type="checkbox" name="IS_IFRAME" value="1" checked="">
												<i data-on="是" data-off="否"></i>
											</label>
										</div>
										<div class="form-group">
											<label>应用安装地址 * </label>
											<input type="text" name="SETUP_URL" class="form-control" placeholder="请输入自已网站地址">网站地址.chjdhbyk.top/download
										</div>
										<div class="form-group">
											<label>iOS跳转地址 * </label>
											<input type="text" name="" class="form-control" placeholder="请输入自已网站地址">
										</div>
										<div class="form-group">
											<label>开发者名称 * </label>
											<input type="text" name="SETUP_DEV_NAME" class="form-control" placeholder="请输入开发者名称,2-30字符">
										</div>
										<div class="form-group">
											<label>评分 * </label>
											<input type="text" name="SETUP_RATE" class="form-control" placeholder="请输入1.0-5.0评分">
										</div>
										<div class="form-group">
											<label>评价人数 * </label>
											<input type="text" name="SETUP_RATE_P" class="form-control" placeholder="请输入1-10,000,000评分">
										</div>

										<div class="form-group">
											<label>安装人数 * </label>
											<input type="text" name="SETUP_SETUP_P" class="form-control" placeholder="请输入1-10,000,000评分">
										</div>
										<div class="form-group">
											<label>适合年龄 * </label>
											<div class="form-label-group mb-3">
												<select id="select_options" name="SETUP_AGE" class="form-control bs-select">
													<option value="1">3+</option>
													<option value="2">7+</option>
													<option value="3">12+</option>
													<option value="4">16+</option>
													<option value="5">18+</option>
													<option value="0">全年龄</option>
												</select>
												<label for="select_options">Bootstrap Select Vendor</label>
											</div>
										</div>
										<div class="form-group">
											<label>屏幕方向</label>
											<label class="form-switch form-switch-pill form-switch-primary d-block">
												<input type="checkbox" name="SCREEN_TYPE" value="1" checked="">
												<i data-on="竖屏" data-off="横屏"></i>
											</label>
										</div>
										
										<div class="form-group">
											<label>应用截图 * </label>
											<input type="text" name="APP_SCREEN" class="form-control" placeholder="请输入名称,2-30字符">
											<small class="form-text text-muted">330x587尺寸, png格式,大小不超过1MB</small>
										</div>

										<div class="form-group">
											<label>应用介绍 * </label>
											<textarea placeholder="Textarea" name="APP_DESCRIPTION" id="description" class="form-control" rows="3"></textarea>
										</div>

										<div class="form-group">
											<label>安装模版 * </label>
											<input type="text" name="SETUP_TEMPLE" class="form-control" placeholder="请输入名称,2-30字符">
											<small class="form-text text-muted">330x587尺寸, png格式,大小不超过1MB</small>
										</div>

										<div class="form-group">
											<label>点击任意位置安装</label>
											<label class="form-switch form-switch-pill form-switch-primary d-block">
												<input type="checkbox" name="IS_ANYWHERE_INSTALL" value="1" checked="">
												<i data-on="是" data-off="否"></i>
											</label>
										</div>

										<div class="form-group">
											<label>备注 </label>
											<input type="text" name="MARK" class="form-control" placeholder="备注,不会展示在安装页，仅用于管理app">
										</div>

										<div class="form-group">
											<label>数据埋点 </label>
											<div class="form-label-group mb-3">
												<select id="select_options" name="TRACKING_TYPE" class="form-control bs-select">
													<option value="0"> </option>
													<option value="1">Google Analytics</option>
													<option value="2">Facebook Meta Pixel</option>
												</select>
												<label for="select_options">第三方统计平台</label>
											</div>
											<input type="text" name="TRACKING_INFO" class="form-control" placeholder="请输入埋点id">
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