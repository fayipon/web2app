@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">系統參數</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">後台管理</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">系統參數</li>
                  </ol>
                </nav>

              </div>

              <div class="col-auto">
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
                      <th class="small text-muted">ID</th>
                      <th class="small text-muted">名稱</th>
                      <th class="small text-muted">參數</th>
                      <th class="small text-muted">設定值</th>
                      <th class="small text-muted" style="width:200px">狀態</th>
                      <th class="small text-muted" style="width:64px"><!-- options --></th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
					@foreach ($data as $config)
                   <!-- item -->
				   <tr>
                      <td class="position-relative"><!-- order -->
                        <a href="#!" class="link-normal fw-medium stretched-link d-block">#{{ $config->id }}</a>
                        <span class="d-block smaller text-muted">
                        </span>
                      </td>
                      <td><!-- account -->
                        <span class="d-block">{{ $config->title }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- permission -->
                        <span class="d-block text-success">{{ $config->name }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- create_time -->
                        <span class="d-block">{{ $config->value }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- status -->
                        <span class="d-block text-success">{{ $config->status_name }}</span>
                        <span class="badge bg-facebook rounded-pill"></span>
                      </td>
                      <td class="dropstart"><!-- options -->
                        <div class="tab-pane" style="width:150px;">
                            
                        @if ($config->name == "version")
                          <a href="/api/increase_version" class="btn btn-sm btn-danger mb-2">自增版本號</a>
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