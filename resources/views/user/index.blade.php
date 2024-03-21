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
										<th>用户ID</th>
										<th>首次访问</th>
										<th>最近活跃</th>
										<th>应用</th>
										<th>应用id</th>
										<th>来源</th>
										<th>机型</th>
										<th>所属渠道</th>
										<th>进度</th>
										<th>消息通知</th>
										<th>进入安装页次数</th>
										<th>打开应用次数</th>
									</tr>
									@foreach ($list as $item)
									<tr>
										<td>{{ $item['COOKIE_ID'] }}</td>
										<td>{{ $item['FIRST_TIME'] }}</td>
										<td>{{ $item['CREATE_TIME'] }}</td>
										<td>  </td>
										<td>{{ $item['APP_ID'] }}</td>
										<td>{{ $item['SOURCE_URL'] }}</td>
										<td style="font-size: 10px;width: 15%;">{{ $item['DEVICE_TYPE'] }}</td>
										<td>{{ $item['CHANNEL_ID'] }}</td>
										<td>{{ $item['ACTION_TYPE'] }}</td>
										<td> </td>
										<td> </td>
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