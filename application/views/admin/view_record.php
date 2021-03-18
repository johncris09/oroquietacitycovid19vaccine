<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>

<head>
	<title><?php echo $page_title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>
		@media print {
			html, body {
				width: 210mm;
				height: 297mm;
			}

			@page{
			    size: 8.5in 13in ;
			    size: landscape;
			}
			

		}
		
	</style>
	<style type="text/css"> 
		input[type="radio"], input[type="checkbox"]{
		   appearance: none;
		   border: 1px solid #d3d3d3;
		   width: 14px;
		   height: 14px;
		   content: none;
		   outline: none;
		   margin: 0;
		}

		input[type="radio"]:checked, input[type="checkbox"]:checked,  {
		  appearance: none;
		  outline: none;
		  padding: 0;
		  content: none;
		  border: none;
		} 
		input[type="radio"]:checked::before, input[type="checkbox"]:checked::before{
		  position: absolute;
		  color: green !important;
		  content: "\00A0\2713\00A0" !important;
		  /*border: 1px solid #d3d3d3;*/
		  font-weight: bolder;
		  font-size: 10px;
		}		
	</style>
	<script type="text/javascript">
	<!-- hide 
	function deserrs() {
		return true;
	}
	window.onerror = deserrs;
	// -->
	</script>
</head>

<body >
	<script type="text/javascript">
	var currentpos, timer;

	function initialize() {
		timer = setInterval("scrollwindow()", 10);
	}

	function sc() {
		clearInterval(timer);
	}

	function scrollwindow() {
		currentpos = document.body.scrollTop;
		window.scroll(0, ++currentpos);
		if(currentpos != document.body.scrollTop) sc();
	}
	document.onmousedown = sc;
	document.ondblclick = initialize;
	var tmp = "<div style=\"position:absolute; top:" + parent.offsetY + "; left:" + parent.offsetX + ";height:1606px; width:975px\">";
	document.writeln(tmp);
	</script>
	<div class="container">
		<table border="0" height="1606" width="975">
			<tr>
				<td>
					<div style="position:absolute; top:0; left:0;">
						<img height="1606" width="975" src="<?php echo base_url(); ?>dist/assets/media/img/bg00001.jpg" />
					</div>
					<div style="position:absolute;top:43.147;left:285.042;">
						<nobr> 
							<span style="font-size:22.397;">COVID-19 Vaccine Pre-Registration Form</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:68.245;left:404.798;">
						<nobr> 
							<span style="font-size:19.143;">OROQUIETA CITY</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:131;left:25.826;">
						<nobr> 
							<span style="font-size:12.826;">Full Name (Last Name, First Name, Middle Name)</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:106.697;left:384.903;">
						<nobr> 
							<span style="font-size:19.143;">PERSONAL INFORMATION</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:131;left:599.163;">
						<nobr> 
							<span style="font-size:12.826;">Gender</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:131;left:707;">
							<span style="font-size:12.826;">Contact Number</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:150.624;left:26.400;">
						<nobr> 
							<span style="font-size:17.612;"><?php echo ucwords($record['lastname'] .', '.$record['firstname'].' '.$record['middlename']);?></span> </nobr>
					</div>
					<div style="position:absolute;top:151;left:600.728;">
						<nobr> 
							<div class="radio-inline">
								<label class="radio radio-square">
								<input type="radio" name="gender"  <?php echo ucwords($record['gender']) == "Male"  ? "checked='checked'" : "" ?>  value="Male" readon   />
								<span></span>M</label>
								<label class="radio radio-square">
								<input type="radio" name="gender"  <?php echo ucwords($record['gender']) == "Female"  ? "checked='checked'" : "" ?>  value="Female"  readon  />
								<span></span>F</label>
							</div>
						</nobr>
					</div>
					<div style="position:absolute;top:150.624;left:710.006;">
						<nobr> 
							<span style="font-size:17.612;"><?php echo str_replace(' ', '', $record['contactnumber']); ?></span> 
						</nobr>
					</div>
					<div style="position:absolute;top:183.433;left:25.826;">
						<nobr>
							<span style="font-size:12.826;">Home Address (Purok)</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:183.433;left:166;">
						<nobr>
							<span style="font-size:12.826;">Home Address (Street)</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:183.433;left:707;">
						<nobr>
							<span style="font-size:12.826;">Birthdate (MM/DD/YYYY)</span>
						</nobr>
					</div>
					<div style="position:absolute;top:183.433;left:863;">
						<nobr>
							<span style="font-size:12.826;">Age</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:202.850;left:26.400;">
						<nobr>
							<span style="font-size:17.612;"><?php echo ucwords($record['purok']); ?></span>
						</nobr>
					</div>
					<div style="position:absolute;top:202.850;left:170;">
						<nobr>
							<span style="font-size:17.612;"><?php echo ucwords($record['street']); ?></span> 
						</nobr>
					</div>
					<div style="position:absolute;top:202.850;left:710;">
						<nobr>
							<span style="font-size:17.612;"><?php echo date('m/d/Y', strtotime($record['birthdate'])); ?></span> 
						</nobr>
					</div>
					<div style="position:absolute;top:202.850;left:865;">
						<?php
							$birthDate = date('m/d/Y', strtotime($record['birthdate']));
							$birthDate = explode("/", $birthDate);
							$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
							    ? ((date("Y") - $birthDate[2]) - 1)
							    : (date("Y") - $birthDate[2]));
						?>
						<nobr>
							<span style="font-size:17.612;"><?php echo $age; ?></span> 
						</nobr>
					</div>
					<div style="position:absolute;top:235.658;left:25.826;">
						<nobr> 
							<span style="font-size:12.826;">Home Address (Barangay)</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:235.658;left:585;">
						<nobr> 
							<span style="font-size:12.826;">Occupation</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:235.658;left:755;">
						<nobr> 
							<span style="font-size:12.826;">Position</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:255.076;left:26.400;">
						<nobr> 
							<span style="font-size:17.612;"><?php echo ucwords($record['barangay']) ?></span>
						</nobr>
					</div>
					<div style="position:absolute;top:255.076;left:590;">
						<nobr> 
							<span style="font-size:17.612;"><?php echo ucwords($record['occupation']) ?></span> 
						</nobr>
					</div>
					<div style="position:absolute;top:255.076;left:758.693;">
						<nobr> 
							<span style="font-size:17.612;"><?php echo ucwords($record['position']) ?></span> 
						</nobr>
					</div>
					<div style="position:absolute;top:287;left:25.826;">
						<nobr> 
							<span style="font-size:12.826;">Are you a registered voter? (Yes/No)</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:287;left:245">
						<nobr> 
							<span style="font-size:12.826;">ID (any Government issued or any LGU issued ID) Please attach photocopy</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:287;left:710">
						<nobr> 
							<span style="font-size:12.826;">ID Number</span>
						</nobr>
					</div>
					<div style="position:absolute;top:307.302;left:28.400;">
						<?php 
							if($record['registeredvoter']){
								$registeredvoter = "Yes";
							}else{
								$registeredvoter = "No";
							}
						?>
						<nobr> <span style="font-size:17.612;"><?php echo ucwords($registeredvoter); ?></span> </nobr>
					</div>
					<div style="position:absolute;top:307.302;left:246.338;">
						<nobr> 
							<span style="font-size:17.612;"><?php echo ucwords($record['governmentissuedid']) ?></span> 
						</nobr>
					</div>
					<div style="position:absolute;top:307.302;left:710.206;">
						<nobr> 
							<span style="font-size:17.612;"><?php echo ucwords($record['idnumber']) ?></span> 
						</nobr>
					</div>
					<div style="position:absolute;top:341.618;left:415.511;">
						<nobr> 
							<span style="font-size:19.143;">MEDICAL HISTORY</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:373.412;left:26.209;">
						<nobr> 
							<span style="font-size:15.889;">TUBAGA ANG MGA MOSUNOD NA PANGUTANA UG OO, WALA o WALA KABALO (Tsek the box) </span> 
						</nobr>
					</div>
					<div style="position:absolute;top:401.725;left:26.209;">
						<nobr> 
							<span style="font-size:15.889;">Nipositibo na ba ka sa COVID-19?</span> 
						</nobr>
					</div> 
					<div style="position:absolute;top:402;left:720;">
						<nobr> 
							<input type="radio"  <?php echo ((int)$record['covidpositive'] === 1) ? 'checked="checked"' : ''; ?> name="OptionCovidPositive">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:402;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['covidpositive'] === 0) ? 'checked="checked"' : ''; ?> name="OptionCovidPositive">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:402;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['covidpositive'] === 2) ? 'checked="checked"' : ''; ?> name="OptionCovidPositive">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:430;left:26.209;">
						<nobr> 
							<span style="font-size:15.889;">Sa niaging katorse (14) ka adlaw, naa ba kay nauban na positibo sa COVID-19?</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:430;left:720;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['covidpositivecontact'] === 1) ? 'checked="checked"' : ''; ?>  name="OptionCovidPositiveContact">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:430;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['covidpositivecontact'] === 0) ? 'checked="checked"' : ''; ?> name="OptionCovidPositiveContact">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:430;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['covidpositivecontact'] === 2) ? 'checked="checked"' : ''; ?> name="OptionCovidPositiveContact">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:457;left:26.209;">
						<nobr> 
							<span style="font-size:15.889;">Sa niaging katorse (14) ka adlaw, gikan ba ka sa laing nasud?</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:457;left:720;">
						<nobr> 
							<input type="radio"  <?php echo ((int)$record['travelled'] === 1) ? 'checked="checked"' : ''; ?> name="OptionTravelled">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:457;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['travelled'] === 0) ? 'checked="checked"' : ''; ?> name="OptionTravelled">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:457;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['travelled'] === 2) ? 'checked="checked"' : ''; ?> name="OptionTravelled">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:484.368;left:26.209;">
						<nobr> 
							<span style="font-size:15.889;">Nakaapil ba kag mga tapok-tapok sa mga miaging duha ka semana?</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:485;left:720;">
						<nobr> 
							<input type="radio"  <?php echo ((int)$record['mingled'] === 1) ? 'checked="checked"' : ''; ?> name="OptionMingled">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:485;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['mingled'] === 0) ? 'checked="checked"' : ''; ?> name="OptionMingled">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:485;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['mingled'] === 2) ? 'checked="checked"' : ''; ?> name="OptionMingled">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>


					<div style="position:absolute;top:512.681;left:26.209;">
						<nobr> <span style="font-size:15.889;">Nakabati ba ka ani sa niaging duha ka semana (14 ka adlaw)? </span> </nobr>
					</div>
					<div style="position:absolute;top:540.228;left:47;">
						<nobr> 
							<?php 
							$illness = explode(',', $record['optionIllness_1']);
							$illness = array_map('trim', $illness);
							// print_r($illness);
							?>
							<input type="checkbox" <?php echo in_array("Hilanat", $illness) ? 'checked="checked"' : '' ; ?> name="OptionIllness_1[]">
							<span style="font-size:15.889;">Hilanat</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:540.228;left:345;">
						<input type="checkbox" <?php echo in_array("Sakit sa kalawasan", $illness) ? 'checked="checked"' : '' ; ?> name="OptionIllness_1[]">
						<nobr> <span style="font-size:15.889;">Sakit sa kalawasan</span> </nobr>
					</div>

					<div style="position:absolute;top:566.246;left:47;">
						<nobr>
							<input type="checkbox" <?php echo in_array("Ubo", $illness) ? 'checked="checked"' : '' ; ?> name="OptionIllness_1[]">
							<span style="font-size:15.889;">Ubo</span>
						</nobr>
					</div>
					<div style="position:absolute;top:566.246;left:345;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Pagkawala sa panimhot ug tilaw", $illness) ? 'checked="checked"' : '' ; ?> name="OptionIllness_1[]">
							<span style="font-size:15.889;">Pagkawala sa panimhot ug tilaw</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:592.263;left:47;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Sip-on", $illness) ? 'checked="checked"' : '' ; ?> name="OptionIllness_1[]">
							<span style="font-size:15.889;">Sip-on</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:592.263;left:345;">
						<nobr>
							<input type="checkbox" <?php echo in_array("Lisod sa pag ginhawa", $illness) ? 'checked="checked"' : '' ; ?>  name="OptionIllness_1[]">
							<span style="font-size:15.889;">Lisod sa pag ginhawa</span> 
						</nobr>
					</div> 

					<div style="position:absolute;top:618.280;left:47;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Sakit sa tutunlan", $illness) ? 'checked="checked"' : '' ; ?> name="OptionIllness_1[]">
							 <span style="font-size:15.889;">Sakit sa tutunlan</span>
						</nobr>
					</div>
					<div style="position:absolute;top:618.280;left:345;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Pagkalibanga", $illness) ? 'checked="checked"' : '' ; ?> name="OptionIllness_1[]">
							<span style="font-size:15.889;">Pagkalibanga</span>
						</nobr>
					</div>
					<div style="position:absolute;top:645.063;left:26.209;">
						<nobr> 
							<span style="font-size:15.889;">Napaakan ba kag iro sa niaging upat (4) ka semana ug nabakunahan?</span>
							</nobr>
					</div>
					<div style="position:absolute;top:646;left:720;">
						<nobr> 
							<input type="radio"  <?php echo ((int)$record['dogbite'] === 1) ? 'checked="checked"' : ''; ?>  name="OptionDogBite">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:646;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['dogbite'] === 0) ? 'checked="checked"' : ''; ?>  name="OptionDogBite">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:646;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['dogbite'] === 2) ? 'checked="checked"' : ''; ?> name="OptionDogBite">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:672.610;left:26.209;">
						<nobr> 
							<span style="font-size:15.889;">Nabakunahan na ba ka sa COVID-19 Vaccine sa miaging upat (4) ka semana?</span>
						</nobr>
					</div> 
					<div style="position:absolute;top:673;left:720;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['vaccinelast4weeks'] === 1) ? 'checked="checked"' : ''; ?>  name="OptionVaccineLast4Weeks">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:673;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['vaccinelast4weeks'] === 0) ? 'checked="checked"' : ''; ?> name="OptionVaccineLast4Weeks">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:673;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['vaccinelast4weeks'] === 2) ? 'checked="checked"' : ''; ?> name="OptionVaccineLast4Weeks">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:700.923;left:26.209;">
						<nobr> <span style="font-size:15.889;">Na abunohan ba kag dugo?</span> </nobr>
					</div>
					<div style="position:absolute;top:701;left:720;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['bloodtransfusion'] === 1) ? 'checked="checked"' : ''; ?> name="OptionBloodTransfusion">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:701;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['bloodtransfusion'] === 0) ? 'checked="checked"' : ''; ?> name="OptionBloodTransfusion">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:701;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['bloodtransfusion'] === 2) ? 'checked="checked"' : ''; ?> name="OptionBloodTransfusion">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>


					<div style="position:absolute;top:727.706;left:26.209;">
						<nobr> <span style="font-size:15.889;">Ga inom ba kag Prednisone/Steroids o antiviral drugs?</span> </nobr>
					</div> 
					<div style="position:absolute;top:728;left:720;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['takedrugs'] === 1) ? 'checked="checked"' : ''; ?> name="OptionTakeDrugs">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:728;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['takedrugs'] === 0) ? 'checked="checked"' : ''; ?> name="OptionTakeDrugs">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:728;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['takedrugs'] === 2) ? 'checked="checked"' : ''; ?> name="OptionTakeDrugs">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:755.254;left:26.209;">
						<nobr> <span style="font-size:15.889;">Naa ba kay allergy sa latex, pagkaon, tambal o bakuna?</span>  </nobr>
					</div>
					<div style="position:absolute;top:756;left:720;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['allergy'] === 1) ? 'checked="checked"' : ''; ?> name="OptionAllergy">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:756;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['allergy'] === 0) ? 'checked="checked"' : ''; ?> name="OptionAllergy">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:756;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['allergy'] === 2) ? 'checked="checked"' : ''; ?> name="OptionAllergy">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:782.801;left:26.209;">
						<nobr> <span style="font-size:15.889;">Naka grabeng reaksyon ba ka human nabakunahan?</span>  </nobr>
					</div>
					<div style="position:absolute;top:783;left:720;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['vaccinereaction'] === 1) ? 'checked="checked"' : ''; ?> name="OptionVaccineReaction">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:783;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['vaccinereaction'] === 0) ? 'checked="checked"' : ''; ?> name="OptionVaccineReaction">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:783;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['vaccinereaction'] === 2) ? 'checked="checked"' : ''; ?> name="OptionVaccineReaction">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:811.114;left:26.209;">
						<nobr> <span style="font-size:15.889;">Aduna/nakaagi ba ka aning mga sakita?</span> </nobr>
					</div>
					<?php 
						$illness = explode(',', $record['optionIllness_2']);
						$illness = array_map('trim', $illness);
					?>
					<div style="position:absolute;top:838.662;left:47;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Sakit sa baga", $illness) ? 'checked="checked"' : '' ; ?> name="">
							<span style="font-size:15.889;">Sakit sa baga</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:838.662;left:345;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Sakit sa dugo", $illness) ? 'checked="checked"' : '' ; ?> name="">
							<span style="font-size:15.889;">Sakit sa dugo</span> 
						</nobr>
					</div> 
					<div style="position:absolute;top:838.662;left:674;">
						<nobr> 
							<input type="checkbox" <?php echo !empty($record['other_illness']) ? 'checked="checked"' : '' ; ?> name="">
							<span style="font-size:15.889;">Ubang Sakit</span> 
						</nobr>
					</div> 
					<div style="position:absolute;top:864.679;left:47;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Sakit sa kasing-kasing", $illness) ? 'checked="checked"' : '' ; ?> name="">
							<span style="font-size:15.889;">Sakit sa kasing-kasing</span> 
						</nobr>
					</div> 
					<div style="position:absolute;top:864.679;;left:345;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Cancer", $illness) ? 'checked="checked"' : '' ; ?>  name="">
							<span style="font-size:15.889;">Cancer</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:864.679;;left:700;">
						<nobr> 
							<span style="border-bottom: 1px solid lightgray;font-size:15.889;width: 10px; word-wrap: break-word;"><?php echo ucwords($record['other_illness']) ?></span>
						 
						</nobr>
					</div>
					<div style="position:absolute;top:890.697;left:47;">
						<nobr>
							<input type="checkbox" <?php echo in_array("Hubak", $illness) ? 'checked="checked"' : '' ; ?>  name="">
							<span style="font-size:15.889;">Hubak</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:890.697;left:345;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Leukemia", $illness) ? 'checked="checked"' : '' ; ?> name="">
							<span style="font-size:15.889;">Leukemia</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:916.714;left:47;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Sakit sa bato/Kidney", $illness) ? 'checked="checked"' : '' ; ?> name="">
							<span style="font-size:15.889;">Sakit sa bato/Kidney</span>  </nobr>
					</div>
					<div style="position:absolute;top:916.714;left:345;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("HIV", $illness) ? 'checked="checked"' : '' ; ?> name="">
							<span style="font-size:19.130;">HIV</span> </nobr>
					</div>
					<div style="position:absolute;top:942.731;left:47;">
						<nobr>
							<input type="checkbox"  <?php echo in_array("Diabetes", $illness) ? 'checked="checked"' : '' ; ?>  name="">
							<span style="font-size:15.889;">Diabetes</span>  </nobr>
					</div>
					<div style="position:absolute;top:942.731;left:345;">
						<nobr> 
							<input type="checkbox"  <?php echo in_array("Organ Transplant", $illness) ? 'checked="checked"' : '' ; ?> name="">
							<span style="font-size:19.130;"> Organ Transplant</span> </nobr>
					</div>
					<div style="position:absolute;top:968.748;left:47;">
						<nobr> 
							<input type="checkbox" <?php echo in_array("Altapresyon", $illness) ? 'checked="checked"' : '' ; ?> name="">
							<span style="font-size:15.889;">Altapresyon</span></nobr>
					</div>
					<div style="position:absolute;top:968.748;left:345;">
						<nobr> 
							<input type="checkbox"   <?php echo in_array("Sakit sa panghuna-huna/Seizure disorder", $illness) ? 'checked="checked"' : '' ; ?> name="">
							<span style="font-size:19.130;"> Sakit sa panghuna-huna/Seizure disorder</span> </nobr>
					</div>
					<div style="position:absolute;top:995.531;left:26.209;">
						<nobr> 
							<span style="font-size:15.889;">Buros ba ka o naa kay planong mag buros?</span>  </nobr>
					</div> 
					<div style="position:absolute;top:996;left:720;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['pregnant'] === 1) ? 'checked="checked"' : ''; ?>  name="OptionPregnant">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:996;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['pregnant'] === 0) ? 'checked="checked"' : ''; ?>  name="OptionPregnant">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:996;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['pregnant'] === 2) ? 'checked="checked"' : ''; ?>  name="OptionPregnant">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:1023.079;left:26.209;">
						<nobr> <span style="font-size:15.889;">Nagpatotoy ba ka?</span> </nobr>
					</div>
					<div style="position:absolute;top:1024;left:720;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['breastfeed'] === 1) ? 'checked="checked"' : ''; ?> name="OptionBreastfeed">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:1024;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['breastfeed'] === 0) ? 'checked="checked"' : ''; ?> name="OptionBreastfeed">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:1024;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['breastfeed'] === 2) ? 'checked="checked"' : ''; ?> name="OptionBreastfeed">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:1050.626;left:26.209;">
						<nobr> <span style="font-size:15.889;">Apil ba ka sa COVID-19 Clinical Study?</span></nobr>
					</div>
					<div style="position:absolute;top:1051;left:720;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['clinicalstudy'] === 1) ? 'checked="checked"' : ''; ?> name="OptionClinicalStudy">
							<span style="font-size:12.826;">Oo</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:1051;left:785;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['clinicalstudy'] === 0) ? 'checked="checked"' : ''; ?> name="OptionClinicalStudy">
							<span style="font-size:12.826;">Wala</span> 
						</nobr>
					</div>
					<div style="position:absolute;top:1051;left:857.527;">
						<nobr> 
							<input type="radio" <?php echo ((int)$record['clinicalstudy'] === 2) ? 'checked="checked"' : ''; ?> name="OptionClinicalStudy">
							<span style="font-size:12.826;">Wala kabalo</span> 
						</nobr>
					</div>

					<div style="position:absolute;top:1083.876;left:431.964;">
						<nobr> <span style="font-size:19.143;">DECLARATION</span> </nobr>
					</div>
					<div style="position:absolute;top:1114.139;left:57.200;">
						<nobr> <span style="font-size:15.889;">Ako si</span> </nobr>
					</div>
					<div style="position:absolute;top:1114.139;left:413.981;">
						<nobr> <span style="font-size:15.889;">,</span> </nobr>
					</div>
					<div style="position:absolute;top:1113.374;left:120;">
						<nobr> <span style="font-size:15.889;"><?php echo ucwords($record['lastname'] .', '.$record['firstname'].' '.$record['middlename']);?></span> </nobr>
					</div>
					<div style="position:absolute;top:1113.374;left:440;">
						<nobr> <span style="font-size:19.130;"><?php echo $age; ?></span> </nobr>
					</div>
					<div style="position:absolute;top:1112.991;left:475.581;">
						<nobr> <span style="font-size:15.889;">ang pangidaron, nga nagpuyo sa</span> </nobr>
					</div>
					<div style="position:absolute;top:1113.374;left:734.415;">
						<nobr> <span style="font-size:15.889;"><?php echo ucwords($record['purok'] .', '.$record['barangay']);?></span> </nobr>
					</div>
					<div style="position:absolute;top:1134.226;left:26.209;">
						<nobr> <span style="font-size:15.889;"></span> </nobr>
					</div>
					<div style="position:absolute;top:1136.522;left:243.147;">
						<nobr> <span style="font-size:15.889;">ay boluntaryong naghatag sa akoang mga impormasyon sa City Health Office. Gipasabot ko ani:</span> </nobr>
					</div>
					<div style="position:absolute;top:1163.304;left:72.695;">
						<nobr> <span style="font-size:15.889;">1. Sakto nga impormasyon kabahin sa COVID-19</span> </nobr>
					</div>
					<div style="position:absolute;top:1181.669;left:72.695;">
						<nobr> <span style="font-size:15.889;">2. Ang bakuna kontra sa COVID-19 kay apbrubado sa FDA ug libre kini sa LGU Oroquieta</span> </nobr>
					</div>
					<div style="position:absolute;top:1200.035;left:72.695;">
						<nobr> <span style="font-size:15.889;">3. Mga posibleng side effects sa bakuna</span> </nobr>
					</div>
					<div style="position:absolute;top:1218.400;left:72.695;">
						<nobr> <span style="font-size:15.889;">4. Mga angay buhaton kung naay mabatian na side effects (ug asa moadto)</span> </nobr>
					</div>
					<div style="position:absolute;top:1236.765;left:72.695;">
						<nobr> <span style="font-size:15.889;">5. Mga impormasyon na angay i-ambit sa City Health Office sama sa;</span> </nobr>
					</div>
					<div style="position:absolute;top:1255.130;left:88.191;">
						<nobr> <span style="font-size:15.889;">a. Adesir ko matagaan ug bakuna</span> </nobr>
					</div>
					<div style="position:absolute;top:1273.495;left:88.191;">
						<nobr> <span style="font-size:15.889;">b. Sa adlaw sa pag panghatag sa bakuna</span> </nobr>
					</div>
					<div style="position:absolute;top:1291.860;left:88.191;">
						<nobr> <span style="font-size:15.889;">c. Pagkahuman matagaan sa bakuna ug</span> </nobr>
					</div>
					<div style="position:absolute;top:1310.225;left:88.191;">
						<nobr> <span style="font-size:15.889;">d. Inkaso dili mahatagan sa bakuna</span> </nobr>
					</div>
					<div style="position:absolute;top:1336.243;left:57.200;">
						<nobr> <span style="font-size:15.889;">Ako nagatugot na matagaan sa bakuna kontra sa COVID-19. Walay panubagon ang City Health Office o ang LGU Oroquieta sa</span> </nobr>
					</div>
					<div style="position:absolute;top:1354.608;left:41.704;">
						<nobr> <span style="font-size:15.889;">posibleng side effects na akong mabatian pagkahuman nako mabakunahan.</span> </nobr>
					</div>
					<div style="position:absolute;top:1399.755;left:200.173;">
						<nobr> <span style="font-size:15.889;"><?php echo ucwords($record['lastname'] .', '.$record['firstname'].' '.$record['middlename']);?></span>  </nobr>
					</div>
					<div style="position:absolute;top:1399.755;left:650;">
						<nobr><span style="font-size:19.130;"><?php echo date('m/d/Y', strtotime($record['date_registered'])) ; ?></span> </nobr>
					</div>
					<div style="position:absolute;top:1423.141;left:206.225;">
						<nobr> <span style="font-size:12.826;">Pirma ibabaw sa Kumpletong Ngalan</span> </nobr>
					</div>
					<div style="position:absolute;top:1423.141;left:690.415;">
						<nobr> <span style="font-size:12.826;">Petsa</span> </nobr>
					</div>
				</td>
			</tr>
		</table>
	</div>
		
	</div>
	<script type="text/javascript">
	var currentZoom = parent.toolbarWin.currentZoom;
	if(currentZoom != undefined) document.body.style.zoom = currentZoom / 100;

	var element = document.getElementsByTagName('input');
    for (i = 0; i < radios.length; i++) {
        if (element[i].type == 'radio' || element[i].type == 'checkbox') {
        	element[i].disabled = true;

        }
    }
	</script>
</body>

</html>
