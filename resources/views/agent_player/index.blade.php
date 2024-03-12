@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">玩家管理</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">商戶管理</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">玩家管理</li>
                  </ol>
                </nav>

              </div>

              <div class="col-auto">
				
              </div>
            </div>

          </header>


          <div class="section p-0">
            <div class="card-header p-4">

              <div class="row g-3">

                <!-- product filter -->
                <div class="order-2 order-md-1 col">
                  <form method="get" id="search_form" class="position-relative d-flex align-items-center">

                    <!-- search icon -->
                    <svg class="z-index-1 position-absolute start-0 ms-3 text-primary" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="11" cy="11" r="8"></circle>
                      <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>

                    <div class="dropdown w-100">
                      <input type="text" name="account" class="form-control form-control-sm border-0 shadow-none ps-5 bg-gray-100" value="{{ $search['account'] ?? '' }}" placeholder="帳號">
                    </div>

                  </form>
                </div>

                <!-- options -->
                <div class="order-1 order-md-2 col-md-auto">
                  <div class="btn-group w-100" role="group" aria-label="Product options">
                    <a href='javascript:;' onclick='$("#search_form").submit();' role="button" class="btn btn-sm small btn-primary">搜尋</a>
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
                      <th class="small text-muted">ID</th>
                      <th class="small text-muted">帳號</th>
                      <th class="small text-muted">所屬商戶</th>
                      <th class="small text-muted">錢包類型</th>
                      <th class="small text-muted text-end">餘額</th>
                      <th class="small text-muted">測試帳號</th>
                      <th class="small text-muted">創建時間</th>
                      <th class="small text-muted">狀態</th>
                      <th class="small text-muted" style="width:64px"><!-- options --></th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
					@foreach ($data as $player)
                   <!-- item -->
				   <tr>
                      <td class="position-relative"><!-- order -->
                        <a class="link-normal fw-medium stretched-link d-block">#{{ $player['id'] }}</a>
                        <span class="d-block smaller text-muted">
                        </span>
                      </td>
                      <td><!-- account -->
                        <span class="d-block">{{ $player['account'] }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- agent_id -->
                        <span class="d-block">{{ $player['agent_account'] }}</span>
                        <span class="d-block text-muted smaller">{{ $player['agent_email'] }}</span>
                      </td>
                      <td><!-- merchant_type -->
                        <span class="d-block">{{ $player['merchant_name'] }}</span>
                        <span class="d-block text-muted smaller">{{ $player['currency_name'] }}</span>
                      </td>
                      <td><!-- balance -->
                        <span class="d-block text-end">{{ $player['balance'] }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- is_beta -->
                        <span class="d-block">{{ $player['is_beta'] ? '測試' : '正式' }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- create_time -->
                        <span class="d-block">{{ $player['create_time'] }}</span>
                        <span class="d-block text-muted smaller">最近登入 : {{ $player['last_update'] }}</span>
                      </td>
                      <td><!-- status -->
      					@if($player['status'] == 1)
                        	<span class="d-block text-success">{{ $player['status_name'] }}</span>
						    @else
                        	<span class="d-block text-danger">{{ $player['status_name'] }}</span>
						    @endif
                        <span class="badge bg-facebook rounded-pill">登入模塊未啟用</span>
                      </td>
                      <td class="dropstart"><!-- options -->
						<div class="tab-pane" style="width:150px;">
							<a onclick="set_edit_player({{ $player['id'] }});" class="btn btn-sm btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalEditPlayer">編輯</a>
						</div>
                      </td>
                    </tr>
                    <!-- end item -->
					@endforeach

                  </tbody>
                </table>

              </div>

              <!-- pagination, selected items -->
              <div class="row">
                <div class="col py-3 text-center text-md-start">

                </div>

                <div class="col-md-auto py-3">

                  <!-- pagination -->
                  <nav class="w-100 text-center" aria-label="Pagination">
                  {{ $paginator->withQueryString()->links("layout.pagination") }}

                    <!-- pagination : mobile -->
                    <ul class="list-inline mb-0 d-md-none">
                      <li class="list-inline-item">
                        <a href="javascript:;" class="btn btn-sm rounded-circle link-normal disabled" tabindex="0">
                          <svg width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                          </svg>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="javascript:;" class="btn btn-sm rounded-circle link-normal" tabindex="0">
                          <svg width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                          </svg>
                        </a>
                      </li>
                    </ul>
                    <div class="text-muted small d-md-none" id="mobile-page-info" role="status" aria-live="polite">
                      Showing results 1 to 30 of 180
                    </div>

                  </nav>

                </div>
              </div>

            </div>
          </div>


        </main>
        <!-- /main -->

		

<!-- Modal modalEditPlayer -->
<div class="modal fade" id="modalEditPlayer" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel3">編輯玩家帳號</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">


      <div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">帳號</label>
					<div class="col-sm-9">
						<input type="hidden" class="form-control" id="edit_player_id" value="">
						<input type="text" class="form-control" id="edit_player_account" value="">
					</div>
				</div>
			
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">錢包類型</label>
					<div class="col-sm-9">
						<select class="form-select" id="edit_player_merchant_type" aria-label="請選擇類型">
							<option selected>請選擇類型</option>
					@foreach ($merchant_type as $key => $item)
							<option value="{{ $key }}">{{ $item }}</option>
          			@endforeach
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">錢包幣種</label>
					<div class="col-sm-9">
						<select class="form-select" id="edit_player_currency_type" aria-label="請選擇幣種">
							<option selected>請選擇幣種</option>
					@foreach ($currency_type as $key => $item)
							<option value="{{ $key }}">{{ $item }}</option>
          			@endforeach
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">狀態</label>
					<div class="col-sm-9">
						<select class="form-select" id="edit_player_status" aria-label="請選擇狀態">
							<option>請選擇狀態</option>
							<option value="0">停用</option>
							<option value="1" selected>啟用</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="javascript:edit_player();">保存</button>
			</div>
		</div>
	</div>
</div>

@push('main_js')
<script>

  <!-- JS , set value into edit admin -->
  function set_edit_player(id) {
    
		$.post("/api/get_player", {
			id: id,
      _token : "{{ csrf_token() }}"
		},
		function(data, status) {
			var cc = JSON.parse(data);

      if (cc.status == 1) {
        // 映設到表單
        $("#edit_player_id").val(cc.data.id);
        $("#edit_player_account").val(cc.data.account);
        $("#edit_player_currency_type").val(cc.data.currency_type);
        $("#edit_player_merchant_type").val(cc.data.merchant_type);
        $("#edit_player_is_beta").val(cc.data.is_beta);
        $("#edit_player_status").val(cc.data.status);
        
      } else {
        $.SOW.core.toast.show('danger', '', cc.message, 'top-end', 0, true);
      }
		});
  }

  <!-- ajax , edit admin -->
	function edit_player() {
      
		$.post("/api/edit_player", {
			id: $("#edit_player_id").val(),
			account: $("#edit_player_account").val(),
			currency_type: $("#edit_player_currency_type").val(),
			merchant_type: $("#edit_player_merchant_type").val(),
			status: $("#edit_player_status").val(),
      		_token : "{{ csrf_token() }}"
		},
		function(data, status) {
			var cc = JSON.parse(data);

      if (cc.status == 1) {
        // 映設到表單
        location.reload();
      } else {
        $.SOW.core.toast.show('danger', '', cc.message, 'top-end', 0, true);
      }
		});
  }


</script>
@endpush

@endsection