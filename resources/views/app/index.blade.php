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
									<div class="d-flex align-items-center p-3 border-bottom border-light" style="background-color:#cceeff;">

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">应用ID</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">应用名称</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">状态</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">屏幕方向</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">安装量</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">创建时间</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">备注</span>
										</div>
										
										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">链接</span>
										</div>
										
										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">操作</span>
										</div>

									</div>
									<!-- /item -->



									<!-- item -->
									<div class="d-flex align-items-center p-3 border-bottom border-light">

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">ac79044b83c9b42</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">fayitest01</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">上架</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">竖屏</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">9</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">2024/03/11<br>15:49:13</span>
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block"> </span>
										</div>
										
										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">获取</span>
										</div>
										
										<div class="flex-fill text-truncate px-3">
											<span class="fs--13 d-block">下架 统计 编辑 删除</span>
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