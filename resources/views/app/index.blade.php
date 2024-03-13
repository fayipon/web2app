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


								<table>

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

									<tr>
										<td>ac79044b83c9b42</td>
										<td>fayitest01</td>
										<td>上架</td>
										<td>竖屏</td>
										<td>9</td>
										<td>2024/03/11<br>15:49:13</td>
										<td> </td>
										<td>获取</td>
										<td>下架 统计 编辑 删除</td>
									</tr>
								</table>
								
							</div>

						</div>
					</section>
					<!-- /Primary -->


				</div>
				<!-- /MIDDLE -->

@endsection