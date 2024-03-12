@extends('layout.app')

@section('content')


        <!-- main -->
        <main id="middle" class="flex-fill mx-auto">


          <!-- PAGE TITLE -->

          <header>
            
            <div class="row g-1 align-items-center">
              <div class="col">

                <h1 class="h4">監盤工具</h1>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb small" style="font-size:0.875em !important;">
                    <li class="breadcrumb-item"><a href="/">首頁</a></li>
                    <li class="breadcrumb-item"><a href="/">測試工具</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">監盤工具</li>
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

                  <div class="dropdown w-25">
                    <select name="game_id" class="form-select">
                        @foreach ($game_list as $key => $value)
                        @if (isset($search['game_id']) && $key == $search['game_id'])
                        <option value="{{ $key }}" selected>{{$value}}</option>
                        @else
                        <option value="{{ $key }}">{{$value}}</option>
                        @endif
                        @endforeach
                    </select>
                  </div>

                  <div class="dropdown w-25">
                    <select name="series_id" class="form-select">
                        <option value>請選擇聯賽</option>
                        @foreach ($series_list as $key => $value)
                          @if (isset($search['series_id']) && $key == $search['series_id'])
                          <option value="{{ $key }}" selected>{{$value}}</option>
                          @else
                          <option value="{{ $key }}">{{$value}}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>
                  
                  <div class="dropdown w-25">
                    <select name="match_id" class="form-select">
                        <option value>請選擇賽事</option>
                        @foreach ($match_list as $key => $value)
                          @if (isset($search['match_id']) && $value['match_id'] == $search['match_id'])
                          <option value="{{ $value['match_id'] }}" selected>{{ $value['home_team_name'] }} VS {{ $value['away_team_name'] }}</option>
                          @else
                          <option value="{{ $value['match_id'] }}">{{ $value['home_team_name'] }} VS {{ $value['away_team_name'] }}</option>
                          @endif
                        @endforeach
                    </select>
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
            @if (empty($match_data))
            <div class="card-body pt-1">
              1. 選擇球類 , 按選擇<br>
              2. 選擇聯賽 , 按選擇<br>
              3. 選擇賽事 , 按選擇<br><br>
              賽事僅能選擇進行中的賽事
            </div>
            @else
            <div class="card-body pt-1">
              <h4>{{ $match_data['series_name'] }} (#{{$match_data['match_id']}})</h4>
              <h4><span class="text-danger">[主]{{ $match_data['home_team_name'] }}</span> {{ $match_data['home_team_score'] }} 對 <span class="text-primary">[客]{{ $match_data['away_team_name'] }}</span> {{ $match_data['away_team_score'] }}</h4>
            </div>
            @endif

            <div class="card-body pt-1 row">
              
            @if (empty($rate_data))
            <div class="table-responsive-md col-md-6">
              無資料
            </div>
            @else
              <!-- rate list -->
              <div class="table-responsive-md col-md-6">

                <table class="table table-align-middle" role="grid" aria-describedby="mobile-page-info">
                  <thead>
                    <tr>
                      <th class="small text-muted">玩法</th>
                      <th class="small text-muted">投注項</th>
                      <th class="small text-muted">狀態</th>
                      <th class="small text-muted">更新時間</th>
                    </tr>
                  </thead>
                  <tbody id="checkall-list">
                    @foreach ($rate_data as $rate)
                    <tr>
                      <td> {{ $rate['name_tw'] }}</td>
                      <td>
                        @foreach ($rate['rate_item'] as $item)
                            <h6>
                              {{ $item['name_cn'] }} @ {{ $item['rate'] }}
                            </h6>
                        @endforeach
                      </td>
                      <td>{{ $rate['status'] }}</td>
                      <td>{{ $rate['updated_at'] }}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>

              </div>
            @endif
              <!-- logs list -->
              <div class="table-responsive-md col-md-6">
                <textarea id="log_list" class="form-control" rows="10" style="background-color: #000000;color: #9eb5a1;height: 450px;"></textarea>
              </div>
            </div>
          </div>


        </main>
        <!-- /main -->

	
@push('main_js')
<script>

@if (empty($logs_data))
@else
  var logs_data = @json($logs_data);

  populateTextarea();
@endif 

function populateTextarea() {
    var log_list = document.getElementById("log_list");
    log_list.value = logs_data.join("\n");
    log_list.scrollTop = log_list.scrollHeight;
}

</script>
@endpush

@endsection