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

										<a href="/channel-create-page" class="btn btn-sm btn-light px-2 py-1 fs--15 mt--n3">
											新增渠道
										</a>

									</div>


									<span class="d-block text-muted text-truncate font-weight-medium">
										搜寻条件区块	
									</span>

								</div>

								<table>

								@if ($list->isEmpty())
									<tr>
										<td colspan="9"><h4>尚无应用数据,请新增渠道</h4></td>
									</tr>
								@else
									<tr style="background-color:#cceeff;">
										<th>渠道名称</th>
										<th>创建时间</th>
										<th>状态</th>
										<th>操作</th>
									</tr>
									@foreach ($list as $item)
									<tr>
										<td>{{ $item['CHANNEL_NAME'] }}</td>
										<td>{{ $item['CREATE_TIME'] }}</td>
										<td>{{ $item['STATUS'] ? '启用' : '禁用' }}</td>
										<td>
											<a href="/channel-delist?id={{ $item['ID'] }}">{{ $item['STATUS'] ? '禁用' : '启用' }}</a> 
											
											<a href="/channel-edit-page?id={{ $item['ID'] }}">编辑</a>
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