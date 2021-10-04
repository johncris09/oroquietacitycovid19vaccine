<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->view('template/meta-info.php'); ?>
		<?php $this->view('template/css-link.php'); ?>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<style>
			input[type="radio"]:checked+label { font-weight: bold; }
			.select2-container .select2-search--inline {
				float: left;
				margin: 0;
				} 
			.select2-selection__rendered {
				line-height: 25px !important;
			}
			.select2-container .select2-selection--single {
				height: 35px !important;
			}
			.select2-selection__arrow {
				height: 34px !important;
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
									<div class="alert-text"> <span class="font-weight-bolder">Note:</span>  <span class="text-danger font-weight-bolder">*</span> is required.</div>
									<div class="alert-close">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">
												<i class="ki ki-close"></i>
											</span>
										</button>
									</div>
								</div>
								
								<form id="add-vaccinated-form">
									<div class="card card-custom gutter-b">
										<div class="card-header py-3">
											<div class="card-title">
												<h3 class="card-label"><?php echo $page_title; ?></h3>
											</div>
											 
										</div>
										
										<div class="card-body"> 

											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Category</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="category" required="">
														<option value="A1">A1</option>
														<option value="A1.8">A1.8</option>
														<option value="A1.9">A1.9</option>  
														<option value="A2">A2</option>    
														<option value="A3">A3</option>    
														<option value="A4">A4</option>   
														<option value="A5">A5</option>  
														<option value="ROP">ROP</option> 
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Unique Person ID</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="unique_person_id" required="">
														<option value="Government ID">Government ID</option> 
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">PWD</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="pwd" required="">
														<option value="Y">Y</option> 
														<option value="N">N</option> 
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Indigenous Member</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="indigenous_member" required="">
														<option value="No">No</option>  
														<option value="Abelling/Aberling">Abelling/Aberling</option>  
														<option value="Aeta">Aeta</option>
														<option value="Aeta/Ayta">Aeta/Ayta</option>
														<option value="Aeta/Ayta-Sambal">Aeta/Ayta-Sambal</option>
														<option value="Aeta/Ayta-Ambala">Aeta/Ayta-Ambala</option>
														<option value="Aeta/Ayta-Abelling/Abellen">Aeta/Ayta-Abelling/Abellen</option>
														<option value="Aeta/Ayta-Mag-indi">Aeta/Ayta-Mag-indi</option>
														<option value="Aeta/Ayta-Mang-ansti">Aeta/Ayta-Mang-ansti</option>
														<option value="Aeta/Ayta-Magbukun">Aeta/Ayta-Magbukun</option>
														<option value="Agta">Agta</option>
														<option value="Agta-Labin">Agta-Labin</option>
														<option value="Agta-Dupanigan">Agta-Dupanigan</option>
														<option value="Agta Isigiran">Agta Isigiran</option>
														<option value="Agta-Cimaron">Agta-Cimaron</option>
													</select>
												</div>
											</div>

											
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Last Name<span class="text-danger">*</span> </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"  class="form-control input-sm" name="last_name" placeholder="Last Name" required="">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">First Name<span class="text-danger">*</span> </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"  class="form-control input-sm" name="first_name" placeholder="First Name" required="">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Middle Name  </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"  class="form-control input-sm" name="middle_name" placeholder="Middle Name" required="">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Suffix </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"  class="form-control input-sm" name="suffix" placeholder="Suffix" required="">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Contact No. </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"  class="form-control input-sm" name="contact_number" placeholder="Contact No." required="">
												</div>
											</div> 
											

											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Region</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="region" required="">
														<option value="AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)"> AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)</option>
														<option value="CORDILLERA ADMINISTRATIVE REGION (CAR)"> CORDILLERA ADMINISTRATIVE REGION (CAR)</option>
														<option value="NATIONAL CAPITAL REGION (NCR)">NATIONAL CAPITAL REGION (NCR)</option>
														<option value="REGION I (ILOCOS REGION)">REGION I (ILOCOS REGION)</option>
														<option value="REGION II (CAGAYAN VALLEY)">REGION II (CAGAYAN VALLEY)</option>
														<option value="REGION III (CENTRAL LUZON)">REGION III (CENTRAL LUZON)</option>
														<option value="REGION IV-A (CALABARZON)">REGION IV-A (CALABARZON)</option>
														<option value="REGION IV-B (MIMAROPA)">REGION IV-B (MIMAROPA)</option>
														<option value="REGION V (BICOL REGION)">REGION V (BICOL REGION)</option>
														<option value="REGION VI (WESTERN VISAYAS)">REGION VI (WESTERN VISAYAS)</option>
														<option value="REGION VII (CENTRAL VISAYAS)">REGION VII (CENTRAL VISAYAS)</option>
														<option value="REGION VIII (EASTERN VISAYAS)">REGION VIII (EASTERN VISAYAS)</option>
														<option value="REGION IX (ZAMBOANGA PENINSULA)">REGION IX (ZAMBOANGA PENINSULA)</option>
														<option value="REGION X (NORTHERN MINDANAO)">REGION X (NORTHERN MINDANAO)</option>
														<option value="REGION XI (DAVAO REGION)">REGION XI (DAVAO REGION)</option>
														<option value="REGION XII (SOCCSKSARGEN)">REGION XII (SOCCSKSARGEN)</option>
														<option value="REGION XIII (CARAGA)">REGION XIII (CARAGA)</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Province</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="province" required="">   
														<option value="012800000Ilocos Norte">012800000Ilocos Norte</option>
														<option value="012900000Ilocos Sur">012900000Ilocos Sur</option>
														<option value="013300000La Union">013300000La Union</option>
														<option value="015500000Pangasinan">015500000Pangasinan</option>
														<option value="020900000Batanes">020900000Batanes</option>
														<option value="021500000Cagayan">021500000Cagayan</option>
														<option value="023100000Isabela">023100000Isabela</option>
														<option value="025000000Nueva">025000000Nueva Vizcaya</option>
														<option value="025700000Quirino">025700000Quirino</option>
														<option value="030800000Bataan">030800000Bataan</option>
														<option value="031400000Bulacan">031400000Bulacan</option>
														<option value="034900000Nueva">034900000Nueva Ecija</option>
														<option value="035400000Pampanga">035400000Pampanga</option>
														<option value="036900000Tarlac">036900000Tarlac</option>
														<option value="037100000Zambales">037100000Zambales</option>
														<option value="037700000Aurora">037700000Aurora</option>
														<option value="041000000Batangas">041000000Batangas</option>
														<option value="042100000Cavite">042100000Cavite</option>
														<option value="043400000Laguna">043400000Laguna</option>
														<option value="045600000Quezon">045600000Quezon</option>
														<option value="045800000Rizal">045800000Rizal</option>
														<option value="174000000Marinduque">174000000Marinduque</option>
														<option value="175100000Occidental Mindoro">175100000Occidental Mindoro</option>
														<option value="175200000Oriental Mindoro">175200000Oriental Mindoro</option>
														<option value="175300000Palawan">175300000Palawan</option>
														<option value="175900000Romblon">175900000Romblon</option>
														<option value="050500000Albay">050500000Albay</option>
														<option value="051600000Camarines Norte">051600000Camarines Norte</option>
														<option value="051700000Camarines Sur">051700000Camarines Sur</option>
														<option value="052000000Catanduanes">052000000Catanduanes</option>
														<option value="054100000Masbate">054100000Masbate</option>
														<option value="056200000Sorsogon">056200000Sorsogon</option>
														<option value="060400000Aklan">060400000Aklan</option>
														<option value="060600000Antique">060600000Antique</option>
														<option value="061900000Capiz">061900000Capiz</option>
														<option value="063000000Iloilo">063000000Iloilo</option>
														<option value="064500000Negros Occidental">064500000Negros Occidental</option>
														<option value="067900000Guimaras">067900000Guimaras</option>
														<option value="071200000Bohol">071200000Bohol</option>
														<option value="072200000Cebu">072200000Cebu</option>
														<option value="074600000Negros Oriental">074600000Negros Oriental</option>
														<option value="076100000Siquijor">076100000Siquijor</option>
														<option value="082600000Eastern">082600000Eastern Samar</option>
														<option value="083700000Leyte">083700000Leyte</option>
														<option value="084800000Northern Samar">084800000Northern Samar</option>
														<option value="086000000Samar">086000000Samar</option>
														<option value="086400000Southern">086400000Southern Leyte</option>
														<option value="087800000Biliran">087800000Biliran</option>
														<option value="097200000Zamboanga del Norte">097200000Zamboanga del Norte</option>
														<option value="097300000Zamboanga del Sur">097300000Zamboanga del Sur</option>
														<option value="098300000Zamboanga Sibugay">098300000Zamboanga Sibugay</option>
														<option value="101300000Bukidnon">101300000Bukidnon</option>
														<option value="101800000Camiguin">101800000Camiguin</option>
														<option value="103500000Lanao del Norte">103500000Lanao del Norte</option>
														<option value="104200000Misamis Occidental">104200000Misamis Occidental</option>
														<option value="104300000Misamis Oriental">104300000Misamis Oriental</option>
														<option value="112300000Davao del Norte">112300000Davao del Norte</option>
														<option value="112400000Davao del Sur">112400000Davao del Sur</option>
														<option value="112500000Davao Oriental">112500000Davao Oriental</option>
														<option value="118200000Davao de Oro">118200000Davao de Oro</option>
														<option value="118600000Davao Occidental">118600000Davao Occidental</option>
														<option value="124700000Cotabato">124700000Cotabato</option>
														<option value="126300000South Cotabato">126300000South Cotabato</option>
														<option value="126500000Sultan Kudarat">126500000Sultan Kudarat</option>
														<option value="128000000Sarangani">128000000Sarangani</option>
														<option value="140100000Abra">140100000Abra</option>
														<option value="141100000Benguet">141100000Benguet</option>
														<option value="142700000Ifugao">142700000Ifugao</option>
														<option value="143200000Kalinga">143200000Kalinga</option>
														<option value="144400000Mountain">144400000Mountain Province</option>
														<option value="148100000Apayao">148100000Apayao</option>
														<option value="150700000Basilan">150700000Basilan</option>
														<option value="153600000Lanao del Sur">153600000Lanao del Sur</option>
														<option value="153800000Maguindanao">153800000Maguindanao</option>
														<option value="156600000Sulu">156600000Sulu</option>
														<option value="157000000Tawi-Tawi">157000000Tawi-Tawi</option>
														<option value="160200000Agusan del Norte">160200000Agusan del Norte</option>
														<option value="160300000Agusan del Sur">160300000Agusan del Sur</option>
														<option value="166700000Surigao del Norte">166700000Surigao del Norte</option>
														<option value="166800000Surigao del Sur">166800000Surigao del Sur</option>
														<option value="168500000Dinagat Islands">168500000Dinagat Islands</option>
													</select>
												</div>
											</div>

											
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Muni_City</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="muni_city" required=""> 
														<option value="012801000Adams">012801000Adams</option>
														<option value="012802000Bacarra">012802000Bacarra</option>
														<option value="012803000Badoc">012803000Badoc</option>
														<option value="012804000Bangui">012804000Bangui</option>
														<option value="012805000City of Batac">012805000City of Batac</option>
														<option value="012806000Burgos">012806000Burgos</option>
														<option value="012807000Carasi">012807000Carasi</option>
														<option value="012808000Currimao">012808000Currimao</option>
														<option value="012809000Dingras">012809000Dingras</option>
														<option value="012810000Dumalneg">012810000Dumalneg</option>
														<option value="012811000Banna">012811000Banna</option>
														<option value="012812000City of Laoag (Capital)">012812000City of Laoag (Capital)</option>
														<option value="012813000Marcos">012813000Marcos</option>
														<option value="012814000Nueva Era">012814000Nueva Era</option>
														<option value="012815000Pagudpud">012815000Pagudpud</option>
														<option value="012816000Paoay">012816000Paoay</option>
														<option value="012817000Pasuquin">012817000Pasuquin</option>
														<option value="012818000Piddig">012818000Piddig</option>
														<option value="012819000Pinili">012819000Pinili</option>
														<option value="012820000San Nicolas">012820000San Nicolas</option>
														<option value="012821000Sarrat">012821000Sarrat</option>
														<option value="012822000Solsona">012822000Solsona</option>
														<option value="012823000Vintar">012823000Vintar</option>
														<option value="012901000Alilem">012901000Alilem</option>
														<option value="012902000Banayoyo">012902000Banayoyo</option>
														<option value="012903000Bantay">012903000Bantay</option>
														<option value="012904000Burgos">012904000Burgos</option>
														<option value="012905000Cabugao">012905000Cabugao</option>
														<option value="012906000City of Candon">012906000City of Candon</option>
														<option value="012907000Caoayan">012907000Caoayan</option>
														<option value="012908000Cervantes">012908000Cervantes</option>
														<option value="012909000Galimuyod">012909000Galimuyod</option>
														<option value="012910000Gregorio del Pilar">012910000Gregorio del Pilar</option>
														<option value="012911000Lidlidda">012911000Lidlidda</option>
														<option value="012912000Magsingal">012912000Magsingal</option>
														<option value="012913000Nagbukel">012913000Nagbukel</option>
														<option value="012914000Narvacan">012914000Narvacan</option>
														<option value="012915000Quirino">012915000Quirino</option>
														<option value="012916000Salcedo">012916000Salcedo</option>
														<option value="012917000San Emilio">012917000San Emilio</option>
														<option value="012918000San Esteban">012918000San Esteban</option>
														<option value="012919000San Ildefonso">012919000San Ildefonso</option>
														<option value="012920000San Juan">012920000San Juan</option>
														<option value="012921000San Vicente">012921000San Vicente</option>
														<option value="012922000Santa">012922000Santa</option>
														<option value="012923000Santa Catalina">012923000Santa Catalina</option>
														<option value="012924000Santa Cruz">012924000Santa Cruz</option>
														<option value="012925000Santa Lucia">012925000Santa Lucia</option>
														<option value="012926000Santa Maria">012926000Santa Maria</option>
														<option value="012927000Santiago">012927000Santiago</option>
														<option value="012928000Santo Domingo">012928000Santo Domingo</option>
														<option value="012929000Sigay">012929000Sigay</option>
														<option value="012930000Sinait">012930000Sinait</option>
														<option value="012931000Sugpon">012931000Sugpon</option>
														<option value="012932000Suyo">012932000Suyo</option>
														<option value="012933000Tagudin">012933000Tagudin</option>
														<option value="012934000City of Vigan (Capital)">012934000City of Vigan (Capital)</option>
														<option value="013301000Agoo">013301000Agoo</option>
														<option value="013302000Aringay">013302000Aringay</option>
														<option value="013303000Bacnotan">013303000Bacnotan</option>
														<option value="013304000Bagulin">013304000Bagulin</option>
														<option value="013305000Balaoan">013305000Balaoan</option>
														<option value="013306000Bangar">013306000Bangar</option>
														<option value="013307000Bauang">013307000Bauang</option>
														<option value="013308000Burgos">013308000Burgos</option>
														<option value="013309000Caba">013309000Caba</option>
														<option value="013310000Luna">013310000Luna</option>
														<option value="013311000Naguilian">013311000Naguilian</option>
														<option value="013312000Pugo">013312000Pugo</option>
														<option value="013313000Rosario">013313000Rosario</option>
														<option value="013314000City of San Fernando (Capital)">013314000City of San Fernando (Capital)</option>
														<option value="013315000San Gabriel">013315000San Gabriel</option>
														<option value="013316000San Juan">013316000San Juan</option>
														<option value="013317000Santo Tomas">013317000Santo Tomas</option>
														<option value="013318000Santol">013318000Santol</option>
														<option value="013319000Sudipen">013319000Sudipen</option>
														<option value="013320000Tubao">013320000Tubao</option>
														<option value="015501000Agno">015501000Agno</option>
														<option value="015502000Aguilar">015502000Aguilar</option>
														<option value="015503000City of Alaminos">015503000City of Alaminos</option>
														<option value="015504000Alcala">015504000Alcala</option>
														<option value="015505000Anda">015505000Anda</option>
														<option value="015506000Asingan">015506000Asingan</option>
														<option value="015507000Balungao">015507000Balungao</option>
														<option value="015508000Bani">015508000Bani</option>
														<option value="015509000Basista">015509000Basista</option>
														<option value="015510000Bautista">015510000Bautista</option>
														<option value="015511000Bayambang">015511000Bayambang</option>
														<option value="015512000Binalonan">015512000Binalonan</option>
														<option value="015513000Binmaley">015513000Binmaley</option>
														<option value="015514000Bolinao">015514000Bolinao</option>
														<option value="015515000Bugallon">015515000Bugallon</option>
														<option value="015516000Burgos">015516000Burgos</option>
														<option value="015517000Calasiao">015517000Calasiao</option>
														<option value="015518000City of Dagupan">015518000City of Dagupan</option>
														<option value="015519000Dasol">015519000Dasol</option>
														<option value="015520000Infanta">015520000Infanta</option>
														<option value="015521000Labrador">015521000Labrador</option>
														<option value="015522000Lingayen (Capital)">015522000Lingayen (Capital)</option>
														<option value="015523000Mabini">015523000Mabini</option>
														<option value="015524000Malasiqui">015524000Malasiqui</option>
														<option value="015525000Manaoag">015525000Manaoag</option>
														<option value="015526000Mangaldan">015526000Mangaldan</option>
														<option value="015527000Mangatarem">015527000Mangatarem</option>
														<option value="015528000Mapandan">015528000Mapandan</option>
														<option value="015529000Natividad">015529000Natividad</option>
														<option value="015530000Pozorrubio">015530000Pozorrubio</option>
														<option value="015531000Rosales">015531000Rosales</option>
														<option value="015532000City of San Carlos">015532000City of San Carlos</option>
														<option value="015533000San Fabian">015533000San Fabian</option>
														<option value="015534000San Jacinto">015534000San Jacinto</option>
														<option value="015535000San Manuel">015535000San Manuel</option>
														<option value="015536000San Nicolas">015536000San Nicolas</option>
														<option value="015537000San Quintin">015537000San Quintin</option>
														<option value="015538000Santa Barbara">015538000Santa Barbara</option>
														<option value="015539000Santa Maria">015539000Santa Maria</option>
														<option value="015540000Santo Tomas">015540000Santo Tomas</option>
														<option value="015541000Sison">015541000Sison</option>
														<option value="015542000Sual">015542000Sual</option>
														<option value="015543000Tayug">015543000Tayug</option>
														<option value="015544000Umingan">015544000Umingan</option>
														<option value="015545000Urbiztondo">015545000Urbiztondo</option>
														<option value="015546000City of Urdaneta">015546000City of Urdaneta</option>
														<option value="015547000Villasis">015547000Villasis</option>
														<option value="015548000Laoac">015548000Laoac</option>
														<option value="020901000Basco (Capital)">020901000Basco (Capital)</option>
														<option value="020902000Itbayat">020902000Itbayat</option>
														<option value="020903000Ivana">020903000Ivana</option>
														<option value="020904000Mahatao">020904000Mahatao</option>
														<option value="020905000Sabtang">020905000Sabtang</option>
														<option value="020906000Uyugan">020906000Uyugan</option>
														<option value="021501000Abulug">021501000Abulug</option>
														<option value="021502000Alcala">021502000Alcala</option>
														<option value="021503000Allacapan">021503000Allacapan</option>
														<option value="021504000Amulung">021504000Amulung</option>
														<option value="021505000Aparri">021505000Aparri</option>
														<option value="021506000Baggao">021506000Baggao</option>
														<option value="021507000Ballesteros">021507000Ballesteros</option>
														<option value="021508000Buguey">021508000Buguey</option>
														<option value="021509000Calayan">021509000Calayan</option>
														<option value="021510000Camalaniugan">021510000Camalaniugan</option>
														<option value="021511000Claveria">021511000Claveria</option>
														<option value="021512000Enrile">021512000Enrile</option>
														<option value="021513000Gattaran">021513000Gattaran</option>
														<option value="021514000Gonzaga">021514000Gonzaga</option>
														<option value="021515000Iguig">021515000Iguig</option>
														<option value="021516000Lal-Lo">021516000Lal-Lo</option>
														<option value="021517000Lasam">021517000Lasam</option>
														<option value="021518000Pamplona">021518000Pamplona</option>
														<option value="021519000Peñablanca">021519000Peñablanca</option>
														<option value="021520000Piat">021520000Piat</option>
														<option value="021521000Rizal">021521000Rizal</option>
														<option value="021522000Sanchez-Mira">021522000Sanchez-Mira</option>
														<option value="021523000Santa Ana">021523000Santa Ana</option>
														<option value="021524000Santa Praxedes">021524000Santa Praxedes</option>
														<option value="021525000Santa Teresita">021525000Santa Teresita</option>
														<option value="021526000Santo Niño">021526000Santo Niño</option>
														<option value="021527000Solana">021527000Solana</option>
														<option value="021528000Tuao">021528000Tuao</option>
														<option value="021529000Tuguegarao City (Capital)">021529000Tuguegarao City (Capital)</option>
														<option value="023101000Alicia">023101000Alicia</option>
														<option value="023102000Angadanan">023102000Angadanan</option>
														<option value="023103000Aurora">023103000Aurora</option>
														<option value="023104000Benito Soliven">023104000Benito Soliven</option>
														<option value="023105000Burgos">023105000Burgos</option>
														<option value="023106000Cabagan">023106000Cabagan</option>
														<option value="023107000Cabatuan">023107000Cabatuan</option>
														<option value="023108000City of Cauayan">023108000City of Cauayan</option>
														<option value="023109000Cordon">023109000Cordon</option>
														<option value="023110000Dinapigue">023110000Dinapigue</option>
														<option value="023111000Divilacan">023111000Divilacan</option>
														<option value="023112000Echague">023112000Echague</option>
														<option value="023113000Gamu">023113000Gamu</option>
														<option value="023114000City of Ilagan (Capital)">023114000City of Ilagan (Capital)</option>
														<option value="023115000Jones">023115000Jones</option>
														<option value="023116000Luna">023116000Luna</option>
														<option value="023117000Maconacon">023117000Maconacon</option>
														<option value="023118000Delfin Albano">023118000Delfin Albano</option>
														<option value="023119000Mallig">023119000Mallig</option>
														<option value="023120000Naguilian">023120000Naguilian</option>
														<option value="023121000Palanan">023121000Palanan</option>
														<option value="023122000Quezon">023122000Quezon</option>
														<option value="023123000Quirino">023123000Quirino</option>
														<option value="023124000Ramon">023124000Ramon</option>
														<option value="023125000Reina Mercedes">023125000Reina Mercedes</option>
														<option value="023126000Roxas">023126000Roxas</option>
														<option value="023127000San Agustin">023127000San Agustin</option>
														<option value="023128000San Guillermo">023128000San Guillermo</option>
														<option value="023129000San Isidro">023129000San Isidro</option>
														<option value="023130000San Manuel">023130000San Manuel</option>
														<option value="023131000San Mariano">023131000San Mariano</option>
														<option value="023132000San Mateo">023132000San Mateo</option>
														<option value="023133000San Pablo">023133000San Pablo</option>
														<option value="023134000Santa Maria">023134000Santa Maria</option>
														<option value="023135000City of Santiago">023135000City of Santiago</option>
														<option value="023136000Santo Tomas">023136000Santo Tomas</option>
														<option value="023137000Tumauini">023137000Tumauini</option>
														<option value="025001000Ambaguio">025001000Ambaguio</option>
														<option value="025002000Aritao">025002000Aritao</option>
														<option value="025003000Bagabag">025003000Bagabag</option>
														<option value="025004000Bambang">025004000Bambang</option>
														<option value="025005000Bayombong (Capital)">025005000Bayombong (Capital)</option>
														<option value="025006000Diadi">025006000Diadi</option>
														<option value="025007000Dupax del Norte">025007000Dupax del Norte</option>
														<option value="025008000Dupax del Sur">025008000Dupax del Sur</option>
														<option value="025009000Kasibu">025009000Kasibu</option>
														<option value="025010000Kayapa">025010000Kayapa</option>
														<option value="025011000Quezon">025011000Quezon</option>
														<option value="025012000Santa Fe">025012000Santa Fe</option>
														<option value="025013000Solano">025013000Solano</option>
														<option value="025014000Villaverde">025014000Villaverde</option>
														<option value="025015000Alfonso Castaneda">025015000Alfonso Castaneda</option>
														<option value="025701000Aglipay">025701000Aglipay</option>
														<option value="025702000Cabarroguis (Capital)">025702000Cabarroguis (Capital)</option>
														<option value="025703000Diffun">025703000Diffun</option>
														<option value="025704000Maddela">025704000Maddela</option>
														<option value="025705000Saguday">025705000Saguday</option>
														<option value="025706000Nagtipunan">025706000Nagtipunan</option>
														<option value="030801000Abucay">030801000Abucay</option>
														<option value="030802000Bagac">030802000Bagac</option>
														<option value="030803000City of Balanga (Capital)">030803000City of Balanga (Capital)</option>
														<option value="030804000Dinalupihan">030804000Dinalupihan</option>
														<option value="030805000Hermosa">030805000Hermosa</option>
														<option value="030806000Limay">030806000Limay</option>
														<option value="030807000Mariveles">030807000Mariveles</option>
														<option value="030808000Morong">030808000Morong</option>
														<option value="030809000Orani">030809000Orani</option>
														<option value="030810000Orion">030810000Orion</option>
														<option value="030811000Pilar">030811000Pilar</option>
														<option value="030812000Samal">030812000Samal</option>
														<option value="031401000Angat">031401000Angat</option>
														<option value="031402000Balagtas">031402000Balagtas</option>
														<option value="031403000Baliuag">031403000Baliuag</option>
														<option value="031404000Bocaue">031404000Bocaue</option>
														<option value="031405000Bulacan">031405000Bulacan</option>
														<option value="031406000Bustos">031406000Bustos</option>
														<option value="031407000Calumpit">031407000Calumpit</option>
														<option value="031408000Guiguinto">031408000Guiguinto</option>
														<option value="031409000Hagonoy">031409000Hagonoy</option>
														<option value="031410000City of Malolos (Capital)">031410000City of Malolos (Capital)</option>
														<option value="031411000Marilao">031411000Marilao</option>
														<option value="031412000City of Meycauayan">031412000City of Meycauayan</option>
														<option value="031413000Norzagaray">031413000Norzagaray</option>
														<option value="031414000Obando">031414000Obando</option>
														<option value="031415000Pandi">031415000Pandi</option>
														<option value="031416000Paombong">031416000Paombong</option>
														<option value="031417000Plaridel">031417000Plaridel</option>
														<option value="031418000Pulilan">031418000Pulilan</option>
														<option value="031419000San Ildefonso">031419000San Ildefonso</option>
														<option value="031420000City of San Jose Del Monte">031420000City of San Jose Del Monte</option>
														<option value="031421000San Miguel">031421000San Miguel</option>
														<option value="031422000San Rafael">031422000San Rafael</option>
														<option value="031423000Santa Maria">031423000Santa Maria</option>
														<option value="031424000Doña Remedios Trinidad">031424000Doña Remedios Trinidad</option>
														<option value="034901000Aliaga">034901000Aliaga</option>
														<option value="034902000Bongabon">034902000Bongabon</option>
														<option value="034903000City of Cabanatuan">034903000City of Cabanatuan</option>
														<option value="034904000Cabiao">034904000Cabiao</option>
														<option value="034905000Carranglan">034905000Carranglan</option>
														<option value="034906000Cuyapo">034906000Cuyapo</option>
														<option value="034907000Gabaldon">034907000Gabaldon</option>
														<option value="034908000City of Gapan">034908000City of Gapan</option>
														<option value="034909000General Mamerto Natividad">034909000General Mamerto Natividad</option>
														<option value="034910000General Tinio">034910000General Tinio</option>
														<option value="034911000Guimba">034911000Guimba</option>
														<option value="034912000Jaen">034912000Jaen</option>
														<option value="034913000Laur">034913000Laur</option>
														<option value="034914000Licab">034914000Licab</option>
														<option value="034915000Llanera">034915000Llanera</option>
														<option value="034916000Lupao">034916000Lupao</option>
														<option value="034917000Science City of Muñoz">034917000Science City of Muñoz</option>
														<option value="034918000Nampicuan">034918000Nampicuan</option>
														<option value="034919000City of Palayan (Capital)">034919000City of Palayan (Capital)</option>
														<option value="034920000Pantabangan">034920000Pantabangan</option>
														<option value="034921000Peñaranda">034921000Peñaranda</option>
														<option value="034922000Quezon">034922000Quezon</option>
														<option value="034923000Rizal">034923000Rizal</option>
														<option value="034924000San Antonio">034924000San Antonio</option>
														<option value="034925000San Isidro">034925000San Isidro</option>
														<option value="034926000San Jose City">034926000San Jose City</option>
														<option value="034927000San Leonardo">034927000San Leonardo</option>
														<option value="034928000Santa Rosa">034928000Santa Rosa</option>
														<option value="034929000Santo Domingo">034929000Santo Domingo</option>
														<option value="034930000Talavera">034930000Talavera</option>
														<option value="034931000Talugtug">034931000Talugtug</option>
														<option value="034932000Zaragoza">034932000Zaragoza</option>
														<option value="035401000City of Angeles">035401000City of Angeles</option>
														<option value="035402000Apalit">035402000Apalit</option>
														<option value="035403000Arayat">035403000Arayat</option>
														<option value="035404000Bacolor">035404000Bacolor</option>
														<option value="035405000Candaba">035405000Candaba</option>
														<option value="035406000Floridablanca">035406000Floridablanca</option>
														<option value="035407000Guagua">035407000Guagua</option>
														<option value="035408000Lubao">035408000Lubao</option>
														<option value="035409000Mabalacat City">035409000Mabalacat City</option>
														<option value="035410000Macabebe">035410000Macabebe</option>
														<option value="035411000Magalang">035411000Magalang</option>
														<option value="035412000Masantol">035412000Masantol</option>
														<option value="035413000Mexico">035413000Mexico</option>
														<option value="035414000Minalin">035414000Minalin</option>
														<option value="035415000Porac">035415000Porac</option>
														<option value="035416000City of San Fernando (Capital)">035416000City of San Fernando (Capital)</option>
														<option value="035417000San Luis">035417000San Luis</option>
														<option value="035418000San Simon">035418000San Simon</option>
														<option value="035419000Santa Ana">035419000Santa Ana</option>
														<option value="035420000Santa Rita">035420000Santa Rita</option>
														<option value="035421000Santo Tomas">035421000Santo Tomas</option>
														<option value="035422000Sasmuan">035422000Sasmuan</option>
														<option value="036901000Anao">036901000Anao</option>
														<option value="036902000Bamban">036902000Bamban</option>
														<option value="036903000Camiling">036903000Camiling</option>
														<option value="036904000Capas">036904000Capas</option>
														<option value="036905000Concepcion">036905000Concepcion</option>
														<option value="036906000Gerona">036906000Gerona</option>
														<option value="036907000La Paz">036907000La Paz</option>
														<option value="036908000Mayantoc">036908000Mayantoc</option>
														<option value="036909000Moncada">036909000Moncada</option>
														<option value="036910000Paniqui">036910000Paniqui</option>
														<option value="036911000Pura">036911000Pura</option>
														<option value="036912000Ramos">036912000Ramos</option>
														<option value="036913000San Clemente">036913000San Clemente</option>
														<option value="036914000San Manuel">036914000San Manuel</option>
														<option value="036915000Santa Ignacia">036915000Santa Ignacia</option>
														<option value="036916000City of Tarlac (Capital)">036916000City of Tarlac (Capital)</option>
														<option value="036917000Victoria">036917000Victoria</option>
														<option value="036918000San Jose">036918000San Jose</option>
														<option value="037101000Botolan">037101000Botolan</option>
														<option value="037102000Cabangan">037102000Cabangan</option>
														<option value="037103000Candelaria">037103000Candelaria</option>
														<option value="037104000Castillejos">037104000Castillejos</option>
														<option value="037105000Iba (Capital)">037105000Iba (Capital)</option>
														<option value="037106000Masinloc">037106000Masinloc</option>
														<option value="037107000City of Olongapo">037107000City of Olongapo</option>
														<option value="037108000Palauig">037108000Palauig</option>
														<option value="037109000San Antonio">037109000San Antonio</option>
														<option value="037110000San Felipe">037110000San Felipe</option>
														<option value="037111000San Marcelino">037111000San Marcelino</option>
														<option value="037112000San Narciso">037112000San Narciso</option>
														<option value="037113000Santa Cruz">037113000Santa Cruz</option>
														<option value="037114000Subic">037114000Subic</option>
														<option value="037701000Baler (Capital)">037701000Baler (Capital)</option>
														<option value="037702000Casiguran">037702000Casiguran</option>
														<option value="037703000Dilasag">037703000Dilasag</option>
														<option value="037704000Dinalungan">037704000Dinalungan</option>
														<option value="037705000Dingalan">037705000Dingalan</option>
														<option value="037706000Dipaculao">037706000Dipaculao</option>
														<option value="037707000Maria Aurora">037707000Maria Aurora</option>
														<option value="037708000San Luis">037708000San Luis</option>
														<option value="041001000Agoncillo">041001000Agoncillo</option>
														<option value="041002000Alitagtag">041002000Alitagtag</option>
														<option value="041003000Balayan">041003000Balayan</option>
														<option value="041004000Balete">041004000Balete</option>
														<option value="041005000Batangas City (Capital)">041005000Batangas City (Capital)</option>
														<option value="041006000Bauan">041006000Bauan</option>
														<option value="041007000Calaca">041007000Calaca</option>
														<option value="041008000Calatagan">041008000Calatagan</option>
														<option value="041009000Cuenca">041009000Cuenca</option>
														<option value="041010000Ibaan">041010000Ibaan</option>
														<option value="041011000Laurel">041011000Laurel</option>
														<option value="041012000Lemery">041012000Lemery</option>
														<option value="041013000Lian">041013000Lian</option>
														<option value="041014000City of Lipa">041014000City of Lipa</option>
														<option value="041015000Lobo">041015000Lobo</option>
														<option value="041016000Mabini">041016000Mabini</option>
														<option value="041017000Malvar">041017000Malvar</option>
														<option value="041018000Mataasnakahoy">041018000Mataasnakahoy</option>
														<option value="041019000Nasugbu">041019000Nasugbu</option>
														<option value="041020000Padre Garcia">041020000Padre Garcia</option>
														<option value="041021000Rosario">041021000Rosario</option>
														<option value="041022000San Jose">041022000San Jose</option>
														<option value="041023000San Juan">041023000San Juan</option>
														<option value="041024000San Luis">041024000San Luis</option>
														<option value="041025000San Nicolas">041025000San Nicolas</option>
														<option value="041026000San Pascual">041026000San Pascual</option>
														<option value="041027000Santa Teresita">041027000Santa Teresita</option>
														<option value="041028000City of Sto. Tomas">041028000City of Sto. Tomas</option>
														<option value="041029000Taal">041029000Taal</option>
														<option value="041030000Talisay">041030000Talisay</option>
														<option value="041031000City of Tanauan">041031000City of Tanauan</option>
														<option value="041032000Taysan">041032000Taysan</option>
														<option value="041033000Tingloy">041033000Tingloy</option>
														<option value="041034000Tuy">041034000Tuy</option>
														<option value="042101000Alfonso">042101000Alfonso</option>
														<option value="042102000Amadeo">042102000Amadeo</option>
														<option value="042103000City of Bacoor">042103000City of Bacoor</option>
														<option value="042104000Carmona">042104000Carmona</option>
														<option value="042105000City of Cavite">042105000City of Cavite</option>
														<option value="042106000City of Dasmariñas">042106000City of Dasmariñas</option>
														<option value="042107000General Emilio Aguinaldo">042107000General Emilio Aguinaldo</option>
														<option value="042108000City of General Trias">042108000City of General Trias</option>
														<option value="042109000City of Imus">042109000City of Imus</option>
														<option value="042110000Indang">042110000Indang</option>
														<option value="042111000Kawit">042111000Kawit</option>
														<option value="042112000Magallanes">042112000Magallanes</option>
														<option value="042113000Maragondon">042113000Maragondon</option>
														<option value="042114000Mendez">042114000Mendez</option>
														<option value="042115000Naic">042115000Naic</option>
														<option value="042116000Noveleta">042116000Noveleta</option>
														<option value="042117000Rosario">042117000Rosario</option>
														<option value="042118000Silang">042118000Silang</option>
														<option value="042119000City of Tagaytay">042119000City of Tagaytay</option>
														<option value="042120000Tanza">042120000Tanza</option>
														<option value="042121000Ternate">042121000Ternate</option>
														<option value="042122000City of Trece Martires (Capital)">042122000City of Trece Martires (Capital)</option>
														<option value="042123000Gen. Mariano Alvarez">042123000Gen. Mariano Alvarez</option>
														<option value="043401000Alaminos">043401000Alaminos</option>
														<option value="043402000Bay">043402000Bay</option>
														<option value="043403000City of Biñan">043403000City of Biñan</option>
														<option value="043404000City of Cabuyao">043404000City of Cabuyao</option>
														<option value="043405000City of Calamba">043405000City of Calamba</option>
														<option value="043406000Calauan">043406000Calauan</option>
														<option value="043407000Cavinti">043407000Cavinti</option>
														<option value="043408000Famy">043408000Famy</option>
														<option value="043409000Kalayaan">043409000Kalayaan</option>
														<option value="043410000Liliw">043410000Liliw</option>
														<option value="043411000Los Baños">043411000Los Baños</option>
														<option value="043412000Luisiana">043412000Luisiana</option>
														<option value="043413000Lumban">043413000Lumban</option>
														<option value="043414000Mabitac">043414000Mabitac</option>
														<option value="043415000Magdalena">043415000Magdalena</option>
														<option value="043416000Majayjay">043416000Majayjay</option>
														<option value="043417000Nagcarlan">043417000Nagcarlan</option>
														<option value="043418000Paete">043418000Paete</option>
														<option value="043419000Pagsanjan">043419000Pagsanjan</option>
														<option value="043420000Pakil">043420000Pakil</option>
														<option value="043421000Pangil">043421000Pangil</option>
														<option value="043422000Pila">043422000Pila</option>
														<option value="043423000Rizal">043423000Rizal</option>
														<option value="043424000City of San Pablo">043424000City of San Pablo</option>
														<option value="043425000City of San Pedro">043425000City of San Pedro</option>
														<option value="043426000Santa Cruz (Capital)">043426000Santa Cruz (Capital)</option>
														<option value="043427000Santa Maria">043427000Santa Maria</option>
														<option value="043428000City of Santa Rosa">043428000City of Santa Rosa</option>
														<option value="043429000Siniloan">043429000Siniloan</option>
														<option value="043430000Victoria">043430000Victoria</option>
														<option value="045601000Agdangan">045601000Agdangan</option>
														<option value="045602000Alabat">045602000Alabat</option>
														<option value="045603000Atimonan">045603000Atimonan</option>
														<option value="045605000Buenavista">045605000Buenavista</option>
														<option value="045606000Burdeos">045606000Burdeos</option>
														<option value="045607000Calauag">045607000Calauag</option>
														<option value="045608000Candelaria">045608000Candelaria</option>
														<option value="045610000Catanauan">045610000Catanauan</option>
														<option value="045615000Dolores">045615000Dolores</option>
														<option value="045616000General Luna">045616000General Luna</option>
														<option value="045617000General Nakar">045617000General Nakar</option>
														<option value="045618000Guinayangan">045618000Guinayangan</option>
														<option value="045619000Gumaca">045619000Gumaca</option>
														<option value="045620000Infanta">045620000Infanta</option>
														<option value="045621000Jomalig">045621000Jomalig</option>
														<option value="045622000Lopez">045622000Lopez</option>
														<option value="045623000Lucban">045623000Lucban</option>
														<option value="045624000City of Lucena (Capital)">045624000City of Lucena (Capital)</option>
														<option value="045625000Macalelon">045625000Macalelon</option>
														<option value="045627000Mauban">045627000Mauban</option>
														<option value="045628000Mulanay">045628000Mulanay</option>
														<option value="045629000Padre Burgos">045629000Padre Burgos</option>
														<option value="045630000Pagbilao">045630000Pagbilao</option>
														<option value="045631000Panukulan">045631000Panukulan</option>
														<option value="045632000Patnanungan">045632000Patnanungan</option>
														<option value="045633000Perez">045633000Perez</option>
														<option value="045634000Pitogo">045634000Pitogo</option>
														<option value="045635000Plaridel">045635000Plaridel</option>
														<option value="045636000Polillo">045636000Polillo</option>
														<option value="045637000Quezon">045637000Quezon</option>
														<option value="045638000Real">045638000Real</option>
														<option value="045639000Sampaloc">045639000Sampaloc</option>
														<option value="045640000San Andres">045640000San Andres</option>
														<option value="045641000San Antonio">045641000San Antonio</option>
														<option value="045642000San Francisco">045642000San Francisco</option>
														<option value="045644000San Narciso">045644000San Narciso</option>
														<option value="045645000Sariaya">045645000Sariaya</option>
														<option value="045646000Tagkawayan">045646000Tagkawayan</option>
														<option value="045647000City of Tayabas">045647000City of Tayabas</option>
														<option value="045648000Tiaong">045648000Tiaong</option>
														<option value="045649000Unisan">045649000Unisan</option>
														<option value="045801000Angono">045801000Angono</option>
														<option value="045802000City of Antipolo (Capital)">045802000City of Antipolo (Capital)</option>
														<option value="045803000Baras">045803000Baras</option>
														<option value="045804000Binangonan">045804000Binangonan</option>
														<option value="045805000Cainta">045805000Cainta</option>
														<option value="045806000Cardona">045806000Cardona</option>
														<option value="045807000Jala-Jala">045807000Jala-Jala</option>
														<option value="045808000Rodriguez">045808000Rodriguez</option>
														<option value="045809000Morong">045809000Morong</option>
														<option value="045810000Pililla">045810000Pililla</option>
														<option value="045811000San Mateo">045811000San Mateo</option>
														<option value="045812000Tanay">045812000Tanay</option>
														<option value="045813000Taytay">045813000Taytay</option>
														<option value="045814000Teresa">045814000Teresa</option>
														<option value="174001000Boac (Capital)">174001000Boac (Capital)</option>
														<option value="174002000Buenavista">174002000Buenavista</option>
														<option value="174003000Gasan">174003000Gasan</option>
														<option value="174004000Mogpog">174004000Mogpog</option>
														<option value="174005000Santa Cruz">174005000Santa Cruz</option>
														<option value="174006000Torrijos">174006000Torrijos</option>
														<option value="175101000Abra De Ilog">175101000Abra De Ilog</option>
														<option value="175102000Calintaan">175102000Calintaan</option>
														<option value="175103000Looc">175103000Looc</option>
														<option value="175104000Lubang">175104000Lubang</option>
														<option value="175105000Magsaysay">175105000Magsaysay</option>
														<option value="175106000Mamburao (Capital)">175106000Mamburao (Capital)</option>
														<option value="175107000Paluan">175107000Paluan</option>
														<option value="175108000Rizal">175108000Rizal</option>
														<option value="175109000Sablayan">175109000Sablayan</option>
														<option value="175110000San Jose">175110000San Jose</option>
														<option value="175111000Santa Cruz">175111000Santa Cruz</option>
														<option value="175201000Baco">175201000Baco</option>
														<option value="175202000Bansud">175202000Bansud</option>
														<option value="175203000Bongabong">175203000Bongabong</option>
														<option value="175204000Bulalacao">175204000Bulalacao</option>
														<option value="175205000City of Calapan (Capital)">175205000City of Calapan (Capital)</option>
														<option value="175206000Gloria">175206000Gloria</option>
														<option value="175207000Mansalay">175207000Mansalay</option>
														<option value="175208000Naujan">175208000Naujan</option>
														<option value="175209000Pinamalayan">175209000Pinamalayan</option>
														<option value="175210000Pola">175210000Pola</option>
														<option value="175211000Puerto Galera">175211000Puerto Galera</option>
														<option value="175212000Roxas">175212000Roxas</option>
														<option value="175213000San Teodoro">175213000San Teodoro</option>
														<option value="175214000Socorro">175214000Socorro</option>
														<option value="175215000Victoria">175215000Victoria</option>
														<option value="175301000Aborlan">175301000Aborlan</option>
														<option value="175302000Agutaya">175302000Agutaya</option>
														<option value="175303000Araceli">175303000Araceli</option>
														<option value="175304000Balabac">175304000Balabac</option>
														<option value="175305000Bataraza">175305000Bataraza</option>
														<option value="175306000Brooke'S Point">175306000Brooke'S Point</option>
														<option value="175307000Busuanga">175307000Busuanga</option>
														<option value="175308000Cagayancillo">175308000Cagayancillo</option>
														<option value="175309000Coron">175309000Coron</option>
														<option value="175310000Cuyo">175310000Cuyo</option>
														<option value="175311000Dumaran">175311000Dumaran</option>
														<option value="175312000El Nido">175312000El Nido</option>
														<option value="175313000Linapacan">175313000Linapacan</option>
														<option value="175314000Magsaysay">175314000Magsaysay</option>
														<option value="175315000Narra">175315000Narra</option>
														<option value="175316000City of Puerto Princesa (Capital)">175316000City of Puerto Princesa (Capital)</option>
														<option value="175317000Quezon">175317000Quezon</option>
														<option value="175318000Roxas">175318000Roxas</option>
														<option value="175319000San Vicente">175319000San Vicente</option>
														<option value="175320000Taytay">175320000Taytay</option>
														<option value="175321000Kalayaan">175321000Kalayaan</option>
														<option value="175322000Culion">175322000Culion</option>
														<option value="175323000Rizal">175323000Rizal</option>
														<option value="175324000Sofronio Española">175324000Sofronio Española</option>
														<option value="175901000Alcantara">175901000Alcantara</option>
														<option value="175902000Banton">175902000Banton</option>
														<option value="175903000Cajidiocan">175903000Cajidiocan</option>
														<option value="175904000Calatrava">175904000Calatrava</option>
														<option value="175905000Concepcion">175905000Concepcion</option>
														<option value="175906000Corcuera">175906000Corcuera</option>
														<option value="175907000Looc">175907000Looc</option>
														<option value="175908000Magdiwang">175908000Magdiwang</option>
														<option value="175909000Odiongan">175909000Odiongan</option>
														<option value="175910000Romblon (Capital)">175910000Romblon (Capital)</option>
														<option value="175911000San Agustin">175911000San Agustin</option>
														<option value="175912000San Andres">175912000San Andres</option>
														<option value="175913000San Fernando">175913000San Fernando</option>
														<option value="175914000San Jose">175914000San Jose</option>
														<option value="175915000Santa Fe">175915000Santa Fe</option>
														<option value="175916000Ferrol">175916000Ferrol</option>
														<option value="175917000Santa Maria">175917000Santa Maria</option>
														<option value="050501000Bacacay">050501000Bacacay</option>
														<option value="050502000Camalig">050502000Camalig</option>
														<option value="050503000Daraga">050503000Daraga</option>
														<option value="050504000Guinobatan">050504000Guinobatan</option>
														<option value="050505000Jovellar">050505000Jovellar</option>
														<option value="050506000City of Legazpi (Capital)">050506000City of Legazpi (Capital)</option>
														<option value="050507000Libon">050507000Libon</option>
														<option value="050508000City of Ligao">050508000City of Ligao</option>
														<option value="050509000Malilipot">050509000Malilipot</option>
														<option value="050510000Malinao">050510000Malinao</option>
														<option value="050511000Manito">050511000Manito</option>
														<option value="050512000Oas">050512000Oas</option>
														<option value="050513000Pio Duran">050513000Pio Duran</option>
														<option value="050514000Polangui">050514000Polangui</option>
														<option value="050515000Rapu-Rapu">050515000Rapu-Rapu</option>
														<option value="050516000Santo Domingo">050516000Santo Domingo</option>
														<option value="050517000City of Tabaco">050517000City of Tabaco</option>
														<option value="050518000Tiwi">050518000Tiwi</option>
														<option value="051601000Basud">051601000Basud</option>
														<option value="051602000Capalonga">051602000Capalonga</option>
														<option value="051603000Daet (Capital)">051603000Daet (Capital)</option>
														<option value="051604000San Lorenzo Ruiz">051604000San Lorenzo Ruiz</option>
														<option value="051605000Jose Panganiban">051605000Jose Panganiban</option>
														<option value="051606000Labo">051606000Labo</option>
														<option value="051607000Mercedes">051607000Mercedes</option>
														<option value="051608000Paracale">051608000Paracale</option>
														<option value="051609000San Vicente">051609000San Vicente</option>
														<option value="051610000Santa Elena">051610000Santa Elena</option>
														<option value="051611000Talisay">051611000Talisay</option>
														<option value="051612000Vinzons">051612000Vinzons</option>
														<option value="051701000Baao">051701000Baao</option>
														<option value="051702000Balatan">051702000Balatan</option>
														<option value="051703000Bato">051703000Bato</option>
														<option value="051704000Bombon">051704000Bombon</option>
														<option value="051705000Buhi">051705000Buhi</option>
														<option value="051706000Bula">051706000Bula</option>
														<option value="051707000Cabusao">051707000Cabusao</option>
														<option value="051708000Calabanga">051708000Calabanga</option>
														<option value="051709000Camaligan">051709000Camaligan</option>
														<option value="051710000Canaman">051710000Canaman</option>
														<option value="051711000Caramoan">051711000Caramoan</option>
														<option value="051712000Del Gallego">051712000Del Gallego</option>
														<option value="051713000Gainza">051713000Gainza</option>
														<option value="051714000Garchitorena">051714000Garchitorena</option>
														<option value="051715000Goa">051715000Goa</option>
														<option value="051716000City of Iriga">051716000City of Iriga</option>
														<option value="051717000Lagonoy">051717000Lagonoy</option>
														<option value="051718000Libmanan">051718000Libmanan</option>
														<option value="051719000Lupi">051719000Lupi</option>
														<option value="051720000Magarao">051720000Magarao</option>
														<option value="051721000Milaor">051721000Milaor</option>
														<option value="051722000Minalabac">051722000Minalabac</option>
														<option value="051723000Nabua">051723000Nabua</option>
														<option value="051724000City of Naga">051724000City of Naga</option>
														<option value="051725000Ocampo">051725000Ocampo</option>
														<option value="051726000Pamplona">051726000Pamplona</option>
														<option value="051727000Pasacao">051727000Pasacao</option>
														<option value="051728000Pili (Capital)">051728000Pili (Capital)</option>
														<option value="051729000Presentacion">051729000Presentacion</option>
														<option value="051730000Ragay">051730000Ragay</option>
														<option value="051731000Sagñay">051731000Sagñay</option>
														<option value="051732000San Fernando">051732000San Fernando</option>
														<option value="051733000San Jose">051733000San Jose</option>
														<option value="051734000Sipocot">051734000Sipocot</option>
														<option value="051735000Siruma">051735000Siruma</option>
														<option value="051736000Tigaon">051736000Tigaon</option>
														<option value="051737000Tinambac">051737000Tinambac</option>
														<option value="052001000Bagamanoc">052001000Bagamanoc</option>
														<option value="052002000Baras">052002000Baras</option>
														<option value="052003000Bato">052003000Bato</option>
														<option value="052004000Caramoran">052004000Caramoran</option>
														<option value="052005000Gigmoto">052005000Gigmoto</option>
														<option value="052006000Pandan">052006000Pandan</option>
														<option value="052007000Panganiban">052007000Panganiban</option>
														<option value="052008000San Andres">052008000San Andres</option>
														<option value="052009000San Miguel">052009000San Miguel</option>
														<option value="052010000Viga">052010000Viga</option>
														<option value="052011000Virac (Capital)">052011000Virac (Capital)</option>
														<option value="054101000Aroroy">054101000Aroroy</option>
														<option value="054102000Baleno">054102000Baleno</option>
														<option value="054103000Balud">054103000Balud</option>
														<option value="054104000Batuan">054104000Batuan</option>
														<option value="054105000Cataingan">054105000Cataingan</option>
														<option value="054106000Cawayan">054106000Cawayan</option>
														<option value="054107000Claveria">054107000Claveria</option>
														<option value="054108000Dimasalang">054108000Dimasalang</option>
														<option value="054109000Esperanza">054109000Esperanza</option>
														<option value="054110000Mandaon">054110000Mandaon</option>
														<option value="054111000City of Masbate (Capital)">054111000City of Masbate (Capital)</option>
														<option value="054112000Milagros">054112000Milagros</option>
														<option value="054113000Mobo">054113000Mobo</option>
														<option value="054114000Monreal">054114000Monreal</option>
														<option value="054115000Palanas">054115000Palanas</option>
														<option value="054116000Pio V. Corpuz">054116000Pio V. Corpuz</option>
														<option value="054117000Placer">054117000Placer</option>
														<option value="054118000San Fernando">054118000San Fernando</option>
														<option value="054119000San Jacinto">054119000San Jacinto</option>
														<option value="054120000San Pascual">054120000San Pascual</option>
														<option value="054121000Uson">054121000Uson</option>
														<option value="056202000Barcelona">056202000Barcelona</option>
														<option value="056203000Bulan">056203000Bulan</option>
														<option value="056204000Bulusan">056204000Bulusan</option>
														<option value="056205000Casiguran">056205000Casiguran</option>
														<option value="056206000Castilla">056206000Castilla</option>
														<option value="056207000Donsol">056207000Donsol</option>
														<option value="056208000Gubat">056208000Gubat</option>
														<option value="056209000Irosin">056209000Irosin</option>
														<option value="056210000Juban">056210000Juban</option>
														<option value="056211000Magallanes">056211000Magallanes</option>
														<option value="056212000Matnog">056212000Matnog</option>
														<option value="056213000Pilar">056213000Pilar</option>
														<option value="056214000Prieto Diaz">056214000Prieto Diaz</option>
														<option value="056215000Santa Magdalena">056215000Santa Magdalena</option>
														<option value="056216000City of Sorsogon (Capital)">056216000City of Sorsogon (Capital)</option>
														<option value="060401000Altavas">060401000Altavas</option>
														<option value="060402000Balete">060402000Balete</option>
														<option value="060403000Banga">060403000Banga</option>
														<option value="060404000Batan">060404000Batan</option>
														<option value="060405000Buruanga">060405000Buruanga</option>
														<option value="060406000Ibajay">060406000Ibajay</option>
														<option value="060407000Kalibo (Capital)">060407000Kalibo (Capital)</option>
														<option value="060408000Lezo">060408000Lezo</option>
														<option value="060409000Libacao">060409000Libacao</option>
														<option value="060410000Madalag">060410000Madalag</option>
														<option value="060411000Makato">060411000Makato</option>
														<option value="060412000Malay">060412000Malay</option>
														<option value="060413000Malinao">060413000Malinao</option>
														<option value="060414000Nabas">060414000Nabas</option>
														<option value="060415000New Washington">060415000New Washington</option>
														<option value="060416000Numancia">060416000Numancia</option>
														<option value="060417000Tangalan">060417000Tangalan</option>
														<option value="060601000Anini-Y">060601000Anini-Y</option>
														<option value="060602000Barbaza">060602000Barbaza</option>
														<option value="060603000Belison">060603000Belison</option>
														<option value="060604000Bugasong">060604000Bugasong</option>
														<option value="060605000Caluya">060605000Caluya</option>
														<option value="060606000Culasi">060606000Culasi</option>
														<option value="060607000Tobias Fornier">060607000Tobias Fornier</option>
														<option value="060608000Hamtic">060608000Hamtic</option>
														<option value="060609000Laua-An">060609000Laua-An</option>
														<option value="060610000Libertad">060610000Libertad</option>
														<option value="060611000Pandan">060611000Pandan</option>
														<option value="060612000Patnongon">060612000Patnongon</option>
														<option value="060613000San Jose (Capital)">060613000San Jose (Capital)</option>
														<option value="060614000San Remigio">060614000San Remigio</option>
														<option value="060615000Sebaste">060615000Sebaste</option>
														<option value="060616000Sibalom">060616000Sibalom</option>
														<option value="060617000Tibiao">060617000Tibiao</option>
														<option value="060618000Valderrama">060618000Valderrama</option>
														<option value="061901000Cuartero">061901000Cuartero</option>
														<option value="061902000Dao">061902000Dao</option>
														<option value="061903000Dumalag">061903000Dumalag</option>
														<option value="061904000Dumarao">061904000Dumarao</option>
														<option value="061905000Ivisan">061905000Ivisan</option>
														<option value="061906000Jamindan">061906000Jamindan</option>
														<option value="061907000Ma-Ayon">061907000Ma-Ayon</option>
														<option value="061908000Mambusao">061908000Mambusao</option>
														<option value="061909000Panay">061909000Panay</option>
														<option value="061910000Panitan">061910000Panitan</option>
														<option value="061911000Pilar">061911000Pilar</option>
														<option value="061912000Pontevedra">061912000Pontevedra</option>
														<option value="061913000President Roxas">061913000President Roxas</option>
														<option value="061914000City of Roxas (Capital)">061914000City of Roxas (Capital)</option>
														<option value="061915000Sapi-An">061915000Sapi-An</option>
														<option value="061916000Sigma">061916000Sigma</option>
														<option value="061917000Tapaz">061917000Tapaz</option>
														<option value="063001000Ajuy">063001000Ajuy</option>
														<option value="063002000Alimodian">063002000Alimodian</option>
														<option value="063003000Anilao">063003000Anilao</option>
														<option value="063004000Badiangan">063004000Badiangan</option>
														<option value="063005000Balasan">063005000Balasan</option>
														<option value="063006000Banate">063006000Banate</option>
														<option value="063007000Barotac Nuevo">063007000Barotac Nuevo</option>
														<option value="063008000Barotac Viejo">063008000Barotac Viejo</option>
														<option value="063009000Batad">063009000Batad</option>
														<option value="063010000Bingawan">063010000Bingawan</option>
														<option value="063012000Cabatuan">063012000Cabatuan</option>
														<option value="063013000Calinog">063013000Calinog</option>
														<option value="063014000Carles">063014000Carles</option>
														<option value="063015000Concepcion">063015000Concepcion</option>
														<option value="063016000Dingle">063016000Dingle</option>
														<option value="063017000Dueñas">063017000Dueñas</option>
														<option value="063018000Dumangas">063018000Dumangas</option>
														<option value="063019000Estancia">063019000Estancia</option>
														<option value="063020000Guimbal">063020000Guimbal</option>
														<option value="063021000Igbaras">063021000Igbaras</option>
														<option value="063022000City of Iloilo (Capital)">063022000City of Iloilo (Capital)</option>
														<option value="063023000Janiuay">063023000Janiuay</option>
														<option value="063025000Lambunao">063025000Lambunao</option>
														<option value="063026000Leganes">063026000Leganes</option>
														<option value="063027000Lemery">063027000Lemery</option>
														<option value="063028000Leon">063028000Leon</option>
														<option value="063029000Maasin">063029000Maasin</option>
														<option value="063030000Miagao">063030000Miagao</option>
														<option value="063031000Mina">063031000Mina</option>
														<option value="063032000New Lucena">063032000New Lucena</option>
														<option value="063034000Oton">063034000Oton</option>
														<option value="063035000City of Passi">063035000City of Passi</option>
														<option value="063036000Pavia">063036000Pavia</option>
														<option value="063037000Pototan">063037000Pototan</option>
														<option value="063038000San Dionisio">063038000San Dionisio</option>
														<option value="063039000San Enrique">063039000San Enrique</option>
														<option value="063040000San Joaquin">063040000San Joaquin</option>
														<option value="063041000San Miguel">063041000San Miguel</option>
														<option value="063042000San Rafael">063042000San Rafael</option>
														<option value="063043000Santa Barbara">063043000Santa Barbara</option>
														<option value="063044000Sara">063044000Sara</option>
														<option value="063045000Tigbauan">063045000Tigbauan</option>
														<option value="063046000Tubungan">063046000Tubungan</option>
														<option value="063047000Zarraga">063047000Zarraga</option>
														<option value="064501000City of Bacolod (Capital)">064501000City of Bacolod (Capital)</option>
														<option value="064502000City of Bago">064502000City of Bago</option>
														<option value="064503000Binalbagan">064503000Binalbagan</option>
														<option value="064504000City of Cadiz">064504000City of Cadiz</option>
														<option value="064505000Calatrava">064505000Calatrava</option>
														<option value="064506000Candoni">064506000Candoni</option>
														<option value="064507000Cauayan">064507000Cauayan</option>
														<option value="064508000Enrique B. Magalona">064508000Enrique B. Magalona</option>
														<option value="064509000City of Escalante">064509000City of Escalante</option>
														<option value="064510000City of Himamaylan">064510000City of Himamaylan</option>
														<option value="064511000Hinigaran">064511000Hinigaran</option>
														<option value="064512000Hinoba-an">064512000Hinoba-an</option>
														<option value="064513000Ilog">064513000Ilog</option>
														<option value="064514000Isabela">064514000Isabela</option>
														<option value="064515000City of Kabankalan">064515000City of Kabankalan</option>
														<option value="064516000City of La Carlota">064516000City of La Carlota</option>
														<option value="064517000La Castellana">064517000La Castellana</option>
														<option value="064518000Manapla">064518000Manapla</option>
														<option value="064519000Moises Padilla">064519000Moises Padilla</option>
														<option value="064520000Murcia">064520000Murcia</option>
														<option value="064521000Pontevedra">064521000Pontevedra</option>
														<option value="064522000Pulupandan">064522000Pulupandan</option>
														<option value="064523000City of Sagay">064523000City of Sagay</option>
														<option value="064524000City of San Carlos">064524000City of San Carlos</option>
														<option value="064525000San Enrique">064525000San Enrique</option>
														<option value="064526000City of Silay">064526000City of Silay</option>
														<option value="064527000City of Sipalay">064527000City of Sipalay</option>
														<option value="064528000City of Talisay">064528000City of Talisay</option>
														<option value="064529000Toboso">064529000Toboso</option>
														<option value="064530000Valladolid">064530000Valladolid</option>
														<option value="064531000City of Victorias">064531000City of Victorias</option>
														<option value="064532000Salvador Benedicto">064532000Salvador Benedicto</option>
														<option value="067901000Buenavista">067901000Buenavista</option>
														<option value="067902000Jordan (Capital)">067902000Jordan (Capital)</option>
														<option value="067903000Nueva Valencia">067903000Nueva Valencia</option>
														<option value="067904000San Lorenzo">067904000San Lorenzo</option>
														<option value="067905000Sibunag">067905000Sibunag</option>
														<option value="071201000Alburquerque">071201000Alburquerque</option>
														<option value="071202000Alicia">071202000Alicia</option>
														<option value="071203000Anda">071203000Anda</option>
														<option value="071204000Antequera">071204000Antequera</option>
														<option value="071205000Baclayon">071205000Baclayon</option>
														<option value="071206000Balilihan">071206000Balilihan</option>
														<option value="071207000Batuan">071207000Batuan</option>
														<option value="071208000Bilar">071208000Bilar</option>
														<option value="071209000Buenavista">071209000Buenavista</option>
														<option value="071210000Calape">071210000Calape</option>
														<option value="071211000Candijay">071211000Candijay</option>
														<option value="071212000Carmen">071212000Carmen</option>
														<option value="071213000Catigbian">071213000Catigbian</option>
														<option value="071214000Clarin">071214000Clarin</option>
														<option value="071215000Corella">071215000Corella</option>
														<option value="071216000Cortes">071216000Cortes</option>
														<option value="071217000Dagohoy">071217000Dagohoy</option>
														<option value="071218000Danao">071218000Danao</option>
														<option value="071219000Dauis">071219000Dauis</option>
														<option value="071220000Dimiao">071220000Dimiao</option>
														<option value="071221000Duero">071221000Duero</option>
														<option value="071222000Garcia Hernandez">071222000Garcia Hernandez</option>
														<option value="071223000Guindulman">071223000Guindulman</option>
														<option value="071224000Inabanga">071224000Inabanga</option>
														<option value="071225000Jagna">071225000Jagna</option>
														<option value="071226000Getafe">071226000Getafe</option>
														<option value="071227000Lila">071227000Lila</option>
														<option value="071228000Loay">071228000Loay</option>
														<option value="071229000Loboc">071229000Loboc</option>
														<option value="071230000Loon">071230000Loon</option>
														<option value="071231000Mabini">071231000Mabini</option>
														<option value="071232000Maribojoc">071232000Maribojoc</option>
														<option value="071233000Panglao">071233000Panglao</option>
														<option value="071234000Pilar">071234000Pilar</option>
														<option value="071235000President Carlos P. Garcia">071235000President Carlos P. Garcia</option>
														<option value="071236000Sagbayan">071236000Sagbayan</option>
														<option value="071237000San Isidro">071237000San Isidro</option>
														<option value="071238000San Miguel">071238000San Miguel</option>
														<option value="071239000Sevilla">071239000Sevilla</option>
														<option value="071240000Sierra Bullones">071240000Sierra Bullones</option>
														<option value="071241000Sikatuna">071241000Sikatuna</option>
														<option value="071242000City of Tagbilaran (Capital)">071242000City of Tagbilaran (Capital)</option>
														<option value="071243000Talibon">071243000Talibon</option>
														<option value="071244000Trinidad">071244000Trinidad</option>
														<option value="071245000Tubigon">071245000Tubigon</option>
														<option value="071246000Ubay">071246000Ubay</option>
														<option value="071247000Valencia">071247000Valencia</option>
														<option value="071248000Bien Unido">071248000Bien Unido</option>
														<option value="072201000Alcantara">072201000Alcantara</option>
														<option value="072202000Alcoy">072202000Alcoy</option>
														<option value="072203000Alegria">072203000Alegria</option>
														<option value="072204000Aloguinsan">072204000Aloguinsan</option>
														<option value="072205000Argao">072205000Argao</option>
														<option value="072206000Asturias">072206000Asturias</option>
														<option value="072207000Badian">072207000Badian</option>
														<option value="072208000Balamban">072208000Balamban</option>
														<option value="072209000Bantayan">072209000Bantayan</option>
														<option value="072210000Barili">072210000Barili</option>
														<option value="072211000City of Bogo">072211000City of Bogo</option>
														<option value="072212000Boljoon">072212000Boljoon</option>
														<option value="072213000Borbon">072213000Borbon</option>
														<option value="072214000City of Carcar">072214000City of Carcar</option>
														<option value="072215000Carmen">072215000Carmen</option>
														<option value="072216000Catmon">072216000Catmon</option>
														<option value="072217000City of Cebu (Capital)">072217000City of Cebu (Capital)</option>
														<option value="072218000Compostela">072218000Compostela</option>
														<option value="072219000Consolacion">072219000Consolacion</option>
														<option value="072220000Cordova">072220000Cordova</option>
														<option value="072221000Daanbantayan">072221000Daanbantayan</option>
														<option value="072222000Dalaguete">072222000Dalaguete</option>
														<option value="072223000Danao City">072223000Danao City</option>
														<option value="072224000Dumanjug">072224000Dumanjug</option>
														<option value="072225000Ginatilan">072225000Ginatilan</option>
														<option value="072226000City of Lapu-Lapu">072226000City of Lapu-Lapu</option>
														<option value="072227000Liloan">072227000Liloan</option>
														<option value="072228000Madridejos">072228000Madridejos</option>
														<option value="072229000Malabuyoc">072229000Malabuyoc</option>
														<option value="072230000City of Mandaue">072230000City of Mandaue</option>
														<option value="072231000Medellin">072231000Medellin</option>
														<option value="072232000Minglanilla">072232000Minglanilla</option>
														<option value="072233000Moalboal">072233000Moalboal</option>
														<option value="072234000City of Naga">072234000City of Naga</option>
														<option value="072235000Oslob">072235000Oslob</option>
														<option value="072236000Pilar">072236000Pilar</option>
														<option value="072237000Pinamungajan">072237000Pinamungajan</option>
														<option value="072238000Poro">072238000Poro</option>
														<option value="072239000Ronda">072239000Ronda</option>
														<option value="072240000Samboan">072240000Samboan</option>
														<option value="072241000San Fernando">072241000San Fernando</option>
														<option value="072242000San Francisco">072242000San Francisco</option>
														<option value="072243000San Remigio">072243000San Remigio</option>
														<option value="072244000Santa Fe">072244000Santa Fe</option>
														<option value="072245000Santander">072245000Santander</option>
														<option value="072246000Sibonga">072246000Sibonga</option>
														<option value="072247000Sogod">072247000Sogod</option>
														<option value="072248000Tabogon">072248000Tabogon</option>
														<option value="072249000Tabuelan">072249000Tabuelan</option>
														<option value="072250000City of Talisay">072250000City of Talisay</option>
														<option value="072251000City of Toledo">072251000City of Toledo</option>
														<option value="072252000Tuburan">072252000Tuburan</option>
														<option value="072253000Tudela">072253000Tudela</option>
														<option value="074601000Amlan">074601000Amlan</option>
														<option value="074602000Ayungon">074602000Ayungon</option>
														<option value="074603000Bacong">074603000Bacong</option>
														<option value="074604000City of Bais">074604000City of Bais</option>
														<option value="074605000Basay">074605000Basay</option>
														<option value="074606000City of Bayawan">074606000City of Bayawan</option>
														<option value="074607000Bindoy">074607000Bindoy</option>
														<option value="074608000City of Canlaon">074608000City of Canlaon</option>
														<option value="074609000Dauin">074609000Dauin</option>
														<option value="074610000City of Dumaguete (Capital)">074610000City of Dumaguete (Capital)</option>
														<option value="074611000City of Guihulngan">074611000City of Guihulngan</option>
														<option value="074612000Jimalalud">074612000Jimalalud</option>
														<option value="074613000La Libertad">074613000La Libertad</option>
														<option value="074614000Mabinay">074614000Mabinay</option>
														<option value="074615000Manjuyod">074615000Manjuyod</option>
														<option value="074616000Pamplona">074616000Pamplona</option>
														<option value="074617000San Jose">074617000San Jose</option>
														<option value="074618000Santa Catalina">074618000Santa Catalina</option>
														<option value="074619000Siaton">074619000Siaton</option>
														<option value="074620000Sibulan">074620000Sibulan</option>
														<option value="074621000City of Tanjay">074621000City of Tanjay</option>
														<option value="074622000Tayasan">074622000Tayasan</option>
														<option value="074623000Valencia">074623000Valencia</option>
														<option value="074624000Vallehermoso">074624000Vallehermoso</option>
														<option value="074625000Zamboanguita">074625000Zamboanguita</option>
														<option value="076101000Enrique Villanueva">076101000Enrique Villanueva</option>
														<option value="076102000Larena">076102000Larena</option>
														<option value="076103000Lazi">076103000Lazi</option>
														<option value="076104000Maria">076104000Maria</option>
														<option value="076105000San Juan">076105000San Juan</option>
														<option value="076106000Siquijor (Capital)">076106000Siquijor (Capital)</option>
														<option value="082601000Arteche">082601000Arteche</option>
														<option value="082602000Balangiga">082602000Balangiga</option>
														<option value="082603000Balangkayan">082603000Balangkayan</option>
														<option value="082604000City of Borongan (Capital)">082604000City of Borongan (Capital)</option>
														<option value="082605000Can-Avid">082605000Can-Avid</option>
														<option value="082606000Dolores">082606000Dolores</option>
														<option value="082607000General Macarthur">082607000General Macarthur</option>
														<option value="082608000Giporlos">082608000Giporlos</option>
														<option value="082609000Guiuan">082609000Guiuan</option>
														<option value="082610000Hernani">082610000Hernani</option>
														<option value="082611000Jipapad">082611000Jipapad</option>
														<option value="082612000Lawaan">082612000Lawaan</option>
														<option value="082613000Llorente">082613000Llorente</option>
														<option value="082614000Maslog">082614000Maslog</option>
														<option value="082615000Maydolong">082615000Maydolong</option>
														<option value="082616000Mercedes">082616000Mercedes</option>
														<option value="082617000Oras">082617000Oras</option>
														<option value="082618000Quinapondan">082618000Quinapondan</option>
														<option value="082619000Salcedo">082619000Salcedo</option>
														<option value="082620000San Julian">082620000San Julian</option>
														<option value="082621000San Policarpo">082621000San Policarpo</option>
														<option value="082622000Sulat">082622000Sulat</option>
														<option value="082623000Taft">082623000Taft</option>
														<option value="083701000Abuyog">083701000Abuyog</option>
														<option value="083702000Alangalang">083702000Alangalang</option>
														<option value="083703000Albuera">083703000Albuera</option>
														<option value="083705000Babatngon">083705000Babatngon</option>
														<option value="083706000Barugo">083706000Barugo</option>
														<option value="083707000Bato">083707000Bato</option>
														<option value="083708000City of Baybay">083708000City of Baybay</option>
														<option value="083710000Burauen">083710000Burauen</option>
														<option value="083713000Calubian">083713000Calubian</option>
														<option value="083714000Capoocan">083714000Capoocan</option>
														<option value="083715000Carigara">083715000Carigara</option>
														<option value="083717000Dagami">083717000Dagami</option>
														<option value="083718000Dulag">083718000Dulag</option>
														<option value="083719000Hilongos">083719000Hilongos</option>
														<option value="083720000Hindang">083720000Hindang</option>
														<option value="083721000Inopacan">083721000Inopacan</option>
														<option value="083722000Isabel">083722000Isabel</option>
														<option value="083723000Jaro">083723000Jaro</option>
														<option value="083724000Javier">083724000Javier</option>
														<option value="083725000Julita">083725000Julita</option>
														<option value="083726000Kananga">083726000Kananga</option>
														<option value="083728000La Paz">083728000La Paz</option>
														<option value="083729000Leyte">083729000Leyte</option>
														<option value="083730000Macarthur">083730000Macarthur</option>
														<option value="083731000Mahaplag">083731000Mahaplag</option>
														<option value="083733000Matag-Ob">083733000Matag-Ob</option>
														<option value="083734000Matalom">083734000Matalom</option>
														<option value="083735000Mayorga">083735000Mayorga</option>
														<option value="083736000Merida">083736000Merida</option>
														<option value="083738000Ormoc City">083738000Ormoc City</option>
														<option value="083739000Palo">083739000Palo</option>
														<option value="083740000Palompon">083740000Palompon</option>
														<option value="083741000Pastrana">083741000Pastrana</option>
														<option value="083742000San Isidro">083742000San Isidro</option>
														<option value="083743000San Miguel">083743000San Miguel</option>
														<option value="083744000Santa Fe">083744000Santa Fe</option>
														<option value="083745000Tabango">083745000Tabango</option>
														<option value="083746000Tabontabon">083746000Tabontabon</option>
														<option value="083747000City of Tacloban (Capital)">083747000City of Tacloban (Capital)</option>
														<option value="083748000Tanauan">083748000Tanauan</option>
														<option value="083749000Tolosa">083749000Tolosa</option>
														<option value="083750000Tunga">083750000Tunga</option>
														<option value="083751000Villaba">083751000Villaba</option>
														<option value="084801000Allen">084801000Allen</option>
														<option value="084802000Biri">084802000Biri</option>
														<option value="084803000Bobon">084803000Bobon</option>
														<option value="084804000Capul">084804000Capul</option>
														<option value="084805000Catarman (Capital)">084805000Catarman (Capital)</option>
														<option value="084806000Catubig">084806000Catubig</option>
														<option value="084807000Gamay">084807000Gamay</option>
														<option value="084808000Laoang">084808000Laoang</option>
														<option value="084809000Lapinig">084809000Lapinig</option>
														<option value="084810000Las Navas">084810000Las Navas</option>
														<option value="084811000Lavezares">084811000Lavezares</option>
														<option value="084812000Mapanas">084812000Mapanas</option>
														<option value="084813000Mondragon">084813000Mondragon</option>
														<option value="084814000Palapag">084814000Palapag</option>
														<option value="084815000Pambujan">084815000Pambujan</option>
														<option value="084816000Rosario">084816000Rosario</option>
														<option value="084817000San Antonio">084817000San Antonio</option>
														<option value="084818000San Isidro">084818000San Isidro</option>
														<option value="084819000San Jose">084819000San Jose</option>
														<option value="084820000San Roque">084820000San Roque</option>
														<option value="084821000San Vicente">084821000San Vicente</option>
														<option value="084822000Silvino Lobos">084822000Silvino Lobos</option>
														<option value="084823000Victoria">084823000Victoria</option>
														<option value="084824000Lope De Vega">084824000Lope De Vega</option>
														<option value="086001000Almagro">086001000Almagro</option>
														<option value="086002000Basey">086002000Basey</option>
														<option value="086003000City of Calbayog">086003000City of Calbayog</option>
														<option value="086004000Calbiga">086004000Calbiga</option>
														<option value="086005000City of Catbalogan (Capital)">086005000City of Catbalogan (Capital)</option>
														<option value="086006000Daram">086006000Daram</option>
														<option value="086007000Gandara">086007000Gandara</option>
														<option value="086008000Hinabangan">086008000Hinabangan</option>
														<option value="086009000Jiabong">086009000Jiabong</option>
														<option value="086010000Marabut">086010000Marabut</option>
														<option value="086011000Matuguinao">086011000Matuguinao</option>
														<option value="086012000Motiong">086012000Motiong</option>
														<option value="086013000Pinabacdao">086013000Pinabacdao</option>
														<option value="086014000San Jose De Buan">086014000San Jose De Buan</option>
														<option value="086015000San Sebastian">086015000San Sebastian</option>
														<option value="086016000Santa Margarita">086016000Santa Margarita</option>
														<option value="086017000Santa Rita">086017000Santa Rita</option>
														<option value="086018000Santo Niño">086018000Santo Niño</option>
														<option value="086019000Talalora">086019000Talalora</option>
														<option value="086020000Tarangnan">086020000Tarangnan</option>
														<option value="086021000Villareal">086021000Villareal</option>
														<option value="086022000Paranas">086022000Paranas</option>
														<option value="086023000Zumarraga">086023000Zumarraga</option>
														<option value="086024000Tagapul-An">086024000Tagapul-An</option>
														<option value="086025000San Jorge">086025000San Jorge</option>
														<option value="086026000Pagsanghan">086026000Pagsanghan</option>
														<option value="086401000Anahawan">086401000Anahawan</option>
														<option value="086402000Bontoc">086402000Bontoc</option>
														<option value="086403000Hinunangan">086403000Hinunangan</option>
														<option value="086404000Hinundayan">086404000Hinundayan</option>
														<option value="086405000Libagon">086405000Libagon</option>
														<option value="086406000Liloan">086406000Liloan</option>
														<option value="086407000City of Maasin (Capital)">086407000City of Maasin (Capital)</option>
														<option value="086408000Macrohon">086408000Macrohon</option>
														<option value="086409000Malitbog">086409000Malitbog</option>
														<option value="086410000Padre Burgos">086410000Padre Burgos</option>
														<option value="086411000Pintuyan">086411000Pintuyan</option>
														<option value="086412000Saint Bernard">086412000Saint Bernard</option>
														<option value="086413000San Francisco">086413000San Francisco</option>
														<option value="086414000San Juan">086414000San Juan</option>
														<option value="086415000San Ricardo">086415000San Ricardo</option>
														<option value="086416000Silago">086416000Silago</option>
														<option value="086417000Sogod">086417000Sogod</option>
														<option value="086418000Tomas Oppus">086418000Tomas Oppus</option>
														<option value="086419000Limasawa">086419000Limasawa</option>
														<option value="087801000Almeria">087801000Almeria</option>
														<option value="087802000Biliran">087802000Biliran</option>
														<option value="087803000Cabucgayan">087803000Cabucgayan</option>
														<option value="087804000Caibiran">087804000Caibiran</option>
														<option value="087805000Culaba">087805000Culaba</option>
														<option value="087806000Kawayan">087806000Kawayan</option>
														<option value="087807000Maripipi">087807000Maripipi</option>
														<option value="087808000Naval (Capital)">087808000Naval (Capital)</option>
														<option value="097201000City of Dapitan">097201000City of Dapitan</option>
														<option value="097202000City of Dipolog (Capital)">097202000City of Dipolog (Capital)</option>
														<option value="097203000Katipunan">097203000Katipunan</option>
														<option value="097204000La Libertad">097204000La Libertad</option>
														<option value="097205000Labason">097205000Labason</option>
														<option value="097206000Liloy">097206000Liloy</option>
														<option value="097207000Manukan">097207000Manukan</option>
														<option value="097208000Mutia">097208000Mutia</option>
														<option value="097209000Piñan">097209000Piñan</option>
														<option value="097210000Polanco">097210000Polanco</option>
														<option value="097211000Pres. Manuel A. Roxas">097211000Pres. Manuel A. Roxas</option>
														<option value="097212000Rizal">097212000Rizal</option>
														<option value="097213000Salug">097213000Salug</option>
														<option value="097214000Sergio Osmeña Sr.">097214000Sergio Osmeña Sr.</option>
														<option value="097215000Siayan">097215000Siayan</option>
														<option value="097216000Sibuco">097216000Sibuco</option>
														<option value="097217000Sibutad">097217000Sibutad</option>
														<option value="097218000Sindangan">097218000Sindangan</option>
														<option value="097219000Siocon">097219000Siocon</option>
														<option value="097220000Sirawai">097220000Sirawai</option>
														<option value="097221000Tampilisan">097221000Tampilisan</option>
														<option value="097222000Jose Dalman">097222000Jose Dalman</option>
														<option value="097223000Gutalac">097223000Gutalac</option>
														<option value="097224000Baliguian">097224000Baliguian</option>
														<option value="097225000Godod">097225000Godod</option>
														<option value="097226000Bacungan">097226000Bacungan</option>
														<option value="097227000Kalawit">097227000Kalawit</option>
														<option value="097302000Aurora">097302000Aurora</option>
														<option value="097303000Bayog">097303000Bayog</option>
														<option value="097305000Dimataling">097305000Dimataling</option>
														<option value="097306000Dinas">097306000Dinas</option>
														<option value="097307000Dumalinao">097307000Dumalinao</option>
														<option value="097308000Dumingag">097308000Dumingag</option>
														<option value="097311000Kumalarang">097311000Kumalarang</option>
														<option value="097312000Labangan">097312000Labangan</option>
														<option value="097313000Lapuyan">097313000Lapuyan</option>
														<option value="097315000Mahayag">097315000Mahayag</option>
														<option value="097317000Margosatubig">097317000Margosatubig</option>
														<option value="097318000Midsalip">097318000Midsalip</option>
														<option value="097319000Molave">097319000Molave</option>
														<option value="097322000City of Pagadian (Capital)">097322000City of Pagadian (Capital)</option>
														<option value="097323000Ramon Magsaysay">097323000Ramon Magsaysay</option>
														<option value="097324000San Miguel">097324000San Miguel</option>
														<option value="097325000San Pablo">097325000San Pablo</option>
														<option value="097327000Tabina">097327000Tabina</option>
														<option value="097328000Tambulig">097328000Tambulig</option>
														<option value="097330000Tukuran">097330000Tukuran</option>
														<option value="097332000City of Zamboanga">097332000City of Zamboanga</option>
														<option value="097333000Lakewood">097333000Lakewood</option>
														<option value="097337000Josefina">097337000Josefina</option>
														<option value="097338000Pitogo">097338000Pitogo</option>
														<option value="097340000Sominot">097340000Sominot</option>
														<option value="097341000Vincenzo A. Sagun">097341000Vincenzo A. Sagun</option>
														<option value="097343000Guipos">097343000Guipos</option>
														<option value="097344000Tigbao">097344000Tigbao</option>
														<option value="098301000Alicia">098301000Alicia</option>
														<option value="098302000Buug">098302000Buug</option>
														<option value="098303000Diplahan">098303000Diplahan</option>
														<option value="098304000Imelda">098304000Imelda</option>
														<option value="098305000Ipil (Capital)">098305000Ipil (Capital)</option>
														<option value="098306000Kabasalan">098306000Kabasalan</option>
														<option value="098307000Mabuhay">098307000Mabuhay</option>
														<option value="098308000Malangas">098308000Malangas</option>
														<option value="098309000Naga">098309000Naga</option>
														<option value="098310000Olutanga">098310000Olutanga</option>
														<option value="098311000Payao">098311000Payao</option>
														<option value="098312000Roseller Lim">098312000Roseller Lim</option>
														<option value="098313000Siay">098313000Siay</option>
														<option value="098314000Talusan">098314000Talusan</option>
														<option value="098315000Titay">098315000Titay</option>
														<option value="098316000Tungawan">098316000Tungawan</option>
														<option value="099701000City of Isabela">099701000City of Isabela</option>
														<option value="101301000Baungon">101301000Baungon</option>
														<option value="101302000Damulog">101302000Damulog</option>
														<option value="101303000Dangcagan">101303000Dangcagan</option>
														<option value="101304000Don Carlos">101304000Don Carlos</option>
														<option value="101305000Impasug-ong">101305000Impasug-ong</option>
														<option value="101306000Kadingilan">101306000Kadingilan</option>
														<option value="101307000Kalilangan">101307000Kalilangan</option>
														<option value="101308000Kibawe">101308000Kibawe</option>
														<option value="101309000Kitaotao">101309000Kitaotao</option>
														<option value="101310000Lantapan">101310000Lantapan</option>
														<option value="101311000Libona">101311000Libona</option>
														<option value="101312000City of Malaybalay (Capital)">101312000City of Malaybalay (Capital)</option>
														<option value="101313000Malitbog">101313000Malitbog</option>
														<option value="101314000Manolo Fortich">101314000Manolo Fortich</option>
														<option value="101315000Maramag">101315000Maramag</option>
														<option value="101316000Pangantucan">101316000Pangantucan</option>
														<option value="101317000Quezon">101317000Quezon</option>
														<option value="101318000San Fernando">101318000San Fernando</option>
														<option value="101319000Sumilao">101319000Sumilao</option>
														<option value="101320000Talakag">101320000Talakag</option>
														<option value="101321000City of Valencia">101321000City of Valencia</option>
														<option value="101322000Cabanglasan">101322000Cabanglasan</option>
														<option value="101801000Catarman">101801000Catarman</option>
														<option value="101802000Guinsiliban">101802000Guinsiliban</option>
														<option value="101803000Mahinog">101803000Mahinog</option>
														<option value="101804000Mambajao (Capital)">101804000Mambajao (Capital)</option>
														<option value="101805000Sagay">101805000Sagay</option>
														<option value="103501000Bacolod">103501000Bacolod</option>
														<option value="103502000Baloi">103502000Baloi</option>
														<option value="103503000Baroy">103503000Baroy</option>
														<option value="103504000City of Iligan">103504000City of Iligan</option>
														<option value="103505000Kapatagan">103505000Kapatagan</option>
														<option value="103506000Sultan Naga Dimaporo">103506000Sultan Naga Dimaporo</option>
														<option value="103507000Kauswagan">103507000Kauswagan</option>
														<option value="103508000Kolambugan">103508000Kolambugan</option>
														<option value="103509000Lala">103509000Lala</option>
														<option value="103510000Linamon">103510000Linamon</option>
														<option value="103511000Magsaysay">103511000Magsaysay</option>
														<option value="103512000Maigo">103512000Maigo</option>
														<option value="103513000Matungao">103513000Matungao</option>
														<option value="103514000Munai">103514000Munai</option>
														<option value="103515000Nunungan">103515000Nunungan</option>
														<option value="103516000Pantao Ragat">103516000Pantao Ragat</option>
														<option value="103517000Poona Piagapo">103517000Poona Piagapo</option>
														<option value="103518000Salvador">103518000Salvador</option>
														<option value="103519000Sapad">103519000Sapad</option>
														<option value="103520000Tagoloan">103520000Tagoloan</option>
														<option value="103521000Tangcal">103521000Tangcal</option>
														<option value="103522000Tubod (Capital)">103522000Tubod (Capital)</option>
														<option value="103523000Pantar">103523000Pantar</option>
														<option value="104201000Aloran">104201000Aloran</option>
														<option value="104202000Baliangao">104202000Baliangao</option>
														<option value="104203000Bonifacio">104203000Bonifacio</option>
														<option value="104204000Calamba">104204000Calamba</option>
														<option value="104205000Clarin">104205000Clarin</option>
														<option value="104206000Concepcion">104206000Concepcion</option>
														<option value="104207000Jimenez">104207000Jimenez</option>
														<option value="104208000Lopez Jaena">104208000Lopez Jaena</option>
														<option value="104209000City of Oroquieta (Capital)">104209000City of Oroquieta (Capital)</option>
														<option value="104210000City of Ozamiz">104210000City of Ozamiz</option>
														<option value="104211000Panaon">104211000Panaon</option>
														<option value="104212000Plaridel">104212000Plaridel</option>
														<option value="104213000Sapang Dalaga">104213000Sapang Dalaga</option>
														<option value="104214000Sinacaban">104214000Sinacaban</option>
														<option value="104215000City of Tangub">104215000City of Tangub</option>
														<option value="104216000Tudela">104216000Tudela</option>
														<option value="104217000Don Victoriano Chiongbian">104217000Don Victoriano Chiongbian</option>
														<option value="104301000Alubijid">104301000Alubijid</option>
														<option value="104302000Balingasag">104302000Balingasag</option>
														<option value="104303000Balingoan">104303000Balingoan</option>
														<option value="104304000Binuangan">104304000Binuangan</option>
														<option value="104305000City of Cagayan De Oro (Capital)">104305000City of Cagayan De Oro (Capital)</option>
														<option value="104306000Claveria">104306000Claveria</option>
														<option value="104307000City of El Salvador">104307000City of El Salvador</option>
														<option value="104308000City of Gingoog">104308000City of Gingoog</option>
														<option value="104309000Gitagum">104309000Gitagum</option>
														<option value="104310000Initao">104310000Initao</option>
														<option value="104311000Jasaan">104311000Jasaan</option>
														<option value="104312000Kinoguitan">104312000Kinoguitan</option>
														<option value="104313000Lagonglong">104313000Lagonglong</option>
														<option value="104314000Laguindingan">104314000Laguindingan</option>
														<option value="104315000Libertad">104315000Libertad</option>
														<option value="104316000Lugait">104316000Lugait</option>
														<option value="104317000Magsaysay">104317000Magsaysay</option>
														<option value="104318000Manticao">104318000Manticao</option>
														<option value="104319000Medina">104319000Medina</option>
														<option value="104320000Naawan">104320000Naawan</option>
														<option value="104321000Opol">104321000Opol</option>
														<option value="104322000Salay">104322000Salay</option>
														<option value="104323000Sugbongcogon">104323000Sugbongcogon</option>
														<option value="104324000Tagoloan">104324000Tagoloan</option>
														<option value="104325000Talisayan">104325000Talisayan</option>
														<option value="104326000Villanueva">104326000Villanueva</option>
														<option value="112301000Asuncion">112301000Asuncion</option>
														<option value="112303000Carmen">112303000Carmen</option>
														<option value="112305000Kapalong">112305000Kapalong</option>
														<option value="112314000New Corella">112314000New Corella</option>
														<option value="112315000City of Panabo">112315000City of Panabo</option>
														<option value="112317000Island Garden City of Samal">112317000Island Garden City of Samal</option>
														<option value="112318000Santo Tomas">112318000Santo Tomas</option>
														<option value="112319000City of Tagum (Capital)">112319000City of Tagum (Capital)</option>
														<option value="112322000Talaingod">112322000Talaingod</option>
														<option value="112323000Braulio E. Dujali">112323000Braulio E. Dujali</option>
														<option value="112324000San Isidro">112324000San Isidro</option>
														<option value="112401000Bansalan">112401000Bansalan</option>
														<option value="112402000City of Davao">112402000City of Davao</option>
														<option value="112403000City of Digos (Capital)">112403000City of Digos (Capital)</option>
														<option value="112404000Hagonoy">112404000Hagonoy</option>
														<option value="112406000Kiblawan">112406000Kiblawan</option>
														<option value="112407000Magsaysay">112407000Magsaysay</option>
														<option value="112408000Malalag">112408000Malalag</option>
														<option value="112410000Matanao">112410000Matanao</option>
														<option value="112411000Padada">112411000Padada</option>
														<option value="112412000Santa Cruz">112412000Santa Cruz</option>
														<option value="112414000Sulop">112414000Sulop</option>
														<option value="112501000Baganga">112501000Baganga</option>
														<option value="112502000Banaybanay">112502000Banaybanay</option>
														<option value="112503000Boston">112503000Boston</option>
														<option value="112504000Caraga">112504000Caraga</option>
														<option value="112505000Cateel">112505000Cateel</option>
														<option value="112506000Governor Generoso">112506000Governor Generoso</option>
														<option value="112507000Lupon">112507000Lupon</option>
														<option value="112508000Manay">112508000Manay</option>
														<option value="112509000City of Mati (Capital)">112509000City of Mati (Capital)</option>
														<option value="112510000San Isidro">112510000San Isidro</option>
														<option value="112511000Tarragona">112511000Tarragona</option>
														<option value="118201000Compostela">118201000Compostela</option>
														<option value="118202000Laak">118202000Laak</option>
														<option value="118203000Mabini">118203000Mabini</option>
														<option value="118204000Maco">118204000Maco</option>
														<option value="118205000Maragusan">118205000Maragusan</option>
														<option value="118206000Mawab">118206000Mawab</option>
														<option value="118207000Monkayo">118207000Monkayo</option>
														<option value="118208000Montevista">118208000Montevista</option>
														<option value="118209000Nabunturan (Capital)">118209000Nabunturan (Capital)</option>
														<option value="118210000New Bataan">118210000New Bataan</option>
														<option value="118211000Pantukan">118211000Pantukan</option>
														<option value="118601000Don Marcelino">118601000Don Marcelino</option>
														<option value="118602000Jose Abad Santos">118602000Jose Abad Santos</option>
														<option value="118603000Malita (Capital)">118603000Malita (Capital)</option>
														<option value="118604000Santa Maria">118604000Santa Maria</option>
														<option value="118605000Sarangani">118605000Sarangani</option>
														<option value="124701000Alamada">124701000Alamada</option>
														<option value="124702000Carmen">124702000Carmen</option>
														<option value="124703000Kabacan">124703000Kabacan</option>
														<option value="124704000City of Kidapawan (Capital)">124704000City of Kidapawan (Capital)</option>
														<option value="124705000Libungan">124705000Libungan</option>
														<option value="124706000Magpet">124706000Magpet</option>
														<option value="124707000Makilala">124707000Makilala</option>
														<option value="124708000Matalam">124708000Matalam</option>
														<option value="124709000Midsayap">124709000Midsayap</option>
														<option value="124710000M'Lang">124710000M'Lang</option>
														<option value="124711000Pigkawayan">124711000Pigkawayan</option>
														<option value="124712000Pikit">124712000Pikit</option>
														<option value="124713000President Roxas">124713000President Roxas</option>
														<option value="124714000Tulunan">124714000Tulunan</option>
														<option value="124715000Antipas">124715000Antipas</option>
														<option value="124716000Banisilan">124716000Banisilan</option>
														<option value="124717000Aleosan">124717000Aleosan</option>
														<option value="124718000Arakan">124718000Arakan</option>
														<option value="126302000Banga">126302000Banga</option>
														<option value="126303000City of General Santos">126303000City of General Santos</option>
														<option value="126306000City of Koronadal (Capital)">126306000City of Koronadal (Capital)</option>
														<option value="126311000Norala">126311000Norala</option>
														<option value="126312000Polomolok">126312000Polomolok</option>
														<option value="126313000Surallah">126313000Surallah</option>
														<option value="126314000Tampakan">126314000Tampakan</option>
														<option value="126315000Tantangan">126315000Tantangan</option>
														<option value="126316000T'Boli">126316000T'Boli</option>
														<option value="126317000Tupi">126317000Tupi</option>
														<option value="126318000Santo Niño">126318000Santo Niño</option>
														<option value="126319000Lake Sebu">126319000Lake Sebu</option>
														<option value="126501000Bagumbayan">126501000Bagumbayan</option>
														<option value="126502000Columbio">126502000Columbio</option>
														<option value="126503000Esperanza">126503000Esperanza</option>
														<option value="126504000Isulan (Capital)">126504000Isulan (Capital)</option>
														<option value="126505000Kalamansig">126505000Kalamansig</option>
														<option value="126506000Lebak">126506000Lebak</option>
														<option value="126507000Lutayan">126507000Lutayan</option>
														<option value="126508000Lambayong">126508000Lambayong</option>
														<option value="126509000Palimbang">126509000Palimbang</option>
														<option value="126510000President Quirino">126510000President Quirino</option>
														<option value="126511000City of Tacurong">126511000City of Tacurong</option>
														<option value="126512000Sen. Ninoy Aquino">126512000Sen. Ninoy Aquino</option>
														<option value="128001000Alabel (Capital)">128001000Alabel (Capital)</option>
														<option value="128002000Glan">128002000Glan</option>
														<option value="128003000Kiamba">128003000Kiamba</option>
														<option value="128004000Maasim">128004000Maasim</option>
														<option value="128005000Maitum">128005000Maitum</option>
														<option value="128006000Malapatan">128006000Malapatan</option>
														<option value="128007000Malungon">128007000Malungon</option>
														<option value="129804000City of Cotabato">129804000City of Cotabato</option>
														<option value="133900000City of Manila">133900000City of Manila</option>
														<option value="133901000Tondo I/II">133901000Tondo I/II</option>
														<option value="133902000Binondo">133902000Binondo</option>
														<option value="133903000Quiapo">133903000Quiapo</option>
														<option value="133904000San Nicolas">133904000San Nicolas</option>
														<option value="133905000Santa Cruz">133905000Santa Cruz</option>
														<option value="133906000Sampaloc">133906000Sampaloc</option>
														<option value="133907000San Miguel">133907000San Miguel</option>
														<option value="133908000Ermita">133908000Ermita</option>
														<option value="133909000Intramuros">133909000Intramuros</option>
														<option value="133910000Malate">133910000Malate</option>
														<option value="133911000Paco">133911000Paco</option>
														<option value="133912000Pandacan">133912000Pandacan</option>
														<option value="133913000Port Area">133913000Port Area</option>
														<option value="133914000Santa Ana">133914000Santa Ana</option>
														<option value="137401000City of Mandaluyong">137401000City of Mandaluyong</option>
														<option value="137402000City of Marikina">137402000City of Marikina</option>
														<option value="137403000City of Pasig">137403000City of Pasig</option>
														<option value="137404000Quezon City">137404000Quezon City</option>
														<option value="137405000City of San Juan">137405000City of San Juan</option>
														<option value="137501000City of Caloocan">137501000City of Caloocan</option>
														<option value="137502000City of Malabon">137502000City of Malabon</option>
														<option value="137503000City of Navotas">137503000City of Navotas</option>
														<option value="137504000City of Valenzuela">137504000City of Valenzuela</option>
														<option value="137601000City of Las Piñas">137601000City of Las Piñas</option>
														<option value="137602000City of Makati">137602000City of Makati</option>
														<option value="137603000City of Muntinlupa">137603000City of Muntinlupa</option>
														<option value="137604000City of Parañaque">137604000City of Parañaque</option>
														<option value="137605000Pasay City">137605000Pasay City</option>
														<option value="137606000Pateros">137606000Pateros</option>
														<option value="137607000City of Taguig">137607000City of Taguig</option>
														<option value="140101000Bangued (Capital)">140101000Bangued (Capital)</option>
														<option value="140102000Boliney">140102000Boliney</option>
														<option value="140103000Bucay">140103000Bucay</option>
														<option value="140104000Bucloc">140104000Bucloc</option>
														<option value="140105000Daguioman">140105000Daguioman</option>
														<option value="140106000Danglas">140106000Danglas</option>
														<option value="140107000Dolores">140107000Dolores</option>
														<option value="140108000La Paz">140108000La Paz</option>
														<option value="140109000Lacub">140109000Lacub</option>
														<option value="140110000Lagangilang">140110000Lagangilang</option>
														<option value="140111000Lagayan">140111000Lagayan</option>
														<option value="140112000Langiden">140112000Langiden</option>
														<option value="140113000Licuan-Baay">140113000Licuan-Baay</option>
														<option value="140114000Luba">140114000Luba</option>
														<option value="140115000Malibcong">140115000Malibcong</option>
														<option value="140116000Manabo">140116000Manabo</option>
														<option value="140117000Peñarrubia">140117000Peñarrubia</option>
														<option value="140118000Pidigan">140118000Pidigan</option>
														<option value="140119000Pilar">140119000Pilar</option>
														<option value="140120000Sallapadan">140120000Sallapadan</option>
														<option value="140121000San Isidro">140121000San Isidro</option>
														<option value="140122000San Juan">140122000San Juan</option>
														<option value="140123000San Quintin">140123000San Quintin</option>
														<option value="140124000Tayum">140124000Tayum</option>
														<option value="140125000Tineg">140125000Tineg</option>
														<option value="140126000Tubo">140126000Tubo</option>
														<option value="140127000Villaviciosa">140127000Villaviciosa</option>
														<option value="141101000Atok">141101000Atok</option>
														<option value="141102000City of Baguio">141102000City of Baguio</option>
														<option value="141103000Bakun">141103000Bakun</option>
														<option value="141104000Bokod">141104000Bokod</option>
														<option value="141105000Buguias">141105000Buguias</option>
														<option value="141106000Itogon">141106000Itogon</option>
														<option value="141107000Kabayan">141107000Kabayan</option>
														<option value="141108000Kapangan">141108000Kapangan</option>
														<option value="141109000Kibungan">141109000Kibungan</option>
														<option value="141110000La Trinidad (Capital)">141110000La Trinidad (Capital)</option>
														<option value="141111000Mankayan">141111000Mankayan</option>
														<option value="141112000Sablan">141112000Sablan</option>
														<option value="141113000Tuba">141113000Tuba</option>
														<option value="141114000Tublay">141114000Tublay</option>
														<option value="142701000Banaue">142701000Banaue</option>
														<option value="142702000Hungduan">142702000Hungduan</option>
														<option value="142703000Kiangan">142703000Kiangan</option>
														<option value="142704000Lagawe (Capital)">142704000Lagawe (Capital)</option>
														<option value="142705000Lamut">142705000Lamut</option>
														<option value="142706000Mayoyao">142706000Mayoyao</option>
														<option value="142707000Alfonso Lista">142707000Alfonso Lista</option>
														<option value="142708000Aguinaldo">142708000Aguinaldo</option>
														<option value="142709000Hingyon">142709000Hingyon</option>
														<option value="142710000Tinoc">142710000Tinoc</option>
														<option value="142711000Asipulo">142711000Asipulo</option>
														<option value="143201000Balbalan">143201000Balbalan</option>
														<option value="143206000Lubuagan">143206000Lubuagan</option>
														<option value="143208000Pasil">143208000Pasil</option>
														<option value="143209000Pinukpuk">143209000Pinukpuk</option>
														<option value="143211000Rizal">143211000Rizal</option>
														<option value="143213000City of Tabuk (Capital)">143213000City of Tabuk (Capital)</option>
														<option value="143214000Tanudan">143214000Tanudan</option>
														<option value="143215000Tinglayan">143215000Tinglayan</option>
														<option value="144401000Barlig">144401000Barlig</option>
														<option value="144402000Bauko">144402000Bauko</option>
														<option value="144403000Besao">144403000Besao</option>
														<option value="144404000Bontoc (Capital)">144404000Bontoc (Capital)</option>
														<option value="144405000Natonin">144405000Natonin</option>
														<option value="144406000Paracelis">144406000Paracelis</option>
														<option value="144407000Sabangan">144407000Sabangan</option>
														<option value="144408000Sadanga">144408000Sadanga</option>
														<option value="144409000Sagada">144409000Sagada</option>
														<option value="144410000Tadian">144410000Tadian</option>
														<option value="148101000Calanasan">148101000Calanasan</option>
														<option value="148102000Conner">148102000Conner</option>
														<option value="148103000Flora">148103000Flora</option>
														<option value="148104000Kabugao (Capital)">148104000Kabugao (Capital)</option>
														<option value="148105000Luna">148105000Luna</option> 
														<option value="148106000Pudtol">148106000Pudtol</option>
														<option value="148107000Santa Marcela">148107000Santa Marcela</option>
														<option value="150702000City of Lamitan (Capital)">150702000City of Lamitan (Capital)</option>
														<option value="150703000Lantawan">150703000Lantawan</option>
														<option value="150704000Maluso">150704000Maluso</option>
														<option value="150705000Sumisip">150705000Sumisip</option>
														<option value="150706000Tipo-Tipo">150706000Tipo-Tipo</option>
														<option value="150707000Tuburan">150707000Tuburan</option>
														<option value="150708000Akbar">150708000Akbar</option>
														<option value="150709000Al-Barka">150709000Al-Barka</option>
														<option value="150710000Hadji Mohammad Ajul">150710000Hadji Mohammad Ajul</option>
														<option value="150711000Ungkaya Pukan">150711000Ungkaya Pukan</option>
														<option value="150712000Hadji Muhtamad">150712000Hadji Muhtamad</option>
														<option value="150713000Tabuan-Lasa">150713000Tabuan-Lasa</option>
														<option value="153601000Bacolod-Kalawi">153601000Bacolod-Kalawi</option>
														<option value="153602000Balabagan">153602000Balabagan</option>
														<option value="153603000Balindong">153603000Balindong</option>
														<option value="153604000Bayang">153604000Bayang</option>
														<option value="153605000Binidayan">153605000Binidayan</option>
														<option value="153606000Bubong">153606000Bubong</option>
														<option value="153607000Butig">153607000Butig</option>
														<option value="153609000Ganassi">153609000Ganassi</option>
														<option value="153610000Kapai">153610000Kapai</option>
														<option value="153611000Lumba-Bayabao">153611000Lumba-Bayabao</option>
														<option value="153612000Lumbatan">153612000Lumbatan</option>
														<option value="153613000Madalum">153613000Madalum</option>
														<option value="153614000Madamba">153614000Madamba</option>
														<option value="153615000Malabang">153615000Malabang</option>
														<option value="153616000Marantao">153616000Marantao</option>
														<option value="153617000City of Marawi (Capital)">153617000City of Marawi (Capital)</option>
														<option value="153618000Masiu">153618000Masiu</option>
														<option value="153619000Mulondo">153619000Mulondo</option>
														<option value="153620000Pagayawan">153620000Pagayawan</option>
														<option value="153621000Piagapo">153621000Piagapo</option>
														<option value="153622000Poona Bayabao">153622000Poona Bayabao</option>
														<option value="153623000Pualas">153623000Pualas</option>
														<option value="153624000Ditsaan-Ramain">153624000Ditsaan-Ramain</option>
														<option value="153625000Saguiaran">153625000Saguiaran</option>
														<option value="153626000Tamparan">153626000Tamparan</option>
														<option value="153627000Taraka">153627000Taraka</option>
														<option value="153628000Tubaran">153628000Tubaran</option>
														<option value="153629000Tugaya">153629000Tugaya</option>
														<option value="153630000Wao">153630000Wao</option>
														<option value="153631000Marogong">153631000Marogong</option>
														<option value="153632000Calanogas">153632000Calanogas</option>
														<option value="153633000Buadiposo-Buntong">153633000Buadiposo-Buntong</option>
														<option value="153634000Maguing">153634000Maguing</option>
														<option value="153635000Picong">153635000Picong</option>
														<option value="153636000Lumbayanague">153636000Lumbayanague</option>
														<option value="153637000Amai Manabilang">153637000Amai Manabilang</option>
														<option value="153638000Tagoloan Ii">153638000Tagoloan Ii</option>
														<option value="153639000Kapatagan">153639000Kapatagan</option>
														<option value="153640000Sultan Dumalondong">153640000Sultan Dumalondong</option>
														<option value="153641000Lumbaca-Unayan">153641000Lumbaca-Unayan</option>
														<option value="153801000Ampatuan">153801000Ampatuan</option>
														<option value="153802000Buldon">153802000Buldon</option>
														<option value="153803000Buluan">153803000Buluan</option>
														<option value="153805000Datu Paglas">153805000Datu Paglas</option>
														<option value="153806000Datu Piang">153806000Datu Piang</option>
														<option value="153807000Datu Odin Sinsuat">153807000Datu Odin Sinsuat</option>
														<option value="153808000Shariff Aguak (Capital)">153808000Shariff Aguak (Capital)</option>
														<option value="153809000Matanog">153809000Matanog</option>
														<option value="153810000Pagalungan">153810000Pagalungan</option>
														<option value="153811000Parang">153811000Parang</option>
														<option value="153812000Sultan Kudarat">153812000Sultan Kudarat</option>
														<option value="153813000Sultan Sa Barongis">153813000Sultan Sa Barongis</option>
														<option value="153814000Kabuntalan">153814000Kabuntalan</option>
														<option value="153815000Upi">153815000Upi</option>
														<option value="153816000Talayan">153816000Talayan</option>
														<option value="153817000South Upi">153817000South Upi</option>
														<option value="153818000Barira">153818000Barira</option>
														<option value="153819000Gen. S.K. Pendatun">153819000Gen. S.K. Pendatun</option>
														<option value="153820000Mamasapano">153820000Mamasapano</option>
														<option value="153821000Talitay">153821000Talitay</option>
														<option value="153822000Pagagawan">153822000Pagagawan</option>
														<option value="153823000Paglat">153823000Paglat</option>
														<option value="153824000Sultan Mastura">153824000Sultan Mastura</option>
														<option value="153825000Guindulungan">153825000Guindulungan</option>
														<option value="153826000Datu Saudi-Ampatuan">153826000Datu Saudi-Ampatuan</option>
														<option value="153827000Datu Unsay">153827000Datu Unsay</option>
														<option value="153828000Datu Abdullah Sangki">153828000Datu Abdullah Sangki</option>
														<option value="153829000Rajah Buayan">153829000Rajah Buayan</option>
														<option value="153830000Datu Blah T. Sinsuat">153830000Datu Blah T. Sinsuat</option>
														<option value="153831000Datu Anggal Midtimbang">153831000Datu Anggal Midtimbang</option>
														<option value="153832000Mangudadatu">153832000Mangudadatu</option>
														<option value="153833000Pandag">153833000Pandag</option>
														<option value="153834000Northern Kabuntalan">153834000Northern Kabuntalan</option>
														<option value="153835000Datu Hoffer Ampatuan">153835000Datu Hoffer Ampatuan</option>
														<option value="153836000Datu Salibo">153836000Datu Salibo</option>
														<option value="153837000Shariff Saydona Mustapha">153837000Shariff Saydona Mustapha</option>
														<option value="156601000Indanan">156601000Indanan</option>
														<option value="156602000Jolo (Capital)">156602000Jolo (Capital)</option>
														<option value="156603000Kalingalan Caluang">156603000Kalingalan Caluang</option>
														<option value="156604000Luuk">156604000Luuk</option>
														<option value="156605000Maimbung">156605000Maimbung</option>
														<option value="156606000Hadji Panglima Tahil">156606000Hadji Panglima Tahil</option>
														<option value="156607000Old Panamao">156607000Old Panamao</option>
														<option value="156608000Pangutaran">156608000Pangutaran</option>
														<option value="156609000Parang">156609000Parang</option>
														<option value="156610000Pata">156610000Pata</option>
														<option value="156611000Patikul">156611000Patikul</option>
														<option value="156612000Siasi">156612000Siasi</option>
														<option value="156613000Talipao">156613000Talipao</option>
														<option value="156614000Tapul">156614000Tapul</option>
														<option value="156615000Tongkil">156615000Tongkil</option>
														<option value="156616000Panglima Estino">156616000Panglima Estino</option>
														<option value="156617000Lugus">156617000Lugus</option>
														<option value="156618000Pandami">156618000Pandami</option>
														<option value="156619000Omar">156619000Omar</option>
														<option value="157001000Panglima Sugala">157001000Panglima Sugala</option>
														<option value="157002000Bongao (Capital)">157002000Bongao (Capital)</option>
														<option value="157003000Mapun">157003000Mapun</option>
														<option value="157004000Simunul">157004000Simunul</option>
														<option value="157005000Sitangkai">157005000Sitangkai</option>
														<option value="157006000South Ubian">157006000South Ubian</option>
														<option value="157007000Tandubas">157007000Tandubas</option>
														<option value="157008000Turtle Islands">157008000Turtle Islands</option>
														<option value="157009000Languyan">157009000Languyan</option>
														<option value="157010000Sapa-Sapa">157010000Sapa-Sapa</option>
														<option value="157011000Sibutu">157011000Sibutu</option>
														<option value="160201000Buenavista">160201000Buenavista</option>
														<option value="160202000City of Butuan (Capital)">160202000City of Butuan (Capital)</option>
														<option value="160203000City of Cabadbaran">160203000City of Cabadbaran</option>
														<option value="160204000Carmen">160204000Carmen</option>
														<option value="160205000Jabonga">160205000Jabonga</option>
														<option value="160206000Kitcharao">160206000Kitcharao</option>
														<option value="160207000Las Nieves">160207000Las Nieves</option>
														<option value="160208000Magallanes">160208000Magallanes</option>
														<option value="160209000Nasipit">160209000Nasipit</option>
														<option value="160210000Santiago">160210000Santiago</option>
														<option value="160211000Tubay">160211000Tubay</option>
														<option value="160212000Remedios T. Romualdez">160212000Remedios T. Romualdez</option>
														<option value="160301000City of Bayugan">160301000City of Bayugan</option>
														<option value="160302000Bunawan">160302000Bunawan</option>
														<option value="160303000Esperanza">160303000Esperanza</option>
														<option value="160304000La Paz">160304000La Paz</option>
														<option value="160305000Loreto">160305000Loreto</option>
														<option value="160306000Prosperidad (Capital)">160306000Prosperidad (Capital)</option>
														<option value="160307000Rosario">160307000Rosario</option>
														<option value="160308000San Francisco">160308000San Francisco</option>
														<option value="160309000San Luis">160309000San Luis</option>
														<option value="160310000Santa Josefa">160310000Santa Josefa</option>
														<option value="160311000Talacogon">160311000Talacogon</option>
														<option value="160312000Trento">160312000Trento</option>
														<option value="160313000Veruela">160313000Veruela</option>
														<option value="160314000Sibagat">160314000Sibagat</option>
														<option value="166701000Alegria">166701000Alegria</option>
														<option value="166702000Bacuag">166702000Bacuag</option>
														<option value="166704000Burgos">166704000Burgos</option>
														<option value="166706000Claver">166706000Claver</option>
														<option value="166707000Dapa">166707000Dapa</option>
														<option value="166708000Del Carmen">166708000Del Carmen</option>
														<option value="166710000General Luna">166710000General Luna</option>
														<option value="166711000Gigaquit">166711000Gigaquit</option>
														<option value="166714000Mainit">166714000Mainit</option>
														<option value="166715000Malimono">166715000Malimono</option>
														<option value="166716000Pilar">166716000Pilar</option>
														<option value="166717000Placer">166717000Placer</option>
														<option value="166718000San Benito">166718000San Benito</option>
														<option value="166719000San Francisco">166719000San Francisco</option>
														<option value="166720000San Isidro">166720000San Isidro</option>
														<option value="166721000Santa Monica">166721000Santa Monica</option>
														<option value="166722000Sison">166722000Sison</option>
														<option value="166723000Socorro">166723000Socorro</option>
														<option value="166724000City of Surigao (Capital)">166724000City of Surigao (Capital)</option>
														<option value="166725000Tagana-An">166725000Tagana-An</option>
														<option value="166727000Tubod">166727000Tubod</option>
														<option value="166801000Barobo">166801000Barobo</option>
														<option value="166802000Bayabas">166802000Bayabas</option>
														<option value="166803000City of Bislig">166803000City of Bislig</option>
														<option value="166804000Cagwait">166804000Cagwait</option>
														<option value="166805000Cantilan">166805000Cantilan</option>
														<option value="166806000Carmen">166806000Carmen</option>
														<option value="166807000Carrascal">166807000Carrascal</option>
														<option value="166808000Cortes">166808000Cortes</option>
														<option value="166809000Hinatuan">166809000Hinatuan</option>
														<option value="166810000Lanuza">166810000Lanuza</option>
														<option value="166811000Lianga">166811000Lianga</option>
														<option value="166812000Lingig">166812000Lingig</option>
														<option value="166813000Madrid">166813000Madrid</option>
														<option value="166814000Marihatag">166814000Marihatag</option>
														<option value="166815000San Agustin">166815000San Agustin</option>
														<option value="166816000San Miguel">166816000San Miguel</option>
														<option value="166817000Tagbina">166817000Tagbina</option>
														<option value="166818000Tago">166818000Tago</option>
														<option value="166819000City of Tandag (Capital)">166819000City of Tandag (Capital)</option>
														<option value="168501000Basilisa">168501000Basilisa</option>
														<option value="168502000Cagdianao">168502000Cagdianao</option>
														<option value="168503000Dinagat">168503000Dinagat</option>
														<option value="168504000Libjo">168504000Libjo</option>
														<option value="168505000Loreto">168505000Loreto</option>
														<option value="168506000San Jose (Capital)">168506000San Jose (Capital)</option>
														<option value="168507000Tubajon">168507000Tubajon</option>

													</select>
												</div>
											</div> 

											

											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Barangay</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="barangay" required=""> 
														<?php
															foreach ($this->config->item('barangay') as $row) {
																echo '
																	<option value="'.$row.'">'.$row.'</option>';
															}
														?>

													</select>
												</div>
											</div>

											
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Sex</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="sex" required="">
														<option value="M">M</option>  
														<option value="F">F</option>    
													</select>
												</div>
											</div> 
											
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Birthdatee<span class="text-danger">*</span> </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"  id="birthdate"  class="form-control input-sm" name="birthdate">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Deferral</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="deferral" required="">
														<option value="Y">Y</option>  
														<option value="N">N</option>    
													</select>
												</div>
											</div> 
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Reason for Deferral</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="reason_for_deferral" required="">
														<option value="NONE">NONE</option>
														<option value="DC01_Age Requirement">DC01_Age Requirement</option>
														<option value="DC02_1st Dose Other Brand">DC02_1st Dose Other Brand</option>
														<option value="DC03_Allergy to Vaccine component">DC03_Allergy to Vaccine component</option>
														<option value="DC04_Severe Allergy to 1st Dose">DC04_Severe Allergy to 1st Dose</option>
														<option value="DC05_Allergy/Asthma, No monitor">DC05_Allergy/Asthma, No monitor</option>
														<option value="DC06_History of Anaphylaxis">DC06_History of Anaphylaxis</option>
														<option value="DC07_Bleeding disorders/Taking anti-coagulants">DC07_Bleeding disorders/Taking anti-coagulants</option>
														<option value="DC08_Symptomatic for COVID-19 Infection">DC08_Symptomatic for COVID-19 Infection</option>
														<option value="DC09_High SBP, DBP, Organ Damage">DC09_High SBP, DBP, Organ Damage</option>
														<option value="DC10_Covid-19 Exposure">DC10_Covid-19 Exposure</option>
														<option value="DC11_Ongoing Covid-19 Treatment">DC11_Ongoing Covid-19 Treatment</option>
														<option value="DC12_Attach, Admissions, Meds Change">DC12_Attach, Admissions, Meds Change</option>
														<option value="DC13_Other Vaccine/s within 2 weeks">DC13_Other Vaccine/s within 2 weeks</option>
														<option value="DC14_Plasma or Antibodies">DC14_Plasma or Antibodies</option>
														<option value="DC15_Pregnant or Breastfeeding">DC15_Pregnant or Breastfeeding</option>
														<option value="DC16_No Med Clearance for Comorbidity">DC16_No Med Clearance for Comorbidity</option>

													</select>
												</div>
											</div> 

											
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Vaccination Date<span class="text-danger">*</span> </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"  id="vaccination-date"  class="form-control input-sm" name="vaccination_date">
												</div>
											</div>

											
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Vaccine Manufacturer Name</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="vaccine_manufacturer_name" required=""> 
														<option value="Sinovac">Sinovac</option>
														<option value="AZ">AZ</option>
														<option value="Pfizer">Pfizer</option>
														<option value="Moderna">Moderna</option>
														<option value="Gamaleya">Gamaleya</option>
														<option value="Novavax">Novavax</option>
														<option value="J&J">J&J</option> 
													</select>
												</div>
											</div> 
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Batch Number<span class="text-danger">*</span> </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"   class="form-control input-sm" name="batch_number" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Lot Number<span class="text-danger">*</span> </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"   class="form-control input-sm" name="lot_number" required>
												</div>
											</div>

											 
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Bakuna Center CBCR ID<span class="text-danger">*</span> </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"  class="form-control input-sm" name="bakuna_center_cbcr_id" placeholder="Bakuna Center CBCR ID" required="">  
												</div>
											</div>
											
											 
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Vaccinator Name<span class="text-danger">*</span> </label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<input type="text"  class="form-control input-sm" name="vaccinator_name" placeholder="Last Name, First Name, Middle Name" required="">  
												</div>
											</div>


											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">1st Dose</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="first_dose" required="">
														<option value="Y">Y</option>  
														<option value="N">N</option>    
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">2nd Dose</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="second_dose" required="">
														<option value="Y">Y</option>  
														<option value="N">N</option>    
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Adverse Event</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="adverse_event" required="">
														<option value="Y">Y</option>  
														<option value="N">N</option>    
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-5 col-xl-5 col-sm-5 col-md-5 col-4 col-form-label">Adverse Event Condition</label>
												<div class="col-lg-7 col-xl-7 col-sm-7 col-md-7 col-8">
													<select  class="form-control input-sm" name="adverse_event_condition" required="">
														<option value="NONE">NONE</option>
														<option value="AE01_General Symptoms">AE01_General Symptoms</option>
														<option value="AE02_Cardiac Symptoms">AE02_Cardiac Symptoms</option>
														<option value="AE03_Ear Symptoms">AE03_Ear Symptoms</option>
														<option value="AE04_Endocrine Symptoms">AE04_Endocrine Symptoms</option>
														<option value="AE05_Examinations">AE05_Examinations</option>
														<option value="AE06_Eye Symptoms">AE06_Eye Symptoms</option>
														<option value="AE07_Gastrointestinal Symptoms">AE07_Gastrointestinal Symptoms</option>
														<option value="AE08_Hepatobiliary Symptoms">AE08_Hepatobiliary Symptoms</option>
														<option value="AE09_Immune System Symptoms">AE09_Immune System Symptoms</option>
														<option value="AE10_Infections">AE10_Infections</option>
														<option value="AE11_Nutrition-Related Symptoms">AE11_Nutrition-Related Symptoms</option>
														<option value="AE12_Musculoskeletal Symptoms">AE12_Musculoskeletal Symptoms</option>
														<option value="AE13_Neurological Symptoms">AE13_Neurological Symptoms</option>
														<option value="AE14_Perinatal Conditions">AE14_Perinatal Conditions</option>
														<option value="AE15_Procedural Symptoms">AE15_Procedural Symptoms</option>
														<option value="AE16_Psychiatric Symptoms">AE16_Psychiatric Symptoms</option>
														<option value="AE17_Renal and Urinary Symptoms">AE17_Renal and Urinary Symptoms</option>
														<option value="AE18_Reproductive Symptoms">AE18_Reproductive Symptoms</option>
														<option value="AE19_Respiratory Symptoms">AE19_Respiratory Symptoms</option>
														<option value="AE20_Skin Symptoms">AE20_Skin Symptoms</option>
														<option value="AE21_Lymphatic System Symptoms">AE21_Lymphatic System Symptoms</option>
														<option value="AE22_Vascular Symptoms">AE22_Vascular Symptoms</option> 
  
													</select>
												</div>
											</div> 
										</div> 
										<div class="card-footer">
											<div class="text-right">
												<a href="<?php echo base_url(); ?>vaccinated" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Back</a>
												<button type="submit"   class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
												
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
	<script src="<?php  echo base_url(); ?>dist/assets/js/add_vaccinated.js"></script>
	
	<script type="text/javascript">
		(function ($) { 

			$("#vaccination-date").datepicker({
				dateFormat: 'mm/dd/yyyy',
			});
			$("#birthdate").datepicker({
				dateFormat: 'mm/dd/yyyy',
			});
		})(jQuery);
	</script>

	 
	
	
	</body>
</html>
