@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">後台操作紀錄</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">後台管理</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">後台操作紀錄</li>
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
                      <th class="small text-muted">動作</th>
                      <th class="small text-muted" style="width:200px">舊資料</th>
                      <th class="small text-muted" style="width:200px">新資料</th>
                      <th class="small text-muted">操作時間</th>
                      <th class="small text-muted" style="width:200px">狀態</th>
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
                      <td><!-- account -->
                        <span class="d-block">{{ $obj->account }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- action -->
                        <span class="d-block">{{ $obj->action }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- before_data -->
                        <div class="code-toolbar" style="max-width: 450px;">
                          <pre class="rounded language-json line-numbers">
                            <code class="language-json">
                              {{ $obj->before_data }}
                            </code>
                          </pre>
                        </div>
                      </td>
                      <td><!-- after_data -->
                        <div class="code-toolbar" style="max-width: 450px;">
                          <pre class="rounded language-json line-numbers">
                            <code class="language-json">
                              {{ $obj->after_data }}
                            </code>
                          </pre>
                        </div>
                      </td>
                      <td><!-- create_time -->
                        <span class="d-block">{{ $obj->create_time }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- status -->
                        	<span class="d-block text-success">{{ $obj->status }}</span>
                        <!-- <span class="badge bg-facebook rounded-pill"></span> -->
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

@push('main_js')
<script>

</script>
@endpush

@endsection