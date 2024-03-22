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
														<input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="rand_ijU">
													</label>
												</div>
												<div class="dataTables_length" id="rand_ijU_length">
													<label>
														<select name="rand_ijU_length" aria-controls="rand_ijU" class="custom-select custom-select-sm form-control form-control-sm">
															<option value="10">10</option>
															<option value="15">15</option>
															<option value="30">30</option>
															<option value="50">50</option>
															<option value="100">100</option>
															<option value="-1">All</option>
														</select>
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
												
												<thead>
													<tr>
														<td class="text-center bg-light" colspan="9" style="height:250px;">
															<h4 class="mt-6">尚无应用数据,请新增应用</h4>
														</td>
													</tr>
												</thead>
												<thead>
													<tr style="background-color:#e1e1e1;">
														<th style="width: 210px;">应用ID</th>
														<th style="width: 210px;">应用名称</th>
														<th style="width: 210px;">状态</th>
														<th style="width: 210px;">屏幕方向</th>
														<th style="width: 210px;">安装量</th>
														<th style="width: 210px;">创建时间</th>
														<th style="width: 210px;">备注</th>
														<th style="width: 210px;">链接</th>
														<th style="width: 210px;">操作</th>
												</thead>
												<tbody>
												
													<tr class="odd">
														<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
														<td>Accountant</td>
														<td>Tokyo</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
													</tr>
													<tr class="odd">
														<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
														<td>Accountant</td>
														<td>Tokyo</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
													</tr>
													<tr class="odd">
														<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
														<td>Accountant</td>
														<td>Tokyo</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
													</tr>
													<tr class="odd">
														<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
														<td>Accountant</td>
														<td>Tokyo</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
													</tr>
													<tr class="odd">
														<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
														<td>Accountant</td>
														<td>Tokyo</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
													</tr>
													<tr class="odd">
														<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
														<td>Accountant</td>
														<td>Tokyo</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
													</tr>
													<tr class="odd">
														<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
														<td>Accountant</td>
														<td>Tokyo</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
													</tr>
													<tr class="odd">
														<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
														<td>Accountant</td>
														<td>Tokyo</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
													</tr>
													<tr class="odd">
														<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
														<td>Accountant</td>
														<td>Tokyo</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
													</tr>
													<tr class="odd">
														<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
														<td>Accountant</td>
														<td>Tokyo</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
														<td>33</td>
														<td>2008/11/28</td>
														<td>$162,700</td>
													</tr>
											</tbody>
											
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-5">
									<div class="dataTables_info"> 第1-10笔  共57笔</div>
								</div>
								<div class="col-sm-12 col-md-7">
									<div class="dataTables_paginate paging_simple_numbers" id="rand_ijU_paginate">
										<ul class="pagination">
											<li class="paginate_button page-item previous disabled" id="rand_ijU_previous">
												<a href="#" aria-controls="rand_ijU" data-dt-idx="0" tabindex="0" class="page-link">
													<i class="fi fi-arrow-start fs--13"></i>
												</a>
											</li>
											<li class="paginate_button page-item active">
												<a href="#" aria-controls="rand_ijU" data-dt-idx="1" tabindex="0" class="page-link">1</a>
											</li>
											<li class="paginate_button page-item ">
												<a href="#" aria-controls="rand_ijU" data-dt-idx="2" tabindex="0" class="page-link">2</a>
											</li>
											<li class="paginate_button page-item ">
												<a href="#" aria-controls="rand_ijU" data-dt-idx="3" tabindex="0" class="page-link">3</a>
											</li>
											<li class="paginate_button page-item ">
												<a href="#" aria-controls="rand_ijU" data-dt-idx="4" tabindex="0" class="page-link">4</a>
											</li>
											<li class="paginate_button page-item ">
												<a href="#" aria-controls="rand_ijU" data-dt-idx="5" tabindex="0" class="page-link">5</a>
											</li>
											<li class="paginate_button page-item ">
												<a href="#" aria-controls="rand_ijU" data-dt-idx="6" tabindex="0" class="page-link">6</a>
											</li>
											<li class="paginate_button page-item next" id="rand_ijU_next"><a href="#" aria-controls="rand_ijU" data-dt-idx="7" tabindex="0" class="page-link"><i class="fi fi-arrow-end fs--13"></i></a></li></ul></div></div></div></div>


									
									<div id="event_log"><!-- LOG ITEM/EVENT CLICK (keytable) --></div>

								</div>
<!-- end new table -->

								<table>
								@if ($list->isEmpty())
									<tr>
										<td colspan="9"><h4>尚无应用数据,请新增应用</h4></td>
									</tr>
								@else
									<tr style="background-color:#cceeff;">
										<th>应用ID</th>
										<th>应用名称</th>
										<th>状态</th>
										<th>屏幕方向</th>
										<th>安装量</th>
										<th>创建时间</th>
										<th>备注</th>
										<th>链接</th>
										<th>操作</th>
									</tr>
									@foreach ($list as $item)
									<tr>
										<td>{{ MD5($item['ID']) }}</td>
										<td>{{ $item['APP_NAME'] }}</td>
										<td>{{ $item['STATUS'] ? '上架' : '下架' }}</td>
										<td>{{ $item['SCREEN_TYPE'] }}</td>
										<td>--</td>
										<td>{{ $item['CREATE_TIME'] }}</td>
										<td>{{ $item['MARK'] }}</td>
										<td><a href="https://{{ $item['SETUP_URL'] }}.chjdhbyk.top/download" target="_blank">连接</a></td>
										<td>
											<a href="/app-delist?id={{ $item['ID'] }}">{{ $item['STATUS'] ? '上架' : '下架' }}</a> 
											统计 
											<a href="/app-edit?id={{ $item['ID'] }}">编辑</a>
											<a href="/app-delete?id={{ $item['ID'] }}">删除</a>
										</td>
									</tr>
									@endforeach
								@endif
								</table>
								
							</div>

						</div>
					</section>
					<!-- /Primary -->


				</div>
				<!-- /MIDDLE -->

@endsection