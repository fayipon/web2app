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
														<th style="width: 210px;">Name</th>
														<th class="sorting" tabindex="0" aria-controls="rand_ijU" rowspan="1" colspan="1" data-column-index="1" style="width: 316px;" aria-label="Position: activate to sort column ascending">Position</th><th class="sorting" tabindex="0" aria-controls="rand_ijU" rowspan="1" colspan="1" data-column-index="2" style="width: 155px;" aria-label="Office: activate to sort column ascending">Office</th><th class="sorting" tabindex="0" aria-controls="rand_ijU" rowspan="1" colspan="1" data-column-index="3" style="width: 67px;" aria-label="Age: activate to sort column ascending">Age</th><th class="sorting" tabindex="0" aria-controls="rand_ijU" rowspan="1" colspan="1" data-column-index="4" style="width: 135px;" aria-label="Start date: activate to sort column ascending">Start date</th><th class="sorting" tabindex="0" aria-controls="rand_ijU" rowspan="1" colspan="1" data-column-index="5" style="width: 120px;" aria-label="Salary: activate to sort column ascending">Salary</th></tr>
										</thead>
										
										<tbody>
											
										<tr class="odd">
												<td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
												<td>Accountant</td>
												<td>Tokyo</td>
												<td>33</td>
												<td>2008/11/28</td>
												<td>$162,700</td>
											</tr><tr class="even">
												<td class="sorting_1 dtr-control">Angelica Ramos</td>
												<td>Chief Executive Officer (CEO)</td>
												<td>London</td>
												<td>47</td>
												<td>2009/10/09</td>
												<td>$1,200,000</td>
											</tr><tr class="odd">
												<td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
												<td>Junior Technical Author</td>
												<td>San Francisco</td>
												<td>66</td>
												<td>2009/01/12</td>
												<td>$86,000</td>
											</tr><tr class="even">
												<td class="sorting_1 dtr-control">Bradley Greer</td>
												<td>Software Engineer</td>
												<td>London</td>
												<td>41</td>
												<td>2012/10/13</td>
												<td>$132,000</td>
											</tr><tr class="odd">
												<td class="sorting_1 dtr-control">Brenden Wagner</td>
												<td>Software Engineer</td>
												<td>San Francisco</td>
												<td>28</td>
												<td>2011/06/07</td>
												<td>$206,850</td>
											</tr><tr class="even">
												<td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
												<td>Integration Specialist</td>
												<td>New York</td>
												<td>61</td>
												<td>2012/12/02</td>
												<td>$372,000</td>
											</tr><tr class="odd">
												<td class="sorting_1 dtr-control">Bruno Nash</td>
												<td>Software Engineer</td>
												<td>London</td>
												<td>38</td>
												<td>2011/05/03</td>
												<td>$163,500</td>
											</tr><tr class="even">
												<td class="sorting_1 dtr-control">Caesar Vance</td>
												<td>Pre-Sales Support</td>
												<td>New York</td>
												<td>21</td>
												<td>2011/12/12</td>
												<td>$106,450</td>
											</tr><tr class="odd">
												<td class="sorting_1 dtr-control">Cara Stevens</td>
												<td>Sales Assistant</td>
												<td>New York</td>
												<td>46</td>
												<td>2011/12/06</td>
												<td>$145,600</td>
											</tr><tr class="even">
												<td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
												<td>Senior Javascript Developer</td>
												<td>Edinburgh</td>
												<td>22</td>
												<td>2012/03/29</td>
												<td>$433,060</td>
											</tr></tbody>
										<tfoot>
											<tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
										</tfoot>
									</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="rand_ijU_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="rand_ijU_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="rand_ijU_previous"><a href="#" aria-controls="rand_ijU" data-dt-idx="0" tabindex="0" class="page-link"><i class="fi fi-arrow-start fs--13"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="rand_ijU" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="rand_ijU" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="rand_ijU" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="rand_ijU" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="rand_ijU" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="rand_ijU" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="rand_ijU_next"><a href="#" aria-controls="rand_ijU" data-dt-idx="7" tabindex="0" class="page-link"><i class="fi fi-arrow-end fs--13"></i></a></li></ul></div></div></div></div>


									
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