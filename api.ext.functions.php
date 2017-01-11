<?php

/**
 * This functions are parts of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * Function makeCryptPassword:
 * @copyright  (c) the authors
 * @author     Michal Wojcik <m.wojcik@sonet3.pl>
 * @author     Michael Kaufmann <mkaufmann@nutime.de>
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 *
 * Functions generatePassword and special_shuffle:
 * @copyright  (c) the authors
 * @author     Froxlor team <team@froxlor.org> (2011-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Functions
 */

function makeCryptPassword ($password) {
	global $api;
	#$type = $api['passwd']['passwordcryptfunc'];
	$type = $api['passwd']['passwordcryptfunc'] !== null ? $api['passwd']['passwordcryptfunc'] : 3;
	switch ($type) {
		case 0:
			$cryptPassword = crypt($password);
			break;
		case 1:
			$cryptPassword = crypt($password, '$1$' . generatePassword(true).  generatePassword(true));
			break;
		case 2:
			if (version_compare(phpversion(), '5.3.7', '<')) {
				$cryptPassword = crypt($password, '$2a$' . generatePassword(true).  generatePassword(true));
			} else {
				// Blowfish hashing with a salt as follows: "$2a$", "$2x$" or "$2y$",
				// a two digit cost parameter, "$", and 22 characters from the alphabet "./0-9A-Za-z"
				$cryptPassword = crypt(
					$password,
					'$2y$07$' . substr(generatePassword(true).generatePassword(true).generatePassword(true), 0, 22)
				);
			}
			break;
		case 3:
			$cryptPassword = crypt($password, '$5$' . generatePassword(true).  generatePassword(true));
			break;
		case 4:
			$cryptPassword = crypt($password, '$6$' . generatePassword(true).  generatePassword(true));
			break;
		default:
			$cryptPassword = crypt($password);
			break;
	}
	return $cryptPassword;
}

function generatePassword($isSalt = false)
{
    global $api;
	$alpha_lower = 'abcdefghijklmnopqrstuvwxyz';
    $alpha_upper = strtoupper($alpha_lower);
    $numeric = '0123456789';
	$special = $api['passwd']['password_special_char'];
    $length = $api['passwd']['password_min_length'] > 3 ? $api['passwd']['password_min_length'] : 10;
    
    $pw = special_shuffle($alpha_lower);
    $n = floor(($length) / 4);
    
    if ($api['passwd']['password_alpha_upper']) {
        $pw .= mb_substr(special_shuffle($alpha_upper), 0, $n);
    }
    
    if ($api['passwd']['password_numeric']) {
        $pw .= mb_substr(special_shuffle($numeric), 0, $n);
    }
    
    if ($api['passwd']['password_special_char_required'] && !$isSalt) {
        $pw .= mb_substr(special_shuffle($special), 0, $n);
    }
    
    $pw = mb_substr($pw, - $length);
    
    return special_shuffle($pw);
}

function special_shuffle($str = null)
{
    $len = mb_strlen($str);
    $sploded = array();
    while ($len -- > 0) {
        $sploded[] = mb_substr($str, $len, 1);
    }
    shuffle($sploded);
    return join('', $sploded);
}
