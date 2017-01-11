<?php
#########################################################################
# API for Froxlor 0.9.38.4
#
# You can find the function list in ReadMe.txt
#
# @copyright  T. Schaffert <script@5z5.de>
# @version  API 2017.0.1 08/01/2017
#
# Die Verwendung dieses Scriptes erfolgt auf eigene Gefahr!
# The use of this script is at your own risk!
#########################################################################

## Configuration
$api['apikey'] 			= '8617f366566a011837f4fb4ba5bedea2b892f3ed8b894023d16ae344b2be5881';	// AUTH with Key insteat of login details of reseller account
$api['use_key_auth']	= true;							// use key (true) or froxlor login (false) data to connent to api
$api['debug'] 			= '1';							// debug to view php erros
$api['froxlorconfig'] 	= '../lib/userdata.inc.php';	// Path to userdata.inc.php
$api['admin_username']	= 'admin';						// Loginname of your admin account
$api['usershell']		= '/bin/false';					// Shell for FTP-Users
$api['admin_protect']	= true;							// for later functions - if false -> can see and edit all customers

#########################################################################
# Functions - do not change below here
#########################################################################
$api['keyok'] = false;
$api['api_version'] = '2017.0.1';
$api['api_version_date'] = '08/01/2017';
$api['answer']['api_version'] = $api['api_version'];
$api['answer']['api_version_date'] = $api['api_version_date'];

if((isset($_REQUEST['apikey'])) && ($_REQUEST['apikey'] == $api['apikey'])) { $api['keyok'] = true; } else { die("Bad API-Key"); }	
	
error_reporting(E_ALL ^ E_STRICT);
		ini_set('display_errors', $api['debug']);

require($api['froxlorconfig']);

# Read Froxlor config from DB
require('inc/api.init.functions.php');
$api['api_init'] = api_init_vars();

require('inc/api.act.functions.php');
require('inc/api.ext.functions.php');



if (isset($_REQUEST['func'])) {
# Add Customer Account
#################################################
if($_REQUEST['func'] == "customeradd") {
	$username = $_REQUEST['username'];
	$name = $_REQUEST['name'];
	$firstname = $_REQUEST['firstname'];
	$company = $_REQUEST['company'];
	$street = $_REQUEST['street'];
	$zipcode = $_REQUEST['zipcode'];
	$city = $_REQUEST['city'];
	$phone = $_REQUEST['phone'];
	$fax = $_REQUEST['fax'];
	$email = $_REQUEST['email'];
	$customernumber = $_REQUEST['customernumber'];
	$def_language = $_REQUEST['def_language'];
	$gender = $_REQUEST['gender'];
	$custom_notes = $_REQUEST['custom_notes'];
	$custom_notes_show = $_REQUEST['custom_notes_show'];
	$diskspace = $_REQUEST['diskspace'];
	$traffic = $_REQUEST['traffic'];
	$subdomains = $_REQUEST['subdomains'];
	$emails = $_REQUEST['emails'];
	$email_accounts = $_REQUEST['email_accounts'];
	$email_forwarders = $_REQUEST['email_forwarders'];
	$email_quota = $_REQUEST['email_quota'];
	$email_imap = $_REQUEST['email_imap'];
	$email_pop3 = $_REQUEST['email_pop3'];
	$ftps = $_REQUEST['ftps'];
	$phpenabled = $_REQUEST['phpenabled'];
	$perlenabled = $_REQUEST['perlenabled'];
	$dnsenabled = $_REQUEST['dnsenabled'];
	$store_defaultindex = $_REQUEST['store_defaultindex'];
	$createstdsubdomain = '0';	//$_REQUEST['createstdsubdomain'];
	$tickets = $_REQUEST['tickets'];
	$mysqls = $_REQUEST['mysqls'];
	$password = $_REQUEST['password'];
	
$api['answer']['status'] = froxlor_user_add($username, $name, $firstname, $company, $street, $zipcode, $city, $phone, $fax, $email, $customernumber, $def_language, $gender, $custom_notes, $custom_notes_show, $diskspace, $traffic, $subdomains, $emails, $email_accounts, $email_forwarders, $email_quota, $email_imap, $email_pop3, $ftps, $phpenabled, $perlenabled, $dnsenabled, $store_defaultindex, $createstdsubdomain, $tickets, $mysqls, $password);
}

# Update Customer Account
#################################################
#comming soon

# Give customer new panel and ftp passwort
#################################################
else if(($_REQUEST['func'] == "customernewpasswd") && (isset($_REQUEST['username'])) && (isset($_REQUEST['password']))) {
	if(check_your_user($username) == true) {
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$api['answer']['status'] = froxlor_user_newpasswd($username, $password);
	} else { $api['answer']['status'] = 'not your customer or customer not found'; }
}

# Delete Customer Account
#################################################
else if(($_REQUEST['func'] == "customerdelete") && (isset($_REQUEST['username']))) {
	if(check_your_user($username) == true) {
		$username = $_REQUEST['username'];
		$api['answer']['status'] = froxlor_user_delete($username);
	} else { $api['answer']['status'] = 'not your customer or customer not found'; }
}

# Lock / unlock Customer Account
#################################################
else if(($_REQUEST['func'] == "customerlock") && (isset($_REQUEST['username']))) {
	if(check_your_user($username) == true) {
		$username = $_REQUEST['username'];
		if((isset($_REQUEST['lock'])) && ($_REQUEST['lock'] == '1')) { $lockstatus = true; } else { $lockstatus = false; }
		$api['answer']['status'] = froxlor_user_lock($username, $lockstatus);
	} else { $api['answer']['status'] = 'not your customer or customer not found'; }
}

# Add Domain to Customer with standart ips
#################################################
else if(($_REQUEST['func'] == "customerdomain") && (isset($_REQUEST['username'])) && (isset($_REQUEST['domainname']))) {
	if(check_your_user($username) == true) {
		$username = $_REQUEST['username'];
		$domainname = $_REQUEST['domainname'];
		if((isset($_REQUEST['action'])) && ($_REQUEST['action'] == 'add')) { $action = 'add'; } else { $action = 'delete'; }	
		$api['answer']['status'] = froxlor_user_domain($username, $domainname, $action);
	} else { $api['answer']['status'] = 'not your customer or customer not found'; }
} else { $api['answer']['status'] = 'function not found or request not complete'; }
	
} else { 
	$api['answer']['status'] = 'func not set';
	$api['answer']['func'] = 'not set';
}

# Delete Domain from Customer
#################################################
if (isset($username)) { $api['answer']['customer_login'] = $username;}
if (isset($_REQUEST['func'])) { $api['answer']['func'] = $_REQUEST['func'];}
echo "<pre>";
print_r ($api);
print_r ($api['answer']);
echo "<pre>";
?>

