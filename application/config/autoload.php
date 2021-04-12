<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Manila');
$autoload['packages'] = array();
$autoload['libraries'] = array('email', 'session', 'database', 'user_agent');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'file', 'directory');
$autoload['config'] = array('custom_config');	## my custom configuration file
$autoload['language'] = array();
$autoload['model'] = array(
	'login_model', 'record_model', 'user_model',
	'vaccinated_model', 'validated_model', 'log_model',
	'vaccination_site_model', 'barangay_model',
	'schedule_model', 'vaccination_schedule_model');
