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
							</div>
						</div>
						
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Notice-->
								<div class="alert alert-custom alert-white alert-shadow fade show gutter-b h3" role="alert">
									<div class="alert-icon pulse  pulse-primary">
										<span class="svg-icon svg-icon-primary svg-icon-2x ">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
													<path d="M14.8875071,12.8306874 L12.9310336,12.8306874 L12.9310336,10.8230161 C12.9310336,10.5468737 12.707176,10.3230161 12.4310336,10.3230161 L11.4077349,10.3230161 C11.1315925,10.3230161 10.9077349,10.5468737 10.9077349,10.8230161 L10.9077349,12.8306874 L8.9512614,12.8306874 C8.67511903,12.8306874 8.4512614,13.054545 8.4512614,13.3306874 C8.4512614,13.448999 8.49321518,13.5634776 8.56966458,13.6537723 L11.5377874,17.1594334 C11.7162223,17.3701835 12.0317191,17.3963802 12.2424692,17.2179453 C12.2635563,17.2000915 12.2831273,17.1805206 12.3009811,17.1594334 L15.2691039,13.6537723 C15.4475388,13.4430222 15.4213421,13.1275254 15.210592,12.9490905 C15.1202973,12.8726411 15.0058187,12.8306874 14.8875071,12.8306874 Z" fill="#000000"/>
												</g>
											</svg>
										</span>
										<span class="pulse-ring"></span>
									</div>
									<div class="alert-text h3">
										Back up database <a href="javascript:;" id="export"><u><i><?php echo $db_name; ?>!</i></u><a> 
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
	<script src="http://localhost/pos/dist/assets/js/crud/backup.js"></script> 

	</body>
</html>
