<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->view('template/meta-info.php'); ?>
		<?php $this->view('template/css-link.php'); ?>

	</head>
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<?php $this->view('template/header-mobile.php'); ?>
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
				<?php $this->view('template/aside-left.php'); ?>
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<?php $this->view('template/header.php'); ?>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<div class="d-flex align-items-center flex-wrap mr-1">
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<h5 class="text-dark font-weight-bold my-1 mr-5"><?php echo $page_title; ?></h5>
									</div>
								</div>
								<?php 
									if( strtolower( $_SESSION['role_type'] ) == "super admin" || strtolower( $_SESSION['role_type'] ) == "sub admin"  ){
								?>

								<div class="d-flex align-items-center">
									<a href="<?php echo base_url(); ?>record/add" title="New Record" class="btn btn-outline-primary btn-sm font-weight-bold font-size-base mr-1"  >
										<i class="fas fa-plus-circle"></i>	New Pre Registered
									</a> 

									<a href="<?php echo base_url(); ?>validated/add" title="New Validated" class="btn btn-outline-primary btn-sm font-weight-bold font-size-base mr-1"  >
										<i class="fas fa-plus-circle"></i>	New Validated
									</a> 
								</div>
								<?php
									}
								?>
							</div> 
							</div>
						</div>
						
					<div class="d-flex flex-column-fluid">
						<div class="container">
							<?php 
								if( strtolower( $_SESSION['role_type']) == 'super admin' ){
							?>

								<div class="row">
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-warning" >
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-danger mr-2">
														<i class="fas fa-clipboard-list icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_pre_registered; ?></span>
														<span class="font-weight-bold mt-2">Pre Registered</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-success" >
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-danger mr-2">
														<i class="fas fa-stamp icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_validated; ?></span>
														<span class="font-weight-bold mt-2">Validated</span>
													</div>
												</div>
											</div>
										</div>
									</div> 

									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-info" >
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-danger mr-2">
														<i class="fas fa-syringe icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_vaccinated; ?></span>
														<span class="font-weight-bold mt-2">Vaccinated</span>
													</div>
												</div>
											</div>
										</div>
									</div> 
								</div> 
								<div class="row">  
									<div class="col" style="cursor: default !important;" >
										<div
											class="card card-custom card-stretch gutter-b bg-primary">
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-primary mr-2">
														<i class="fas fa-users icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_user; ?></span>
														<span class="font-weight-bold mt-2">Users</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-light" >
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-danger mr-2">
														<span class="svg-icon svg-icon-4x	">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="512" height="512"><g id="Outline"><path d="M440,248H408a7.981,7.981,0,0,1-8-8v-4.484a84.269,84.269,0,0,0,37.693-52.028A32,32,0,0,0,440,121.013V88a56.065,56.065,0,0,0-51.315-55.789A36.7,36.7,0,0,0,358.111,16H328a72.081,72.081,0,0,0-72,72v24a8,8,0,0,0,8,8h8v1.009a32,32,0,0,0,2.274,62.468q.312,1.317.666,2.623l15.439-4.2A68.174,68.174,0,0,1,288,164V119.758a197.684,197.684,0,0,0,89.72-26.443,52.317,52.317,0,0,0,34.108,36.393L424,133.766V164a68.006,68.006,0,0,1-107.363,55.454l-9.274,13.038A84.192,84.192,0,0,0,320,239.905V240a8.009,8.009,0,0,1-8,8h-8V224a32.036,32.036,0,0,0-32-32H48a32.036,32.036,0,0,0-32,32v24H32V224a16.019,16.019,0,0,1,16-16H272a16.019,16.019,0,0,1,16,16V368a16.019,16.019,0,0,1-16,16H183.61l8.212-38.324A8,8,0,0,0,184,336H128a8,8,0,0,0-7.353,4.849L102.154,384H48a16.019,16.019,0,0,1-16-16V264H16V368a32.036,32.036,0,0,0,32,32H95.3L74.725,448H24a8,8,0,0,0-8,8v32a8,8,0,0,0,8,8H488a8,8,0,0,0,8-8V456a8,8,0,0,0-8-8H474.264A63.85,63.85,0,0,0,496,400v-8H480v8a48.055,48.055,0,0,1-48,48H304V432a24.028,24.028,0,0,1,24-24H432a8,8,0,0,0,8-8V344h40v32h16V304A56.064,56.064,0,0,0,440,248Zm0-84V138.165a15.978,15.978,0,0,1,3.32,25.142,16.2,16.2,0,0,1-3.367,2.561C439.966,165.245,440,164.626,440,164ZM264,152a15.923,15.923,0,0,1,4.68-11.307,16.159,16.159,0,0,1,3.32-2.532V164c0,.619.017,1.236.031,1.854A16,16,0,0,1,264,152ZM376,75.66A181.933,181.933,0,0,1,278.311,104H272V95.089c68.483-8.969,92.63-32.406,93.657-33.432L354.394,50.293c-.058.056-5.877,5.589-19.922,11.985C322.657,67.659,302.7,74.652,272.761,78.84a55.568,55.568,0,0,1,4.69-14.92c29.93-.845,45.445-8.424,46.127-8.765l-7.112-14.332c-.114.056-9.07,4.292-26.61,6.229A55.784,55.784,0,0,1,328,32h30.111A20.816,20.816,0,0,1,376,42.048Zm40.888,38.87A36.351,36.351,0,0,1,392,80V48.8A40.071,40.071,0,0,1,424,88v28.9ZM335.371,245.439a84.069,84.069,0,0,0,48.835-2.325,23.888,23.888,0,0,0,6.827,13.872,24.215,24.215,0,0,0,3.875,3.137l-2.28,3.039a42.031,42.031,0,0,1-68.885-2.243A24.079,24.079,0,0,0,335.371,245.439ZM288,432v16H248V432Zm-16.984-32H272a31.94,31.94,0,0,0,8-1.013V416H264.616Zm-64,0h46.768l-6.4,16H240a8,8,0,0,0-8,8v24H216V424a8,8,0,0,0-8-8h-7.384Zm-26.835,0h9.6l-6.4,16h-6.631ZM200,432v16H169.9l3.428-16Zm-66.725-80H174.1l-20.571,96h-61.4ZM480,464v16H32V464Zm0-136H440V304H424v88H328a39.964,39.964,0,0,0-32,16.028v-18.9A31.86,31.86,0,0,0,304,368V264h3.061a58.083,58.083,0,0,0,98.369,8.76L412,264h28a40.045,40.045,0,0,1,40,40Zm-88.617-23.2,6.975,14.4A88,88,0,0,1,316,316.21l8-13.856a72,72,0,0,0,67.384,2.446ZM336,144a16,16,0,1,1-16-16A16.019,16.019,0,0,1,336,144Zm32,0a16,16,0,1,1,16,16A16.019,16.019,0,0,1,368,144Zm3.637,26.2,8.726,13.411a52.043,52.043,0,0,1-56.726,0l8.726-13.411A36.026,36.026,0,0,0,371.637,170.2ZM128,248H96V232h32Zm48-16v16H144V232Zm48,0v16H192V232Zm48,16H240V232h32ZM80,232v16H48V232Z"/></g></svg>
														</span>
													</span>
													<div class="d-flex flex-column text-right text-dark">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_online_user; ?></span>
														<span class="font-weight-bold mt-2">Online User</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-danger">
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-success mr-2">
														<i class="fas fa-calendar-check icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $registered_today; ?></span>
														<span class="font-weight-bold mt-2">Registered Today </span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> 


							<?php
								} else if( strtolower( $_SESSION['role_type']) == 'sub admin' ) {
							?>

								<div class="row">
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-warning" >
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-danger mr-2">
														<i class="fas fa-clipboard-list icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_pre_registered; ?></span>
														<span class="font-weight-bold mt-2">Pre Registered</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-success" >
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-danger mr-2">
														<i class="fas fa-stamp icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_validated; ?></span>
														<span class="font-weight-bold mt-2">Validated</span>
													</div>
												</div>
											</div>
										</div>
									</div> 
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-info" >
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-danger mr-2">
														<i class="fas fa-syringe icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_vaccinated; ?></span>
														<span class="font-weight-bold mt-2">Vaccinated</span>
													</div>
												</div>
											</div>
										</div>
									</div>  
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-danger">
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-success mr-2">
														<i class="fas fa-calendar-check icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $registered_today; ?></span>
														<span class="font-weight-bold mt-2">Registered Today </span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> 


							<?php
								} else if( strtolower( $_SESSION['role_type']) == 'user' ) {
							?>

								<div class="row">
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-warning" >
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-danger mr-2">
														<i class="fas fa-clipboard-list icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_pre_registered; ?></span>
														<span class="font-weight-bold mt-2">Pre Registered</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-success" >
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-danger mr-2">
														<i class="fas fa-stamp icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_validated; ?></span>
														<span class="font-weight-bold mt-2">Validated</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-info" >
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-danger mr-2">
														<i class="fas fa-syringe icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $number_of_vaccinated; ?></span>
														<span class="font-weight-bold mt-2">Vaccinated</span>
													</div>
												</div>
											</div>
										</div>
									</div> 
									<div class="col" style="cursor: default !important;" >
										<div class="card card-custom card-stretch gutter-b bg-danger">
											<div class="card-body p-0">
												<div
													class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-success mr-2">
														<i class="fas fa-calendar-check icon-4x text-white"></i>
													</span>
													<div class="d-flex flex-column text-right text-white">
														<span
															class="font-weight-bolder font-size-h1"><?php echo $registered_today; ?></span>
														<span class="font-weight-bold mt-2">Registered Today </span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> 

							<?php
								}
							?>

							
							<div class="row">
								<div class="col">
									<div class="card card-custom gutter-b">
										<div class="card-header">
											<div class="card-title">
												<h3 class="card-label">
													Chart
												</h3>
											</div>

											<div class="card-toolbar">
												<div class="dropdown dropdown-inline mr-2">
													<button type="button"
														class="btn btn-primary font-weight-bolder dropdown-toggle"
														data-toggle="dropdown" aria-haspopup="true"
														aria-expanded="false">Filter by</button>
													<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
														<ul class="navi flex-column navi-hover py-2">
															<li
																class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
																Choose an option:</li>
															<li class="navi-item">
																<a href="javascript:;" class="navi-link filter-by" data-fileter-by="week">
																	<span class="navi-text"> <i class="far fa-circle"></i> Week</span>
																</a>
															</li>
															<li class="navi-item">
																<a href="javascript:;" class="navi-link filter-by" data-fileter-by="month">
																	<span class="navi-text"><i class="far fa-circle"></i> Month</span>
																</a>
															</li>
															<li class="navi-item">
																<a href="javascript:;" class="navi-link filter-by" data-fileter-by="year">
																	<span class="navi-text"><i class="far fa-circle"></i> Year</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div> 
										</div>

										<div class="card-body">
											<form id="record-date-range-form" method="post" class="mb-15">
												<div class="row justify-content-center">
													<div class="col-6">
														<label><strong>Date Range</strong></label>
														<div class="input-daterange input-group" id="date-range">
															<input type="text" class="form-control datatable-input"
																name="start" autocomplete="off" placeholder="From" required="" />
															<div class="input-group-append">
																<span class="input-group-text">
																	<i class="la la-ellipsis-h"></i>
																</span>
															</div>
															<input type="text" class="form-control datatable-input"
																name="end" autocomplete="off"  placeholder="To"  required="" />
															<div class="input-group-append">
																<button type="submit" class="btn btn-primary btn-primary--icon">
																	<span>
																		<i class="fa fa-check"></i>
																		<span>Ok</span>
																	</span>
																</button>
															</div>
															<div class="input-group-append">
																<button type="button" id="reset" class="btn btn-secondary btn-secondary--icon">
																	<span>
																		<i class="la la-close"></i>
																		<span>Reset</span>
																	</span>
																</button>
															</div>
														</div>
													</div>
												</div>
											</form>
											<div id="record-chart"></div>
										</div>
									</div>
								</div>

							</div>



							<div class="row">
								<div class="col">
									<div class="card card-custom gutter-b">
										<div class="card-header">
											<div class="card-title">
												<h3 class="card-label">
													Barangay Chart
												</h3>
											</div> 
										</div>
										<div class="card-body">
											<div id="barangay-chart"></div>
										</div>
									</div>
								</div>

							</div> 


							<div class="card card-custom gutter-b">
								<div class="card-header card-header-tabs-line">
									<div class="card-title">
										<h3 class="card-label">Statistic</h3>
									</div>
									<div class="card-toolbar">
										<ul class="nav nav-tabs nav-bold nav-tabs-line">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#pre_registered_statistic">
													<span class="nav-icon">
														<span class="svg-icon svg-icon-1x	">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg"><path d="m446.604 124.392-119.996-119.997c-2.846-2.847-6.735-4.395-10.608-4.395h-210c-24.813 0-45 20.187-45 45v422c0 24.813 20.187 45 45 45h300c24.813 0 45-20.187 45-45v-332c0-4.116-1.743-7.957-4.396-10.608zm-115.604-73.179 68.787 68.787h-53.787c-8.271 0-15-6.729-15-15zm75 430.787h-300c-8.271 0-15-6.729-15-15v-422c0-8.271 6.729-15 15-15h195v75c0 24.813 20.187 45 45 45h75v317c0 8.271-6.729 15-15 15z" fill="#000000" data-original="#000000" style="" class=""/><path d="m346 242h-150c-8.284 0-15 6.716-15 15s6.716 15 15 15h150c8.284 0 15-6.716 15-15s-6.716-15-15-15z" fill="#000000" data-original="#000000" style="" class=""/><path d="m346 302h-150c-8.284 0-15 6.716-15 15s6.716 15 15 15h150c8.284 0 15-6.716 15-15s-6.716-15-15-15z" fill="#000000" data-original="#000000" style="" class=""/><path d="m346 362h-150c-8.284 0-15 6.716-15 15s6.716 15 15 15h150c8.284 0 15-6.716 15-15s-6.716-15-15-15z" fill="#000000" data-original="#000000" style="" class=""/><circle cx="136" cy="257" r="15" fill="#000000" data-original="#000000" style="" class=""/><circle cx="136" cy="317" r="15" fill="#000000" data-original="#000000" style="" class=""/><circle cx="136" cy="377" r="15" fill="#000000" data-original="#000000" style="" class=""/></g></g></svg>
														</span>
													</span>
													<span class="nav-text">Pre Registered</span>
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#validated_statistic">
													<span class="nav-icon">
														<span class="svg-icon svg-icon-1x	">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
																<g xmlns="http://www.w3.org/2000/svg">
																	<g>
																		<path d="M406.008,330.99h-75.004v-15.001c0-18.747-11.527-34.847-27.862-41.602c5.68-34.083,14.793-66.006,44.132-117.464    c8.982-15.755,13.73-33.717,13.73-51.945c0-58.077-47.153-105.413-106.006-104.975C202.756,0.392,161.71,38.51,152.952,84.444    c-5.419,28.42,0.505,56.93,16.685,80.278c22.19,32.025,32.881,71.63,39.22,109.665c-16.335,6.755-27.862,22.855-27.862,41.602    v15.001h-75.004c-41.357,0-75.004,33.647-75.004,75.004v31.002c0,8.284,6.716,15.001,15.001,15.001h15.001v15.001    c0,24.814,20.188,45.002,45.002,45.002h300.016c24.814,0,45.003-20.188,45.003-45.002v-15.001h15.001    c8.284,0,15.001-6.716,15.001-15.001v-31.002C481.012,364.637,447.365,330.99,406.008,330.99z M194.298,147.636    c-11.557-16.679-15.774-37.125-11.875-57.572c6.11-32.042,35.521-60.53,74.576-60.099c41.12,0.454,74.004,34.139,74.004,75.013    c0,13.026-3.386,25.849-9.792,37.085c-31.333,54.955-41.385,89.729-47.919,128.924h-34.588    C231.48,227.617,219.612,184.169,194.298,147.636z M301.002,315.989v15.001h-90.005v-15.001c0-8.271,6.729-15.001,15.001-15.001    h60.003C294.273,300.989,301.002,307.718,301.002,315.989z M421.009,466.998c0,8.271-6.729,15.001-15.001,15.001H105.992    c-8.271,0-15.001-6.729-15.001-15.001v-15.001h330.018V466.998z M451.011,421.995c-17.298,0-358.287,0-390.021,0v-16.001    c0-24.814,20.188-45.002,45.002-45.002c7.34,0,265.422,0,300.016,0c24.814,0,45.003,20.188,45.003,45.002V421.995z" fill="#000000" data-original="#000000" style=""/>
																	</g>
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																<g xmlns="http://www.w3.org/2000/svg">
																</g>
																</g></svg>
														</span>
													</span>
													<span class="nav-text">Validated</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="card-body">
									<div class="tab-content">
										<div class="tab-pane fade show active" id="pre_registered_statistic" role="tabpanel" aria-labelledby="pre_registered_statistic">
											<div class="row">
												<div class="col-6">
													<div class="text-center">
														Gender Statistic
													</div>
													<div id="gender-statistic" class="d-flex justify-content-center"></div>
												</div>
												<div class="col-6">
													<div class="text-center">
														Age Statistic
													</div>
													<div id="age-statistic" class="d-flex justify-content-center"></div>
													
												</div>
											</div>
											.
										</div>
										<div class="tab-pane fade" id="validated_statistic" role="tabpanel" aria-labelledby="validated_statistic">
											<div class="row">
												<div class="col-6">
													<div class="text-center">
														Gender Statistic
													</div>
													<div id="validated-gender-statistic" class="d-flex justify-content-center"></div>
												</div>
												<div class="col-6">
													<div class="text-center">
														Age Statistic
													</div>
													<div id="validated-age-statistic" class="d-flex justify-content-center"></div>
													
												</div>
											</div>
										</div> 
									</div>
								</div>
							</div>  
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	<?php $this->view('template/footer.php'); ?>
	
	<?php $this->view('template/quick-panel.php'); ?>
	<?php $this->view('template/js-src.php'); ?>

	<script src="<?php echo base_url(); ?>dist/assets/js/dashboard.js"></script> 


	<script type="text/javascript">
		$('#date-range').datepicker({
			todayHighlight: true,
			templates: {
				leftArrow: '<i class="la la-angle-left"></i>',
				rightArrow: '<i class="la la-angle-right"></i>',
			},
			dateFormat: 'yyyy/m/dd',
		});
	</script>

	</body>
</html>
