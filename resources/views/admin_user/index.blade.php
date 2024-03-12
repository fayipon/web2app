@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">後台帳號</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">後台管理</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">後台帳號</li>
                  </ol>
                </nav>

              </div>

              <div class="col-auto">
                <a href="#!" role="button" class="btn btn-sm btn-primary d-inline-flex align-items-center">
                  <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                  </svg>
                  <span class="d-none d-sm-inline-block ps-2" data-bs-toggle="modal" data-bs-target="#modalCreateAdmin">後台帳號</span>
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
                      <th class="small text-muted">權限</th>
                      <th class="small text-muted">創建時間</th>
                      <th class="small text-muted" style="width:200px">狀態</th>
                      <th class="small text-muted" style="width:64px"><!-- options --></th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
					@foreach ($data as $admin)
                   <!-- item -->
				   <tr>
                      <td class="position-relative"><!-- order -->
                        <a href="#!" class="link-normal fw-medium stretched-link d-block">#{{ $admin->id }}</a>
                        <span class="d-block smaller text-muted">
                        </span>
                      </td>
                      <td><!-- account -->
                        <span class="d-block">{{ $admin->account }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- permission -->
                        <span class="d-block text-success">{{ $admin->permission }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- create_time -->
                        <span class="d-block">{{ $admin->create_time }}</span>
                        <span class="d-block text-muted smaller">最後登入：{{ $admin->last_login }}</span>
                      </td>
                      <td><!-- status -->
      					@if($admin->status == 1)
                        	<span class="d-block text-success">{{ $admin->status_name }}</span>
						    @else
                        	<span class="d-block text-danger">{{ $admin->status_name }}</span>
						    @endif
                        <span class="badge bg-facebook rounded-pill">登入中</span>
                      </td>
                      <td class="dropstart"><!-- options -->
						<div class="tab-pane" style="width:150px;">
      					@if($admin->status == 1)
							<a href="/api/active_admin?id={{ $admin->id }}" class="btn btn-sm btn-danger mb-2">停用</a>
						@else
            <a href="/api/active_admin?id={{ $admin->id }}" class="btn btn-sm btn-success mb-2">啟用</a>
						@endif
							<a onclick="set_edit_admin({{ $admin->id }});" class="btn btn-sm btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalEditAdmin">編輯</a>
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

		
<!-- Modal modalCreateAdmin -->
<div class="modal fade" id="modalCreateAdmin" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel3">創建後台帳號</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-2 col-form-label">帳號</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="admin_account" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">密碼</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="admin_password">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">權限</label>
					<div class="col-sm-10">
						<select class="form-select" id="admin_permission" aria-label="請選擇權限">
							<option selected>請選擇權限</option>
						@foreach ($permission_data as $data)
							<option value="{{ $data->id }}">{{ $data->permission_name }}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">狀態</label>
					<div class="col-sm-10">
						<select class="form-select" id="admin_status" aria-label="請選擇狀態">
							<option>請選擇狀態</option>
							<option value="0">停用</option>
							<option value="1" selected>啟用</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="javascript:create_admin();">保存</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal modalEditAdmin -->
<div class="modal fade" id="modalEditAdmin" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
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
						<input type="hidden" class="form-control" id="edit_admin_id" value="">
						<input type="text" class="form-control" id="edit_admin_account" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">權限</label>
					<div class="col-sm-10">
						<select class="form-select" id="edit_admin_permission" aria-label="請選擇權限">
							<option selected>請選擇權限</option>
						@foreach ($permission_data as $data)
							<option value="{{ $data->id }}">{{ $data->permission_name }}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">狀態</label>
					<div class="col-sm-10">
						<select class="form-select" id="edit_admin_status" aria-label="請選擇狀態">
							<option>請選擇狀態</option>
							<option value="0">停用</option>
							<option value="1" selected>啟用</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="javascript:edit_admin();">保存</button>
			</div>
		</div>
	</div>
</div>

@push('main_js')
<script>

  <!-- JS , set value into edit admin -->
  function set_edit_admin(id) {
    
		$.post("/api/get_admin", {
			id: id,
      _token : "{{ csrf_token() }}"
		},
		function(data, status) {
			var cc = JSON.parse(data);

      if (cc.status == 1) {
        // 映設到表單
        $("#edit_admin_id").val(cc.data.id);
        $("#edit_admin_account").val(cc.data.account);
        $("#edit_admin_permission").val(cc.data.permission_id);
        $("#edit_admin_status").val(cc.data.status);
      } else {
        $.SOW.core.toast.show('danger', '', cc.message, 'top-end', 0, true);
      }
		});
  }

  <!-- ajax , edit admin -->
	function edit_admin() {
		$.post("/api/edit_admin", {
			id: $("#edit_admin_id").val(),
			account: $("#edit_admin_account").val(),
			permission: $("#edit_admin_permission").val(),
			status: $("#edit_admin_status").val(),
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
	function create_admin() {

		var account = $("#admin_account").val();
		var password = $("#admin_password").val();
		var permission = $("#admin_permission").val();
		var status = $("#admin_status").val();

		$.post("/api/create_admin", {
			account: account,
			password: password,
			permission: permission,
			status: status,
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