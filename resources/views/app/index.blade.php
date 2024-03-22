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

										<a href="/app-create" class="btn btn-sm btn-light px-2 py-1 fs--15 mt--n3">
											新增应用
										</a>

									</div>

									<span class="d-block text-muted text-truncate font-weight-medium">
										<div class="form-label-group mb-3">
											<div class="dropdown bootstrap-select form-control bs-select"><select id="select_options" class="form-control bs-select js-bselectified" data-style="select-form-control border" tabindex="null">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
											</select><button type="button" tabindex="-1" class="btn dropdown-toggle select-form-control border" data-toggle="dropdown" role="combobox" aria-owns="bs-select-22" aria-haspopup="listbox" aria-expanded="false" data-id="select_options" title="Option 1"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Option 1</div></div> </div></button><div class="dropdown-menu" style="max-height: 534.188px; overflow: hidden; min-height: 0px;"><div class="inner show" role="listbox" id="bs-select-22" tabindex="-1" aria-activedescendant="bs-select-22-0" style="max-height: 526.188px; overflow-y: auto; min-height: 0px;"><ul class="dropdown-menu inner show" role="presentation" style="margin-top: 0px; margin-bottom: 0px;"><li class="selected active"><a role="option" class="dropdown-item active selected" id="bs-select-22-0" tabindex="0" aria-setsize="3" aria-posinset="1" aria-selected="true"><span class=" bs-ok-default check-mark"></span><span class="text">Option 1</span></a></li><li><a role="option" class="dropdown-item" id="bs-select-22-1" tabindex="0"><span class=" bs-ok-default check-mark"></span><span class="text">Option 2</span></a></li><li><a role="option" class="dropdown-item" id="bs-select-22-2" tabindex="0"><span class=" bs-ok-default check-mark"></span><span class="text">Option 3</span></a></li></ul></div></div></div>
											<label for="select_options">Bootstrap Select Vendor</label>
										</div>
									</span>

								</div>

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