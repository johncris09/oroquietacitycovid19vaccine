<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->view('template/meta-info.php'); ?>
		<?php $this->view('template/css-link.php'); ?>
		<style>
			input[type="radio"]:checked+label { font-weight: bold; }
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
									<div class="alert-text"> <span class="font-weight-bolder">Note:</span>  <span class="text-danger font-weight-bolder">*</span> is required.</div>
									<div class="alert-close">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">
												<i class="ki ki-close"></i>
											</span>
										</button>
									</div>
								</div>
								<form id="searh-person-form" enctype="multipart/form-data">
									<div class="card card-custom gutter-b">
										<div class="card-header py-3">
											<div class="card-title">
												<h3 class="card-label"><?php echo $page_title; ?></h3>
											</div>
											 
										</div>
										<div class="card-body">  
											<div class="form-group row">
												<label class="col-lg-3 col-xl-3 col-sm-3 col-md-3 col-4 col-form-label">Person Name<span class="text-danger">*</span> </label>
												<div class="col-lg-9 col-xl-9 col-sm-9 col-md-9 col-9"> 
													<input class="form-control input-sm" type="hidden" name="id" name="id" />
													<input class="form-control input-sm" id="search-person" type="text" name="person_name" placeholder="Search..." autocomplete="off" autofocus="" />
												</div>
											</div>
										</div> 
										<div class="card-footer">
											<div class="text-right">
												<a href="<?php echo base_url(); ?>user" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Back</a>
												<button type="button" id="search-person-btn" class="btn btn-primary"> <i class="fas fa-arrow-right"></i> Proceed </button>
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
	<script src="http://localhost/oroquietacitycovid19vaccine/dist/assets/js/card.js"></script>
 
	<!-- <script type="text/javascript">
		$('input[name="person_name"]').typeahead({
            hint: true,
            // highlight: true,
            minLength: 1,
            itemselected: function (val) {
                // $this.$element.val(val)
                console.info(123)
            },
        }, 
        {
            limit: 10,
            async: true,
            source: function (query, process, processAsync) {
                return $.ajax({
                    url: BASE_URL + 'record/search/' + $('input#search-person').val(),
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // console.info(data)
                        processAsync($.map(data, function (row) {
                            var first_name = row.firstname;
                            var middle_name = row.middlename;
                            var last_name = row.lastname;
                            var full_name = first_name + ' ' + middle_name + ' ' + last_name ;
                            return [{
                                'id': row.id,
                                'full_name': full_name
                            }];
                        }));
                    },
                    error: function (jqXHR, except) {
                        console.info(jqXHR.responseText) 
                    }
                });
            },
            name: 'resident',
            displayKey: 'full_name',
            templates: {
                header: '<li class="ml-2 text-muted"><small>Resident</small></li>',
                suggestion: function (data) {
                    return '<li class="menu-link">' + data.full_name + '</li>'
                }
            },
        }, )
        .bind('typeahead:selected', function (obj, data, name) {
            $('input#search-person').val(data.full_name)
            $('input[name="id"]').val(data.id)
        })
        .on('typeahead:cursorchanged', function (e, data, name) {
            try {
                $('input#search-person').val().val(data.full_name)
            } catch (error) {
                // error here...
            }
        });

        var input = $('input[name="person_name"]');
            input.on('keydown', function() {
            var key = event.keyCode || event.charCode;

            if( key == 8 || key == 46 )
                $('input[name="id"]').val('');
        });
	</script> -->

	</body>
</html>