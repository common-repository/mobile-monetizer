<?php
/*

	Copyright 2011  MMTG Labs, Inc,  (email : contact@appstores.com)

	This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

	Plugin Name: Mobile Monetizer
	Plugin URI: http://appstores.com/mobile_monetizer
	Description: This plugin allows Wordpress websites to monetize their mobile traffic by recommending sponsored apps to their users.
	Version: 0.1
	Author: Appstores.com
	Author URI: http://appstores.com
	License: GPL2

*/


function mm_footer() {

	// Grabbing the User Agent
	$ua = detect_mobile();
	
	if ($ua != "")	
		echo '<script src="http://mobilemonetizer.appstores.com/widgets/155/iframe/MTA2MDUwNjc5OCwxMDYwNTAxODAwLDEwNjA1MDYzNjQ=
/mobile?widget_attrs[style]=single_app&widget_attrs[:app_size]=2&ua='.$ua.'" type="text/javascript" charset="utf-8"></script>';
}

function detect_mobile() {
	$container = $_SERVER['HTTP_USER_AGENT'];
	// The below prints out the user agent array. Uncomment to see it shown on the page.
	// print_r($container); 
	$mobile = false;
	$useragents = get_user_agents();

	foreach ( $useragents as $useragent ) {
		if ( preg_match( "#$useragent#i", $container )) {
			$mobile = true;
			$ua = strtolower($useragent);
		} 	
	}
	
	return $ua;
	
}

function get_user_agents() {
	$useragents = array(		
		"iPhone",  				 	// Apple iPhone
		"iPod", 						// Apple iPod touch
		"incognito", 				// Other iPhone browser
		"webmate", 				// Other iPhone browser
		"Android", 			 	// 1.5+ Android
		"dream", 				 	// Pre 1.5 Android
		"CUPCAKE", 			 	// 1.5+ Android
		"blackberry9500",	 	// Storm
		"blackberry9530",	 	// Storm
		"blackberry9520",	 	// Storm v2
		"blackberry9550",	 	// Storm v2
		"blackberry 9800",	// Torch
		"webOS",					// Palm Pre Experimental
		"s8000", 				 	// Samsung Dolphin browser
		"bada",				 		// Samsung Dolphin browser
		"Googlebot-Mobile"	// the Google mobile crawler

	);
	
	asort( $useragents );
	
	return $useragents;
}

add_action( 'wp_footer', 'mm_footer' );
?>