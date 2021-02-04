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
								<div class="d-flex align-items-center">
									<a href="<?php echo base_url(); ?>record/add" title="New Record" class="btn btn-outline-primary btn-sm font-weight-bold font-size-base mr-1"  >
										<i class="fas fa-plus-circle"></i>	New Record
									</a> 
								</div>
							</div> 
							</div>
						</div>
						
					<div class="d-flex flex-column-fluid">
						<div class="container">
							<div class="row">
								<div class="col" style="cursor: default !important;" >
									<div class="card card-custom card-stretch gutter-b bg-warning" >
										<div class="card-body p-0">
											<div
												class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
												<span class="symbol symbol-50 symbol-light-danger mr-2">
													<i class="fas fa-clipboard-list icon-5x text-white"></i>
												</span>
												<div class="d-flex flex-column text-right text-white">
													<span
														class="font-weight-bolder font-size-h1"><?php echo $number_of_record; ?></span>
													<span class="font-weight-bold mt-2">Record</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col" style="cursor: default !important;" >
									<div
										class="card card-custom card-stretch gutter-b bg-primary">
										<div class="card-body p-0">
											<div
												class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
												<span class="symbol symbol-50 symbol-light-primary mr-2">
													<i class="fas fa-users icon-5x text-white"></i>
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
									<div class="card card-custom card-stretch gutter-b bg-success">
										<div class="card-body p-0">
											<div
												class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
												<span class="symbol symbol-50 symbol-light-success mr-2">
													<i class="fas fa-calendar-check icon-5x text-white"></i>
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
							
							<div class="row">
								<div class="col">
									<div class="card card-custom gutter-b">
										<div class="card-header">
											<div class="card-title">
												<h3 class="card-label">
													Record Chart
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