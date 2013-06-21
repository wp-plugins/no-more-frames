<?php
/*
Plugin Name: No More Frames
Plugin URI: http://thisismyurl.com/plugins/no-more-frames/
Description: Forces frames to reload to the website homepage. This plugin has no settings, learn more at <a href='http://thisismyurl.com/plugins/no-more-frames/'>thisismyurl.com</a>.
Author: Christopher Ross
Version: 2.0.1
Author URI: http://thisismyurl.com
*/

/**
 * No More Frames
 *
 * This file contains all the logic required for the plugin
 *
 * @link		http://wordpress.org/extend/plugins/no-more-frames/
 *
 * @package 		No More Frames
 * @copyright		Copyright (c) 2010, Chrsitopher Ross
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since 		No More Frames 1.0
 */

function thisismyurl_no_more_frames() {
	?>
	<!-- No More Frames (start) -->
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
	
		if ( ( top_location != cur_location ) && parent_location.indexOf('{<?php echo strtolower( get_site_url() ); ?>}') != 0 )
		{
			top.location.href = document.location.href;
		}
	}
	catch ( err )
	{top.location.href = document.location.href;}
	//-->
	</script>
	<!-- No More Frames (end) -->
	<?php
}
add_action( 'wp_footer', 'thisismyurl_no_more_frames' );