<?php
/*
Plugin Name: No More Frames
Plugin URI: http://thisismyurl.com/downloads/no-more-frames/
Description: Forces frames to reload to the website homepage. This plugin has no settings, learn more at <a href='http://thisismyurl.com/downloads/no-more-frames/'>thisismyurl.com</a>.
Author: Christopher Ross
Version: 15.01
Author URI: http://thisismyurl.com/
*/

/**
 * No More Frames
 *
 * This file contains all the logic required for the plugin
 *
 * @link		http://wordpress.org/extend/plugins/no-more-frames/
 *
 * @package 	No More Frames
 * @copyright	Copyright ( c ) 2010, Chrsitopher Ross
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 ( or newer )
 *
 * @since 		No More Frames 1.0
 */




/* if the plugin is called directly, die */
if ( ! defined( 'WPINC' ) )
	die;
	
	
define( 'THISISMYURL_NMF_NAME', 'No More Frames' );
define( 'THISISMYURL_NMF_SHORTNAME', 'No More Frames' );

define( 'THISISMYURL_NMF_FILENAME', plugin_basename( __FILE__ ) );
define( 'THISISMYURL_NMF_FILEPATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'THISISMYURL_NMF_FILEPATHURL', plugin_dir_url( __FILE__ ) );

define( 'THISISMYURL_NMF_NAMESPACE', basename( THISISMYURL_NMF_FILENAME, '.php' ) );
define( 'THISISMYURL_NMF_TEXTDOMAIN', str_replace( '-', '_', THISISMYURL_NMF_NAMESPACE ) );

define( 'THISISMYURL_NMF_VERSION', '15.01' );

include_once( 'thisismyurl-common.php' );



/**
 * Creates the class required for NMF Search for WordPress
 *
 * @author     Christopher Ross <info@thisismyurl.com>
 * @version    Release: @15.01@
 * @see        wp_enqueue_scripts()
 * @since      Class available since Release 15.01
 *
 */
if( ! class_exists( 'thissimyurl_NoMoreFrames' ) ) {
class thissimyurl_NoMoreFrames extends thisismyurl_Common_NMF {

	/**
	  * Standard Constructor
	  *
	  * @access public
	  * @static
	  * @uses http://codex.wordpress.org/Function_Reference/add_action
	  * @since Method available since Release 15.01
	  *
	  */
	public function run() {
		add_filter( 'wp_footer', array( $this, 'no_more_frames' ) );
	}
	
	
	/**
	  * thisismyurl_no_more_frames
	  *
	  * @access public
	  * @static
	  * @since Method available since Release 15.01
	  *
	  * @todo figure out how to call this dynamically from within an enqueue function
	  *
	  */
	function no_more_frames() {

	  ?>
        <!-- No More Frames ( start ) -->
        <script type='text/javascript'>
        <!--
        try
        {
            var parent_location = new String( parent.location );
            var top_location = new String( top.location );
            var cur_location = new String( document.location );
            parent_location = parent_location.toLowerCase();
            top_location = top_location.toLowerCase();
            cur_location = cur_location.toLowerCase();
        
            if ( ( top_location != cur_location ) && parent_location.indexOf( '{<?php echo strtolower( get_site_url() ); ?>}' ) != 0 )
            {
                top.location.href = document.location.href;
            }
        }
        catch ( err )
        {top.location.href = document.location.href;}
        //-->
	</script>
	<!-- No More Frames ( end ) -->
	<?php
	
	}
	
}
}

$thissimyurl_NoMoreFrames = new thissimyurl_NoMoreFrames;

$thissimyurl_NoMoreFrames->run();