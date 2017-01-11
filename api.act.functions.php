<?php

# Add Customer Account
#################################################

function froxlor_user_add ($username, $name, $firstname, $company, $street, $zipcode, $city, $phone, $fax, $email, $customernumber, $def_language, $gender, $custom_notes, $custom_notes_show, $diskspace, $traffic, $subdomains, $emails, $email_accounts, $email_forwarders, $email_quota, $email_imap, $email_pop3, $ftps, $phpenabled, $perlenabled, $dnsenabled, $store_defaultindex, $createstdsubdomain, $tickets, $mysqls, $password) {
	
	global $sql, $api;
	$conn_froxlor_db = new mysqli($sql['host'], $sql['user'], $sql['password'], $sql['db']);
	
		if(isset($company)) { $company = mysqli_real_escape_string($conn_froxlor_db, $company); } else {
			if(isset($username)) { $username = mysqli_real_escape_string($conn_froxlor_db, $username); } else { die('No data in field "username" or "company"'); }
			if(isset($name)) { $name = mysqli_real_escape_string($conn_froxlor_db, $name); } else { die('No data in field "name" or "company"'); }
		}
		if(isset($email)) { $email = mysqli_real_escape_string($conn_froxlor_db, $email); } else { die('No data in field "email"'); }
		if(isset($def_language)) { $def_language = mysqli_real_escape_string($conn_froxlor_db, $def_language); } else { $def_language = $api['default_language']; }
		if((isset($gender)) && (($gender == "1") || ($gender == "2"))) { $genderdb = $gender; } else { $genderdb = '0'; }
	
		if(isset($custom_notes)) { $custom_notes = mysqli_real_escape_string($conn_froxlor_db, str_replace("\r\n", "\n", $custom_notes)); } else { $custom_notes = ''; }
		if(isset($custom_notes_show)) { $custom_notes_show = mysqli_real_escape_string($conn_froxlor_db, $custom_notes_show); } else { $custom_notes_show = '0'; }
		if(isset($diskspace)) { $diskspace = mysqli_real_escape_string($conn_froxlor_db, ($diskspace * 1024)); } else { die('No data in field "diskspace"'); }
		if(isset($traffic)) { $traffic = mysqli_real_escape_string($conn_froxlor_db, ($traffic * 1024 * 1024)); } else { die('No data in field "traffic"'); }
		if(isset($subdomains)) { $subdomains = mysqli_real_escape_string($conn_froxlor_db, $subdomains); } else { die('No data in field "subdomains"'); }
		if(isset($emails)) { $emails = mysqli_real_escape_string($conn_froxlor_db, $emails); } else { die('No data in field "emails"'); }
		if(isset($email_accounts)) { $email_accounts = mysqli_real_escape_string($conn_froxlor_db, $email_accounts); } else { die('No data in field "email_accounts"'); }
		if(isset($email_forwarders)) { $email_forwarders = mysqli_real_escape_string($conn_froxlor_db, $email_forwarders); } else { die('No data in field "email_forwarders"'); }
		if(isset($email_quota)) { $email_quota = mysqli_real_escape_string($conn_froxlor_db, $email_quota); } else { $email_quota = '-1'; }
		if((isset($email_imap)) && ($email_imap == "1")) { $email_imap = '1'; } else { $email_imap = '0'; }
		if((isset($email_pop3)) && ($email_pop3 == "1")) { $email_pop3 = '1'; } else { $email_pop3 = '0'; }
		if((isset($phpenabled)) && ($phpenabled == "1")) { $phpenabled = '1'; } else { $phpenabled = '0'; }
		if((isset($perlenabled)) && ($perlenabled == "1")) { $perlenabled = '1'; } else { $perlenabled = '0'; }
		if((isset($dnsenabled)) && ($dnsenabled == "1")) { $dnsenabled = '1'; } else { $dnsenabled = '0'; }
		if((isset($store_defaultindex)) && ($store_defaultindex == "1")) { $store_defaultindex = '1'; } else { $store_defaultindex = '0'; }
		if((isset($ftps)) && ($ftps == "1")) { $ftps = '1'; } else { $ftps = '0'; }
		if((isset($createstdsubdomain)) && ($createstdsubdomain == "1")) { $createstdsubdomain = '1'; } else { $createstdsubdomain = '0'; }

		if(isset($tickets)) { $tickets = mysqli_real_escape_string($conn_froxlor_db, $tickets); } else { $tickets = '0'; }
		if(isset($mysqls)) { $mysqls = mysqli_real_escape_string($conn_froxlor_db, $mysqls); } else { $mysqls = '0'; }
		if(isset($password)) { $password = mysqli_real_escape_string($conn_froxlor_db, $password); } else { die('No data in field "password"'); }
	
	if (check_username_exist($username) == true) { return "loginname not free"; } else {
		
		$last_guid_query = "SELECT MAX(`guid`) as `fguid` FROM `panel_customers`";
		$last_guid_result = mysqli_query($conn_froxlor_db, $last_guid_query);
		
		$last_guid_result_row = $last_guid_result->fetch_assoc();
        $new_user_guid = $last_guid_result_row['fguid'] + 1;
		$api['guid'] = $last_guid_result_row['fguid'] + 1;
		
		$password_enc = makeCryptPassword($password);
		
		### Add customer to DB
		mysqli_query($conn_froxlor_db,"INSERT INTO `panel_customers` (`loginname`, `password`, `adminid`, `name`, `firstname`, `gender`, `company`, `street`, `zipcode`, `city`, `phone`, `fax`, `email`, `customernumber`, `def_language`, `diskspace`, `diskspace_used`, `mysqls`, `mysqls_used`, `emails`, `emails_used`, `email_accounts`, `email_accounts_used`, `email_forwarders`, `email_forwarders_used`, `email_quota`, `email_quota_used`, `ftps`, `ftps_used`, `tickets`, `tickets_used`, `subdomains`, `subdomains_used`, `traffic`, `traffic_used`, `documentroot`, `standardsubdomain`, `guid`, `ftp_lastaccountnumber`, `mysql_lastaccountnumber`, `deactivated`, `phpenabled`, `lastlogin_succ`, `lastlogin_fail`, `loginfail_count`, `reportsent`, `pop3`, `imap`, `perlenabled`, `dnsenabled`, `theme`, `custom_notes`, `custom_notes_show`) VALUES ('".$username."', '".$password_enc."', '".$api['adminid']."', '".$name."', '".$firstname."', '".$genderdb."', '".$company."', '".$street."', '".$zipcode."', '".$city."', '".$phone."', '".$fax."', '".$email."', '".$customernumber."', '".$def_language."', '".$diskspace."', 0, '".$mysqls."', 0, '".$emails."', 0, '".$email_accounts."', 0, '".$email_forwarders."', 0, '".$email_quota."', 0, '".$ftps."', 0, '".$tickets."', 0, '".$subdomains."', 0, '".$traffic."', 0, '".$api['customerdirs'].$username."/', 0, '".$new_user_guid."', 0, 0, 0, '".$phpenabled."', 0, 0, 0, 0, '".$email_pop3."', '".$email_imap."', '".$perlenabled."', '".$dnsenabled."', '".$api['default_theme']."', '".$custom_notes."', '".$custom_notes_show."');");
		
		$api['newsuserid'] = customer_id_by_name($username);
		
		#### Add customer to FTP-Groups and add new FTP-User
		mysqli_query($conn_froxlor_db,"INSERT INTO `ftp_users` (`username`, `uid`, `gid`, `password`, `homedir`, `shell`, `login_enabled`, `login_count`, `last_login`, `up_count`, `up_bytes`, `down_count`, `down_bytes`, `customerid`, `description`) VALUES ('".$username."', '".$new_user_guid."', '".$new_user_guid."', '$password_enc', '".$api['customerdirs'].$username."/', '".$api['usershell']."', 'Y', 0, NULL, 0, 0, 0, 0, '".$new_user_id."', 'Default');");
		
		mysqli_query($conn_froxlor_db,"INSERT INTO `ftp_groups` (groupname`, `gid`, `members`, `customerid`) VALUES ('".$username."', ".$new_user_guid.", '".$username.",www-data', ".$new_user_id.");");
		
		mysqli_query($conn_froxlor_db,"INSERT INTO `ftp_quotatallies` (`name`, `quota_type`, `bytes_in_used`, `bytes_out_used`, `bytes_xfer_used`, `files_in_used`, `files_out_used`, `files_xfer_used`) VALUES ('".$username."', 'user', 0, 0, 0, 0, 0, 0);");
		
		#### Add information to cron for adding new customer dir
		
		$data = array();
		$data['loginname'] = $username;
		$data['uid'] = $new_user_guid; // int 
		$data['gid'] = $new_user_guid; // int
		if((!empty($store_defaultindex)) && ($store_defaultindex == "0")) { $data['store_defaultindex'] == 1; } else { $data['store_defaultindex'] == 0; }
		$data = serialize($data);
		
		mysqli_query($conn_froxlor_db,"INSERT INTO `panel_tasks` SET `type` = '2', `data` = '".$data."';");

		#### Add cron tasks to add directories and vhosts
		return "customer add done";
	}
	mysqli_close($conn_froxlor_db);
}

# Update Customer Account
#come later

# Delete Customer Account
function froxlor_user_delete ($username) {
	if (check_username_exist($username) == false) { return "loginname not found"; } else {		
		global $sql, $sql_root, $api;
		$conn_froxlor_db = new mysqli($sql['host'], $sql['user'], $sql['password'], $sql['db']);
			$username = mysqli_real_escape_string($conn_froxlor_db, $username);
			$customer_id = customer_id_by_name($username);
			
			# Delete domains of customer
			$domaindata_result = mysqli_query($conn_froxlor_db,"SELECT id FROM pane_domains WHERE `customerid` = '".$customer_id."';");

			if ($domaindata_result->num_rows > 0) {
				while($domaindata_row = $domaindata_result->fetch_assoc()) {
					mysqli_query($conn_froxlor_db,"DELETE FROM `domaintoip` WHERE `id_domain` = '".$domaindata_row['id']."';");
					mysqli_query($conn_froxlor_db,"DELETE FROM `domain_dns_entries` WHERE `domain_id` = '".$domaindata_row['id']."';");
			}}
				
			# Delete ftps of customer
			$ftpsdata_result = mysqli_query($conn_froxlor_db,"SELECT username FROM ftp_users WHERE `customerid` = '".$customer_id."';");

			if ($ftpsdata_result->num_rows > 0) {
				while($ftpsdata_row = $domaindata_result->fetch_assoc()) {
					mysqli_query($conn_froxlor_db,"DELETE FROM `ftp_quotatallies` WHERE `name` = '".$ftpsdata_row['username']."';");
			}}
			
			mysqli_query($conn_froxlor_db,"DELETE FROM `ftp_users` WHERE `customerid` = '".$customer_id."';");
			mysqli_query($conn_froxlor_db,"DELETE FROM `ftp_groups` WHERE `customerid` = '".$customer_id."';");
				
			# Delete mysqls of customer
			$user_databases_result = mysqli_query($conn_froxlor_db,"SELECT databasename FROM panel_databases WHERE `customerid` = '".$customer_id."';");

			if ($user_databases_result->num_rows > 0) {
				$conn_root_db = new mysqli($sql_root[0]['host'], $sql_root[0]['user'], $sql_root[0]['password'], $sql['db']);
					while($user_databases_row = $user_databases_result->fetch_assoc()) {
						
						mysqli_query($conn_root_db,"DROP USER '".$user_databases_['databasename']."'@'%';");
						mysqli_query($conn_root_db,"DROP DATABASE IF EXISTS '".$user_databases_['databasename']."';");
						mysqli_query($conn_root_db,"FLUSH PRIVILEGES;");
					}
				mysqli_close($conn_root_db);
				mysqli_query($conn_froxlor_db,"DELETE FROM `panel_databases` WHERE `customerid` = '".$customer_id."';");
			}
					
			mysqli_query($conn_froxlor_db,"DELETE FROM `panel_domains` WHERE `customerid` = '".$customer_id."';");
			mysqli_query($conn_froxlor_db,"DELETE FROM `panel_htpasswds` WHERE `customerid` = '".$customer_id."';");
			mysqli_query($conn_froxlor_db,"DELETE FROM `panel_htaccess` WHERE `customerid` = '".$customer_id."';");
			mysqli_query($conn_froxlor_db,"DELETE FROM `panel_sessions` WHERE `userid` = '".$customer_id."' AND `adminsession` = '0';");
			mysqli_query($conn_froxlor_db,"DELETE FROM `panel_traffic` WHERE `customerid` = '".$customer_id."';");
			mysqli_query($conn_froxlor_db,"DELETE FROM `mail_virtual` WHERE `customerid` = '".$customer_id."';");
			mysqli_query($conn_froxlor_db,"DELETE FROM `mail_users` WHERE `customerid` = '".$customer_id."';");
			mysqli_query($conn_froxlor_db,"DELETE FROM `panel_customers` WHERE `id` = '".$customer_id."';");
			mysqli_query($conn_froxlor_db,"DELETE FROM `panel_tasks` WHERE `type` = '2' AND `data` LIKE '".$username."';");
			mysqli_query($conn_froxlor_db,"INSERT INTO `panel_tasks` SET `type` = '6', `data` = '".serialize($username)."';");
			mysqli_query($conn_froxlor_db,"INSERT INTO `panel_tasks` SET `type` = '1';");
			mysqli_query($conn_froxlor_db,"INSERT INTO `panel_tasks` SET `type` = '4';");
			return "customer delete done";
		mysqli_close($conn_froxlor_db);
	}
}

# Give customer new panel and ftp passwort
function froxlor_user_newpasswd ($username, $password) {
	global $sql, $api;
	if ((isset($username)) && ($username !="") && (isset($password)) && ($password !="")) {
		if (check_username_exist($username) == false) { return "loginname not found"; } else {
			$conn_froxlor_db = new mysqli($sql['host'], $sql['user'], $sql['password'], $sql['db']);
			$username = mysqli_real_escape_string($conn_froxlor_db, $username);
			$password = mysqli_real_escape_string($conn_froxlor_db, $password);
			$customer_id = customer_id_by_name($username);
			$password_enc = makeCryptPassword($password);

			mysqli_query($conn_froxlor_db,"UPDATE `panel_customers` SET `password` = '".$password_enc."' WHERE `customerid` = '".$username."' AND `adminid` = '".$api['adminid']."';");

			mysqli_close($conn_froxlor_db);
			return "password changed";
		}
	} else { return "username or password can not be empty"; }
}

# Unlock Customer Account
function froxlor_user_lock ($username, $lockstatus) {
	global $sql, $api;
	if ((isset($username)) && ($username !="")) {
		if (check_username_exist($username) == false) { return "loginname not found"; } else {
			$conn_froxlor_db = new mysqli($sql['host'], $sql['user'], $sql['password'], $sql['db']);
			$username = mysqli_real_escape_string($conn_froxlor_db, $username);
			$customer_id = customer_id_by_name($username);
			
			if($lockstatus == true) {
				mysqli_query($conn_froxlor_db,"UPDATE `panel_customers` SET `deactivated` = '1' WHERE `loginname` = '".$username."';");
				mysqli_query($conn_froxlor_db,"UPDATE `panel_domains` SET `deactivated` = '1' WHERE `customerid` = '".$customer_id."';");
				mysqli_query($conn_froxlor_db,"UPDATE `ftp_users` SET `login_enabled` = 'N' WHERE `customerid` = '".$customer_id."';");
				mysqli_query($conn_froxlor_db,"UPDATE `mail_users` SET `pop3` = '0', `imap` = '0', `postfix` = 'N' WHERE `customerid` = '".$customer_id."';");
			} else {
				mysqli_query($conn_froxlor_db,"UPDATE `panel_customers` SET `deactivated` = '0' WHERE `loginname` = '".$username."';");
				mysqli_query($conn_froxlor_db,"UPDATE `panel_domains` SET `deactivated` = '0' WHERE `customerid` = '".$customer_id."';");
				mysqli_query($conn_froxlor_db,"UPDATE `ftp_users` SET `login_enabled` = 'Y' WHERE `customerid` = '".$customer_id."';");
				mysqli_query($conn_froxlor_db,"UPDATE `mail_users` SET `pop3` = '1', `imap` = '1', `postfix` = 'Y' WHERE `customerid` = '".$customer_id."';");
			}

			mysqli_query($conn_froxlor_db,"INSERT INTO `panel_tasks` SET `type` = '1';");
			mysqli_query($conn_froxlor_db,"INSERT INTO `panel_tasks` SET `type` = '4';");
				
			mysqli_close($conn_froxlor_db);
			return "password changed";
		}
	} else { return "username can not be empty"; }
}

# Add / delete customer domain
function froxlor_user_domain($username, $domainname, $action) {
	if (check_username_exist($username) == false) { return "loginname not found"; } else {
		return "loginname not found";
	}
}
