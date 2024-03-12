@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">商戶管理</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">商戶管理</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">商戶管理</li>
                  </ol>
                </nav>

              </div>

              <div class="col-auto">
                <a href="javascript:;" role="button" class="btn btn-sm btn-primary d-inline-flex align-items-center">
                  <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                  </svg>
                  <span class="d-none d-sm-inline-block ps-2" data-bs-toggle="modal" data-bs-target="#modalCreateAgent">商戶帳號</span>
                </a>
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
                      <th class="small text-muted">前綴</th>
                      <th class="small text-muted">語系</th>
                      <th class="small text-muted">錢包類型</th>
                      <th class="small text-muted text-end">餘額</th>
                      <th class="small text-muted">測試帳號</th>
                      <th class="small text-muted">創建時間</th>
                      <th class="small text-muted">狀態</th>
                      <th class="small text-muted" style="width:64px"><!-- options --></th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
					@foreach ($data as $agent)
                   <!-- item -->
				   <tr>
                      <td class="position-relative"><!-- order -->
                        <a class="link-normal fw-medium stretched-link d-block">#{{ $agent['id'] }}</a>
                        <span class="d-block smaller text-muted">
                        </span>
                      </td>
                      <td><!-- account -->
                        <span class="d-block">{{ $agent['account'] }}</span>
                        <span class="d-block text-muted smaller">{{ $agent['email'] }}</span>
                      </td>
                      <td><!-- prefix -->
                        <span class="d-block">{{ $agent['prefix'] }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- api_lang -->
                        <span class="d-block">{{ $agent['api_lang'] }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- merchant_type -->
                        <span class="d-block">{{ $agent['merchant_name'] }}</span>
                        <span class="d-block text-muted smaller">{{ $agent['currency_name'] }}</span>
                      </td>
                      <td><!-- balance -->
                        <span class="d-block text-end">{{ $agent['balance'] }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- is_beta -->
                        <span class="d-block">{{ $agent['is_beta'] ? '測試' : '正式' }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- create_time -->
                        <span class="d-block">{{ $agent['create_time'] }}</span>
                        <span class="d-block text-muted smaller">最近登入 : {{ $agent['last_login'] }}</span>
                      </td>
                      <td><!-- status -->
      					@if($agent['status'] == 1)
                        	<span class="d-block text-success">{{ $agent['status_name'] }}</span>
						    @else
                        	<span class="d-block text-danger">{{ $agent['status_name'] }}</span>
						    @endif
                        <span class="badge bg-facebook rounded-pill">登入模塊未啟用</span>
                      </td>
                      <td class="dropstart"><!-- options -->
						<div class="tab-pane" style="width:150px;">
							<a onclick="set_edit_agent({{ $agent['id'] }});" class="btn btn-sm btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalEditAgent">編輯</a>
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
					<label for="staticEmail2" class="col-sm-3 col-form-label">語系</label>
					<div class="col-sm-9">
						<select class="form-select" id="agent_api_lang" aria-label="請選擇語系">
							<option selected>請選擇語系</option>
						@foreach ($api_lang as $key => $item)
							<option value="{{ $key }}">{{ $item }}</option>
          				@endforeach
						</select>
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
					@foreach ($currency_type as $key => $item)
							<option value="{{ $key }}">{{ $item }}</option>
          			@endforeach
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
					<label for="staticEmail2" class="col-sm-3 col-form-label">語系</label>
					<div class="col-sm-9">
						<select class="form-select" id="edit_agent_api_lang" aria-label="請選擇語系">
							<option selected>請選擇語系</option>
						@foreach ($api_lang as $key => $item)
							<option value="{{ $key }}">{{ $item }}</option>
          				@endforeach
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">錢包類型</label>
					<div class="col-sm-9">
						<select class="form-select" id="edit_agent_merchant_type" aria-label="請選擇類型">
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
						<select class="form-select" id="edit_agent_currency_type" aria-label="請選擇幣種">
							<option selected>請選擇幣種</option>
					@foreach ($currency_type as $key => $item)
							<option value="{{ $key }}">{{ $item }}</option>
          @endforeach
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
        $("#edit_agent_api_lang").val(cc.data.api_lang);
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
			api_lang: $("#edit_agent_api_lang").val(),
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
			api_lang: $("#agent_api_lang").val(),
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