<?php
/*
Plugin Name: No More Frames
Plugin URI: http://www.thisismyurl.com/wordpress/plugins/no-more-frames/
Description: Many web sites try to load your content into their own frame, to help sell ads on their sites. This simple plugin ensure your site is protect from this using a simple piece of code in your document header.
Author: Christopher Ross
Version: 0.4.0
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


/*

This software is copyright Mesoconcepts (http://www.mesoconcepts.com), and is distributed under the terms of the GPL license, v.2.

http://www.opensource.org/licenses/gpl-2.0.php
**/

add_filter('plugin_action_links', 'nomoreframes_donate', -10, 2);

function nomoreframes_donate($links, $file) {
	// adds the link to the settings page in the plugin list page
	if ($file == plugin_basename(dirname(__FILE__).'/timu-noframes.php'))
	$links[] = "<a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2754373'>" . __('Donate', 'No More Frames') . "</a>";
	return $links;
}

class timunoframes
{
	function makeitso() {add_action('wp_footer', array('timunoframes', 'kill_frame'));} 

	function kill_frame()
	{
		if ( !is_preview() )
		{
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
	}
}

timunoframes::makeitso();

?>