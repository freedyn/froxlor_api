<?php

# Read Froxlor config from DB
#################################################

function api_init_vars () {
	global $sql, $api;
	$conn_froxlor_db = new mysqli($sql['host'], $sql['user'], $sql['password'], $sql['db']);
	
	# Read system.passwordcryptfunc
	$passwordcryptfunc_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'system' AND `varname` = 'passwordcryptfunc';");
	$passwordcryptfunc_row = $passwordcryptfunc_result->fetch_assoc();
	
	if (mysqli_num_rows($passwordcryptfunc_result) == 0) { $api['passwd']['passwordcryptfunc'] = 3; } else { $api['passwd']['passwordcryptfunc'] = $passwordcryptfunc_row['value']; }

	# Read panel.password_min_length
	$password_min_length_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'panel' AND `varname` = 'password_min_length';");
	$password_min_length_row = $password_min_length_result->fetch_assoc();
	$api['passwd']['password_min_length'] = $password_min_length_row['value'];
	
	# Read panel.password_special_char
	$password_special_char_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'panel' AND `varname` = 'password_special_char';");
	$password_special_char_row = $password_special_char_result->fetch_assoc();
	$api['passwd']['password_special_char'] = $password_special_char_row['value'];
	
	# Read panel.password_alpha_upper
	$password_alpha_upper_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'panel' AND `varname` = 'password_alpha_upper';");
	$password_alpha_upper_row = $password_alpha_upper_result->fetch_assoc();
	$api['passwd']['password_alpha_upper'] = $password_alpha_upper_row['value'];
	
	# Read panel.password_numeric
	$password_numeric_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'panel' AND `varname` = 'password_numeric';");
	$password_numeric_row = $password_numeric_result->fetch_assoc();
	$api['passwd']['password_numeric'] = $password_numeric_row['value'];
	
	# Read panel.password_special_char_required
	$password_special_char_required_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'panel' AND `varname` = 'password_special_char_required';");
	$password_special_char_required_row = $password_special_char_required_result->fetch_assoc();
	$api['passwd']['password_special_char_required'] = $password_special_char_required_row['value'];

	# Read system.hostname
	$system_hostname_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'system' AND `varname` = 'hostname';");
	$system_hostname_row = $system_hostname_result->fetch_assoc();
	$api['system_hostname'] = $system_hostname_row['value'];
	$api['froxlorhost'] = $system_hostname_row['value'];

	# Read system.documentroot_prefix
	$documentroot_prefix_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'system' AND `varname` = 'documentroot_prefix';");
	$documentroot_prefix_row = $documentroot_prefix_result->fetch_assoc();
	$api['documentroot_prefix'] = $documentroot_prefix_row['value'];
	$api['customerdirs'] = $documentroot_prefix_row['value'];

	# Read panel.standardlanguage
	$standardlanguage_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'panel' AND `varname` = 'standardlanguage';");
	$standardlanguage_row = $standardlanguage_result->fetch_assoc();
	$api['default_language'] = $standardlanguage_row['value'];

	# Read panel.default_theme
	$default_theme_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'panel' AND `varname` = 'default_theme';");
	$default_theme_row = $default_theme_result->fetch_assoc();
	$api['default_theme'] = $default_theme_row['value'];
	
	# Read system.defaultip
	$defaultip_result = mysqli_query($conn_froxlor_db, "SELECT value FROM `panel_settings` WHERE `settinggroup` = 'system' AND `varname` = 'defaultip';");
	$defaultip_row = $defaultip_result->fetch_assoc();
	$api['ip']['default'] = $defaultip_row['value'];

	# Read ADMIN-ID of Loginname in $api['admin_username']
	$read_admin_id_result = mysqli_query($conn_froxlor_db,"SELECT adminid FROM `panel_admins` WHERE `loginname` = '".$api['admin_username']."';");
	$read_admin_id_row = $read_admin_id_result->fetch_assoc();
	$api['adminid'] = $read_admin_id_row['adminid'];

	mysqli_close($conn_froxlor_db);
	return true;
};

function customer_id_by_name ($username) {
	global $sql, $api;
	$conn_froxlor_db = new mysqli($sql['host'], $sql['user'], $sql['password'], $sql['db']);
		$username = mysqli_real_escape_string($conn_froxlor_db, $username);
		$read_new_id_result = mysqli_query($conn_froxlor_db, "SELECT customerid FROM `panel_customers` WHERE `loginname` = '".$username."';");
		$read_new_id_row = $read_new_id_result->fetch_assoc();
        $new_user_id = $read_new_id_row['customerid'];
	
		mysqli_close($conn_froxlor_db);
		return $read_new_id_result_row['customerid'];
};

function check_username_exist ($username) {
	global $sql, $api;
	$conn_froxlor_db = new mysqli($sql['host'], $sql['user'], $sql['password'], $sql['db']);
		$username = mysqli_real_escape_string($conn_froxlor_db, $username);
		$user_exist_result = mysqli_query($conn_froxlor_db, "SELECT customerid FROM `panel_customers` WHERE `loginname` = '".$username."';");
		mysqli_close($conn_froxlor_db);
		if (mysqli_num_rows($user_exist_result) > 0) { return true; } else { return false; };
};

function check_your_user ($username) {
	global $sql, $api;
	$conn_froxlor_db = new mysqli($sql['host'], $sql['user'], $sql['password'], $sql['db']);
		$username = mysqli_real_escape_string($conn_froxlor_db, $username);
		$your_user_result = mysqli_query($conn_froxlor_db, "SELECT adminid FROM `panel_customers` WHERE `loginname` = '".$username."' AND `adminid` = '".$api['adminid']."';");
		$your_user_row = $your_user_result->fetch_assoc();
		mysqli_close($conn_froxlor_db);
		if ($api['adminid'] = $your_user_row['adminid']) { return true; } else { return false; };
};

function check_domain_exist ($domainname) {
	global $sql, $api;
	$conn_froxlor_db = new mysqli($sql['host'], $sql['user'], $sql['password'], $sql['db']);
		$username = mysqli_real_escape_string($conn_froxlor_db, $username);
		$user_exist_result = mysqli_query($conn_froxlor_db, "SELECT id FROM `panel_domains` WHERE `domain` = '".$domainname."';");
		mysqli_close($conn_froxlor_db);
		if (mysqli_num_rows($user_exist_result) > 0) { return true; } else { return false; };
};

function domain_id_by_name ($domainname) {
	global $sql, $api;
	$conn_froxlor_db = new mysqli($sql['host'], $sql['user'], $sql['password'], $sql['db']);
		$domainname = mysqli_real_escape_string($conn_froxlor_db, $domainname);
		$domain_exist_result = mysqli_query($conn_froxlor_db, "SELECT id FROM `panel_domains` WHERE `domain` = '".$domainname."';");
		$domain_exist_row = $domain_exist_result->fetch_assoc();
	
		mysqli_close($conn_froxlor_db);
		return $domain_exist_row['id'];
};
