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
										<td colspan="9"><h4>尚无数据</h4></td>
									</tr>
								@else
									<tr style="background-color:#cceeff;">
										<th>日期</th>
										<th>应用</th>
										<th>安装应用打开次数</th>
										<th>安装页打开用户数</th>
										<th>安装次数</th>
										<th>安装用户数</th>
										<th>应用打开次数</th>
										<th>应用打开用户数</th>
									</tr>
									@foreach ($list as $k => $v)
									@foreach ($v as $kk => $vv)
									<tr>
										<td>{{ $k }}</td>
										<td>{{ $vv['APP_NAME'] ?? '-' }}</td>
										<td>{{ $vv['SETUP_PAGE_PV'] ?? 0 }}</td>
										<td> - </td>
										<td>{{ $vv['SETUP_COUNT'] ?? 0 }}</td>
										<td> - </td>
										<td>{{ $vv['APP_PV'] ?? 0 }}</td>
										<td> - </td>
									</tr>
									
									@endforeach
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