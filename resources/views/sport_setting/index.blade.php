@extends('layout.app')

@section('content')
<!-- main -->
<main id="middle" class="flex-fill mx-auto">
	<!-- PAGE TITLE -->
	<header>
		<div class="row g-1 align-items-center">
			<div class="col">
				<h1 class="h4">水位設定</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb small">
						<li class="breadcrumb-item"><a href="/">首頁</a></li>
						<li class="breadcrumb-item"><a href="#">體育運營</a></li>
						<li class="breadcrumb-item text-muted active" aria-current="page">水位設定</li>
					</ol>
				</nav>
			</div>
			<div class="col-auto">
			</div>
		</div>
	</header>

	<div class="section p-0">
		<div class="card-header">
			<div class="row g-3">
				<!-- product filter -->
				<div class="order-2 order-md-1 col">
					<div class="dropdown w-100">
						<form class="position-relative d-flex align-items-center" style="padding-left: 15px;">
							<div class="mb-2" style="margin-right: 10px;">
								<select id="status" class="form-select">
									<option value="living" selected>滾球</option>
									<option value="early">早盤</option>
								</select>
							</div>

							<div class="mb-2" style="margin-right: 10px;">
								<select id="sport_id" class="form-select">
									@foreach ($sport_list as $item)
									<option value="{{$item->sport_id}}">{{$item->name_tw}}</option>
									@endforeach
								</select>
							</div>

						</form>
					</div>
				</div>
			</div>

		</div>


		<div class="card-body pt-1">
              
              <!-- item list -->
              <div class="table-responsive-md">

                <table class="table table-align-middle" role="grid" aria-describedby="mobile-page-info">
                  <thead>
                    <tr>
                      <th class="small text-muted">玩法</th>
                      <th class="small text-muted">水位</th>
                      <th class="small text-muted">操作</th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
					@foreach ($data as $item)
                   <!-- item -->
				   <tr>
                      <td class="position-relative"><!-- 玩法 -->
                        <a class="link-normal fw-medium stretched-link d-block">{{ $item['market_name'] }}</a>
                        <span class="d-block smaller text-muted">
                        </span>
                      </td>
                      <td><!-- 水位 -->
                        <span class="d-block">{{ $item['setting'] }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- 設定 -->
					  	
						<div class="tab-pane" style="width:150px;">
						<a onclick="set_edit_setting('{{ $item['status'] }}','{{ $item['sport_id'] }}','{{ $item['market_id'] }}','{{ $item['market_name'] }}','{{ $item['setting'] }}');" class="btn btn-sm btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalEditSetting">編輯</a>
						</div>

                      </td>
                    </tr>
                    <!-- end item -->
					@endforeach

                  </tbody>
                </table>

              </div>

            </div>
	</div>
</main>
<!-- /main -->

<!-- Modal modalEditNotice -->
<div class="modal fade" id="modalEditSetting" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel3">編輯公告</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

      			<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">玩法</label>
					<div class="col-sm-9">
						<span id="edit_setting_market_name"></span>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">水位</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="edit_setting_setting" value="">
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="javascript:edit_setting();">保存</button>
			</div>
		</div>
	</div>
</div>

@push('styles')
<style>
	.text-left {
		text-align: left;
	}

	.text-right {
		text-align: right;
	}

	.fixtureCard,
	.fixtureCard [key='matchEnable'] div,
	.fixtureCard [key='teams'] div,
	.fixtureCard [key='score'] div,
	.fixtureCard [key='time'],
	.fixtureCard [key='matchEnable'] {
		border: 1px solid rgb(240, 240 ,240);
		padding: 0 1rem;
		line-height: 2rem;
	}

	.fixtureCard [key='matchEnable'] button {
		height: 1.5rem;
		line-height: 0;
		color: white;
	}

	.fixtureCard {
		border-bottom: 0!important;
		padding: 0!important;
		margin-bottom: 0.5rem;
	}

	.betItem {
		height: 2.5rem;
		border: 2px solid rgb(240, 240 ,240);
		/* padding: 0 1rem; */
		line-height: 2rem;
		overflow: hidden;
	}
	.fixtureCard [key='lastUpdate'] {
		display: none;
		border: 1px solid rgb(240, 240 ,240);
		padding: 0 1rem;
	}
	.fixtureCard.showUpdate [key='lastUpdate'] {
		display: block!important;
		color: rgb(180, 180, 180);
		font-size: 0.8rem;
	}

	.fixtureCard [key='titleCont'] div {
		border-left: 1px solid rgb(240, 240 ,240);
		border-right: 1px solid rgb(240, 240 ,240);
	}

	.fixtureCard p {
		margin: 0;
	}

	.fixtureCard [key='title'] {
		display: flex;
		background-color: rgb(200, 200, 200);
	}

	.fixtureCard [key='matchEnable'] {
		width: 30%;
	}

	.fixtureCard [key='titleCont'] {
		width: 70%;
		text-align: center;
	}

	.fixtureCard [key='body'],
	.fixtureCard [key='body2'] {
		display: flex;
		width: 100%;
	}

	.fixtureCard [key='time'] {
		width: 10%;
	}

	.fixtureCard [key='teams'] {
		width: 15%;
	}

	.fixtureCard [key='body2'] [key='teams'] {
		width: 20%;
	}


	.fixtureCard [key='teams'] div,
	.fixtureCard [key='score'] div{
		height: 50%;
	}

	#fixtureContainer[sport='6046'] .fixtureCard [key='teams'] div,
	#fixtureContainer[sport='6046'] .fixtureCard [key='score'] div{
		height: 33.33333%;
	}

	.fixtureCard [key='score'] {
		width: 5%;
		text-align: right;
	}

	.fixtureCard [key='main'] {
		width: 70%;
	}

	.apiLock {
		background-color: rgb(225, 225, 225);
	}
	.riskLock {
		border: 2px solid red!important;
	}
	.riskOpen {
		border: 2px solid rgb(0, 212, 81)!important;
	}
</style>
@endpush

@push('main_js')
<script>
	var data = @json($data);
	var search = @json($search);

    $('#sport_id').val(search['sport_id']);
    $('#status').val(search['status']);

    // 选取 select 元素并添加 change 事件监听器
    $('#sport_id').on('change', function() {
        // 获取所选的值
        var sportValue = $(this).val();
        var statusValue = $('#status').val();

    	// 构建新的 URL
        var newUrl = '/sport/setting?status=' + statusValue + '&sport_id=' + sportValue;

        // 使用 window.location.href 跳转到新页面
        window.location.href = newUrl;
    });
    $('#status').on('change', function() {
        // 获取所选的值
        var statusValue = $(this).val();
        var sportValue = $('#sport_id').val();

    	// 构建新的 URL
        var newUrl = '/sport/setting?status=' + statusValue + '&sport_id=' + sportValue;

        // 使用 window.location.href 跳转到新页面
        window.location.href = newUrl;
    });

	var edit_status = null;
	var edit_sport_id = null;
	var edit_market_id = null;
	
	function set_edit_setting(status, sport_id, market_id, market_name, setting) {

		edit_status = status;
		edit_sport_id = sport_id;
		edit_market_id = market_id;

		$('#edit_setting_market_name').html(market_name);
		$('#edit_setting_setting').val(setting);
		
	}
	
	function edit_setting() {

		edit_setting_setting = $('#edit_setting_setting').val();
		
		$.post("/api/edit_sport_setting", {
			status: edit_status,
			sport_id: edit_sport_id,
			market_id: edit_market_id,
			setting: edit_setting_setting,
      		_token : "{{ csrf_token() }}"
		},
		function(data, status) {
			var cc = JSON.parse(data);

			if (cc.status == 1) {
				location.reload();
				
			} else {
				$.SOW.core.toast.show('danger', '', cc.message, 'top-end', 0, true);
			}
		});
		
	}
</script>
@endpush

@endsection