@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">限額管理</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">商戶管理</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">限額管理</li>
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
							<a onclick="set_edit_agent_limit({{ $agent['id'] }});" class="btn btn-sm btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalEditAgentLimit">編輯限額</a>
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

<!-- Modal modalEditAgentLimit -->
<div class="modal fade" id="modalEditAgentLimit" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel3">編輯商戶限額</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

            <h2 class="h4 mb-2 text-gray-600 doc-section-title doc-anchor anchor-js">
                <span>早盤<b class="text-gray-700">early</b></span>
                
						  <input type="hidden" id="edit_id" value="">
            </h2>
      			<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label"></label>
					<div class="col-sm-4">最小限額</div>
					<div class="col-sm-1" style="padding-top:10px;"></div>
					<div class="col-sm-4">最大限額</div>
				</div>
          @foreach ($game_type as $key => $data)
      			<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">{{ $data }}</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="edit_early_min_limit_{{ $key }}" value="">
					</div>
					<div class="col-sm-1" style="padding-top:10px;">
						-
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="edit_early_max_limit_{{ $key }}" value="">
					</div>
				</div>
		  @endforeach
			
			<h2 class="h4 mb-2 text-gray-600 doc-section-title doc-anchor anchor-js">
                <span>滾地<b class="text-gray-700">living</b></span>
            </h2>
      			<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label"></label>
					<div class="col-sm-4">最小限額</div>
					<div class="col-sm-1" style="padding-top:10px;"></div>
					<div class="col-sm-4">最大限額</div>
				</div>
          @foreach ($game_type as $key => $data)
      			<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">{{ $data }}</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="edit_living_min_limit_{{ $key }}" value="">
					</div>
					<div class="col-sm-1" style="padding-top:10px;">
						-
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="edit_living_max_limit_{{ $key }}" value="">
					</div>
				</div>
		  @endforeach

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="javascript:edit_agent_limit();">保存</button>
			</div>
		</div>
	</div>
</div>

@push('main_js')
<script>

  function set_edit_agent_limit(id) {
    
    $("#edit_id").val(id);

		$.post("/api/get_agent_limit", {
			id: id,
      _token : "{{ csrf_token() }}"
		},
		function(data, status) {
			var cc = JSON.parse(data);

      if (cc.status == 1) {

			var agent_limit = jQuery.parseJSON(cc.data.limit_data);
			var early = agent_limit.early;
			$.each(early, function( key, value ) {
				var min_str = '$("#edit_early_min_limit_'+key+'").val(' + value.min + ');';
				var max_str = '$("#edit_early_max_limit_'+key+'").val(' + value.max + ');';
				eval(min_str);
				eval(max_str);
			});

			var living = agent_limit.living;
			$.each(living, function( key, value ) {
				var min_str = '$("#edit_living_min_limit_'+key+'").val(' + value.min + ');';
				var max_str = '$("#edit_living_max_limit_'+key+'").val(' + value.max + ');';
				eval(min_str);
				eval(max_str);
			});
        
      } else {
        $.SOW.core.toast.show('danger', '', cc.message, 'top-end', 0, true);
      }
		});
  }

  <!-- ajax , edit admin -->
	function edit_agent_limit() {

 		var sddd = $("#modalEditAgentLimit input");

    var limit_array = [[[]]];

    var str = "";
    var edit_id;
		$.each(sddd, function( key, item ) {
			var id = sddd[key].id;
      var value = item.value;
      
      if (id == "edit_id") {
        edit_id = value;
      } else {
        str = str + id + "_" + value + ",";
      }

		});
    
		$.post("/api/edit_agent_limit", {
      id: edit_id,
			data: str,
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