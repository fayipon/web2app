@extends('layout.main')

@section('content')

				<!-- MIDDLE -->
				<div id="middle" class="flex-fill">


					<!-- Primary -->
					<section class="rounded mb-3">

					<div class="col-12 col-xl-12 mb-3">
<div class="row gutters-sm">


						<!-- WIDGET : TASKS -->
						<div class="col-12 col-xl-4 mb-3">

							<div class="portlet">
								
								<div class="portlet-header">

									<ul class="nav nav-pills float-end " id="tabUserList" role="tablist">
										<li class="nav-item">
											<a class="nav-link py-1 px-2 active" id="usertab-1" data-toggle="tab" href="#usertab_1" role="tab" aria-controls="usertab_1" aria-selected="true">
												Today
											</a>
										</li>

										<li class="nav-item">
											<a class="nav-link py-1 px-2" id="usertab-2" data-toggle="tab" href="#usertab_2" role="tab" aria-controls="usertab_2" aria-selected="false">
												Month
											</a>
										</li>
									</ul>


									<span class="d-block text-muted text-truncate font-weight-medium">
										Tasks
									</span>
								</div>

								<div id="tabUserListContent" class="portlet-body max-h-500 tab-content">

									<!-- tab 1 -->
									<div class="h-100 tab-pane show active" id="usertab_1" role="tabpanel" aria-labelledby="usertab-1">

										<!-- 
											PLEASE PAY ATTENTION TO FORM ID : REQUIRED , 
											MUST BE UNIQUE AND SPECIFIED TO EACH BUTTON/LINK IN "selected items" AS ATTRIBUTE 
												
												data-js-form-advanced-form-id="#FORM_TASK_LIST_TODAY"
										-->
										<form novalidate="" id="FORM_TASK_LIST_TODAY" method="post" action="../../html_frontend/php/demo.ajax_request.php" class="bs-validate h-100 d-flex align-items-stretch justify-content-lg-between align-items-start flex-column">

											<!-- 

												IMPORTANT
												The "action" hidden input is updated by "selected items" action
													data-js-form-advanced-hidden-action-id="..."
													data-js-form-advanced-hidden-action-value="..."

												PHP example of data backed processing:

													if($_POST['action'] === 'delete') {

														foreach($_POST['item_id'] as $item_id) {
															// ... delete $item_id from database
														}

													}

											-->
											<input type="hidden" id="action_today" name="action" value=""><!-- value populated by js -->

											<!-- task list -->
											<div id="task_list_today" class="max-h-500 scrollable-vertical scrollable-styled-dark align-self-baseline h-100 max-h-500 w-100">


												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-danger bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="1">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Retest Smarty and make a list of all bugs</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by J. Doe</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															30 min. ago
														</div>

													</div>
												</div>
												<!-- /item -->



												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-secondary-soft bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="2">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Check the documentation</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by J. Doe</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															2 days ago
														</div>

													</div>
												</div>
												<!-- /item -->


												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-warning bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="3">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Server gzip compression is failing</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by J. Doe</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															2 days ago
														</div>

													</div>
												</div>
												<!-- /item -->



												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-info bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="4">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">New niche layout is required</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by J. Doe</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															4 days ago
														</div>

													</div>
												</div>
												<!-- /item -->



												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-success bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="5">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted"><del>Fix server headers</del></a>
															<a href="#!" class="fs--13 d-block text-gray-500">by J. Doe</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															6 days ago
														</div>

													</div>
												</div>
												<!-- /item -->


												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-primary bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="6">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Check customer new data</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by J. Doe</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															2 weeks ago
														</div>

													</div>
												</div>
												<!-- /item -->



												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-primary bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="7">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Check server production logs</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by J. Doe</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															1 month ago
														</div>

													</div>
												</div>
												<!-- /item -->

											</div>
											<!-- /task list -->


											<div class="mt-3">

												<!-- SELECTED ITEMS -->
												<div class="d-flex align-self-baseline w-100"><!-- using .dropdown, autowidth not working -->

													<a href="#" class="btn btn-sm text-gray-500 b-0 fs--16 shadow-none font-weight-light" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
														<span class="group-icon">
															<i class="fi fi-dots-vertical-full"></i>
															<i class="fi fi-close"></i>
														</span>
														<span>Selected Items</span>
													</a>

													<div class="dropdown-menu dropdown-menu-clean dropdown-click-ignore max-w-250">

														<!--
															buttons attributes : documentation/components-tables.html
														-->
														<div class="scrollable-vertical max-h-50vh">

															<a href="#" class="dropdown-item text-truncate js-form-advanced-bulk" data-js-form-advanced-bulk-hidden-action-id="#action_today" data-js-form-advanced-bulk-hidden-action-value="mark_solved" data-js-form-advanced-bulk-container-items="#task_list_today" data-js-form-advanced-bulk-required-selected="true" data-js-form-advanced-bulk-required-txt-error="No Items Selected!" data-js-form-advanced-bulk-required-txt-position="top-center" data-js-form-advanced-bulk-required-custom-modal="" data-js-form-advanced-bulk-required-custom-modal-content-ajax="" data-js-form-advanced-bulk-required-modal-type="success" data-js-form-advanced-bulk-required-modal-size="modal-md" data-js-form-advanced-bulk-required-modal-txt-title="Please Confirm" data-js-form-advanced-bulk-required-modal-txt-subtitle="Selected Items: {{no_selected}}" data-js-form-advanced-bulk-required-modal-txt-body-txt="Set unsolved {{no_selected}} selected items?" data-js-form-advanced-bulk-required-modal-txt-body-info="" data-js-form-advanced-bulk-required-modal-btn-text-yes="Confirm" data-js-form-advanced-bulk-required-modal-btn-text-no="Cancel" data-js-form-advanced-bulk-submit-without-confirmation="false" data-js-form-advanced-form-id="#FORM_TASK_LIST_TODAY">
																<i class="fi fi-check"></i>
																Set : Solved
															</a>
															<a href="#" class="dropdown-item text-truncate js-form-advanced-bulk" data-js-form-advanced-bulk-hidden-action-id="#action_today" data-js-form-advanced-bulk-hidden-action-value="mark_unsolved" data-js-form-advanced-bulk-container-items="#task_list_today" data-js-form-advanced-bulk-required-selected="true" data-js-form-advanced-bulk-required-txt-error="No Items Selected!" data-js-form-advanced-bulk-required-txt-position="top-center" data-js-form-advanced-bulk-required-custom-modal="" data-js-form-advanced-bulk-required-custom-modal-content-ajax="" data-js-form-advanced-bulk-required-modal-type="warning" data-js-form-advanced-bulk-required-modal-size="modal-md" data-js-form-advanced-bulk-required-modal-txt-title="Please Confirm" data-js-form-advanced-bulk-required-modal-txt-subtitle="Selected Items: {{no_selected}}" data-js-form-advanced-bulk-required-modal-txt-body-txt="Set unsolved {{no_selected}} selected items?" data-js-form-advanced-bulk-required-modal-txt-body-info="" data-js-form-advanced-bulk-required-modal-btn-text-yes="Confirm" data-js-form-advanced-bulk-required-modal-btn-text-no="Cancel" data-js-form-advanced-bulk-submit-without-confirmation="false" data-js-form-advanced-form-id="#FORM_TASK_LIST_TODAY">
																<i class="fi fi-close"></i>
																Set : Unsolved
															</a>

															<a href="#" class="dropdown-item text-truncate js-form-advanced-bulk" data-js-form-advanced-bulk-hidden-action-id="#action_today" data-js-form-advanced-bulk-hidden-action-value="delete" data-js-form-advanced-bulk-container-items="#task_list_today" data-js-form-advanced-bulk-required-selected="true" data-js-form-advanced-bulk-required-txt-error="No Items Selected!" data-js-form-advanced-bulk-required-txt-position="top-center" data-js-form-advanced-bulk-required-custom-modal="" data-js-form-advanced-bulk-required-custom-modal-content-ajax="" data-js-form-advanced-bulk-required-modal-type="danger" data-js-form-advanced-bulk-required-modal-size="modal-md" data-js-form-advanced-bulk-required-modal-txt-title="Please Confirm" data-js-form-advanced-bulk-required-modal-txt-subtitle="Selected Items: {{no_selected}}" data-js-form-advanced-bulk-required-modal-txt-body-txt="Are you sure? Delete {{no_selected}} selected items?" data-js-form-advanced-bulk-required-modal-txt-body-info="Please note: this is a permanent action!" data-js-form-advanced-bulk-required-modal-btn-text-yes="Yes, Delete" data-js-form-advanced-bulk-required-modal-btn-text-no="Cancel" data-js-form-advanced-bulk-submit-without-confirmation="false" data-js-form-advanced-form-id="#FORM_TASK_LIST_TODAY">
																<i class="fi fi-thrash text-danger"></i>
																Set : Delete
															</a>

														</div>

													</div>

												</div>
												<!-- /SELECTED ITEMS -->

											</div>

										</form>

									</div>
									
									<!-- tab 2 -->
									<div class="h-100 tab-pane" id="usertab_2" role="tabpanel" aria-labelledby="usertab-2">

										<!-- 
											PLEASE PAY ATTENTION TO FORM ID : REQUIRED , 
											MUST BE UNIQUE AND SPECIFIED TO EACH BUTTON/LINK IN "selected items" AS ATTRIBUTE 
											
												data-js-form-advanced-form-id="#FORM_TASK_LIST_MONTH"
										-->
										<form novalidate="" id="FORM_TASK_LIST_MONTH" method="post" action="../../html_frontend/php/demo.ajax_request.php" class="bs-validate h-100 d-flex align-items-stretch justify-content-lg-between align-items-start flex-column">

											<!-- 

												IMPORTANT
												The "action" hidden input is updated by "selected items" action
													data-js-form-advanced-hidden-action-id="..."
													data-js-form-advanced-hidden-action-value="..."

												PHP example of data backed processing:

													if($_POST['action'] === 'delete') {

														foreach($_POST['item_id'] as $item_id) {
															// ... delete $item_id from database
														}

													}

											-->
											<input type="hidden" id="action_month" name="action" value=""><!-- value populated by js -->

											<!-- task list -->
											<div id="task_list_month" class="max-h-500 scrollable-vertical scrollable-styled-dark align-self-baseline h-100 max-h-500 w-100">

												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-danger bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="1">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Check the documentation</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by Mark Dennis</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															5 hours ago
														</div>

													</div>
												</div>
												<!-- /item -->



												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-secondary-soft bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="2">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Server gzip compression is failing</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by Mark Dennis</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															8 hours ago
														</div>

													</div>
												</div>
												<!-- /item -->


												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-warning bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="3">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Retest Smarty and make a list of all bugs</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by Mark Dennis</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															1 days ago
														</div>

													</div>
												</div>
												<!-- /item -->



												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-info bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="4">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Fix server headers</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by Mark Dennis</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															3 days ago
														</div>

													</div>
												</div>
												<!-- /item -->



												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-success bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="5">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">New niche layout is required</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by Mark Dennis</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															5 days ago
														</div>

													</div>
												</div>
												<!-- /item -->



												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-primary bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="6">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Check server production logs</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by Mark Dennis</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															3 weeks ago
														</div>

													</div>
												</div>
												<!-- /item -->



												<!-- item -->
												<div class="border-bottom border-light">
													<div class="d-flex align-items-center p-3 border-left border-primary bw--3">

														<div class="flex-none w--30">
															<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
																<input type="checkbox" name="item_id[]" value="7">
																<i></i>
															</label>
														</div>

														<div class="flex-fill text-truncate line-height-1">
															<a href="#!" class="text-muted">Check customer new data</a>
															<a href="#!" class="fs--13 d-block text-gray-500">by Mark Dennis</a>
														</div>

														<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
															2 months ago
														</div>

													</div>
												</div>
												<!-- /item -->

											</div>
											<!-- /task list -->


											<div class="mt-3">

												<!-- SELECTED ITEMS -->
												<div class="d-flex align-self-baseline w-100"><!-- using .dropdown, autowidth not working -->

													<a href="#" class="btn btn-sm text-gray-500 b-0 fs--16 shadow-none font-weight-light" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
														<span class="group-icon">
															<i class="fi fi-dots-vertical-full"></i>
															<i class="fi fi-close"></i>
														</span>
														<span>Selected Items</span>
													</a>

													<div class="dropdown-menu dropdown-menu-clean dropdown-click-ignore max-w-250">
														
														<!--
															buttons attributes : documentation/components-tables.html
														-->
														<div class="scrollable-vertical max-h-50vh">

															<a href="#" class="dropdown-item text-truncate js-form-advanced-bulk" data-js-form-advanced-bulk-hidden-action-id="#action_month" data-js-form-advanced-bulk-hidden-action-value="mark_solved" data-js-form-advanced-bulk-container-items="#task_list_month" data-js-form-advanced-bulk-required-selected="true" data-js-form-advanced-bulk-required-txt-error="No Items Selected!" data-js-form-advanced-bulk-required-txt-position="top-center" data-js-form-advanced-bulk-required-custom-modal="" data-js-form-advanced-bulk-required-custom-modal-content-ajax="" data-js-form-advanced-bulk-required-modal-type="success" data-js-form-advanced-bulk-required-modal-size="modal-md" data-js-form-advanced-bulk-required-modal-txt-title="Please Confirm" data-js-form-advanced-bulk-required-modal-txt-subtitle="Selected Items: {{no_selected}}" data-js-form-advanced-bulk-required-modal-txt-body-txt="Set unsolved {{no_selected}} selected items?" data-js-form-advanced-bulk-required-modal-txt-body-info="" data-js-form-advanced-bulk-required-modal-btn-text-yes="Confirm" data-js-form-advanced-bulk-required-modal-btn-text-no="Cancel" data-js-form-advanced-bulk-submit-without-confirmation="false" data-js-form-advanced-form-id="#FORM_TASK_LIST_MONTH">
																<i class="fi fi-check"></i>
																Set : Solved
															</a>
															<a href="#" class="dropdown-item text-truncate js-form-advanced-bulk" data-js-form-advanced-bulk-hidden-action-id="#action_month" data-js-form-advanced-bulk-hidden-action-value="mark_unsolved" data-js-form-advanced-bulk-container-items="#task_list_month" data-js-form-advanced-bulk-required-selected="true" data-js-form-advanced-bulk-required-txt-error="No Items Selected!" data-js-form-advanced-bulk-required-txt-position="top-center" data-js-form-advanced-bulk-required-custom-modal="" data-js-form-advanced-bulk-required-custom-modal-content-ajax="" data-js-form-advanced-bulk-required-modal-type="warning" data-js-form-advanced-bulk-required-modal-size="modal-md" data-js-form-advanced-bulk-required-modal-txt-title="Please Confirm" data-js-form-advanced-bulk-required-modal-txt-subtitle="Selected Items: {{no_selected}}" data-js-form-advanced-bulk-required-modal-txt-body-txt="Set unsolved {{no_selected}} selected items?" data-js-form-advanced-bulk-required-modal-txt-body-info="" data-js-form-advanced-bulk-required-modal-btn-text-yes="Confirm" data-js-form-advanced-bulk-required-modal-btn-text-no="Cancel" data-js-form-advanced-bulk-submit-without-confirmation="false" data-js-form-advanced-form-id="#FORM_TASK_LIST_MONTH">
																<i class="fi fi-close"></i>
																Set : Unsolved
															</a>

															<a href="#" class="dropdown-item text-truncate js-form-advanced-bulk" data-js-form-advanced-bulk-hidden-action-id="#action_month" data-js-form-advanced-bulk-hidden-action-value="delete" data-js-form-advanced-bulk-container-items="#task_list_month" data-js-form-advanced-bulk-required-selected="true" data-js-form-advanced-bulk-required-txt-error="No Items Selected!" data-js-form-advanced-bulk-required-txt-position="top-center" data-js-form-advanced-bulk-required-custom-modal="" data-js-form-advanced-bulk-required-custom-modal-content-ajax="" data-js-form-advanced-bulk-required-modal-type="danger" data-js-form-advanced-bulk-required-modal-size="modal-md" data-js-form-advanced-bulk-required-modal-txt-title="Please Confirm" data-js-form-advanced-bulk-required-modal-txt-subtitle="Selected Items: {{no_selected}}" data-js-form-advanced-bulk-required-modal-txt-body-txt="Are you sure? Delete {{no_selected}} selected items?" data-js-form-advanced-bulk-required-modal-txt-body-info="Please note: this is a permanent action!" data-js-form-advanced-bulk-required-modal-btn-text-yes="Yes, Delete" data-js-form-advanced-bulk-required-modal-btn-text-no="Cancel" data-js-form-advanced-bulk-submit-without-confirmation="false" data-js-form-advanced-form-id="#FORM_TASK_LIST_MONTH">
																<i class="fi fi-thrash text-danger"></i>
																Set : Delete
															</a>

														</div>

													</div>

												</div>
												<!-- /SELECTED ITEMS -->

											</div>

										</form>

									</div>

								</div>

							</div>

						</div>
						<!-- /WIDGET : TASKS -->




						<!-- WIDGET : TICKETS -->
						<div class="col-12 col-xl-4 mb-3">

							<div class="portlet">
								
								<div class="portlet-header">

									<div class="float-end dropdown">

										<!-- reload ajax content -->
										<a href="#!" id="summaryTicketListReloadBtn" aria-label="Reload Content" class="btn btn-sm btn-light px-2 py-1 fs--15 mt--n3">
											<span class="group-icon">
												<i class="fi fi-circle-spin"></i>
												<i class="fi fi-circle-spin fi-spin"></i>
											</span>
										</a>

										<!-- dropdown -->
										<button type="button" class="dropdown-toggle btn btn-sm btn-soft btn-primary px-2 py-1 fs--15 mt--n3" id="dropdownRecent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fi fi-dots-vertical m-0"></i>
										</button>

										<!--
											
											Note: .dropdown-menu-click-update
												is the key class to set the link active on click
												and close dropdown (if .dropdown-click-ignore is not set)
										
										-->
										<div class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-invert dropdown-menu-click-update end-0 mt-2" aria-labelledby="dropdownRecent">

											<div class="dropdown-header">
												Filter Tickets
											</div>

											<!--

												Note: these are working ajax links!
												html_frontend/documentation/plugins-sow-ajax-navigation.html

												Both plugins are working together:
													SOW : Ajax Navigation
													SOW : Ajax Content

												data-href used here, instead of href to hide
												the link from "open in new tab" actions

											-->
											<a class="dropdown-item js-ajax" href="#!" data-href="_ajax/widget_tickets_recent.html" data-ajax-target-container="#summaryTicketList" data-ajax-update-url="false" data-ajax-show-loading-icon="true" data-ajax-autoscroll-to-content="false">
												Recent
											</a>

											<a class="dropdown-item js-ajax" href="#!" data-href="_ajax/widget_tickets_open.html" data-ajax-target-container="#summaryTicketList" data-ajax-update-url="false" data-ajax-show-loading-icon="true" data-ajax-autoscroll-to-content="false">
												Open
											</a>

											<a class="dropdown-item js-ajax" href="#!" data-href="_ajax/widget_tickets_closed.html" data-ajax-target-container="#summaryTicketList" data-ajax-update-url="false" data-ajax-show-loading-icon="true" data-ajax-autoscroll-to-content="false">
												Cosed
											</a>

											<small class="p-4 text-gray-500">* working ajax links</small>
										</div>
										<!-- /dropdown -->

									</div>

									<span class="d-block text-muted text-truncate font-weight-medium">
										Support Tickets
									</span>

								</div>


								<!-- content loaded via ajax! -->
								<div id="summaryTicketList" data-ajax-url="_ajax/widget_tickets_recent.html" data-ajax-btn-reload="#summaryTicketListReloadBtn" class="js-ajax portlet-body max-h-500 scrollable-vertical scrollable-styled-dark">

									<!-- ajax content pushed here -->
									<div class="text-center p-5"><!-- loader indicator -->
										<i class="fi fi-circle-spin fi-spin fs--30 text-gray-300"></i>
									</div>

								</div>

								<div class="d-flex align-self-baseline w-100 py-2">
									<a href="#!" class="btn btn-sm text-gray-500 b-0 fs--16 shadow-none font-weight-light">
										<i class="fi fi-arrow-end-slim"></i>
										<span>View All</span>
									</a>
								</div>

							</div>

						</div>
						<!-- /WIDGET : TICKETS -->



						<!-- WIDGET : LOGS/NOTIFICATIONS -->
						<div class="col-12 col-xl-4 mb-3">

							<div class="portlet">
								
								<div class="portlet-header">

									<div class="float-end dropdown">

										<!-- reload ajax content -->
										<a href="#!" id="summaryNotificationListReloadBtn" aria-label="Reload Content" class="btn btn-sm btn-light px-2 py-1 fs--15 mt--n3">
											<span class="group-icon">
												<i class="fi fi-circle-spin"></i>
												<i class="fi fi-circle-spin fi-spin"></i>
											</span>
										</a>

										<!-- dropdown -->
										<button type="button" class="dropdown-toggle btn btn-sm btn-soft btn-primary px-2 py-1 fs--15 mt--n3" id="dropdownLog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="js-trigger-text">Recent</span>
											<i class="fi fi-arrow-down"></i>
										</button>

										<!--
											
											Note: .dropdown-menu-click-update
												is the key class to set the link active on click
												and close dropdown (if .dropdown-click-ignore is not set)
										
										-->
										<div class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-click-update dropdown-menu-invert end-0 mt-2" aria-labelledby="dropdownLog">

											<div class="dropdown-header">
												Filter Notif.
											</div>

											<!--

												Note: these are working ajax links!
												html_frontend/documentation/plugins-sow-ajax-navigation.html

												Both plugins are working together:
													SOW : Ajax Navigation
													SOW : Ajax Content

												data-href used here, instead of href to hide
												the link from "open in new tab" actions

												NOTE: .js-ajax-text-update
													Used by SOW : Dropdown to update the text
													on button trigger! The button must have the same class!

											-->
											<a class="dropdown-item js-ajax" href="#!" data-href="_ajax/widget_notification_recent.html" data-ajax-target-container="#summaryNotificationList" data-ajax-update-url="false" data-ajax-show-loading-icon="true" data-ajax-autoscroll-to-content="false">
												<span class="js-trigger-text">Recent</span>
											</a>

											<a class="dropdown-item js-ajax" href="#!" data-href="_ajax/widget_notification_errors.html" data-ajax-target-container="#summaryNotificationList" data-ajax-update-url="false" data-ajax-show-loading-icon="true" data-ajax-autoscroll-to-content="false">
												<span class="js-trigger-text">Errors</span>
											</a>

											<a class="dropdown-item js-ajax" href="#!" data-href="_ajax/widget_notification_warnings.html" data-ajax-target-container="#summaryNotificationList" data-ajax-update-url="false" data-ajax-show-loading-icon="true" data-ajax-autoscroll-to-content="false">
												<span class="js-trigger-text">Warnings</span>
											</a>

											<small class="p-4 text-gray-500">* working ajax links</small>
										</div>
										<!-- /dropdown -->

									</div>


									<span class="d-block text-muted text-truncate font-weight-medium">
										Notifications	
									</span>

								</div>


								<!-- content loaded via ajax! -->
								<div id="summaryNotificationList" data-ajax-url="_ajax/widget_notification_recent.html" data-ajax-btn-reload="#summaryNotificationListReloadBtn" class="js-ajax portlet-body max-h-500 scrollable-vertical scrollable-styled-dark">

									<!-- ajax content pushed here -->
									<div class="text-center p-5"><!-- loader indicator -->
										<i class="fi fi-circle-spin fi-spin fs--30 text-gray-300"></i>
									</div>

								</div>



								<div class="d-flex align-self-baseline w-100 py-2">
									<a href="#!" class="btn btn-sm text-gray-500 b-0 fs--16 shadow-none font-weight-light">
										<i class="fi fi-arrow-end-slim"></i>
										<span>View All</span>
									</a>
								</div>

							</div>

						</div>
						<!-- /WIDGET : LOGS/NOTIFICATIONS -->



						<!-- ALERT : UPGRADE -->
						<div class="col-12 mb-3">
							<div class="bg-white shadow-xs fs--16 p-2 row-pill">

								<div class="clearfix bg-light p-2 rounded row-pill">
									<a href="#!" title="Upgrade" aria-label="Upgrade" class="btn btn-pill btn-sm btn-warning py-1 mb-0 float-start transition-hover-end">
										Upgrade
									</a>
									<span class="d-block pt-1 pl-2 pr-2 text-muted text-truncate">
										using 89% of total storage
									</span>
								</div>

							</div>
						</div>
						<!-- /ALERT : UPGDARE -->



						<!-- WIDGET : IMPORTS -->
						<div class="col-12 col-xl-8 mb-3">

							<div class="portlet">
								
								<div class="portlet-header">

									<div class="float-end dropdown">

										<a href="#!" class="btn btn-sm btn-light px-2 py-1 fs--15 mt--n3">
											View All
										</a>

									</div>


									<span class="d-block text-muted text-truncate font-weight-medium">
										Shop Imports	
									</span>

								</div>


								<!-- content loaded via ajax! -->
								<div class="portlet-body max-h-500 scrollable-vertical scrollable-styled-dark">

									<!-- item -->
									<div class="d-flex align-items-center p-3 border-bottom border-light">

										<div class="flex-none w--40">
											<img width="40" height="40" class="img-fluid lazy" data-src="../../html_frontend/demo.files/svg/icons/files/csv.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="text-muted">384 items imported, 766 updated, 12 ignored</span>
											<span class="fs--13 d-block text-gray-500">29 June, 2020 / 18:44</span>
										</div>

										<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end dropdown">

											<!-- dropdown -->
											<a id="dropdownImport_1" href="#!" class="dropdown-toggle btn btn-sm btn-soft btn-primary px-2 py-1 fs--15 mt--n3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fi fi-dots-vertical m-0"></i>
											</a>

											<div aria-labelledby="dropdownImport_1" class="prefix-link-icon prefix-icon-dot dropdown-menu mt-2">

												<a href="#!" class="dropdown-item">
													View Log
												</a>

												<a href="#!" class="dropdown-item">
													Download
												</a>

											</div>
											<!-- /dropdown -->

										</div>


									</div>
									<!-- /item -->



									<!-- item -->
									<div class="d-flex align-items-center p-3 border-bottom border-light">

										<div class="flex-none w--40">
											<img width="40" height="40" class="img-fluid lazy" data-src="../../html_frontend/demo.files/svg/icons/files/csv.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="text-muted">12 items imported, 67 updated, 1 ignored</span>
											<span class="fs--13 d-block text-gray-500">15 February, 2020 / 16:51</span>
										</div>

										<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
											<a href="#!">view log</a>
										</div>

									</div>
									<!-- /item -->



									<!-- item -->
									<div class="d-flex align-items-center p-3 border-bottom border-light">

										<div class="flex-none w--40">
											<img width="40" height="40" class="img-fluid lazy" data-src="../../html_frontend/demo.files/svg/icons/files/jpg.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
										</div>

										<div class="flex-fill text-truncate px-3">
											<span class="text-muted">384 images imported to 281 products</span>
											<span class="fs--13 d-block text-gray-500">1 February, 2020 / 13:43</span>
										</div>

										<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
											<a href="#!">view log</a>
										</div>

									</div>
									<!-- /item -->

								</div>

								<div class="d-flex align-self-baseline w-100 py-2">
									<a href="#!" class="btn btn-sm text-gray-500 b-0 fs--16 shadow-none font-weight-light">
										<i class="fi fi-arrow-end-slim"></i>
										<span>View All</span>
									</a>
								</div>

							</div>

						</div>
						<!-- /WIDGET : IMPORTS -->




						<!-- WIDGET : ORDERS -->
						<div class="col-12 col-xl-4 mb-3">

							<div class="portlet">
								
								<div class="portlet-header">

									<div class="float-end dropdown">

										<!-- dropdown -->
										<button type="button" class="dropdown-toggle btn btn-sm btn-soft btn-primary px-2 py-1 fs--15 mt--n3" id="dropdownOrders" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="js-trigger-text">Export</span>
											<i class="fi fi-arrow-down"></i>
										</button>

										<div class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-invert mt-2" aria-labelledby="dropdownOrders">

											<div class="dropdown-header">
												Export Options
											</div>

											<a href="#!" class="dropdown-item">
												Export CSV
											</a>

											<a href="#!" class="dropdown-item">
												Export XLS
											</a>

											<a href="#!" class="dropdown-item">
												Export PDF
											</a>

											<a href="#!" class="dropdown-item">
												Print
											</a>

										</div>
										<!-- /dropdown -->

									</div>

									<span class="d-block text-muted text-truncate font-weight-medium">
										Orders	
									</span>

								</div>


								<!-- content loaded via ajax! -->
								<div class="portlet-body max-h-500 scrollable-vertical scrollable-styled-dark">

									<!-- ORDER -->
									<a href="#!" class="clearfix d-block dropdown-item font-weight-medium p-3 rounded overflow-hidden border-bottom border-light">

										<!-- badge -->
										<span class="float-end font-weight-normal text-danger">$2155</span>

										<!-- icon -->
										<i class="text-success fi fi-cart-1 d-middle float-start fs--20 bg-light w--40 h--40 rounded-circle text-center"></i>

										<!-- products -->
										<p class="fs--14 m-0 text-truncate font-weight-normal">
											2 items
										</p>

										<!-- date -->
										<small class="text-muted d-block fs--11">
											3 hours ago
										</small>

									</a>
									<!-- /ORDER -->



									<!-- ORDER -->
									<a href="#!" class="clearfix d-block dropdown-item font-weight-medium p-3 rounded overflow-hidden border-bottom border-light">

										<!-- badge -->
										<span class="float-end font-weight-normal text-danger">$984.99</span>

										<!-- icon -->
										<i class="text-success fi fi-cart-1 d-middle float-start fs--20 bg-light w--40 h--40 rounded-circle text-center"></i>

										<!-- products -->
										<p class="fs--14 m-0 text-truncate font-weight-normal">
											3 items
										</p>

										<!-- date -->
										<small class="text-muted d-block fs--11">
											8 hours ago
										</small>

									</a>
									<!-- /ORDER -->



									<!-- ORDER -->
									<a href="#!" class="clearfix d-block dropdown-item font-weight-medium p-3 rounded overflow-hidden border-bottom border-light">

										<!-- badge -->
										<span class="float-end font-weight-normal text-danger">$2155</span>

										<!-- icon -->
										<i class="text-warning fi fi-cart-1 d-middle float-start fs--20 bg-light w--40 h--40 rounded-circle text-center"></i>

										<!-- products -->
										<p class="fs--14 m-0 text-truncate font-weight-normal">
											2 products
										</p>

										<!-- date -->
										<small class="text-warning d-block fs--11">
											12 hours ago
										</small>

									</a>
									<!-- /ORDER -->



									<!-- ORDER -->
									<a href="#!" class="clearfix d-block dropdown-item font-weight-medium p-3 rounded overflow-hidden border-bottom border-light">

										<!-- badge -->
										<span class="float-end font-weight-normal text-danger">$2155</span>

										<!-- icon -->
										<i class="text-danger fi fi-cart-1 d-middle float-start fs--20 bg-light w--40 h--40 rounded-circle text-center"></i>

										<!-- products -->
										<p class="fs--14 m-0 text-truncate font-weight-normal">
											2 products
										</p>

										<!-- date -->
										<small class="text-danger d-block fs--11">
											1 day ago
										</small>

									</a>
									<!-- /ORDER -->


								</div>


								<div class="d-flex align-self-baseline w-100 py-2">
									<a href="#!" class="btn btn-sm text-gray-500 b-0 fs--16 shadow-none font-weight-light">
										<i class="fi fi-arrow-end-slim"></i>
										<span>View All</span>
									</a>
								</div>

							</div>

						</div>
						<!-- /WIDGET : ORDERS -->

					</div>
<div class="portlet">
	
	<div class="portlet-header">

		<div class="float-end dropdown">

			<a href="#!" class="btn btn-sm btn-light px-2 py-1 fs--15 mt--n3">
				View All
			</a>

		</div>


		<span class="d-block text-muted text-truncate font-weight-medium">
			Shop Imports	
		</span>

	</div>


	<!-- content loaded via ajax! -->
	<div class="portlet-body max-h-500 scrollable-vertical scrollable-styled-dark">

		<!-- item -->
		<div class="d-flex align-items-center p-3 border-bottom border-light">

			<div class="flex-none w--40">
				<img width="40" height="40" class="img-fluid lazy" data-src="../../html_frontend/demo.files/svg/icons/files/csv.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
			</div>

			<div class="flex-fill text-truncate px-3">
				<span class="text-muted">384 items imported, 766 updated, 12 ignored</span>
				<span class="fs--13 d-block text-gray-500">29 June, 2020 / 18:44</span>
			</div>

			<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end dropdown">

				<!-- dropdown -->
				<a id="dropdownImport_1" href="#!" class="dropdown-toggle btn btn-sm btn-soft btn-primary px-2 py-1 fs--15 mt--n3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fi fi-dots-vertical m-0"></i>
				</a>

				<div aria-labelledby="dropdownImport_1" class="prefix-link-icon prefix-icon-dot dropdown-menu mt-2">

					<a href="#!" class="dropdown-item">
						View Log
					</a>

					<a href="#!" class="dropdown-item">
						Download
					</a>

				</div>
				<!-- /dropdown -->

			</div>


		</div>
		<!-- /item -->



		<!-- item -->
		<div class="d-flex align-items-center p-3 border-bottom border-light">

			<div class="flex-none w--40">
				<img width="40" height="40" class="img-fluid lazy" data-src="../../html_frontend/demo.files/svg/icons/files/csv.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
			</div>

			<div class="flex-fill text-truncate px-3">
				<span class="text-muted">12 items imported, 67 updated, 1 ignored</span>
				<span class="fs--13 d-block text-gray-500">15 February, 2020 / 16:51</span>
			</div>

			<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
				<a href="#!">view log</a>
			</div>

		</div>
		<!-- /item -->



		<!-- item -->
		<div class="d-flex align-items-center p-3 border-bottom border-light">

			<div class="flex-none w--40">
				<img width="40" height="40" class="img-fluid lazy" data-src="../../html_frontend/demo.files/svg/icons/files/jpg.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
			</div>

			<div class="flex-fill text-truncate px-3">
				<span class="text-muted">384 images imported to 281 products</span>
				<span class="fs--13 d-block text-gray-500">1 February, 2020 / 13:43</span>
			</div>

			<div class="w--180 fs--14 text-gray-500 font-weight-light text-align-end">
				<a href="#!">view log</a>
			</div>

		</div>
		<!-- /item -->

	</div>

	<div class="d-flex align-self-baseline w-100 py-2">
		<a href="#!" class="btn btn-sm text-gray-500 b-0 fs--16 shadow-none font-weight-light">
			<i class="fi fi-arrow-end-slim"></i>
			<span>View All</span>
		</a>
	</div>

</div>

</div>
					</section>
					<!-- /Primary -->


				</div>
				<!-- /MIDDLE -->

@endsection