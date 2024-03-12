@extends('layout.app')

@section('content')
<!-- main -->
<main id="middle" class="flex-fill mx-auto">
	<!-- PAGE TITLE -->
	<header>
		<div class="row g-1 align-items-center">
			<div class="col">
				<h1 class="h4">風控控盤</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb small">
						<li class="breadcrumb-item"><a href="/">首頁</a></li>
						<li class="breadcrumb-item"><a href="#">運營體育</a></li>
						<li class="breadcrumb-item text-muted active" aria-current="page">風控控盤</li>
					</ol>
				</nav>
			</div>
			<div class="col-auto">
			</div>
		</div>
	</header>

	<div class="section p-0">
		<div class="card-header">
			<div class="row g-3">
				<!-- product filter -->
				<div class="order-2 order-md-1 col">
					<div class="dropdown w-100">
						<form class="position-relative d-flex align-items-center" style="padding-left: 15px;">
							<div class="mb-2" style="margin-right: 10px;">
								<select id="status" class="form-select">
									<option value="living">滾球</option>
									<option value="early">早盤</option>
								</select>
							</div>

							<div class="mb-2" style="margin-right: 10px;">
								<select id="sport_id" class="form-select">
									<option value="0" selected disabled>球種選擇</option>
								</select>
							</div>

							<div class="mb-2" style="margin-right: 10px;">
								<select id="league_id" class="form-select">
									<option value="0" selected>全部聯盟</option>
								</select>
							</div>

						</form>
					</div>
				</div>
				<div class="order-1 order-md-2 col-md-auto">
					<div class="btn-group p-1 w-100" role="group" aria-label="Product options">
						<button id="isShowBetTotal" type="button" class="btn btn-primary" control=0><span id="isShowBetTotalSpan">隱藏</span>投注量</button>
					</div>
				</div>
				<div class="order-1 order-md-2 col-md-auto">
					<div class="btn-group p-1 w-100" role="group" aria-label="Product options">
						<button id="isShowLastUpdate" type="button" class="btn btn-primary" control=0>最後更新<span id="isShowLastUpdateSpan">OFF</span></button>
					</div>
				</div>
				<div class="order-1 order-md-2 col-md-auto">
					<div class="btn-group p-1 w-100" role="group" aria-label="Product options">
						<button id="isShowAllBet" type="button" class="btn btn-primary" control=0><span id="isShowAllBetSpan">隱藏</span>盤口</button>
					</div>
				</div>
				<div class="order-1 order-md-2 col-md-auto">
					<div class="btn-group p-1 w-100" role="group" aria-label="Product options">
						<button type="button" class="btn btn-primary" onclick="location.reload()">刷新</button>
					</div>
				</div>
			</div>

		</div>
		<div class="card-body pt-1">
			<!-- 風控介面 -->
			<div id="loader" class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
			<div id="fixtureContainer" hidden></div>
		</div>

		<div class="fixtureCard" template='fixtureCardTemplate' hidden>
			<div bettingkey='full'>
				<div key='title' class="w-100">
					<div key='matchEnable'>
						<span key='league_name'></span>
						<button type="button" class="btn btn-success" key='enable'>通過</button>
						<button type="button" class="btn btn-danger m-0" key='disable'>取消</button>
					</div>
					<div key='titleCont' class="row m-0"></div>
				</div>
				<div key='body'>
					<div key='time'>
						<span key='period'></span>
						<span key='turn'></span>
					</div>
					<div key='teams'></div>
					<div key='score'></div>
					<div key='main' class="row m-0"></div>
				</div>
			</div>
		</div>

		<div template='bettingarea' hidden>
			<div key='title' class="w-100">
				<div key='matchEnable' class="bg-white"></div>
				<div key='titleCont' class="row m-0"></div>
			</div>
			<div key='body'>
				<div riskcontrol='all'></div>
				<div key='teams'></div>
				<div key='main' class="row m-0"></div>
			</div>
		</div>

		<div class="w-100 row m-0 betItem" template='item' hidden>
			<div class="col-7 row m-0 p-0" style="height: 2rem;">
				<div class="col-5 p-0 text-right" key='name'></div>
				<div class="col-7 p-0 text-right" key='line'></div>
			</div>
			<div class="col-5 text-right" key='odd' style="height: 2rem;"><span></span></div>
			<div class="col-12 row" key="betTotal">
				<div class="col-6 text-left p-0"><span style="font-weight: 600;">Count: <span key='count' style="font-weight: noremal;"></span</span></div>
				<div class="col-6 text-right p-0"><span style="font-weight: 600;">Total: <span key='total' style="font-weight: noremal;"></span></span></div>
			</div>
			<div class="col-12 text-right" key="lastUpdate"></div>
		</div>
	</div>
</main>
<!-- /main -->

@push('styles')
<style>
	.text-left {
		text-align: left;
	}

	.text-right {
		text-align: right;
	}

	.fixtureCard,
	.fixtureCard [key='teams'] div,
	.fixtureCard [key='score'] div,
	.fixtureCard [key='time'],
	.fixtureCard [key='matchEnable'],
	.fixtureCard [riskcontrol='all'] {
		border: 1px solid rgb(240, 240 ,240);
		padding: 0 1rem;
		line-height: 2rem;
	}
	.fixtureCard [key='score'] div{
		padding: 0 0.5rem!important;
	}

	.fixtureCard [key='matchEnable'] button {
		height: 1.5rem;
		line-height: 0;
		color: white;
	}

	.fixtureCard {
		border-bottom: 0!important;
		padding: 0!important;
		margin-bottom: 0.5rem;
	}

	
	.betItem {
		height: 2rem;
		border: 1px solid rgb(240, 240 ,240);
		overflow: hidden;
	}

	.fixtureCard [mainline='0'] {
		display: none;
	}

	.fixtureCard [itemcontainerline='no-line'] {
		display: block!important;
	}

	.fixtureCard.showAllBet [mainline='0'] {
		display: block!important;
	}
	
	.fixtureCard [key='lastUpdate'] {
		display: none;
		padding: 0 0.5rem;
	}
	.fixtureCard.showUpdate [key='lastUpdate'] {
		display: block!important;
		color: rgb(150, 150, 150);
		font-size: 0.8rem;
		line-height: 0.8rem;
		height: 0.8rem;
	}
	.fixtureCard [key='betTotal'] {
		color: rgb(150, 150, 150);
		font-size: 0.8rem;
		white-space: nowrap;
		line-height: 0.8rem;
		height: 0.8rem;
		font-weight: normal;
		margin: 0;
		display: none;
	}
	.fixtureCard [key='betTotal']:hover {
		cursor: pointer;
		color: #574fec;
	}
	
	.fixtureCard.showBetTotal [mainline='1'] [key="betTotal"] {
		display: flex;
	}
	.fixtureCard.showBetTotal.showAllBet [mainline='1'] [key="betTotal"] {
		display: none;
	}
	.fixtureCard.showBetTotal.showAllBet .betDiv .itemContainer:first-child [key="betTotal"] {
		display: flex!important;
	}

	.fixtureCard.showAllBet .itemContainer {
		border: 1px solid rgb(150, 150, 150);
	}
	
	.fixtureCard [key='titleCont'] div {
		/* border-left: 1px solid rgb(240, 240 ,240);
		border-right: 1px solid rgb(240, 240 ,240); */
		border: 1px solid rgb(240, 240 ,240);
	}

	.fixtureCard p {
		margin: 0;
	}

	.fixtureCard [key='title'] {
		display: flex;
		background-color: rgb(200, 200, 200);
	}

	.fixtureCard[risk_status='1'] [key='title'] {
		background-color: #ffd6b1!important
	}

	.fixtureCard [key='matchEnable'] {
		width: 30%;
	}

	.fixtureCard [key='titleCont'] {
		width: 70%;
		text-align: center;
	}

	.fixtureCard [key='body'],
	.fixtureCard [key='halfBody'],
	.fixtureCard [key='singleBody'] {
		display: flex;
		width: 100%;
		height: 100%;
	}

	.fixtureCard [key='time'],
	.fixtureCard [riskcontrol='all'] {
		width: 10%;
	}

	.fixtureCard [key='teams'] {
		width: 20%;
	}

	.fixtureCard [bettingkey='full'] [key='teams'] {
		width: 15%!important;
	}

	.fixtureCard [key='singleBody'] [key='teams'],
	.fixtureCard [key='halfBody'] [key='teams'] {
		width: 20%;
	}

	.fixtureCard [key='teams'] div{
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
	}

	.fixtureCard [key='teams'] div,
	.fixtureCard [key='score'] div{
		height: 2rem;
	}

	.fixtureCard.showUpdate [key='teams'] div,
	.fixtureCard.showUpdate [key='score'] div,
	.fixtureCard.showBetTotal [key='teams'] div,
	.fixtureCard.showBetTotal [key='score'] div,
	.fixtureCard.showUpdate .betItem, 
	.fixtureCard.showBetTotal .betItem {
		height: 3rem;
	}
	.fixtureCard.showUpdate.showBetTotal [key='teams'] div,
	.fixtureCard.showUpdate.showBetTotal [key='score'] div,
	.fixtureCard.showUpdate.showBetTotal .betItem {
		height: 4rem;
	}

	/* #fixtureContainer[sport='6046'] .fixtureCard [key='teams'] div,
	#fixtureContainer[sport='6046'] .fixtureCard [key='score'] div{
		height: 33.33333%;
	} */

	.fixtureCard [key='score'] {
		width: 5%;
		text-align: right;
	}

	.fixtureCard [key='main'] {
		width: 70%;
	}

	.apiLock {
		background-color: rgb(225, 225, 225);
	}
	.riskLock {
		border: 1px solid red!important;
	}
	.riskOpen {
		border: 1px solid rgb(0, 212, 81)!important;
	}
	.betItem.raiseOdd [key="odd"] span{
		background-color: red;
		color: white;
	}
	.betItem.lowerOdd [key="odd"] span{
		background-color: rgb(0, 212, 81);
		color: white;
	}
</style>
@endpush

@push('main_js')
<script src="{{ asset('js/pako.min.js') }}"></script><!-- 解壓縮 -->
<script src="{{ asset('js/lodash.min.js') }}"></script><!-- 解壓縮 -->
<script>
	// betting type category
	priorityCate = {
		allwin: [1, 2, 9, 101, 102, 109, 113, 117, 121, 201, 202, 301, 401],
		hcap: [3, 4, 103, 104, 110, 114, 118, 122, 203 , 204, 302, 403],
		size: [5, 6, 205, 206, 105, 106, 111, 115, 119, 123, 303, 405],
	}
	
	// betting priority config
	const gamePriority = {
		154914: {
			mainPriorityTitle: ['全場獨贏', '全場讓球', '全場大小'],
			mainPriorityArr: [1, 3, 5],
			halfPriorityTitle: ['前五局獨贏', '前五局讓球', '前五局大小', null],
			halfPriorityArr: [2, 4, 6, null],
			stage: {
				1: '1局',
				2: '2局',
				3: '3局',
				4: '4局',
				5: '5局',
				6: '6局',
				7: '7局',
				8: '8局',
				9: '9局',
				40: '加時賽',
				62: '錯誤',
				80: '中場休息',
				100: '比賽結束',
				101: '加時賽結束',
			}
		},
		6046: {
			mainPriorityTitle: ['全場獨贏', '全場讓球', '全場大小', '上半場獨贏', '上半場讓球', '上半場大小'],
			mainPriorityArr: [201, 203, 205, 202, 204, 206],
			stage: {
				10: '上半場',
				20: '下半場',
				25: '第三半場',
				30: '加時賽 上半場',
				35: '加時賽 下半場',
				50: '點球',
				80: '中場休息',
				100: '比賽結束',
				101: '加時賽結束',
				102: '點球結束'
			}
		},
		131506: {
			mainPriorityTitle: ['全場獨贏', '全場讓分', '全場大小'],
			mainPriorityArr: [401, 403, 405],
			halfPriorityTitle: ['上半獨贏', '上半讓球', '上半大小'],
			halfPriorityArr: [402, 404, 406],
			stage: {
				1: '第 1 節',
				2: '第 2 節',
				3: '第 3 節',
				4: '第 4 節',
				40: '加時賽',
				80: '中場休息',
				100: '比賽結束',
				101: '加時賽結束',
			}
		},
		48242: {
			mainPriorityTitle: ['全場獨贏', '全場讓分', '全場大小'],
			mainPriorityArr: [101, 103, 105],
			halfPriorityTitle: ['上半場獨贏', '上半場讓球', '上半場大小'],
			halfPriorityArr: [102, 104, 106],
			stageTitle: {
				1: ['第一節獨贏', '第一節讓分', '第一節大小'],
				2: ['第二節獨贏', '第二節讓分', '第二節大小'],
				3: ['第三節獨贏', '第三節讓分', '第三節大小'],
				4: ['第四節獨贏', '第四節讓分', '第四節大小'],
			},
			stagePriorityArr: {
				1: [109, 110, 111],
				2: [113, 114, 115],
				3: [117, 118, 119],
				4: [121, 122, 123]
			},
			stage: {
				4045: {
					10: '上半場',
					20: '下半場',
					40: '加時賽',
					80: '中場休息',
					100: '比賽結束',
					101: '加時賽結束',
				},
				common: {
					1: '第 1 節',
					2: '第 2 節',
					3: '第 3 節',
					4: '第 4 節',
					40: '加時賽',
					80: '中場休息',
					100: '比賽結束',
					101: '加時賽結束',
				}
			}
		},
		35232: {
			mainPriorityTitle: ['全場獨贏', '全場讓球', '全場大小'],
			mainPriorityArr: [301, 302, 303],
			halfPriorityTitle: ['上半場獨贏', '上半場讓球', '上半場大小'],
			halfPriorityArr: [305, 306, 307],
			stage: {
				1: '第1局',
				2: '第2局',
				3: '第3局',
				40: '加時賽',
				50: '點球',
				80: '中場休息',
				100: '比賽結束',
				101: '加時賽結束',
				102: '點球結束'
			}
		}
	}

	// search conditions
	const params = new URL(document.location).searchParams;
	const entries = params.entries();
	const searchData = paramsToObject(entries);

	// default 
	var sport = searchData.sport ? parseInt(searchData.sport) : parseInt('{{ $system_config["default_sport"] }}')
	var status = null
	var league = null

	// loading page control
	var isReadyCommonInt = null

	// match list data
	var matchListD = {}
	var oldMatchListD = {}
	var callMatchListData = {sport_id: sport}
	const matchList_api = '/api/match_index'

	// sport list data
	var sportListD = {}
	var callSportListData = { league_mode: 1 }
	const sportList_api = '/api/match_sport'

	// 儲存要傳送的陣列
	var toSendRiskArr = []
	var recordSendRiskData = null

	// record enable fixture id
	var toSendEnableArr = []
	var recordSendEnableData = null

	// record id and price
	var betIdPrice = {}
	

	$(document).ready(function() {
		caller(matchList_api, callMatchListData, matchListD) // match_list
		caller(sportList_api, callSportListData, sportListD) // sport_list

		// call the data every 5 sec
		setInterval(() => {
			caller(matchList_api, callMatchListData, matchListD, 1)  
		}, 5000);

		// check if api are all loaded every 500 ms 
		isReadyCommonInt = setInterval(() => {
			if (matchListD.status === 1 && sportListD.status === 1) {
				viewCommonIni() // excute all common view layer ini function
				$('#loader').hide()
				$('#fixtureContainer').removeAttr('hidden')
				clearInterval(isReadyCommonInt); // stop checking
				
				setInterval(() => {
					const timerLabel = `renderView_${Date.now()}`; // 生成唯一的計時器標籤
					// console.time(timerLabel); // 開始計時
					renderView(); // render the view layer
					// console.timeEnd(timerLabel); // 結束計時並顯示經過時間
				}, 5000);

				// 每100毫秒檢查toSendArr中有沒有東西 有的話送出
				checkSendRiskArr()
				// checkSendEnableArr()
			}
		}, 500);
	});

	// sleep function to pause
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

	// detect if there's still package need to be processed
    async function checkSendRiskArr() {
        while (true) {
            if (toSendRiskArr.length > 0) {
                processRiskArr(); // package process function
            } else {
                await sleep(2); // check after 100 ms
            }
        }
    }

	// detect if there's still package need to be processed
    async function checkSendEnableArr() {
        while (true) {
            if (toSendEnableArr.length > 0) {
                processEnableArr(); // package process function
            } else {
                await sleep(2); // check after 100 ms
            }
        }
    }

	// package process function
    function processRiskArr() {
		let riskData = toSendRiskArr.shift(); // to get the head pkg
		// recordSendRiskData = riskData
		setFixtureRisk(riskData.id, riskData.data)
    }

	// package process function
    function processEnableArr() {
		let enableData = toSendEnableArr.shift(); // to get the head pkg
		recordSendEnableData = enableData
		setFixtureEnable(recordSendEnableData.id, recordSendEnableData.able)
		
    }
	
	// set the url to selected option value
	$('select').on('change', function() {
		sport = $('#sport_id').val()
		status = $('#status').val()
		league = $('#league_id').val()

		// update the para for url link
		history.pushState(null, null, `?sport=${sport}&status=${status}&league=${league}`);
		location.reload();
	});

	// the ini function
	function viewCommonIni() {
		// set record data to compoare
		oldMatchListD = _.cloneDeep(matchListD);

		// set sport
		$('#fixtureContainer').attr('sport', sport)
		
		// sport option
		sportListD.data.forEach(function(item) {
			let option = $('<option>', {
				value: item.sport_id,
				text: item.name,
				selected: sport === item.sport_id ? true : false
			});
			$('#sport_id').append(option);
			$('#sport_id option[value="0"]').hide()
		});

		// league option
		sportListD.data.find(m => m.sport_id === sport).league.forEach(function(item) {
			let option = $('<option>', {
				value: item.league_id,
				text: item.name
			});
			$('#league_id').append(option);
		});

		// get selection value
		status = searchData.status || 'living'
		league = parseInt(searchData.league)

		$('#status').val(status)

		// hide the league option when is not exists in the matchListData
		$('#league_id option').each(function(i, e) {
			let id = $(e).val()
			if( !matchListD.data[status][sport].list[id] && id != 0  ) {
				$(e).hide() 
			} else {
				$(e).show()
				if( searchData.league == id ) $('#league_id').val(searchData.league)
			} 
		});
		// } else {
		// 	$('.betItem').each(function(i, e) {
		// 		let id = $(e).attr('market_bet_id')
		// 		let price = $(e).attr('price')
		// 		betIdPrice[id] = price
		// 	});
		// 	$('#fixtureContainer').html('')
		// }
		

		// ===== loop matchListD to generate fixtures element =====
		let k = status
		let v = matchListD.data[status][sport].list

		Object.entries(v).map(([k2, v2]) => { // league 
			const listKeys = Object.keys(v2.list);
			listKeys.sort((a, b) => { // sort by order_by attr
				const orderByA = v2.list[a].order_by;
				const orderByB = v2.list[b].order_by;
				return orderByA - orderByB;
			});


			// 若有篩選條件的情況下跳過不符的賽事
			if( league !== 0 && v2.league_id != league ) return;

			listKeys.forEach(ele => {
				createFixtureCard(k, v2.league_id, v2.league_name, ele, v2.list[ele]) // create each fixture
				// ===== append the main betting area =====
				createBetArea(gamePriority[sport].mainPriorityArr, gamePriority[sport].mainPriorityTitle, v2.list[ele], ele, 'full') // full

				let halfControl = true
				if( gamePriority[sport].halfPriorityArr && v2.list[ele].list ) { // half
					
					// 若籃球已經進行到下半場 前面的盤口就不顯示了 (用記分板長度判定 因period有中場80難以判定)
					if( sport === 48242 && v2.list[ele]?.scoreboard?.[1] ) {
						let homeScoreBoard = v2.list[ele]?.scoreboard?.[1]
						if( (v2.league_id != 4045 && homeScoreBoard.length > 3) || (v2.league_id == 4045 && Object.keys(homeScoreBoard).length > 2) ) {
							halfControl = false
						}
					}

					if( halfControl && Object.values(v2.list[ele].list).some(item => gamePriority[sport].halfPriorityArr.includes(item.priority)) ) { // 判斷是否至少有一個盤口
						createBetArea(gamePriority[sport].halfPriorityArr, gamePriority[sport].halfPriorityTitle, v2.list[ele], ele, 'half') // half
					}
				}

				// 籃球 單節投注
				if( sport === 48242 ) {
					let homeScoreBoard = v2.list[ele]?.scoreboard?.[1]
					Object.entries(gamePriority[sport].stagePriorityArr).map(([ind, v]) => {
						if( v2.list[ele].list && Object.values(v2.list[ele].list).some(item => v.includes(item.priority)) ) {
							if( !(homeScoreBoard && homeScoreBoard.length -1 > ind) ) {
								createBetArea(v, gamePriority[sport].stageTitle[ind], v2.list[ele], ele, `single${ind}`, ind) // single
							} 
						}
					})
				}
				// ===== append the main betting area =====
			})
		})

		filterQuick()

		/*
			onclick事件
			風控手動開 -  market_bet 框 邊框為綠色
			風控手動關 -  market_bet 框 邊框為紅色
			號源關    -  market_bet 背景為灰色

			目前暫時設定 左鍵 關 / 右鍵 開
		*/
		// ===== 單個選項開關 =====
		$(document).on('click', '.betItem', function(event) {
			if( $(this).attr('empty') === '1' ) return;
			let index = $(this).attr('index')
			let priority = $(this).attr('priority')
			let fixture_id = $(this).attr('fixture_id')
			let betItmes = $(`.betItem[fixture_id=${fixture_id}][priority=${priority}][index=${index}]`)
			betItmes.removeClass('riskOpen');
			if ($(this).hasClass('riskLock')) {
				betItmes.removeClass('riskLock');
			} else {
				betItmes.addClass('riskLock');
			}
		});

		$(document).on('contextmenu', '.betItem', function(event) {
			if( $(this).attr('empty') === '1' ) return;

			event.preventDefault(); // 阻止右键上下文菜单的默认行为
			let index = $(this).attr('index');
			let priority = $(this).attr('priority');
			let fixture_id = $(this).attr('fixture_id');
			let betItmes = $(`.betItem[fixture_id=${fixture_id}][priority=${priority}][index=${index}]`)

			betItmes.removeClass('riskLock');
			if ($(this).hasClass('riskOpen')) {
				betItmes.removeClass('riskOpen');
			} else {
				betItmes.addClass('riskOpen');
			}
		});

		// =====  整個玩法開關 ===== 
		$(document).on('click', 'div[key="titleCont"] .col', function(event) { // 強制關
			let priority = $(this).attr('priority')
			if( !priority ) return;
			let fixture_id = $(this).attr('fixture_id');
			let betItmes = $(`.betItem[priority='${priority}'][fixture_id='${fixture_id}']`)
			
			// 移除強制開
			betItmes.removeClass('riskOpen')
			$(this).removeClass('riskOpen');

			if ($(this).hasClass('riskLock')) { // 取消強制關
				$(this).removeClass('riskLock');
				betItmes.removeClass('riskLock')
			} else { // 設定強制關
				$(this).addClass('riskLock');
				betItmes.addClass('riskLock')
			}
		});
		$(document).on('contextmenu', 'div[key="titleCont"] .col', function(event) {
			event.preventDefault(); // 阻止右键上下文菜单的默认行为
			let priority = $(this).attr('priority')
			if( !priority ) return;
			let fixture_id = $(this).attr('fixture_id');
			let betItmes = $(`.betItem[priority='${priority}'][fixture_id='${fixture_id}']`)

			betItmes.removeClass('riskLock')
			$(this).removeClass('riskLock');

			if ($(this).hasClass('riskOpen')) {
				$(this).removeClass('riskOpen');
				betItmes.removeClass('riskOpen')
			} else {
				$(this).addClass('riskOpen');
				betItmes.addClass('riskOpen')
			}
		});

		// ===== 隊伍開關 ===== 
		$(document).on('click', 'div[key="teams"] div', function(event) {
			let index = $(this).attr('index')
			let fixture_id = $(this).attr('fixture_id');
			let bettingkey = $(this).closest('[bettingkey]').attr('bettingkey')
			let betItmes = $(`[bettingkey='${bettingkey}'] .betItem[index='${index}'][fixture_id='${fixture_id}']`)

			
			betItmes.removeClass('riskOpen')
			$(this).removeClass('riskOpen');

			if ($(this).hasClass('riskLock')) {
				$(this).removeClass('riskLock');
				betItmes.removeClass('riskLock')
			} else {
				$(this).addClass('riskLock');
				betItmes.addClass('riskLock')
			}
		});
		$(document).on('contextmenu', 'div[key="teams"] div', function(event) {
			event.preventDefault(); // 阻止右键上下文菜单的默认行为
			let index = $(this).attr('index')
			let fixture_id = $(this).attr('fixture_id');
			let bettingkey = $(this).closest('[bettingkey]').attr('bettingkey')
			let betItmes = $(`[bettingkey='${bettingkey}'] .betItem[index='${index}'][fixture_id='${fixture_id}']`)

			betItmes.removeClass('riskLock')
			$(this).removeClass('riskLock');

			if ($(this).hasClass('riskOpen')) {
				$(this).removeClass('riskOpen');
				betItmes.removeClass('riskOpen')
			} else {
				$(this).addClass('riskOpen');
				betItmes.addClass('riskOpen')
			}
		});

		//  ===== 整場賽事全部開關 ===== 
		$(document).on('click', 'div[key="time"], div[riskcontrol="all"]', function(event) {
			let fixture_id = $(this).attr('fixture_id');
			let bettingkey = $(this).closest('[bettingkey]').attr('bettingkey')
			let betItmes = $(`[bettingkey='${bettingkey}'] .betItem[fixture_id='${fixture_id}']`)
			
			betItmes.removeClass('riskOpen')
			$(this).removeClass('riskOpen');

			if ($(this).hasClass('riskLock')) {
				$(this).removeClass('riskLock');
				betItmes.removeClass('riskLock')

			} else {
				$(this).addClass('riskLock');
				betItmes.addClass('riskLock')
			}
		});
		$(document).on('contextmenu', 'div[key="time"], div[riskcontrol="all"]', function(event) {
			event.preventDefault(); // 阻止右键上下文菜单的默认行为
			let fixture_id = $(this).attr('fixture_id');
			let bettingkey = $(this).closest('[bettingkey]').attr('bettingkey')
			let betItmes = $(`[bettingkey='${bettingkey}'] .betItem[fixture_id='${fixture_id}']`)
			
			betItmes.removeClass('riskLock')
			$(this).removeClass('riskLock');

			if ($(this).hasClass('riskOpen')) {
				$(this).removeClass('riskOpen');
				betItmes.removeClass('riskOpen')
			} else {
				$(this).addClass('riskOpen');
				betItmes.addClass('riskOpen')
			}
		});

		// 處發傳送位置資料
		$(document).on('click contextmenu', '.betItem, div[key="titleCont"] .col, div[key="teams"] div, div[riskcontrol="all"], div[key="time"]', function(event) {
			if( $(this).attr('empty') === '1' ) return;
			filterQuick()
			let fixture_id = $(this).attr('fixture_id')
			let tmpArr = {}
			// 只取mainline的
			$(`.fixtureCard[fixture_id=${fixture_id}] [mainline="1"]`).each(function(i, e) {
				$(e).find('.betItem').each(function(j, ele) {
					if( !$(this).attr('market_id') ) return;
					let market_id = parseInt($(this).attr('market_id'))
					let control = null
					if( $(ele).hasClass('riskLock') == 1 ) control = 0
					if( $(ele).hasClass('riskOpen') == 1 ) control = 1
					if( !tmpArr[market_id] ) tmpArr[market_id] = []
					tmpArr[market_id][j] = control
				})
			});
			toSendRiskArr.push({id:fixture_id, data: tmpArr})
		});

	}


	
	// onclick in lastupdate btn
	$('#isShowLastUpdate').click(function(){
		let control = parseInt($(this).attr('control'))
		if( control === 0 ) {
			$(this).attr('control', 1)
			$(this).find('span').html('ON')
			$('.fixtureCard').addClass('showUpdate')
		} else {
			$(this).attr('control', 0)
			$(this).find('span').html('OFF')
			$('.fixtureCard').removeClass('showUpdate')
		}
		
	})

	// onclick in isShowAllBet btn
	$('#isShowAllBet').click(function(){
		let control = parseInt($(this).attr('control'))
		if( control === 0 ) {
			$(this).attr('control', 1)
			$(this).find('span').html('顯示')
			$('.fixtureCard').addClass('showAllBet')
		} else {
			$(this).attr('control', 0)
			$(this).find('span').html('隱藏')
			$('.fixtureCard').removeClass('showAllBet')
		}
	})

	// onclick when isShowBetTotal clicked
	$('#isShowBetTotal').click(function(){
		let control = parseInt($(this).attr('control'))
		if( control === 0 ) {
			$(this).attr('control', 1)
			$(this).find('span').html('顯示')
			$('.fixtureCard').addClass('showBetTotal')
		} else {
			$(this).attr('control', 0)
			$(this).find('span').html('隱藏')
			$('.fixtureCard').removeClass('showBetTotal')
		}
	})


	function filterQuick() {
		let selector = $('#fixtureContainer .fixtureCard')
		for (let i = 0; i < selector.length; i++) {
			const ele = selector[i];
			// 玩法選項
			let betType = $(ele).find('.betDiv')
			$(ele).find('[key="titleCont"] .col').removeClass('riskLock')
			$(ele).find('[key="titleCont"] .col').removeClass('riskOpen')
			for (let j = 0; j < betType.length; j++) {
				const e = betType[j];
				if( ($(e).find('.betItem').length === $(e).find('.riskLock').length) && $(e).find('.betItem').length > 0 ) {
					$(ele).find('[key="titleCont"] .col').eq(j).addClass('riskLock')
				}
				if( ($(e).find('.betItem').length === $(e).find('.riskOpen').length) && $(e).find('.betItem').length > 0 ) {
					$(ele).find('[key="titleCont"] .col').eq(j).addClass('riskOpen')
				}
			}

			// 隊伍名
			let betTeam = $(ele).find('[bettingkey] [key="teams"] div')
			for (let j = 0; j < betTeam.length; j++) {
				const e = betTeam[j];
				let ind = $(e).attr('index')
				let bettingkey = $(e).closest('[bettingkey]').attr('bettingkey')
				$(e).removeClass('riskLock')
				$(e).removeClass('riskOpen')

				let subSelectorLen = $(ele).find(`div[bettingkey='${bettingkey}'] .betItem[index=${ind}]`).length
				if( subSelectorLen && ( subSelectorLen === $(ele).find(`div[bettingkey='${bettingkey}'] .betItem[index=${ind}].riskLock`).length)) {
					$(e).addClass('riskLock')
				}
				if( subSelectorLen && ( subSelectorLen === $(ele).find(`div[bettingkey='${bettingkey}'] .betItem[index=${ind}].riskOpen`).length)) {
					$(e).addClass('riskOpen')
				}
			}

			// 全玩法
			let all = $(ele).find('[bettingkey] [riskcontrol="all"], [bettingkey] [key="time"]')
			for (let j = 0; j < all.length; j++) {
				const e = all[j];
				let bettingkey = $(e).closest('[bettingkey]').attr('bettingkey')
				$(e).removeClass('riskLock')
				$(e).removeClass('riskOpen')

				let subSelectorLen = $(ele).find(`div[bettingkey='${bettingkey}'] .betItem`).length
				if( subSelectorLen && ( subSelectorLen === $(ele).find(`div[bettingkey='${bettingkey}'] .betItem.riskLock`).length)) {
					$(e).addClass('riskLock')
				}
				if( subSelectorLen && ( subSelectorLen === $(ele).find(`div[bettingkey='${bettingkey}'] .betItem.riskOpen`).length)) {
					$(e).addClass('riskOpen')
				}
			}
		}
	}

	function findDifferences(path, obj1, obj2, differences) {
		_.forEach(obj1, (value, key) => {
			const currentPath = path.concat(key);
			if (_.isObject(value) && _.isObject(obj2[key])) {
				findDifferences(currentPath, value, obj2[key], differences);
			} else if (!_.isEqual(value, obj2[key])) {
				differences.push({
					path: currentPath,
					oldValue: value,
					newValue: obj2[key]
				});
			}
		});

		// Check for keys in obj2 that are missing in obj1
		_.forEach(obj2, (value, key) => {
			const currentPath = path.concat(key);
			if (!_.has(obj1, key)) {
				differences.push({
					path: currentPath,
					oldValue: undefined,
					newValue: value
				});
			}
		});
	}


	// render the view layer and will be executed every 5 sec
	function renderView() {
		// loop matchListD to update fixtures element 
		let oldData = oldMatchListD.data[status][sport].list
		let newData = matchListD.data[status][sport].list

	 	// 先整坨比較 有不一樣再跑回圈
		// console.log(_.isEqual(oldData, newData))

		if( _.isEqual(oldData, newData) ) return;

		const differences = [];
		findDifferences([], oldData, newData, differences);

		console.log(differences)
		differences.forEach( diff => {
			let path = diff.path
			let oldD = diff.oldValue
			let newD = diff.newValue

			let league_id = path[0]
			let fixture_id = path[2]

			// 若有篩選條件的情況下跳過不符的賽事
			if( league !== 0 && league_id != league ) return;


			let newFixtureData = newData?.[league_id]?.list?.[fixture_id]
			let oldFixtureData = oldData?.[league_id]?.list?.[fixture_id]
			let card = $(`.fixtureCard[fixture_id=${fixture_id}]`) // 定位

			// 判斷賽事
			if( path.length === 3 ) {
				// 原本有後來沒有 -> 移除
				if( !newD ) card.remove()
				// 原本沒有後來才有 -> 新增 (插入順序記得處理)
				if( !oldD ) {
					let v2 = newData[league_id]
					const listKeys = Object.keys(v2.list);
					listKeys.sort((a, b) => { // sort by order_by attr
						const orderByA = v2.list[a].order_by;
						const orderByB = v2.list[b].order_by;
						return orderByA - orderByB;
					});

					let prevFixId = null
					let prevLeaId = null
					let thisInd = listKeys.indexOf(fixture_id)
					if( thisInd === 0 ) {
						let league_ind = Object.keys(newData).indexOf(league_id)
						league_ind === 0 ? prevLeaId = 'none' : prevLeaId = Object.keys(newData)[league_ind - 1]
					} else {
						prevFixId = listKeys[thisInd - 1]
					}

					
					createFixtureCard(status, league_id, newData[league_id].league_name, fixture_id, newD, prevLeaId, prevFixId) // create each fixture

					// ===== append the main betting area =====
					createBetArea(gamePriority[sport].mainPriorityArr, gamePriority[sport].mainPriorityTitle, newD, fixture_id, 'full') // full

					if( gamePriority[sport].halfPriorityArr && newD.list ) { // half
						if( Object.values(newD.list).some(item => gamePriority[sport].halfPriorityArr.includes(item.priority)) ) { // 判斷是否至少有一個盤口
							createBetArea(gamePriority[sport].halfPriorityArr, gamePriority[sport].halfPriorityTitle, newD, fixture_id, 'half') // half
						}
					}

					// 籃球 單節投注
					if( sport === 48242 ) {
						Object.entries(gamePriority[sport].stagePriorityArr).map(([ind, v]) => {
							if( newD.list && Object.values(newD.list).some(item => v.includes(item.priority)) ) {
								createBetArea(v, gamePriority[sport].stageTitle[ind], newD, fixture_id, `single${ind}`, ind) // single
							}
						})
					}
					// ===== append the main betting area =====
				}
			}
			
			// 判斷賽事狀態
			if( path[3] === 'status' ) {
				if( newD == 9 ) card.find(`[key="period"]`).html('即將開賽')
			}
			// 現在節數 (上下局)
			if( path[3] === 'periods' ) {
				if( path[4] === 'period' ) {
					if( sport === 48242 ) {
						league_id == 4045 ? card.find(`[key="period"]`).html(gamePriority[sport].stage[4045][newD]) : card.find(`[key="period"]`).html(gamePriority[sport].stage.common[newD])
					} else {
						card.find(`[key="period"]`).html(gamePriority[sport].stage[newD])
					}
				}
				if( path[4] === 'Turn' && sport === 1549144 && newFixtureData?.periods?.period ) {
					let period = parseInt(newFixtureData.periods.period) < 10
					card.find(`[key="turn"]`).html( newD === '1' ? '下' : '上' )
				}
			}
			// 比分
			if( path[3] === 'scoreboard' ) {
				card.find(`[key="homeS"]`).html(newFixtureData.scoreboard?.[1]?.[0])
				card.find(`[key="awayS"]`).html(newFixtureData.scoreboard?.[2]?.[0])
			}
			// 審核狀態 
			if( path[3] === 'risk_status' ) {
				let riskStatus = parseInt(newD)
				card.attr('risk_status', riskStatus)
				card.find(`[key="enable"]`).prop('disabled', riskStatus ? true : false) 
				card.find(`[key="disable"]`).prop('disabled', !riskStatus ? true : false) 
			}

			// 玩法層
			if( path[3] === 'list' ) {
				// 先定義層級
				let layer = path.length

				// 玩法
				var market_id = path?.[4]
				var priority = newD ? newFixtureData?.list?.[market_id]?.priority : oldFixtureData?.list?.[market_id]?.priority
				switch (layer) {
					case 4:
						console.log('case44444444')
						if( !newD ) {
							// 移除所有玩法
							card.find('[bettingkey="full"] .itemContainer').remove()
							card.find('[bettingkey="half"]').remove()
							card.find('[bettingkey^="single"]').remove()
						}
						if( !oldD ) {
							card.find('[bettingkey="full"] .itemContainer').remove()
							// ===== append the main betting area =====
							createBetArea(gamePriority[sport].mainPriorityArr, gamePriority[sport].mainPriorityTitle, newFixtureData, fixture_id, 'full') // full

							if( gamePriority[sport].halfPriorityArr && newFixtureData.list ) { // half
								if( Object.values(newFixtureData.list).some(item => gamePriority[sport].halfPriorityArr.includes(item.priority)) ) { // 判斷是否至少有一個盤口
									createBetArea(gamePriority[sport].halfPriorityArr, gamePriority[sport].halfPriorityTitle, newFixtureData, fixture_id, 'half') // half
								}
							}

							// 籃球 單節投注
							if( sport === 48242 ) {
								Object.entries(gamePriority[sport].stagePriorityArr).map(([ind, v]) => {
									if( newFixtureData.list && Object.values(newFixtureData.list).some(item => v.includes(item.priority)) ) {
										createBetArea(v, gamePriority[sport].stageTitle[ind], newFixtureData, fixture_id, `single${ind}`, ind) // single
									}
								})
							}
							// ===== append the main betting area =====
						}
						
						break;
					case 5:
						console.log('case55555555')
						// 原本有後來沒有 -> 移除玩法
						if( !newD ) card.find(`.betDiv[priority=${priority}]`).html('')
						// 原本沒有後來才有 -> 新增玩法 (插入順序記得處理)
						if( !oldD ) {
							// 先判斷有沒有這個betarea
							let betItem = card.find(`.betDiv[priority=${priority}]`)
							console.log(betItem, betItem.length, oldData)
							if( betItem.length === 0 ) {
								// 判斷這個priority是哪個分類
								if( gamePriority[sport].halfPriorityArr.indexOf(priority) !== -1 ) {
									createBetArea(gamePriority[sport].halfPriorityArr, gamePriority[sport].halfPriorityTitle, newFixtureData, fixture_id, 'half') // half
								} 
								// 籃球 單節投注
								if( sport === 48242 ) {
									Object.entries(gamePriority[sport].stagePriorityArr).map(([ind, v]) => {
										if( v.indexOf(priority) !== -1 ) {
											createBetArea(v, gamePriority[sport].stageTitle[ind], newFixtureData, fixture_id, `single${ind}`, ind) // single
										}
									})
								}
							} else {
								Object.entries(newD.list).map(([k4, v4]) => {
									betItem.append(createBetItemContainer(newD, k4, v4, fixture_id, priority))
								});
							}
						}
						break;
					case 6:
						if( path[5] === 'base_main_line' ) { // 獨贏 不會有 所以不用特別處理
							card.find(`.betDiv[priority=${priority}] .itemContainer`).each(function () {
								let item = $(this);  // 使用 $(this) 取得當前迭代的元素
								let itemcontainerline = item.attr('itemcontainerline')
								// 判斷條件，設置 mainline 屬性
								itemcontainerline === newD ? item.attr('mainline', '1') : item.attr('mainline', '0');
							});
						}
						break;
					case 7:
						if( path[5] === 'risk' ) {
							// 風控
							let index = path[6]
							let items = card.find(`.betItem[market_id=${market_id}][index=${index}]`)
							items.removeClass('riskLock riskOpen')
							if( newD === 0 ) items.addClass('riskLock')
							if( newD === 1 ) items.addClass('riskOpen')
						} else {
							// 分盤
							let line = path[6]
							if( !newD ) {
								card.find(`.betDiv[priority=${priority}] [itemcontainerline='${line}']`).remove()
							}
							if( !oldD ) {
								let betItem = card.find(`.betDiv[priority=${priority}]`)
								let betData = newFixtureData.list[market_id]
								let ind = Object.keys(betData.list).indexOf(line)
								if( ind === 0 ) {
									betItem.prepend(createBetItemContainer(betData, line, newD, fixture_id, priority))
								} else {
									betItem.find('.itemContainer').eq(ind-1).after(createBetItemContainer(betData, line, newD, fixture_id, priority))
								}
							}
						}
						break;
					case 8:
						// betTotal
						let en_marekt_bet_name = path[6]
						let index = null
						switch (en_marekt_bet_name) {
							case '1':case 'Over':
								index = 0
								break;
							case '2':case 'Under':
								index = 1
								break;
							case 'X':
								index = 2
								break;
						}
						card.find(`.betItem[market_id=${market_id}][index=${index}] [key='${path[7]}']`).html(newD)
						break;
					case 9:
						let marketbetId = newFixtureData.list[market_id].list[path[6]][path[7]].market_bet_id
						let betItem = $(`[market_bet_id=${marketbetId}]`)
						// 賠率
						if( path[8] === 'price' ) {
							let o = parseFloat( oldD )
							let u = parseFloat( newD )
							betItem.find('[key="odd"] span').html(u)
							if( u > o) betItem.addClass('raiseOdd')
							if( u < o) betItem.addClass('lowerOdd')

							setTimeout(() => {
								betItem.removeClass('raiseOdd lowerOdd')
							}, 3000);
						}
						// 狀態
						if( path[8] === 'status' ) {
							betItem.removeClass('apiLock')
							if( newD != 1 ) betItem.addClass('apiLock')
						}

						// 更新時間
						if( path[8] === 'last_update' ) {
							betItem.find('[key="lastUpdate"').html(formateLastUpdate(newD))
						}
						break;
					default:
						break;
				}
		}
		})

		// update
		oldMatchListD = _.cloneDeep(matchListD);
		filterQuick()
	}

	function showFixture() {
		$('.fixtureCard').hide()
		league !== '0' ? $(`.fixtureCard[status="${status}"][league="${league}"]`).show() : $(`.fixtureCard[status="${status}"]`).show()
	}

	function createFixtureCard(k, league_id, league_name, k3, v3, prevLeaId=null, prevFixId=null) {
		let isShowLastUpdate = parseInt($('#isShowLastUpdate').attr('control'))
		let isShowAllBet = parseInt($('#isShowAllBet').attr('control'))

		let card = $('div[template="fixtureCardTemplate"]').clone()
		if( isShowLastUpdate ) card.addClass('showUpdate')
		if( isShowAllBet ) card.addClass('showAllBet')
		

		// attribute setting
		card.attr('status', k)
		card.attr('league', league_id)
		card.attr('fixture_id', k3)
		card.attr('risk_status', v3.risk_status)

		// ===== time =====
		card.find('[key="time"] [key="period"]').html(formatDateTime(v3.start_time))
		card.find('[key="time"]').attr('fixture_id', k3)
		

		// ===== league =====
		card.find('span[key="league_name"]').html(league_name)

		// ===== enable btn =====
		let enableBtn = card.find('button[key="enable"]')
		let disableBtn = card.find('button[key="disable"]')
		let riskStatus = v3.risk_status

		enableBtn.attr('onclick', `setFixtureEnable(${k3}, 1)`)
		disableBtn.attr('onclick', `setFixtureEnable(${k3}, 0)`)

		enableBtn.prop('disabled', riskStatus ? true : false) 
		disableBtn.prop('disabled', !riskStatus ? true : false) 


		// ===== ready to start =====
		if (v3.status === 9) card.find('[key="time"] [key="period"]').html('即將開賽')

		// ===== if is living fixture =====
		if (v3.status === 2) {
			if( v3.periods ) {
				// stage text
				let stageStr = null
				if( sport === 48242 ) {
					stageStr = league_id == 4045 ? gamePriority[sport].stage[4045][v3.periods.period] : gamePriority[sport].stage['common'][v3.periods.period]
				} else {
					stageStr = gamePriority[sport].stage[v3.periods.period]
				}
				card.find('[key="time"] [key="period"]').html(stageStr)
				// exception baseball
				if (sport === 154914 && parseInt(v3.periods.period) < 10 ) {
					let turnStr = v3.periods.Turn === '1' ? '下' : '上'
					card.find('[key="time"] [key="turn"]').html(turnStr)
				}
			}
		}

		card.removeAttr('hidden')
		card.removeAttr('template')

		if( prevLeaId || prevFixId ) {
			if( prevFixId ) {
				$(`.fixtureCard[fixture_id=${prevFixId}]`).after(card)
			}
			if( prevLeaId === 'none' ) {
				$('#fixtureContainer').prepend(card)
			} else {
				$(`.fixtureCard[league=${prevLeaId}]:last`).after(card)
			}
		} else {
			$('#fixtureContainer').append(card)
		}
	}


	function createBetArea(priorityArr, titlePriorityArr, v3, k3, type, stage = null) {
		let card = $(`.fixtureCard[fixture_id=${k3}]`)
		let container = card.find(`[bettingkey=${type}]`);

		// 半場 單節 若有盤口 -> 新增區塊
		if( container.length === 0 ) {
			let newG = $('div[template="bettingarea"]').clone()
			newG.removeAttr('hidden')
			newG.removeAttr('template')
			newG.attr('bettingkey', type)
			card.append(newG)
			container = card.find(`[bettingkey=${type}]`);
		}

		let titleCont = container.find('[key="titleCont"]');
		let teams = container.find('[key="teams"]');
		let score = container.find('[key="score"]');
		let bodyMain = container.find('[key="body"]').find('[key="main"]');

		container.find('[riskcontrol="all"]').attr('fixture_id', k3)
		container.find('[riskcontrol="all"]').html( type === 'half' ? '半場全部' : `第${stage}節全部` )

		// ===== title =====
		titlePriorityArr.forEach((item, k) => {
			let title = $('<div>', {
			text: item,
			}).addClass('col').attr('priority', priorityArr[k]).attr('fixture_id', k3);
			titleCont.append(title);
		});

		// ===== team name =====
		let additionText = '';
		switch (type) {
			case 'full':
				additionText = '-全場';
			break;
			case 'half':
				additionText = '-半場';
			break;
			default:
				additionText = `-第${stage}節`;
			break;
		}
		let home = $('<div>', {
			text: v3.home_team_name + additionText,
			fixture_id: k3
		});

		let away = $('<div>', {
			text: v3.away_team_name + additionText,
			fixture_id: k3
		});
		home.attr('index', 0)
		away.attr('index', 1)
		teams.append(home, away);
		// 足球補空
		if (sport === 6046) teams.append('<div></div>');

		// ===== score =====
		if (type === 'full') {
			let homeS = $('<div key="homeS">');
			let awayS = $('<div key="awayS">');

			if( v3.scoreboard ) {
				homeS.html(v3.scoreboard?.[1]?.[0])
				awayS.html(v3.scoreboard?.[2]?.[0])
			}

			score.append(homeS, awayS);

			// 足球補空
			if (sport === 6046) score.append('<div></div>');
		}
		

		// ===== main bet =====
		for (let j = 0; j < priorityArr.length; j++) {
			let priority = priorityArr[j];
			let betItem = $('<div>').addClass('col p-0');
			let betData = null;

			betItem.attr('priority', priority).addClass('betDiv');

			if (v3.list) betData = Object.values(v3.list).find((m) => m.priority === priority);
			if (betData && Object.keys(betData.list).length > 0) {
				Object.entries(betData.list).map(([k4, v4]) => {
					betItem.append(createBetItemContainer(betData, k4, v4, k3, priority))
				});
			}
			
			bodyMain.append(betItem);
		}
	}

	function createBetItemContainer(betData, k4, v4, k3, priority) {
		let itemContainer = $('<div>').addClass('itemContainer');
		
		itemContainer.attr('mainline', betData.base_main_line == k4 ? 1 : 0)
		itemContainer.attr('itemcontainerline', k4 || 'no-line' )

		v4.map((v5, s) => {
			let item = $('div[template="item"]').clone();
			let o = 0
			item.attr('fixture_id', k3);
			switch (v5.market_bet_name_en) {
				case 1:case '1':case 'Over':
					o = 0
					break;
				case 2:case '2':case 'Under':
					o = 1
					break;
				case 'X':
					o = 2
					break;
			}

			item.attr('index', o);
			item.attr('sport', sport);
			item.attr('market_id', betData.market_id);
			item.attr('market_bet_id', v5.market_bet_id);
			item.attr('price', v5.price);
			item.attr('priority', priority);
			item.find('[key="odd"] span').html(v5.price);
			item.find('[key="name"]').html(v5.market_bet_name);
			item.find('[key="line"]').html(v5.line);
			item.find('[key="lastUpdate"]').html(formateLastUpdate(v5.last_update));

			// bet_total
			item.find('[key="betTotal"]').on('click', function(event) {
				event.preventDefault();
				event.stopPropagation();
				window.open(
					`/sport/order?fixture_id=${k3}&market_id=${betData.market_id}`,
					'_blank',
					'width=1200,height=700'
				);
			});
			item.find('[key="betTotal"] [key="count"]').html(betData.bet_total?.[v5.market_bet_name_en]?.count)
			item.find('[key="betTotal"] [key="total"]').html(betData.bet_total?.[v5.market_bet_name_en]?.total)

			// api開關
			if (v5.status !== 1) {
				item.addClass('apiLock');
			}

			// 風控判定
			let updateRisk = betData.risk
			if (updateRisk[o] !== null) {
				if (updateRisk[o] === 0) {
					item.addClass('riskLock'); // 強制關
				}
				if (updateRisk[o] === 1) {
					item.addClass('riskOpen'); // 強制開
				}
			}

			item.removeAttr('hidden');
			item.removeAttr('template');
			itemContainer.append(item);
		});

		// 補空格
		let columnItemCount = 2;
		if (sport === 6046 && priorityCate.allwin.indexOf(priority) === -1) columnItemCount = 3;
		if (columnItemCount > v4.length) {
			let toFillCount = columnItemCount - v4.length;
			for (let k = 0; k < toFillCount; k++) {
				let item = $('div[template="item"]').clone();
				item.attr('fixture_id', k3);
				item.attr('index', k + v4.length);
				item.attr('sport', sport);
				item.attr('priority', priority);
				item.attr('empty', 1);
				item.find('[key="betTotal"]').remove()
				item.removeAttr('hidden');
				item.removeAttr('template');

				itemContainer.append(item);
			}
		}
		return itemContainer;
	}

	function caller(url, data, obj) {
		return new Promise((resolve, reject) => {
			$.ajax({
				url: url,
				method: 'POST',
				data: data,
				success: function(data) {
					const json = JSON.parse(data);
					if (json.gzip) {
						const str = json.data;
						const bytes = atob(str).split('').map(char => char.charCodeAt(0));
						const buffer = new Uint8Array(bytes).buffer;
						const uncompressed = JSON.parse(pako.inflate(buffer, {
							to: 'string'
						}));
						json.data = uncompressed;
					}
					Object.assign(obj, json);
					resolve(); // 解决 Promise
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.error('Ajax error:', textStatus, errorThrown);
					reject(errorThrown); // 拒绝 Promise 并传递错误信息
				}
			});
		});
	}

	// convert search data to obj
	function paramsToObject(entries) {
		const result = {}
		for (const [key, value] of entries) { // each 'entry' is a [key, value] tupple
			result[key] = value;
		}
		return result;
	}

	formatDateTime = (dateTimeString) => {
		const dateTime = new Date(dateTimeString);
		const month = (dateTime.getMonth() + 1).toString().padStart(2, '0'); // Get month (0-based index), add 1, and pad with '0' if needed
		const day = dateTime.getDate().toString().padStart(2, '0'); // Get day and pad with '0' if needed
		const hour = dateTime.getHours().toString().padStart(2, '0'); // Get hours and pad with '0' if needed
		const minute = dateTime.getMinutes().toString().padStart(2, '0'); // Get minutes and pad with '0' if needed
		return `${month}-${day} ${hour}:${minute}`;
	}

	function formateLastUpdate(last_update) {
		const unixTimestamp = last_update * 1000; // 將秒轉換為毫秒
		const date = new Date(unixTimestamp);
		const options = {
			month: 'numeric',
			day: '2-digit',
			hour: '2-digit',
			minute: '2-digit',
			second: '2-digit',
			hour12: false,
		};
		const formattedDate = date.toLocaleString('en-US', options);

		// 使用正則表達式將日期部分轉換為 "MM-DD" 的格式
		const formattedDateMMDD = formattedDate.replace(/^(\d+)\/(\d+),/, (match, p1, p2) => {
			return `${p1}-${p2}`;
		});

		return formattedDateMMDD;
	}

	//////////////////////////////////

	// 設定賽事審核通過
	// set fixture enable
	function setFixtureEnable(fixture_id, enable) {
		$(`.fixtureCard[fixture_id=${fixture_id}]`).attr('risk_status', enable)
		$(`.fixtureCard[fixture_id=${fixture_id}]`).find('button[key="enable"]').prop('disabled', enable ? true : false) 
		$(`.fixtureCard[fixture_id=${fixture_id}]`).find('button[key="disable"]').prop('disabled', !enable ? true : false) 
		$.post("/api/fixture_enable", {
			fixture_id: fixture_id,
      		_token : "{{ csrf_token() }}",
			status: enable
		},
		function(data, status) {
			var cc = JSON.parse(data);
			if (cc.status == 1) {
				// 映設到表單
				// location.reload();
			} else {
				$.SOW.core.toast.show('danger', '', cc.message, 'top-end', 0, true);
			}
		});
	}

	// 設定開關盤
	function setFixtureRisk(fixture_id, data) {
		$.post("setRisk", {
			fixture_id: fixture_id,
			risk_data: JSON.stringify(data)
		},
		function(data, status) {
			var cc = JSON.parse(data);
			if (cc.status == 1) {
				// 映設到表單
				// riskData = null
				// location.reload();
				// Object.entries(data).map( ([k, v]) => {
				// 	for (let i = 0; i < v.length; i++) {
				// 		const e = v[i];
				// 		if( e === 0 ) $(`.betItem[fixture_id=${fixture_id}][market_id=${k}][index=${i}]`).addClass('riskLock')
				// 		if( e === 1 ) $(`.betItem[fixture_id=${fixture_id}][market_id=${k}][index=${i}]`).addClass('riskOpen')
				// 	}
				// })
			} else {
				$.SOW.core.toast.show('danger', '', cc.message, 'top-end', 0, true);
			}
		});
	}

	// 取得開關盤資料
	function getFixtureRisk(fixture_id) {

	}
</script>
@endpush

@endsection