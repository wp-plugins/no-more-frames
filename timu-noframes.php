<?php
/*
Plugin Name: No More Frames
Plugin URI: http://www.thisismyurl.com/download/wordpress-downloads/no-more-frames/
Description: Many web sites try to load your content into their own frame, to help sell ads on their sites. This simple plugin ensure your site is protect from this using a simple piece of code in your document header.
Author: Christopher Ross
Version: 1.1.6
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



	/* Page Start */
	echo "
	<div class='wrap'>
	  <div id='icon-options-general' class='icon32'><br />
	  </div>
	  <h2>No More Frames</h2>
	  <form name='addlink' id='addlink' method='post' action='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5732121'>
		<div id='poststuff' class='metabox-holder has-right-sidebar'>
		  <div id='side-info-column' class='inner-sidebar'>
			<div id='side-sortables' class='meta-box-sortables'>
			  <div id='linksubmitdiv' class='postbox ' >
				<div class='handlediv' title='Click to toggle'><br />
				</div>
				<h3 class='hndle'><span>Plugin Details</span></h3>
				<div class='inside'>
				  <div class='submitbox' id='submitlink'>
					<div id='minor-publishing'>
					  <div style='display:none;'>
						<input type='submit' name='save' value='Save' />
					  </div>
					  <div id='minor-publishing-actions'>
						<div id='preview-action'> </div>
						<div class='clear'></div>
					  </div>
					  <div id='misc-publishing-actions'>
						<div class='misc-pub-section misc-pub-section-last'>
							  <ul class='options' style='padding-left: 20px;'>
								<style>.options a {text-decoration:none;}</style>
									<li><a href='http://www.thisismyurl.com/download/wordpress-downloads/no-more-frames/'>Plugin Homepage</a></li>
									<li><a href='http://wordpress.org/extend/plugins/no-more-frames/'>Vote for this Plugin</a></li>
									<li><a href='http://forums.thisismyurl.com/'>Support Forum</a></li>
									<li><a href='http://support.thisismyurl.com/'>Report a Bug</a></li>";
									
								
	if (function_exists(zip_open)) {
	$file = "no-more-frames";
		$lastupdate = get_option($file."-update");
		if (strlen($lastupdate )==0 || date("U")-$lastupdate > $lastupdate) {
			$pluginUpdate = @file_get_contents('http://downloads.wordpress.org/plugin/'.$file.'.zip');
			if (strlen($pluginUpdate) > 5) {
			$myFile = "../wp-content/uploads/cache-".$file.".zip";
			$fh = fopen($myFile, 'w') or die("can't open file");
			$stringData = $pluginUpdate;
			fwrite($fh, $stringData);
			fclose($fh);
			
			$zip = zip_open($myFile);
			while ($zip_entry = zip_read($zip)) {
				if (zip_entry_name($zip_entry) == $file."/".$file.".php") {$size = zip_entry_filesize($zip_entry);}
			}
			zip_close($zip);
			unlink($myFile);
			
			if ($size != filesize("../wp-content/plugins/".$file."/".$file.".php")) {?>    
				<li>This plugin is out of date. <a href='http://downloads.wordpress.org/plugin/<?php echo $file;?>.zip'>Please <strong>download</strong> the latest version.</a></li>
	<?php
		} }
		update_option($file."-update", date('U'));
    }}

						
						
								
				echo "			</ul>
						</div>
					  </div>
					</div>
					<div id='major-publishing-actions'>
					  <div id='delete-action'> </div>
					  <div id='publishing-action'>
						<input name='save' type='submit' class='button-primary' id='publish' tabindex='4' accesskey='p' value='Donate' />
					  </div>
					  <div class='clear'></div>
					</div>
					<div class='clear'></div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		  <div id='post-body'>
			<div id='post-body-content'>
			  <div id='namediv' class='stuffbox'>
				<h3>
				  <label for='link_name'>Settings</label>
				</h3>
				<div class='inside'><span class='hndle'>This plugin has no Administation level settings, once activated it is operational. To deactivate this plugin, please use the WordPress plugins screen.</span></div>
			  </div>
			  <div id='addressdiv' class='stuffbox'>
				<h3>
				  <label for='link_url'>Readme File</label>
				</h3>
				<div class='inside'>
					  <pre>";
					  echo wordwrap(file_get_contents('../wp-content/plugins/no-more-frames/readme.txt'), 80, "\n",true);;
					  echo "</pre>
				</div>
			  </div>
			  <div id='normal-sortables' class='meta-box-sortables'></div>
			  <div id='advanced-sortables' class='meta-box-sortables'> </div>
			</div>
		  </div>
		</div>
	  </form>
	</div>
	";



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