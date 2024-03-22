@extends('layout.main')

@section('content')

				<!-- MIDDLE -->
				<div id="middle" class="flex-fill">


					<!-- Primary -->
					<section class="rounded mb-3">

						<div class="col-12 col-xl-12 mb-3">

							<div class="portlet">
								
								<!--  新table -->
								<div class="mt--30 mb--60">

									<!--
										data-autofill="false|hover|click" 
										data-enable-paging="true" 			false = show all, no pagination
										data-items-per-page="10|15|30|50|100" 
									-->
									<div id="rand_ijU_wrapper" class="dataTables_wrapper dt-bootstrap4">
										<div class="row mb-3">
											<div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-start">
												<div id="rand_ijU_filter" class="dataTables_filter">
													<label>
														<select id="SEARCH_APP_ID" class="custom-select custom-select-sm form-control form-control-sm">
															<option value="-1">选择应用</option>
														@foreach ($app_list as $item)
															<option value="{{ $item['ID'] }}">{{ $item['APP_NAME'] }}</option>
														@endforeach
														</select>
													</label>
												</div>
												<div class="dataTables_length">
													<label>
														<select id="SEARCH_APP_STATUS" class="custom-select custom-select-sm form-control form-control-sm">
															<option value="-1">选择状态</option>
															<option value="1">上架</option>
															<option value="0">下架</option>
														</select>
													</label>
												</div>

												<div class="dataTables_length">
													<label>
														<a href="javascript:redirect();" class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis btn-sm btn-info ml-3" type="button" title="Column Visibility">
															<span>搜寻</span>
															<span class="dt-down-arrow"></span>
														</a>
													</label>
												</div>
												
											</div>
											<div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-end">
												<div class="dt-buttons btn-group flex-wrap mr-3"> 
													<div class="btn-group">
														<a href="/app-create" class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis btn-sm btn-info" tabindex="0" aria-controls="rand_ijU" type="button" title="Column Visibility" aria-haspopup="true">
															<span>创建应用</span>
															<span class="dt-down-arrow"></span>
														</a>
													</div> 
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<table class="table-datatable table table-bordered table-hover table-striped js-datatableified dataTable dtr-inline" style="width: 1255px;">
												
								@if ($list->isEmpty())
												<thead>
													<tr>
														<td class="text-center bg-light" colspan="9" style="height:250px;">
															<h4 class="mt-6"><i class="fi fi-bell-full fs--25"></i>尚无应用数据,请<a href="/app-create">新增应用</a></h4>
														</td>
													</tr>
												</thead>
								
								@else

									
												<thead>
													<tr style="background-color:#e1e1e1;">
														<th>应用ID</th>
														<th>应用名称</th>
														<th>状态</th>
														<th>屏幕方向</th>
														<th>安装量</th>
														<th>创建时间</th>
														<th>备注</th>
														<th>链接</th>
														<th>操作</th>
												</thead>	
												<tbody>	
									@foreach ($list as $item)

													<tr class="odd">
														<td>{{ MD5($item['ID']) }}</td>
														<td>{{ $item['APP_NAME'] }}</td>
														<td>{{ $item['STATUS'] ? '上架' : '下架' }}</td>
														<td>{{ $item['SCREEN_TYPE'] }}</td>
														<td>--</td>
														<td>{{ $item['CREATE_TIME'] }}</td>
														<td>{{ $item['MARK'] }}</td>
														<td><a href="https://{{ $item['SETUP_URL'] }}.chjdhbyk.top/download" target="_blank">链接</a></td>
														<td>
															<a href="/app-delist?id={{ $item['ID'] }}">{{ $item['STATUS'] ? '上架' : '下架' }}</a> 
															统计 
															<a href="/app-edit?id={{ $item['ID'] }}">编辑</a>
															<a href="/app-delete?id={{ $item['ID'] }}">删除</a>
														</td>
													</tr>

									@endforeach
												</tbody>
								@endif
											
									</table>

									


								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-5">
									<div class="dataTables_info ml-3">  </div>
								</div>
								<div class="col-sm-12 col-md-7">
								<!-- 显示分页链接 -->
								{{ $list->links('layout.pagination') }}
								</div>
<!-- end new table -->

							</div>

						</div>
					</section>
					<!-- /Primary -->


				</div>
				<!-- /MIDDLE -->

				<!-- 跳转JS -->
				<script>

					function redirect() {

						var appId = document.getElementById('SEARCH_APP_ID').value;
						var appStatus = document.getElementById('SEARCH_APP_STATUS').value;
						
						
						// 构建跳转链接
						var url = "{{ url('/currentpage') }}?t=1";
						if (appId != -1 ) url = url + "&APP_ID="+appId;
						if (appStatus != -1 ) url = url + "&APP_STATUS="+appStatus;
						
						
						// 跳转到链接
						window.location.href = url;
					}

				</script>

@endsection