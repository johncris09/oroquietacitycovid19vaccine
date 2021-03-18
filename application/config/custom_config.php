<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 




$config['role_type']   = ["Super Admin", "Sub Admin", "User"];
$config['sector']   = ["Public", "Private"];
$config['purok']   = [
	"P-1",
	"P-1A",
	"P-1B",
	"P-2",
	"P-3",
	"P-4",
	"P-5",
	"P-6",
	"P-7"
];
$config['age_bracket']   = [
	"18 - 25",
	"25-35",
	"35 - 60",
	"60 >",
];
$config['barangay']   = [
	"Apil",
    "Binuangan",
    "Bolibol",
    "Buenavista",
    "Bunga",
    "Buntawan",
    "Burgos",
    "Canubay",
    "Ciriaco Pastrano",
    "Clarin Settlement",
    "Dolipos Alto",
    "Dolipos Bajo",
    "Dulapo",
    "Dullan Norte",
    "Dullan Sur",
    "Lamac Lower",
    "Lamac Upper",
    "Layawan",
    "Langcangan Lower",
    "Langcangan Proper",
    "Langcangan Upper",
    "Layawan",
    "Loboc Lower",
    "Loboc Upper",
    "Malindang",
    "Mialen",
    "Mobod",
    "Paypayan",
    "Pines",
    "Poblacion I",
    "Poblacion II",
    "Rizal Lower",
    "Rizal Upper",
    "San Vicente Alto",
    "San Vicente Bajo",
    "Sebucal",
    "Senote",
    "Taboc Norte",
    "Taboc Sur",
    "Talairon",
    "Talic",
    "Tipan",
    "Toliyok",
    "Tuyabang Alto",
    "Tuyabang Bajo",
    "Tuyabang Proper",
    "Victoria",
    "Villaflor" 
];
$config['government_id']   = [
	"Driver’s License",
	"Government Service Insurance System (GSIS)",
	"LGU ID",
	"Pag-IBIG ID",
	"Passport ID",
	"Philhealth ID",
	"Philippine Postal ID",
	"Professional Regulatory Commission (PRC)",
	"PWD ID",
	"Senior Citizen ID",
	"Social Security System (SSS)",
	"Solo Parent",
	"TIN Card",
	"Voter's ID",
];


$config['occupation']   = [
	"Government Employee",
	"Private Employee",
	"Other",
];


$config['medical_history']   = array(
	array(
		"multiple_choice" => false,
		"question" => "Nagpositibo ka na ba sa COVID-19?",
		"txtname" => "CovidPositive",
		"optname" => "OptionCovidPositive",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Sa niaging katorse(14) ka adlaw, naa ba kay nauban na positibo sa COVID-19?",
		"txtname" => "CovidPositiveContact",
		"optname" => "OptionCovidPositiveContact",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Sa niaging katorse(14) ka adlaw, gikan ba ka sa laing nasud?",
		"txtname" => "Travelled",
		"optname" => "OptionTravelled",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Naka apil ba kag mga tapok-tapok sa mga miaging duha ka semana?",
		"txtname" => "Mingled",
		"optname" => "OptionMingled",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => true,
		"question" => "Nakabati ba ka ani sa niaging duha ka semana (14 ka adlaw)?",
		"optname" => "OptionIllness_1[]",
		"choices" => array(
			array(
				array(
					"text" => "Hilanat",
					"value" => "Hilanat",
				),
				array(
					"text" => "Sakit sa kalawasan",
					"value" => "Sakit sa kalawasan",
				),
				array(
					"text" => "Ubo",
					"value" => "Ubo",
				),
				array(
					"text" => "Pagkawala sa panimhot ug pang tilaw",
					"value" => "Pagkawala sa panimhot ug pang tilaw",
				),
				array(
					"text" => "Sip-on",
					"value" => "Sip-on",
				),
				array(
					"text" => "Lisod sa pag ginhawa",
					"value" => "Lisod sa pag ginhawa",
				),
				array(
					"text" => "Sakit sa tutunlan",
					"value" => "Sakit sa tutunlan",
				),
				array(
					"text" => "Pagkalibanga",
					"value" => "Pagkalibanga",
				),
			)
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Napaakan na ba kag iro sa niaging upat(4) ka semana ug nabakunahan?",
		"txtname" => "DogBite",
		"optname" => "OptionDogBite",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Nabakunahan na ba ka sa COVID-19 Vaccine sa niaging upat(4) ka semana?",
		"txtname" => "VaccineLast4Weeks",
		"optname" => "OptionVaccineLast4Weeks",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Na abunohan ba kag dugo?",
		"txtname" => "BloodTransfusion",
		"optname" => "OptionBloodTransfusion",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Ga inom ba kag Prednisone/Steriods o antiviral drugs?",
		"txtname" => "TakeDrugs",
		"optname" => "OptionTakeDrugs",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Naa ba kay allergy sa latex, pagkaon, tambal o bakuna?",
		"txtname" => "Allergy",
		"optname" => "OptionAllergy",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Nagka grabeng reaksyon ba ka human nabakunahan?",
		"txtname" => "VaccineReaction",
		"optname" => "OptionVaccineReaction",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => true,
		"question" => "Aduna/nakaagi ba ka aning mga sakit?",
		"optname" => "OptionIllness_2[]",
		"choices" => array(
			array(
				array(
					"text" => "Sakit sa baga",
					"value" => "Sakit sa baga",
				),
				array(
					"text" => "Sakit sa dugo",
					"value" => "Sakit sa dugo",
				),
				array(
					"text" => "Sakit sa kasing-kasing",
					"value" => "Sakit sa kasing-kasing",
				),
				array(
					"text" => "Cancer",
					"value" => "Cancer",
				),
				array(
					"text" => "Hubak",
					"value" => "Hubak",
				),
				array(
					"text" => "Leukemia",
					"value" => "Leukemia",
				),
				array(
					"text" => "Sakit sa bato",
					"value" => "Sakit sa bato",
				),
				array(
					"text" => "HIV",
					"value" => "HIV",
				),
				array(
					"text" => "Diabetes",
					"value" => "Diabetes",
				),
				array(
					"text" => "Organ Transplant",
					"value" => "Organ Transplant",
				),
				array(
					"text" => "Altapresyon",
					"value" => "Altapresyon",
				),
				array(
					"text" => "Sakit sa panghuna-huna/Seizure disorder",
					"value" => "Sakit sa panghuna-huna/Seizure disorder",
				),
			) 
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Buros ba ka o naa kay planong mag buros?",
		"txtname" => "Pregnant",
		"optname" => "OptionPregnant",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Nagpatotoy ba ka?",
		"txtname" => "Breastfeed",
		"optname" => "OptionBreastfeed",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),
	array(
		"multiple_choice" => false,
		"question" => "Apil ba ka sa COVID-19 Clinical Study?",
		"txtname" => "ClinicalStudy",
		"optname" => "OptionClinicalStudy",
		"choices" => array(
			array(
				array(
				"text" => "Oo",
				"value" => "1",
				),
				array(
					"text" => "Wala",
					"value" => "0",
				),
				array(
					"text" => "Wala Kabalo",
					"value" => "2",
				),
			)
			
		),
	),

);


    