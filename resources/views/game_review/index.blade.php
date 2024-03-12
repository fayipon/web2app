@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">審單管理</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="#">運營體育</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">審單管理</li>
                  </ol>
                </nav>

              </div>

              <div class="col-auto">
                <a href="#!" role="button" class="btn btn-sm btn-primary d-inline-flex align-items-center">
                  <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                  </svg>
                  <span class="d-none d-sm-inline-block ps-2">Product</span>
                </a>
              </div>
            </div>

          </header>


          <div class="section p-0">
            <div class="card-header p-4">

              <div class="row g-3">

                <!-- product filter -->
                <div class="order-2 order-md-1 col">
                  <form method="get" class="position-relative d-flex align-items-center">

                    <!-- search icon -->
                    <svg class="z-index-1 position-absolute start-0 ms-3 text-primary" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="11" cy="11" r="8"></circle>
                      <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>

                    <div class="dropdown w-100">
                      <input type="text" class="form-control form-control-sm border-0 shadow-none ps-5 bg-gray-100" placeholder="Product title / SKU">
                      
                    </div>

                  </form>
                </div>

                <!-- options -->
                <div class="order-1 order-md-2 col-md-auto">
                  <div class="btn-group w-100" role="group" aria-label="Product options">
                    <a href="#!" role="button" class="btn btn-sm small btn-secondary">搜尋</a>
                  </div>
                </div>

              </div>

              <!-- active filters -->
              <ul class="list-inline mt-2 mb-0">
                <li class="list-inline-item me-1">
                  <a href="#!" class="badge bg-primary text-white text-decoration-none d-inline-grid gap-auto-1">
                    <svg width="18px" height="18px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                    <span>Filters:</span>
                  </a>
                </li>
                <li class="list-inline-item me-1">
                  <a href="#!" class="badge bg-light link-muted d-inline-grid gap-auto-1">
                    <svg width="18px" height="18px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                    <span class="text-muted">Cash on delivery</span>
                  </a>
                </li>
                <li class="list-inline-item me-1">
                  <a href="#!" class="badge bg-light link-muted d-inline-grid gap-auto-1">
                    <svg width="18px" height="18px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                    <span class="text-muted">Canceled</span>
                  </a>
                </li>
              </ul> 

            </div>

            <div class="card-body pt-1">
              
              <!-- item list -->
              <div class="table-responsive-md">

                <table class="table table-align-middle" role="grid" aria-describedby="mobile-page-info">
                  <thead>
                    <tr>
                      <th class="small text-muted">注單</th>
                      <th class="small text-muted">玩家</th>
                      <th class="small text-muted">賽事</th>
                      <th class="small text-muted">投注內容</th>
                      <th class="small text-muted" style="width:150px">
                        <a href="#!" class="d-flex link-muted" title="order by price" aria-label="order by inventory">
                          <span class="d-flex flex-column lh-1">
                            <svg class="lh-1 text-primary" width="13px" height="13px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                            </svg>

                            <svg class="lh-1 mt-n1 text-muted" width="13px" height="13px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                          </span>
                          <span class="ms-2">投注金額</span>
                        </a>
                      </th>
                      <th class="small text-muted">預計中獎金額</th>
                      <th class="small text-muted" style="width:200px">
                        <a href="#!" class="d-flex link-muted" title="order by inventory" aria-label="order by inventory">
                          <span class="d-flex flex-column lh-1">
                            <svg class="lh-1 text-primary" width="13px" height="13px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                            </svg>

                            <svg class="lh-1 mt-n1 text-muted" width="13px" height="13px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                          </span>
                          <span class="ms-2">時間</span>
                        </a>
                      </th>
                      <th class="small text-muted" style="width:200px">狀態</th>
                      <th class="small text-muted" style="width:64px"><!-- options --></th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    
					@foreach ($data as $order)
                   <!-- item -->
				   <tr>
                      <td class="position-relative"><!-- order -->
                        <a href="#!" class="link-normal fw-medium stretched-link d-block">#{{ $order->id }}</a>
                        <span class="d-block smaller text-muted">
                          
                        </span>
                      </td>
                      <td><!-- player -->
                        <span class="d-block text-success">{{ $order->player }} (#{{ $order->player_id }})</span>
                        <span class="d-block text-muted smaller">商戶 : {{ $order->agent }} (#{{ $order->agent_id }})</span>
                      </td>
                      <td><!-- match -->
                        <span class="d-block text-success"> {{ $order->home }} VS {{ $order->away }} </span>
                        <span class="d-block text-muted smaller">{{ $order->comp }} #{{ $order->match_id }}</span>
                      </td>
                      <td><!-- rate -->
                        <span class="d-block text-success">{{ $order->rate }}</span>
                        <span class="d-block text-muted smaller">{{ $order->type_id }}</span>
                      </td>
                      <td><!-- price -->
                        <span class="d-block text-success text-end">${{ $order->bet_amount }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- result -->
                        <span class="d-block text-success text-end">${{ $order->bet_result }}</span>
                        <span class="d-block text-muted smaller"></span>
                      </td>
                      <td><!-- date -->
                        <span class="d-block text-muted small">{{ $order->create_time }}</span>
                        <span class="d-block text-muted small">26 days ago</span>
                      </td>
                      <td><!-- status -->
                        <span class="d-block text-danger">{{ $order->status }}</span>
                        <span class="badge bg-secondary rounded-pill">cash on delivery</span>
                      </td>
                      <td class="dropstart"><!-- options -->
						<div class="tab-pane" style="width:100px;">
							<button type="button" class="btn btn-sm rounded-circle btn-success mb-2">
							<i class="fi fi-check"></i>
							</button>

							<button type="button" class="btn btn-sm rounded-circle btn-danger mb-2">
							<i class="fi fi-close"></i>
							</button>
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
                  
                  <!-- selected items -->
                  <div class="dropup">
                    <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" id="ddSelected" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="0,0">
                      <span class="group-icon">
                        <svg height="18px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                      </span>
                      <span>Selected items</span>
                    </a>

                    <ul class="dropdown-menu shadow-lg p-3 my-2" aria-labelledby="ddSelected">
                      <li class="small px-3 py-2 text-muted">Set order</li>
                      <li>
                        <a class="dropdown-item" href="#!">
                          <svg class="text-muted" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                          <span>Completed</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">
                          <svg class="text-muted" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                          </svg>
                          <span>Canceled</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">
                          <svg class="text-muted" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                          </svg>
                          <span>Declined</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">
                          <svg class="text-muted" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                          </svg>
                          <span>Refunded</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">
                          <svg class="text-muted" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                          </svg>
                          <span class="w-100">Archive</span>
                        </a>
                      </li>
                    </ul>

                  </div>

                </div>

                <div class="col-md-auto py-3">

                  <!-- pagination -->
                  <nav class="w-100 text-center" aria-label="Pagination">
               
                    <!-- pagination : desktop -->
                    <nav class="text-center float-md-end mt-3 mt-md-0 d-none d-md-flex" aria-label="Pagination">
                      <ul class="nav nav-sm nav-invert">
                        <li class="nav-item">
                          <a class="nav-link px-3 px-3 disabled" href="#" tabindex="-1">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="nav-item"><a class="nav-link px-3" href="#">1</a></li>
                        <li class="nav-item" aria-current="page">
                          <a class="nav-link px-3 px-3 active" href="#">2</a>
                        </li>
                        <li class="nav-item"><a class="nav-link px-3" href="#">3</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#">4</a></li>
                        <li class="nav-item">
                          <a class="nav-link px-3 px-3" href="#">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav>

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

@endsection