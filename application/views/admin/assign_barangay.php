<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->view('template/meta-info.php'); ?>
		<?php $this->view('template/css-link.php'); ?>
		<style>
			input[type="radio"]:checked+label { font-weight: bold; }
			.draggable-main{
			  /*width: 800px;*/
			  margin: 0 auto;
			}
			.box {
			  /*float: left;*/
			  /*width: 45%;*/
			  /*margin-right: 5%;*/
			  border: 1px solid lightgray;
			  border-radius: 2px;
			}
			.box:last-child{
			  margin: 0px;
			}
			.connected-sortable {
			  list-style: none;
			  padding: 20px;
			  margin: 0px;
			}
			.box>ul .box>li, .col-6>ul{
			  width: inherit;
			  /*padding: 15px 20px;*/
			  background-color: #fff;
			  /*border-bottom: 1px solid #c1c1c1;*/
			  color: #000;
			  /*font-size: 20px;*/
			  margin-bottom: 4px;
			  border-radius: 5px;
			  -webkit-transition: transform 0.25s ease-in-out;
			  -moz-transition: transform 0.25s ease-in-out;
			  -o-transition: transform 0.25s ease-in-out;
			  transition: transform 0.25s ease-in-out;
			  -webkit-transition: box-shadow 0.25s ease-in-out;
			  -moz-transition: box-shadow 0.25s ease-in-out;
			  -o-transition: box-shadow 0.25s ease-in-out;
			  transition: box-shadow 0.25s ease-in-out;
			}
			ul.connected-sortable li:hover {
			  cursor: move ;
			  font-size: 18px;
			}
			ul.connected-sortable li.ui-sortable-helper {
			  background-color: #e5e5e5;
			  -webkit-box-shadow: 0 0 8px rgba(53, 41, 41, 0.8);
			  -moz-box-shadow: 0 0 8px rgba(53, 41, 41, 0.8);
			  box-shadow: 0 0 8px rgba(53, 41, 41, 0.8);
			  transform: scale(1.015);
			  z-index: 100;
			}
			ul.connected-sortable li.ui-sortable-placeholder {
			  background-color: #ddd;
			  -moz-box-shadow: inset 0 0 10px #000000;
			  -webkit-box-shadow: inset 0 0 10px #000000;
			  box-shadow: inset 0 0 10px #000000;
			}
		</style>

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
							</div>
						</div>
						<div class="d-flex flex-column-fluid">
							<div class="container">
								<div class="alert alert-custom alert-notice alert-light-danger fade show mb-5" role="alert">
									<div class="alert-icon">
										<i class="flaticon-warning"></i>
									</div>
								</div>
								<form id="add-vaccination-site-form" action="<?php echo base_url() ?>vaccination_site/insert" method="post" enctype="multipart/form-data">
									<div class="card card-custom gutter-b">
										<div class="card-header py-3">
											<div class="card-title">
												<h3 class="card-label"><?php echo $page_title; ?></h3>
											</div>
											 
										</div>
										<div class="card-body">
											<div class="row justify-content-center">
												<div class="col-6">
													<h3 class="text-center"> List of Barangay</h3>
													<div class="scroll scroll-pull border" data-scroll="true" style="height: 250px">
														<ul class="connected-sortable draggable-left">
															<?php
																foreach ($barangay as $row) {
																	echo '
																	<li data-barangay-id="'.$row['barangay_id'].'">' . $row['barangay'].'</li>';
																}
															?>
														</ul>
													</div>
													
												</div>
											</div> 
											<hr>
											<div class="row">
												<div class="text-center my-5">
													<h3>Vaccination Site</h3>
												</div>
											</div> 
											<div class="row">
												<?php 
													foreach ($vaccination_site as $row) {
												?>

														<div class="col-6 mb-5">
															<div class="box">
																<div class="text-center">
																	<h4 data-vaccination-site-id="<?php echo $row['vaccination_site_id']; ?>"><?php echo $row['vaccination_site'] ?></h4>
																</div>
														        <ul data-vaccination-site-id="<?php echo $row['vaccination_site_id'] ?>" class="connected-sortable draggable-right assigned-barangay">
														        	<?php 
														        		foreach ($assign_barangay as $assign_brgy) {
														        			if($assign_brgy['vaccination_site'] == $row['vaccination_site_id']){
														        	?>

														        				<li data-barangay-id="<?php echo $assign_brgy['barangay_id']; ?>" class="ui-sortable-handle" style=""><?php echo $assign_brgy['barangay']; ?></li>	

														        	<?php
														        			}
														        		}
														        	?>
														        </ul>
														      </div>
														</div>
												<?php
													}
												?> 
												
											 </div>
										</div> 
										<div class="card-footer">
											<div class="text-right">
												<a href="<?php echo base_url(); ?>vaccination_site" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Back</a>
												<button type="button" id="assign-barangay-btn" class="btn btn-primary"> <i class="fas fa-save"></i> Save Changes</button>
												
											</div>
										</div>
									</div> 
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	<?php $this->view('template/footer.php'); ?>
	
	<?php $this->view('template/quick-panel.php'); ?>
	<?php $this->view('template/js-src.php'); ?>

	<script src="<?php echo base_url(); ?>dist/assets/js/assign_barangay.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
		$(".draggable-left, .draggable-right").sortable({
		  connectWith: ".connected-sortable",
		  stack: ".connected-sortable ul"
		}).disableSelection();
	</script>
</html>