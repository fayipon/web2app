@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">商戶報表</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">商戶管理</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">商戶報表</li>
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
                      <th class="small text-muted">商戶</th>
                      <th class="small text-muted">前綴</th>
                      <th class="small text-muted">商戶類型</th>
                      <th class="small text-muted text-end">當前餘額</th>
                      <th class="small text-muted text-end">會員數</th>
                      <th class="small text-muted text-end">總注數</th>
                      <th class="small text-muted text-end">總投注</th>
                      <th class="small text-muted text-end">有效投注</th>
                      <th class="small text-muted text-end">總派獎</th>
                      <th class="small text-muted text-end">總輸贏</th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
					@foreach ($data as $report)
                   <!-- item -->
				            <tr>
                      <td>
                        <span class="d-block">{{ $report['account'] }}</span>
                        <span class="d-block text-muted smaller">{{ $report['email'] }}</span>
                      </td>
                      <td>
                        <span class="d-block">{{ $report['prefix'] }}</span>
                        <span class="d-block text-muted smaller">&nbsp;</span>
                      </td>
                      <td>
                        <span class="d-block">{{ $report['merchant_type'] }}</span>
                        <span class="d-block text-muted smaller">{{ $report['currency_type'] }}</span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ $report['balance'] }}</span>
                        <span class="d-block text-muted smaller">&nbsp;</span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ $report['players_count'] }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ $report['record_count'] }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ round($report['total_bet_amount'],2) }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ round($report['total_active_bet'],2) }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ round($report['total_result_amount'],2) }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ round(($report['total_bet_amount']-$report['total_result_amount']),2) }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                    </tr>
                    <!-- end item -->
					@endforeach
                    <!-- total -->
                    <tr style="background-color: #f1f1f1;">
                      <td>
                        <span class="d-block"></span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block"></span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block"></span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block"></span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ $total['players_count'] }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ $total['record_count'] }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ round($total['total_bet_amount'],2) }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ round($total['total_active_bet'],2) }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ round($total['total_result_amount'],2) }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td>
                        <span class="d-block text-end">{{ round(($total['total_bet_amount']-$total['total_result_amount']),2) }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                    </tr>

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