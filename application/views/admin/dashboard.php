
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
						<?php $this->view('template/sub-header.php'); ?>
						<div class="d-flex flex-column-fluid">
							<div class="container">
							</div>
						</div>
					</div>
					<?php $this->view('template/footer.php'); ?>
				</div>
			</div>
		</div>

		<?php $this->view('template/quick-panel.php'); ?>


		<?php $this->view('template/js-src.php'); ?>

	</body>
</html>