@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">體育注單</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">體育運營</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">體育注單</li>
                  </ol>
                </nav>
              </div>

              <div class="col-auto">
                <a href="javascript:;" role="button" class="btn btn-sm btn-primary d-inline-flex align-items-center">
					<svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
						<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"></path>
						<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
					</svg>
                	<span class="d-none d-sm-inline-block ps-2" data-bs-toggle="modal" data-bs-target="#modalCreateAgent">導出</span>
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
                    <div class="dropdown p-1 w-20">
                      <select name="sport_id" class="form-control form-control-sm border-0 shadow-none bg-gray-300">
						<option value> 所有球類 </option>
						@foreach ($game_list as $list)
							@if ($search['sport_id'] == $list['sport_id'])
							<option value="{{ $list['sport_id'] }}" selected> {{ $list['name'] }}</option>
							@else
							<option value="{{ $list['sport_id'] }}"> {{ $list['name'] }}</option>
							@endif
						@endforeach
					  </select>
                    </div>
					

                    <!-- search icon -->

                    <div class="dropdown p-1 w-20">
                      <input type="text" name="player_name" class="form-control form-control-sm border-0 shadow-none bg-gray-300" value="{{ $search['player_name'] ?? '' }}" placeholder="玩家名稱">
                    </div>
					
                    <!-- search icon -->
                    <div class="dropdown p-1 w-20">
                      <input type="text" name="agent_name" class="form-control form-control-sm border-0 shadow-none bg-gray-300" value="{{ $search['agent_name'] ?? '' }}" placeholder="商戶名稱">
                    </div>
					
                    <!-- search icon -->
                    <div class="dropdown p-1 w-20">
                      <input type="text" name="m_id" class="form-control form-control-sm border-0 shadow-none bg-gray-300" value="{{ $search['m_id'] ?? '' }}" placeholder="注單id">
                    </div>
					
                    <!-- search icon -->
                    <div class="dropdown p-1 w-20">
                      <input type="text" name="league_name" class="form-control form-control-sm border-0 shadow-none bg-gray-300" value="{{ $search['league_name'] ?? '' }}" placeholder="聯賽名稱">
                    </div>

                    <!-- search icon -->
                    <div class="dropdown p-1 w-20">
                      <select name="result" class="form-control form-control-sm border-0 shadow-none bg-gray-300">
						@if ($search['result'] == -1)
						<option value="-1" selected> 結算狀態 </option>
						@else 
						<option value="-1"> 所有注單 </option>
						@endif
						@if ($search['result'] == 0)
						<option value="0" selected> 未結算 </option>
						@else 
						<option value="0"> 未結算 </option>
						@endif
						@if ($search['result'] == 1)
						<option value="1" selected> 已結算 </option>
						@else 
						<option value="1"> 已結算 </option>
						@endif
					  </select>
					</div>

                  </form>
                </div>

                <!-- options -->
                <div class="order-1 order-md-2 col-md-auto">
                  <div class="btn-group p-1 w-100" role="group" aria-label="Product options">
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
                      <th class="small text-muted">用戶</th>
                      <th class="small text-muted">體育種類</th>
                      <th class="small text-muted">賽事</th>
                      <th class="small text-muted">玩法</th>
                      <th class="small text-muted text-end">投注</th>
                      <th class="small text-muted text-end">有效</th>
                      <th class="small text-muted text-end">派獎</th>
                      <th class="small text-muted">狀態</th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
					@foreach ($lists['list'] as $order)
                   	<!-- item -->
				   	<tr key="{{ $order['m_id'] }}" isopen=0>
						<!-- order -->
						<td class="position-relative">
							<a class="link-normal fw-medium stretched-link d-block">#{{ $order['m_id'] }}</a>
							<span class="d-block smaller text-muted">
							</span>
						</td>
						<td class="position-relative">
							<a class="link-normal fw-medium stretched-link d-block">{{ $order['bet_data'][0]['player_name'] }}</a>
							<span class="d-block smaller text-muted">{{ $order['bet_data'][0]['agent_name'] }}</span>
						</td>
						<!-- 體育種類 -->
						<td onclick="openOrder({{ $order['m_id'] }})" class="openOrderTd">
							@if( $order['m_order'] == 1 ) 
								<span class="d-block">
									串關 {{ count($order['bet_data']) }}串1
									<i class="fi fi-arrow-right-full"></i>
									<i class="fi fi-arrow-down-full"></i>
								</span>
							@else
								<span class="d-block">體育投注</span>
							@endif
							@foreach ($game_list as $game)
								@if ($game['sport_id'] == $order['bet_data'][0]['sport_id'])
									<span class="d-block smaller text-muted">{{ $game['name'] }}</span>
									@break
								@endif
							@endforeach
						</td>
						<!-- first row -->
						<!-- 賽事 -->
						<td class="p-0">
							@foreach ($order['bet_data'] as $index => $bet)
								<div class="toggleDiv" key='{{ $index }}'>
									<span class="d-block">{{ $bet['league_name'] }}
										<span class="smaller" style="color: #808080">{{ $bet['start_time'] }}</span>
									</span>
									<span class="d-block">
										{{ $bet['home_team_name'] }}
										<span style="color: green">[主]</span>
										VS
										{{ $bet['away_team_name'] }}
										@if( $bet['home_team_score'] !== null && $bet['away_team_score'] !== null )
											<span style="color: red">({{ $bet['home_team_score'] }}-{{ $bet['away_team_score'] }})</span>
										@endif
									</span>
								</div>
							@endforeach
						</td>
						<!-- 玩法 -->
						<td class="p-0">
							@foreach ($order['bet_data'] as $index => $bet)
								<div class="toggleDiv" key='{{ $index }}'>
									<span class="d-block">{{ $bet['market_type'] == 1 ? '滾球' : '早盤' }}-{{ $bet['market_name'] }}</span>
									<span class="d-block">{{ $bet['market_bet_name'] }}{{ $bet['market_bet_line'] }}@
										<span style="color: #c79e42;">{{ $bet['player_rate'] }}</span>
									</span>
								</div>
							@endforeach
						</td>
						<td><!-- 下注 -->
							<span class="d-block text-end">{{ $order['bet_amount'] }}</span>
							<span class="d-block text-end smaller">{{ $order['create_time'] }}</span>
						</td>
						<td><!-- 有效 -->
							<span class="d-block text-end">{{ $order['active_bet'] }}</span>
						</td>
						<td><!-- 派彩 -->
							<span class="d-block text-end">{{ $order['result_amount'] ?? '-' }}</span>
							<span class="d-block text-end smaller">{{ $order['result_time'] }}</span>
						</td>
						<td><!-- 狀態 -->
							@switch($order['status'])
								@case(0)
									<span class="d-block text-danger">取消</span>
									@break
								@case(1)
									<span class="d-block" style="color:#9424e4;">等待成立</span>
									@break
								@case(2)
									<span class="d-block" style="color:#3b5998;">等待開獎</span>
									@break
								@case(3)
									<span class="d-block" style="color:#ad7c24;">等待派獎</span>
									@break
								@case(4)
									<span class="d-block text-success">已派獎</span>
									@break
								@case(5)
									<span class="d-block" style="color:#9424e4;">等待審核</span>
									@break
							@endswitch
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
                  {{ $data->withQueryString()->links("layout.pagination") }}

                </div>

                <div class="col-md-auto py-3">

                  <!-- pagination -->
                  <nav class="w-100 text-center" aria-label="Pagination">

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

		
@push('styles')
<style>
	.openOrderTd:hover {
		color: #574fec;
		cursor: pointer;
	}

	#checkall-list td {
		vertical-align: top;
	}

	tr[isopen='0'] .fi-arrow-down-full,
	tr[isopen='1'] .fi-arrow-right-full {
		display: none;
	}

	tr[isopen='0'] .toggleDiv:not([key='0']) {
		display: none;
	}
	tr[isopen='1'] .toggleDiv:not([key='0']) {
		border-top: 1px solid #eaf0f5;
	}

	.toggleDiv {
		padding: 0.5rem;
	}

	tr[isopen='1'] .toggleDiv {
		display: block!important;
	}



</style>
@endpush

@push('main_js')
<script>

	// 收合
	function openOrder( id ) {
		let tr = $(`tr[key=${id}]`)
		let isopen = tr.attr('isopen')
		tr.attr('isopen', isopen == 1 ? 0 : 1)
	}

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