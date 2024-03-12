@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">後台權限</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">後台管理</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">後台權限</li>
                  </ol>
                </nav>

              </div>

              <div class="col-auto">
                <a href="#!" role="button" class="btn btn-sm btn-primary d-inline-flex align-items-center">
                  <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                  </svg>
                  <span class="d-none d-sm-inline-block ps-2" data-bs-toggle="modal" data-bs-target="#modalCreateAdminPermission">後台權限</span>
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
                      <th class="small text-muted">權限名稱</th>
                      <th class="small text-muted">允許權限</th>
                      <th class="small text-muted" style="width:200px">狀態</th>
                      <th class="small text-muted" style="width:64px"><!-- options --></th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
					@foreach ($data as $obj)
                   <!-- item -->
				   <tr>
                      <td class="position-relative"><!-- order -->
                        <a href="#!" class="link-normal fw-medium stretched-link d-block">#{{ $obj->id }}</a>
                        <span class="d-block smaller text-muted">
                        </span>
                      </td>
                      <td><!-- permission name -->
                        <span class="d-block">{{ $obj->permission_name }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td style="max-width:500px;"><!-- data -->
                        @foreach ($obj->permission as $p)
                        <span class="badge bg-facebook rounded-pill">{{ $p }}</span>
                        @endforeach
                      </td>
                      <td><!-- status -->
      					@if($obj->status == 1)
                        	<span class="d-block text-success">{{ $obj->status_name }}</span>
						    @else
                        	<span class="d-block text-danger">{{ $obj->status_name }}</span>
						    @endif
                        <!-- <span class="badge bg-facebook rounded-pill"></span> -->
                      </td>
                      <td class="dropstart"><!-- options -->
                        <div class="tab-pane" style="width:150px;">
                          <a onclick="set_edit_admin_permission({{ $obj->id }});" class="btn btn-sm btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalEditAdminPermission">編輯</a>
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
                        <a href="#!" class="btn btn-sm rounded-circle link-normal disabled" tabindex="0">
                          <svg width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                          </svg>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#!" class="btn btn-sm rounded-circle link-normal" tabindex="0">
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

		
<!-- Modal modalCreateAdminPermission -->
<div class="modal fade" id="modalCreateAdminPermission" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel3">創建後台權限</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-2 col-form-label">權限名稱</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="permission_name" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">權限</label>
					<div class="col-sm-10">

            <h2 class="h4 mb-2 text-gray-600 doc-section-title doc-anchor anchor-js">
                <span>首頁<b class="text-gray-700">Index</b></span>
            </h2>
            
            <div class="form-check form-check-inline mb-4">
              <input class="form-check-input form-check-input-primary permission" type="checkbox" id="inlineCheckbox3" value="index" checked disabled>
              <label class="form-check-label" for="inlineCheckbox3">index</label>
            </div>

          @foreach ($menu as $key => $data)
            <h2 class="h4 mb-2 text-gray-600 doc-section-title doc-anchor anchor-js">
                <span> <b class="text-gray-700">{{ $key }}</b></span>
            </h2>
            
            @foreach ($data as $v)
            <div class="form-check form-check-inline mb-4">
              <input class="form-check-input form-check-input-primary permission" type="checkbox" id="inlineCheckbox1" value="{{ $v }}">
              <label class="form-check-label" for="inlineCheckbox1">{{ $v }}</label>
            </div>
            @endforeach


					@endforeach
            
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">狀態</label>
					<div class="col-sm-10">
						<select class="form-select" id="permission_status" aria-label="請選擇狀態">
							<option>請選擇狀態</option>
							<option value="0">停用</option>
							<option value="1" selected>啟用</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="javascript:create_admin_permission();">保存</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal modalEditAdmin -->
<div class="modal fade" id="modalEditAdminPermission" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel3">編輯後台帳號</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-2 col-form-label">帳號</label>
					<div class="col-sm-10">
						<input type="hidden" class="form-control" id="edit_permission_id" value="">
						<input type="text" class="form-control" id="edit_permission_name" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">權限</label>
					<div class="col-sm-10">
            <h2 class="h4 mb-2 text-gray-600 doc-section-title doc-anchor anchor-js">
                <span>首頁<b class="text-gray-700">Index</b></span>
            </h2>
            
            <div class="form-check form-check-inline mb-4">
              <input class="form-check-input form-check-input-primary edit_permission" type="checkbox" id="inlineCheckbox3" value="index" checked disabled>
              <label class="form-check-label" for="inlineCheckbox3">index</label>
            </div>

          @foreach ($menu as $key => $data)
            <h2 class="h4 mb-2 text-gray-600 doc-section-title doc-anchor anchor-js">
                <span>{{ $menu_lang[$key] }} <b class="text-gray-700">{{ $key }}</b></span>
            </h2>
            
            @foreach ($data as $v)
            <div class="form-check form-check-inline mb-4">
              <input class="form-check-input form-check-input-primary edit_permission" type="checkbox" id="inlineCheckbox1" value="{{ $v }}">
              <label class="form-check-label" for="inlineCheckbox1">{{ $v }}</label>
            </div>
            @endforeach


					@endforeach
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">狀態</label>
					<div class="col-sm-10">
						<select class="form-select" id="edit_permission_status" aria-label="請選擇狀態">
							<option>請選擇狀態</option>
							<option value="0">停用</option>
							<option value="1">啟用</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="javascript:edit_permission();">保存</button>
			</div>
		</div>
	</div>
</div>

@push('main_js')
<script>

  <!-- JS , set value into edit admin -->
  function set_edit_admin_permission(id) {
    
		$.post("/api/get_permission", {
			id: id,
      _token : "{{ csrf_token() }}"
		},
		function(data, status) {
			var cc = JSON.parse(data);

      if (cc.status == 1) {
        // 映設到表單
        $("#edit_permission_id").val(cc.data.id);
        $("#edit_permission_name").val(cc.data.permission_name);
        $("#edit_permission_status").val(cc.data.status);

        // 映射 ,勾選表單
        var permisson = JSON.parse(cc.data.permission_data);

        var tmp;
        $(".edit_permission").each(function(index, element) {
          if ($(this).val() != "index") {
            tmp = jQuery.inArray($(this).val(), permisson );
            if (tmp > 0) {
              $(this).attr("checked",true);
            } else {
              $(this).attr("checked",false);
            }
          }
        });

      } else {
        $.SOW.core.toast.show('danger', '', cc.message, 'top-end', 0, true);
      }
		});
  }

  <!-- ajax , edit admin -->
	function edit_permission() {

    // 取得已勾選的元件
    var tmp = [];
    $(".edit_permission").each(function(index, element) {
      if ($(this).is(':checked')) {
        tmp.push($(this).val());
      }
    });

    var str = JSON.stringify(tmp);

		$.post("/api/edit_permission", {
			id: $("#edit_permission_id").val(),
			permission_name: $("#edit_permission_name").val(),
			permission_data: str,
			status: $("#edit_permission_status").val(),
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
	function create_admin_permission() {
    
    // 取得已勾選的元件
    var tmp = [];
    $(".permission").each(function(index, element) {
      if ($(this).is(':checked')) {
        tmp.push($(this).val());
      }
    });

    var str = JSON.stringify(tmp);

		$.post("/api/create_permission", {
			permission_name: $("#permission_name").val(),
			permission_data: str,
			status: $("#permission_status").val(),
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