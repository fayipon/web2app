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
										搜寻条件区块	
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
										<td>{{ $item['STATUS'] }}</td>
										<td>{{ $item['SCREEN_TYPE'] }}</td>
										<td>--</td>
										<td>{{ $item['CREATE_TIME'] }}</td>
										<td>{{ $item['MARK'] }}</td>
										<td>{{ $item['APP_URL'] }}</td>
										<td><a href="/app-delist?id={{ $item['ID'] }}">下架</a> 统计 编辑 删除</td>
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