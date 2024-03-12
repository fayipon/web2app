@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">風控大單</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">體育運營</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">風控大單</li>
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
                    <div class="dropdown p-1 w-20">
                      <select name="refresh" class="form-control form-control-sm border-0 shadow-none bg-gray-300">
						@if ($search['refresh'] == 1)
						<option> 30秒更新 </option>
						<option value="1" selected> 5秒更新</option>
						@else
						<option selected> 30秒更新 </option>
						<option value="1"> 5秒更新</option>
						@endif
					  </select>
                    </div>
					
                  </form>
                </div>

                <!-- options -->
                <div class="order-1 order-md-2 col-md-auto">
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
                      <th class="small text-muted text-end">投注</th>
                      <th class="small text-muted">賽事</th>
                      <th class="small text-muted">玩法</th>
                      <th class="small text-muted text-end">玩家賠率</th>
                      <th class="small text-muted text-end">當前賠率</th>
                      <th class="small text-muted">操作</th>
                    </tr>
                  </thead>
                  
                  <tbody id="checkall-list">
					@foreach ($lists['list'] as $order)
                   	<!-- item -->
					<tr key="{{ $order['m_id'] }}" isopen="{{ isset($search['o']) && ($search['o'] == $order['m_id']) ? 1 : 0 }}">
						<!-- order -->
						<td class="position-relative">
							<a class="link-normal fw-medium stretched-link d-block">#{{ $order['m_id'] }}</a>
							<span class="d-block smaller text-muted">
							</span>
						</td>
						<td class="position-relative">
							<a class="link-normal fw-medium stretched-link d-block">{{ $order['bet_data'][0]['player_name'] ?? "" }}</a>
							<span class="d-block smaller text-muted">{{ $order['bet_data'][0]['agent_name'] ?? ""  }}</span>
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
						<td><!-- 下注 -->
							<span class="d-block text-end">{{ $order['bet_amount'] }}</span>
							<span class="d-block text-end smaller">{{ $order['create_time'] }}</span>
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
									<span class="d-block">{{ $bet['market_type'] == 1 ? '滾球' : '早盤' }} - {{ $bet['market_name'] }}</span>
									<span class="d-block">{{ $bet['market_bet_name'] }}{{ $bet['market_bet_line'] }}@
										<span style="color: #c79e42;">{{ $bet['player_rate'] }}</span>
									</span>
								</div>
							@endforeach
						</td>
						<td class="p-0"><!-- 玩家賠率 -->
							@foreach ($order['bet_data'] as $index => $bet)
								<div class="toggleDiv" key='{{ $index }}'>
									<span class="d-block text-end">{{ $bet['player_rate'] }}</span>
							    <span class="d-block">&nbsp;</span>
								</div>
							@endforeach
						</td>
						<td class="p-0"><!-- 當前賠率 -->
							@foreach ($order['bet_data'] as $index => $bet)
								<div class="toggleDiv" key='{{ $index }}'>
									<span class="d-block text-end">{{ $bet['bet_rate'] ?? '-' }}</span>
							    <span class="d-block">&nbsp;</span>
								</div>
							@endforeach
						</td>
            <td>
							<a href="/sport/riskorder/cancel?m_id={{ $order['m_id'] }}&{{ $query }}" class="btn btn-sm btn-danger mb-2">拒單</a>
              <a href="/sport/riskorder/approval?m_id={{ $order['m_id'] }}&{{ $query }}" class="btn btn-sm btn-success mb-2">通過</a>

            </td>
						</tr>
						<!-- end item -->
						@endforeach

					</tbody>
          
                </table>

              </div>

            </div>
          </div>


        </main>
        <!-- /main -->

<audio id="myAudio" control preload="auto">
    <source src="/sound/001.mp3" type="audio/mp3">
    Your browser does not support the audio element.
</audio>

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
	// 收合(一次只能打開一筆)
	function openOrder( id ) {
		let tr = $(`tr[key=${id}]`)
		let isopen = tr.attr('isopen') // 原本狀態 0關 1開
		if( isopen == 0 ) {
			$(`tr:not([key=${id}])`).attr('isopen', 0)
			history.replaceState(null, null, `?o=${id}`);
		} else {
			history.replaceState(null, null, window.location.pathname);
		}
		tr.attr('isopen', isopen == 1 ? 0 : 1)
	}
</script>
@endpush

@if ($refresh == 0)
	<script>
    var audio = document.getElementById("myAudio");

    setTimeout(function() {
        audio.play();
    }, 1000);
	
    audio.addEventListener("ended", function() {
		setTimeout(function() {
			audio.play();
		}, 1000);
    });

	// 30秒後刷新
    setTimeout(function() {
        location.reload();
    }, 10000);

	</script>
@endif

@if ($refresh == 1)
	<script>
		
    setTimeout(function() {
        location.reload();
    }, 5000);
	</script>
@endif

@endsection