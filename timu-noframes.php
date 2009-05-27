<?php
/*
Plugin Name: No More Frames
Plugin URI: http://www.thisismyurl.com/wordpress/plugins/no-more-frames/
Description: Many web sites try to load your content into their own frame, to help sell ads on their sites. This simple plugin ensure your site is protect from this using a simple piece of code in your document header.
Author: Christopher Ross
Version: 1.0.0
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



add_action('admin_menu', 'NoMoreFrames_menu');

function NoMoreFrames_menu() {
  add_options_page('No More Frames', 'No More Frames', 10,'NoMoreFrames.php', 'NoMoreFrames_options');
}

function NoMoreFrames_options() {

?>
<div class="wrap">
    <div id="icon-options-general" class="icon32"><br /></div>
    <h2>No More Frames</h2>
    
    
    
    <div id="poststuff" class="metabox-holder">
    <div class="inner-sidebar">
    <div id="side-sortables" class="meta-box-sortabless ui-sortable" style="position:relative;">
    
    <div id="sm_pnres" class="postbox">
    <h3 class="hndle"><span>About this Plugin</span></h3>
    <div class="inside">
    <ul class='options'>
    <style>.options a {text-decoration:none;}</style>
    <li><a href="http://www.thisismyurl.com/wordpress/plugins/no-more-frames/">Plugin Homepage</a></li>
    <li><a href="http://wordpress.org/extend/plugins/no-more-frames/">Vote for this Plugin</a></li>
    <li><a href="http://forums.thisismyurl.com/">Support Forum</a></li>
    <li><a href="http://support.thisismyurl.com/">Report a Bug</a></li>
    <li><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5732121">Donate with PayPal</a></li>
    </ul>
    </div>
    </div>
    
    </div>
    </div>
    
    <div class="has-sidebar sm-padded" >
    
    <div id="post-body-content" class="has-sidebar-content">
    
    <div class="meta-box-sortabless">
    
    <!-- Rebuild Area -->
    <!-- Basic Options -->
    <div id="sm_basic_options" class="postbox">
    <h3 class="hndle"><span>Basic Options</span></h3>
    <div class="inside">
    <p class="hndle">This plugin has no Administation level settings, once activated it is operational.</p>
    </div>
    </div>





    
    <div id="sm_basic_options2" class="postbox">
      <h3 class="hndle"><span>Read Me File Contents</span></h3>
    <div class="inside">
      <?php 
	  $contents = file_get_contents('../wp-content/plugins/no-more-frames/readme.txt');
	  $contents = str_replace("\n","<br>",$contents);
	  echo $contents;
	  ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
<?php
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