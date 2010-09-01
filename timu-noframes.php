<?php
/*
Plugin Name: No More Frames
Plugin URI: http://www.thisismyurl.com/download/wordpress-downloads/no-more-frames/
Description: Many web sites try to load your content into their own frame, to help sell ads on their sites. This simple plugin ensure your site is protect from this using a simple piece of code in your document header.
Author: Christopher Ross
Version: 1.5.1
Author URI: http://www.thisismyurl.com
*/


/*  Copyright 2008  Christopher Ross  (email : info@thisismyurl.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('wp_footer', 'timu_killframes');


/* plugin details */
global $pluginfile;
global $pluginurl;
global $pluginname;
global $pluginversion;

$pluginname 	= "No More Frames";
$pluginfile 	= "no-more-frames.zip";
$pluginurl 		= "http://regentware.com/software/web-based/wordpress-plugins/no-more-frames/";
$pluginversion 		= "1.5.1";

/* plugin details */

/* general setup for menus etc. */

add_filter ( 'plugin_action_links', 'cr_noframes_action' , - 10, 2 ); 
add_action('wp_footer', 'cr_noframes_footer_code');

/* general setup for menus etc. */



function cr_noframes_action($links, $file) {
	global $pluginurl;
	$this_plugin = plugin_basename ( __FILE__ );
	if ($file == $this_plugin) {$links [] = "<a href='".$pluginurl ."?".get_bloginfo('url')."'>Manual</a>";}
	return $links;
}

function cr_noframes_footer_code($options='') {
	global $pluginfile;
	global $pluginurl;
	global $pluginname;
	echo "<!--  $pluginname by Christopher Ross\n$pluginurl   -->";
	
}


function timu_killframes() {

	$home_url = strtolower(get_option('home'));
	echo "
		<script type='text/javascript'>
		<!--
		try
		{
			var parent_location = new String(parent.location);
			var top_location = new String(top.location);
			var cur_location = new String(document.location);
			parent_location = parent_location.toLowerCase();
			top_location = top_location.toLowerCase();
			cur_location = cur_location.toLowerCase();
		
			if ( ( top_location != cur_location ) && parent_location.indexOf('{$home_url}') != 0 )
			{
				top.location.href = document.location.href;
			}
		}
		catch ( err )
		{top.location.href = document.location.href;}
		//-->
		</script>
		";
}
?>