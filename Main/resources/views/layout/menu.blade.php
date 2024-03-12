<!-- sidebar -->
<aside id="aside-main" class="aside-primary aside-start aside-hide-xs d-flex flex-column px-2 h-auto">


  <!-- sidebar : logo -->
  <div class="py-2 px-3 mb-3 mt-1">
    <a href="/">
      <img src="{{ asset('assets/images/logo/logo_light.svg') }}" width="110" height="60" alt="...">
    </a>
  </div>
  <!-- /sidebar : logo -->


  <!--link-normal  sidebar : navigation -->
  <div class="aside-wrapper scrollable-vertical scrollable-styled-light align-self-baseline h-100 w-100">

	<!--

	  All parent open navs are closed on click!
	  To ignore this feature, add .js-ignore to .nav-deep

	  Links height (paddings):
		.nav-deep-xs
		.nav-deep-sm
		.nav-deep-md

	  .nav-deep-hover     hover background slightly different
	  .nav-deep-bordered  bordered links

	-->
	<nav class="nav-deep nav-deep-sm nav-deep-dark">
	  <ul class="nav flex-column">

    @if ($controller == "index")
		<li class="nav-item active">
    @else
		<li class="nav-item ">
	@endif
		  <a class="nav-link" href="/">
			<svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">  
			  <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>  
			  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
			</svg>
			<span>首頁</span>
		  </a>
		</li>

    @if ($controller == "agent")
		<li class="nav-item active">
    @else
		<li class="nav-item ">
	@endif
		  <a class="nav-link" href="#">
			<svg width="18px" height="18px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
			  <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"></path>
			  <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"></path>
			</svg>
			<span>商戶管理</span>
			<span class="group-icon float-end">
			  <i class="fi fi-arrow-end"></i>
			  <i class="fi fi-arrow-down"></i>
			</span>
		  </a>

		  <ul class="nav flex-column">
    @if (in_array("agent_user", $permission))
        @if (($controller == "agent") && ($model == "user"))
        <li class="nav-item active">
        @else
        <li class="nav-item ">
        @endif
          <a class="nav-link" href="/agent/user">商戶資料</a>
        </li>
    @endif
      
    @if (in_array("agent_player", $permission))
        @if (($controller == "agent") && ($model == "player"))
        <li class="nav-item active">
        @else
        <li class="nav-item ">
        @endif
          <a class="nav-link" href="/agent/player">玩家管理</a>
        </li>
    @endif
      
    @if (in_array("agent_report", $permission))
        @if (($controller == "agent") && ($model == "report"))
        <li class="nav-item active">
        @else
        <li class="nav-item ">
        @endif
          <a class="nav-link" href="/agent/report">商戶報表</a>
        </li>
    @endif
      
    @if (in_array("agent_bill", $permission))
        @if (($controller == "agent") && ($model == "bill"))
        <li class="nav-item active">
        @else
        <li class="nav-item ">
        @endif
          <a class="nav-link" href="/agent/bill">商戶月帳</a>
        </li>
    @endif

    @if (in_array("agent_limit", $permission))
        @if (($controller == "agent") && ($model == "limit"))
        <li class="nav-item active">
        @else
        <li class="nav-item ">
        @endif
          <a class="nav-link" href="/agent/limit">限額管理</a>
        </li>
    @endif

@if (in_array("agent_sportorder", $permission))
	@if (($controller == "agent") && ($model == "sportorder"))
	<li class="nav-item active">
	@else
	<li class="nav-item ">
	@endif
	  <a class="nav-link" href="/agent/sportorder">體育注單</a>
	</li>
@endif

@if (in_array("agent_smith", $permission))
	@if (($controller == "agent") && ($model == "smith"))
	<li class="nav-item active">
	@else
	<li class="nav-item ">
	@endif
	  <a class="nav-link" href="/agent/limit">agent Smith</a>
	</li>
@endif
      
		  </ul>
		</li>

		<!--<li class="nav-title mt-5">
		  <h6 class="mb-0 smaller text-gray-400 text-uppercase">測試工具</h6>
		</li>
		
		<li class="nav-item">
		  <a class="nav-link" href="/test/recharge" target="_blank" rel="noopener">
			<svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">  
			  <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"></path>  
			  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
			</svg>
			<span>用戶充值+10000</span>
		  </a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" href="/test/withdraw" target="_blank" rel="noopener">
			<svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">  
			  <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"></path>  
			  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
			</svg>
			<span>用戶充值-10000</span>
		  </a>
		</li>
	-->

		<li class="nav-title mt-5">
		  <h6 class="mb-0 smaller text-gray-400 text-uppercase">DEV AREA</h6>
		</li>
		
		<li class="nav-item">
		  <a class="nav-link" href="../html_frontend/documentation/index.html" target="_blank" rel="noopener">
			<svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">  
			  <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"></path>  
			  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
			</svg>
			<span>API文檔</span>
		  </a>
		</li>

		<li class="nav-item">
		  <a class="nav-link" href="../html_frontend/documentation/components-alerts.html">
			<svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-collection" viewBox="0 0 16 16">  
			  <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"></path>
			</svg>
			<span>範例</span>
		  </a>
		</li>

		<li class="nav-item">
		  <a class="nav-link" href="../html_frontend/documentation/changelog.html">
			<svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-journal-code" viewBox="0 0 16 16">  
			  <path fill-rule="evenodd" d="M8.646 5.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 8 8.646 6.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 8l1.647-1.646a.5.5 0 0 0 0-.708z"></path>  
			  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"></path>  
			  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"></path>
			</svg>
			<span>Sandbox</span>
		  </a>
		</li>

	  </ul>
	</nav>

  </div>
  <!-- /sidebar : navigation -->


  <!-- sidebar : footer -->
  <div class="d-flex align-self-baseline w-100 py-3 px-3 borer-top small">

	<p class="d-inline-grid gap-auto-3 mb-0">
	  <svg class="text-gray-600" width="22px" height="22px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.052 512.052" fill="currentColor">
		<path d="M208.026,16.026c-114.7,0-208,78.9-208,176c0,39.8,15.7,77.9,44.5,108.9l-39.8,39.8c-4.6,4.6-6,11.5-3.5,17.4c2.5,6,8.3,9.9,14.8,9.9h192c114.7,0,208-78.9,208-176S322.726,16.026,208.026,16.026z"></path>
		<path opacity="0.5" d="M467.526,428.926c28.8-30.9,44.5-69.1,44.5-108.9c0-49.8-24.6-94.9-64-126.9c-0.9,114.1-108.2,206.9-240,206.9h-89.2c34.5,56.9,104.6,96,185.2,96h192c6.5,0,12.3-3.9,14.8-9.9c2.5-6,1.1-12.9-3.5-17.4L467.526,428.926z"></path>
		<path fill="#ffffff" d="M304.026,144.026h-192c-8.8,0-16,7.2-16,16s7.2,16,16,16h192c8.8,0,16-7.2,16-16S312.826,144.026,304.026,144.026z"></path>
		<path fill="#ffffff" d="M240.026,208.026h-128c-8.8,0-16,7.2-16,16s7.2,16,16,16h128c8.8,0,16-7.2,16-16S248.826,208.026,240.026,208.026z"></path>
	  </svg>
	  <a href="#" class="text-white text-dashed">Need help?</a>
	</p>

  </div>
  <!-- /sidebar : footer -->


</aside>
<!-- /sidebar -->
