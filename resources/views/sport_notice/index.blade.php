@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">公告管理</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">體育運營</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">公告管理</li>
                  </ol>
                </nav>

              </div>
            </div>
          </header>

          <div class="section p-0">

            <div class="card-body pt-1">
              
              <!-- item list -->
              <div class="table-responsive-md">

                <table class="table table-align-middle" role="grid" aria-describedby="mobile-page-info">
                  <thead>
                    <tr>
                      <th class="small text-muted">id</th>
                      <th class="small text-muted">標題</th>
                      <th class="small text-muted">內文</th>
                      <th class="small text-muted">創建時間</th>
                      <th class="small text-muted">狀態</th>
                      <th class="small text-muted">功能</th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
				  	@foreach ($data as $item)
                   <!-- item -->
				   <tr>
                      <td><!-- id -->
                        <span class="d-block">#{{ $item->id }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- title -->
                        <span class="d-block">{{ $item->title }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- marquee -->
                        <span class="d-block text-truncate w-400">{{ $item->marquee }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- create_time -->
                        <span class="d-block">{{ $item->create_time }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- status -->
                        <span class="d-block">{{ $item->status ? '啟用' : '停用'  }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td class="dropstart"><!-- options -->
						<div class="tab-pane" style="width:150px;">
						<a onclick="set_edit_notice({{ $item->id }});" class="btn btn-sm btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalEditNotice">編輯</a>
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

<!-- Modal modalEditNotice -->
<div class="modal fade" id="modalEditNotice" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel3">編輯公告</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

      <div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">標題</label>
					<div class="col-sm-9">
						<input type="hidden" class="form-control" id="edit_notice_id" value="">
						<input type="text" class="form-control" id="edit_notice_title" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">內文</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="edit_notice_marquee" rows="3"></textarea>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="staticEmail2" class="col-sm-3 col-form-label">排序</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="edit_notice_order_by" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-3 col-form-label">狀態</label>
					<div class="col-sm-9">
						<select class="form-select" id="edit_notice_status" aria-label="請選擇狀態">
							<option>請選擇狀態</option>
							<option value="0">停用</option>
							<option value="1" selected>啟用</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="javascript:edit_notice();">保存</button>
			</div>
		</div>
	</div>
</div>


@push('main_js')
<script>

  <!-- JS , set value into edit admin -->
  function set_edit_notice(id) {
    
		$.post("/api/get_notice", {
			id: id,
      		_token : "{{ csrf_token() }}"
		},
		function(data, status) {
			var cc = JSON.parse(data);

      if (cc.status == 1) {
        // 映設到表單
        $("#edit_notice_id").val(cc.data.id);
        $("#edit_notice_title").val(cc.data.title);
        $("#edit_notice_marquee").val(cc.data.marquee);
        $("#edit_notice_order_by").val(cc.data.order_by);
        $("#edit_notice_status").val(cc.data.status);
        $("#edit_notice_create_time").val(cc.data.create_time);
        
      } else {
        $.SOW.core.toast.show('danger', '', cc.message, 'top-end', 0, true);
      }
		});
  }

  <!-- ajax , edit_notice -->
	function edit_notice() {
		
		$.post("/api/edit_notice", {
			id: $("#edit_notice_id").val(),
			title: $("#edit_notice_title").val(),
			marquee: $("#edit_notice_marquee").val(),
			order_by: $("#edit_notice_order_by").val(),
			status: $("#edit_notice_status").val(),
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