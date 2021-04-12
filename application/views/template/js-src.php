
		
		<script>
			var BASE_URL = "<?php echo base_url(); ?>";
			var ROLE_TYPE = "<?php echo $_SESSION['role_type']; ?>";
			const ERROR_ALERT_SOUND = new Audio("<?php echo base_url() . 'dist/assets/media/sound/error.wav' ?>");
			const SUCCESS_ALERT_SOUND = new Audio("<?php echo base_url() . 'dist/assets/media/sound/success.wav' ?>");
			const USER_ID = "<?php echo $_SESSION['user_id'] ?>";
			
		</script>

		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
 
		<script src="<?php echo base_url(); ?>dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo base_url(); ?>dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="<?php echo base_url(); ?>/dist/assets/plugins/global/jQuery.print.min.js"></script> 
		<script src="<?php echo base_url(); ?>dist/assets/js/scripts.bundle.js"></script>



		<!-- DataTable Plugin -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/sl-1.3.3/datatables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>  -->




		<!-- <script src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/datatables/datatables.bundle.js"></script> -->
		
		<!-- Local DataTable Plugin -->
		<script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<script src="<?php echo base_url(); ?>dist/assets/js/keep_alive.js"></script> 



		<!-- subject for deletion -->
		<!-- <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/typeahead.bundle.js"></script> -->
