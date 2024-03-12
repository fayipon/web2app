@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">Lsport 語系補完工具</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">測試工具</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Lsport 語系補完工具</li>
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
                    <caption>{{ $tableName }}</caption>
                  <thead>
                    <tr>
                      <th class="small text-muted col-md-auto">ID</th>
                      @foreach ($tableCols as $ck => $col)
                      <th class="small text-muted col-sm-auto">{{ $col }}</th>
					  @endforeach
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
				   @foreach ($tableRows as $rk => $row)
                   <!-- item -->
				   <tr>
                      <td class="position-relative"><!-- order -->
                        <input type="checkbox" class="select-checkbox" data-id="{{ $row->id }}" />
                        <a class="link-normal fw-medium stretched-link d-block">{{ $row->id }}</a>
                      </td>

                      @foreach ($tableCols as $ck => $col)
                      <td class="col-sm-1">
                        <span class="text-muted smaller">{{ $row->$col }}</span>
                        <span class="d-block text-muted smaller">
                            <input style="width:100%" type="text" data-id="{{ $row->id }}" data-field="{{ $col }}" value="{{ $row->$col }}" />
                        </span>
                      </td>
					  @endforeach

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
                  {{ $tableRows->withQueryString()->links("layout.pagination") }}

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

@push('main_js')

<script type="text/javascript">
// 查询数据
function searchData() {
    const keyword = document.getElementById("search").value;
    $.post("backend.php", { action: "search", keyword: keyword }, function(data) {
        displayData(data);
    });
}

// 显示数据在表格中
function displayData(data) {
    const tableBody = document.getElementById("table-body");
    tableBody.innerHTML = "";

    data.forEach(row => {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>
                <input type="checkbox" class="select-checkbox" data-id="${row.id}" />
                <a class="link-normal fw-medium stretched-link d-block">${row.id}</a>
            </td>
            <td>${row.id}</td>
            <td><input type="text" class="edit-input" data-id="${row.id}" data-field="name" value="${row.name}" /></td>
            <td><input type="text" class="edit-input" data-id="${row.id}" data-field="age" value="${row.age}" /></td>
            <td><input type="text" class="edit-input" data-id="${row.id}" data-field="email" value="${row.email}" /></td>
        `;
        tableBody.appendChild(newRow);
    });
}

// 删除所选数据
function deleteSelected() {
    const selectedIds = [];
    $(".select-checkbox:checked").each(function() {
        selectedIds.push($(this).data("id"));
    });

    if (selectedIds.length > 0) {
        $.post("backend.php", { action: "delete", ids: selectedIds }, function() {
            searchData(); // 刷新数据
        });
    }
}

// 保存所选数据
function updateSelected() {
    const updates = [];
    $(".edit-input").each(function() {
        const id = $(this).data("id");
        const field = $(this).data("field");
        const value = $(this).val();
        updates.push({ id, [field]: value });
    });

    if (updates.length > 0) {
        $.post("backend.php", { action: "update", updates }, function() {
            searchData(); // 刷新数据
        });
    }
}

</script>
@endpush

@endsection