@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">聯賽管理</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">體育運營</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">聯賽管理</li>
                  </ol>
                </nav>

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
                    <div class="dropdown p-1 w-20">
                      <select name="sport_id" class="form-control form-control-sm border-0 shadow-none bg-gray-300">
						<option value> 請選擇球類 </option>
						@foreach ($game_list as $key => $value)
							@if ($key == $search['sport_id'])
							<option selected value="{{ $key }}"> {{ $value }}</option>
							@else
							<option value="{{ $key }}"> {{ $value }}</option>
							@endif
						@endforeach
					  </select>
                    </div>

					<!-- is_hot -->
					<div class="dropdown p-1 w-20">
					<select name="is_hot" class="form-control form-control-sm border-0 shadow-none bg-gray-300">
						<option value selected> 請選擇熱門 </option>
						<option value="1"> 熱門</option>
						<option value="0"> 非熱門</option>
					</select>
					</div>

					<!-- status -->
					<div class="dropdown p-1 w-20">
					<select name="status" class="form-control form-control-sm border-0 shadow-none bg-gray-300">
						<option value selected> 請選擇狀態 </option>
						<option value="1"> 啟用</option>
						<option value="0"> 關閉</option>
					</select>
					</div>
					
                  </form>
                </div>

                <!-- options -->
                <div class="order-1 order-md-2 col-md-auto">
                  <div class="btn-group p-1 w-100" role="group" aria-label="Product options">
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
                      <th class="small text-muted">體育種類</th>
                      <th class="small text-muted">聯賽名稱</th>
                      <th class="small text-muted">是否熱門</th>
                      <th class="small text-muted">狀態</th>
                      <th class="small text-muted">功能</th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
					@foreach ($data as $league)
                   <!-- item -->
				   <tr>
                      <td><!-- sport_id -->
                        <span class="d-block">{{ $league->game_name }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- name_tw -->
                        <span class="d-block">{{ $league->name_tw }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- is_hot -->
                        <span class="d-block">
						@if ($league->is_hot == 1) 
							是
						@else
							否
						@endif

						</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- status -->
						@if ($league->status == 1) 
                        <span class="d-block text-danger">
							啟用
						@else
                        <span class="d-block text-success">
							關閉
						@endif
						</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td class="dropstart"><!-- options -->
						<div class="tab-pane" style="width:150px;">
      					@if($league->status == 1)
							<a href="/api/active_series?id={{ $league->id }}&{{ $search_str }}" class="btn btn-sm btn-danger mb-2">停用</a>
						@else
            				<a href="/api/active_series?id={{ $league->id }}&{{ $search_str }}" class="btn btn-sm btn-success mb-2">啟用</a>
						@endif
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
                  {{ $data->withQueryString()->links("layout.pagination") }}

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

		
<!-- Modal modalCreateAgent -->
<div class="modal fade" id="modalCreateAgent" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel3">創建商戶帳號</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

      <div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">帳號</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="agent_account" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="agent_email" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">前綴</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="agent_prefix" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">錢包類型</label>
					<div class="col-sm-9">
						<select class="form-select" id="agent_merchant_type" aria-label="請選擇類型">
							<option selected>請選擇類型</option>
							<option value="0">一般錢包</option>
							<option value="1">免轉錢包</option>
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">錢包幣種</label>
					<div class="col-sm-9">
						<select class="form-select" id="agent_currency_type" aria-label="請選擇幣種">
							<option selected>請選擇幣種</option>

						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">測試帳號</label>
					<div class="col-sm-9">
						<select class="form-select" id="agent_is_beta" aria-label="請選擇狀態">
							<option>請選擇狀態</option>
							<option value="0">正式</option>
							<option value="1" selected>測試</option>
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">狀態</label>
					<div class="col-sm-9">
						<select class="form-select" id="agent_status" aria-label="請選擇狀態">
							<option>請選擇狀態</option>
							<option value="0">停用</option>
							<option value="1" selected>啟用</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="javascript:create_agent();">保存</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal modalEditAdmin -->
<div class="modal fade" id="modalEditAgent" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel3">編輯後台帳號</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">


      <div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">帳號</label>
					<div class="col-sm-9">
						<input type="hidden" class="form-control" id="edit_agent_id" value="">
						<input type="text" class="form-control" id="edit_agent_account" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="edit_agent_email" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">前綴</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="edit_agent_prefix" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">錢包類型</label>
					<div class="col-sm-9">
						<select class="form-select" id="edit_agent_merchant_type" aria-label="請選擇類型">
							<option selected>請選擇類型</option>

						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">錢包幣種</label>
					<div class="col-sm-9">
						<select class="form-select" id="edit_agent_currency_type" aria-label="請選擇幣種">
							<option selected>請選擇幣種</option>

						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">測試帳號</label>
					<div class="col-sm-9">
						<select class="form-select" id="edit_agent_is_beta" aria-label="請選擇狀態">
							<option>請選擇狀態</option>
							<option value="0">正式</option>
							<option value="1" selected>測試</option>
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">狀態</label>
					<div class="col-sm-9">
						<select class="form-select" id="edit_agent_status" aria-label="請選擇狀態">
							<option>請選擇狀態</option>
							<option value="0">停用</option>
							<option value="1" selected>啟用</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="javascript:edit_agent();">保存</button>
			</div>
		</div>
	</div>
</div>

@push('main_js')
<script>

  <!-- JS , set value into edit admin -->
  function set_edit_agent(id) {
    
		$.post("/api/get_agent", {
			id: id,
      _token : "{{ csrf_token() }}"
		},
		function(data, status) {
			var cc = JSON.parse(data);

      if (cc.status == 1) {
        // 映設到表單
        $("#edit_agent_id").val(cc.data.id);
        $("#edit_agent_account").val(cc.data.account);
        $("#edit_agent_email").val(cc.data.email);
        $("#edit_agent_prefix").val(cc.data.prefix);
        $("#edit_agent_currency_type").val(cc.data.currency_type);
        $("#edit_agent_merchant_type").val(cc.data.merchant_type);
        $("#edit_agent_is_beta").val(cc.data.is_beta);
        $("#edit_agent_status").val(cc.data.status);
        
      } else {
        $.SOW.core.toast.show('danger', '', cc.message, 'top-end', 0, true);
      }
		});
  }

  <!-- ajax , edit admin -->
	function edit_agent() {
		
		$.post("/api/edit_agent", {
			id: $("#edit_agent_id").val(),
			account: $("#edit_agent_account").val(),
			email: $("#edit_agent_email").val(),
			prefix: $("#edit_agent_prefix").val(),
			currency_type: $("#edit_agent_currency_type").val(),
			merchant_type: $("#edit_agent_merchant_type").val(),
			is_beta: $("#edit_agent_is_beta").val(),
			status: $("#edit_agent_status").val(),
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

  <!-- ajax , create admin -->
	function create_agent() {

		$.post("/api/create_agent", {
			account: $("#agent_account").val(),
			email: $("#agent_email").val(),
			prefix: $("#agent_prefix").val(),
			currency_type: $("#agent_currency_type").val(),
			merchant_type: $("#agent_merchant_type").val(),
			is_beta: $("#agent_is_beta").val(),
			status: $("#agent_status").val(),
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