<?php
/**
* Plugin Name: Real Performance BenignSource
* Plugin URI: http://www.benignsource.com/
* Version: 1.0
* Author: BenignSource
* Author URI: http://www.benignsource.com/
* Description: Search Engine (SEO) & Performance Optimization in Real Time!
* License: GPL2
*/

class realPerformanceBenignSource {
	/**
	* Constructor
	*/
	public function __construct() {

		// Plugin Details
        $this->plugin               = new stdClass;
        $this->plugin->name         = 'real-performance-benignsource'; // Plugin Folder
        $this->plugin->displayName  = 'Real Performance BenignSource'; // Plugin Name
        $this->plugin->version      = '1.0';
        $this->plugin->folder       = plugin_dir_path( __FILE__ );
        $this->plugin->url          = plugin_dir_url( __FILE__ );

		// Hooks
		add_action('admin_init', array(&$this, 'registerSettings'));
        add_action('admin_menu', array(&$this, 'adminPanelsAndrealPerformance'));
        
      
	}
	

	
	/**
	* Register Settings
	*/
	function registerSettings() {
	
	/**
    * CSS settings 
    */	  
		register_setting($this->plugin->name, 'rpbs_style_default', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_one', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_two', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_three', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_four', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_five', 'trim');
		register_setting($this->plugin->name, 'rpbs_customstyle_one', 'trim');
		register_setting($this->plugin->name, 'rpbs_customstyle_two', 'trim');
		register_setting($this->plugin->name, 'rpbs_customstyle_three', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_onein', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_twoin', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_threein', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_fourin', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_fivein', 'trim');
		register_setting($this->plugin->name, 'rpbs_customstyle_onein', 'trim');
		register_setting($this->plugin->name, 'rpbs_customstyle_twoin', 'trim');
		register_setting($this->plugin->name, 'rpbs_customstyle_threein', 'trim');
		register_setting($this->plugin->name, 'rpbs_style_off', 'trim');
		
	}
	
	/**
    * Register the plugin settings panel
    */
    function adminPanelsAndrealPerformance() {
	
    	add_submenu_page('options-general.php', $this->plugin->displayName, $this->plugin->displayName, 'manage_options', $this->plugin->name, array(&$this, 'adminPanel'));
	}
    
    /**
    * Output the Administration Panel
    * Save POSTed data from the Administration Panel into a WordPress option
    */	
	
    function adminPanel() {
        
		if( current_user_can('administrator') ) {
		// Save Settings
		
        if (isset( $_POST['submit'] ) && wp_verify_nonce( $_POST['submit'], 'benignsource-nonce' ))
		
		 {
           
	        	// Save
	    		
	    	
				update_option('rpbs_style_one', sanitize_text_field($_POST['rpbs_style_one']));
				update_option('rpbs_style_two', sanitize_text_field($_POST['rpbs_style_two']));
				update_option('rpbs_style_three', sanitize_text_field($_POST['rpbs_style_three']));
				update_option('rpbs_style_four', sanitize_text_field($_POST['rpbs_style_four']));
				update_option('rpbs_style_five', sanitize_text_field($_POST['rpbs_style_five']));
				update_option('rpbs_customstyle_one', sanitize_text_field($_POST['rpbs_customstyle_one']));
				update_option('rpbs_customstyle_two', sanitize_text_field($_POST['rpbs_customstyle_two']));
				update_option('rpbs_customstyle_three', sanitize_text_field($_POST['rpbs_customstyle_three']));
				
				$this->message = __('Settings Saved.', $this->plugin->name);
			
        }
       // Save WooCommerce Settings
	  
	     if (isset( $_POST['submitwoo'] ) && wp_verify_nonce( $_POST['submitwoo'], 'benignsource-nonce' )) {
            	
	        	// Save
				
	    		update_option('rpbs_style_onein', sanitize_text_field($_POST['rpbs_style_onein']));
				update_option('rpbs_style_twoin', sanitize_text_field($_POST['rpbs_style_twoin']));
				update_option('rpbs_style_threein', sanitize_text_field($_POST['rpbs_style_threein']));
				update_option('rpbs_style_fourin', sanitize_text_field($_POST['rpbs_style_fourin']));
				update_option('rpbs_style_fivein', sanitize_text_field($_POST['rpbs_style_fivein']));
				update_option('rpbs_customstyle_onein', sanitize_text_field($_POST['rpbs_customstyle_onein']));
				update_option('rpbs_customstyle_twoin', sanitize_text_field($_POST['rpbs_customstyle_twoin']));
				update_option('rpbs_customstyle_threein', sanitize_text_field($_POST['rpbs_customstyle_threein']));
	    		
				 
				$this->message = __('Settings Saved.', $this->plugin->name);
			
        }
		
		// Disable Theme CSS
		 
	     if (isset( $_POST['turnoncss'] ) && wp_verify_nonce( $_POST['turnoncss'], 'benignsource-nonce' )) {
           
	        	// Save
	    		update_option('rpbs_style_off', sanitize_text_field($_POST['rpbs_style_off']));
				
				$this->message = __('Settings Saved.', $this->plugin->name);
			
        }
		
		   // Enable Theme CSS
		   
	     if (isset( $_POST['turnoffcss'] ) && wp_verify_nonce( $_POST['turnoffcss'], 'benignsource-nonce' ))
        {
		// Save
	    		update_option('rpbs_style_off', sanitize_text_field($_POST['rpbs_style_off']));
				
				$this->message = __('Settings Saved.', $this->plugin->name);
			
        }
		
		 /**
    * Output the Administration Panel
    * Save POSTed data from the Administration Panel into a WordPress option
    */

		
        // Get latest settings
        $this->settings = array(
		    
        	
			'rpbs_style_one' => stripslashes(get_option('rpbs_style_one')),
        	'rpbs_style_two' => stripslashes(get_option('rpbs_style_two')),
			'rpbs_style_three' => stripslashes(get_option('rpbs_style_three')),
			'rpbs_style_four' => stripslashes(get_option('rpbs_style_four')),
			'rpbs_style_five' => stripslashes(get_option('rpbs_style_five')),
			'rpbs_customstyle_one' => stripslashes(get_option('rpbs_customstyle_one')),
			'rpbs_customstyle_two' => stripslashes(get_option('rpbs_customstyle_two')),
			'rpbs_customstyle_three' => stripslashes(get_option('rpbs_customstyle_three')),
			'rpbs_style_off' => stripslashes(get_option('rpbs_style_off')),
			'rpbs_style_onein' => stripslashes(get_option('rpbs_style_onein')),
        	'rpbs_style_twoin' => stripslashes(get_option('rpbs_style_twoin')),
			'rpbs_style_threein' => stripslashes(get_option('rpbs_style_threein')),
			'rpbs_style_fourin' => stripslashes(get_option('rpbs_style_fourin')),
			'rpbs_style_fivein' => stripslashes(get_option('rpbs_style_fivein')),
			'rpbs_customstyle_onein' => stripslashes(get_option('rpbs_customstyle_onein')),
			'rpbs_customstyle_twoin' => stripslashes(get_option('rpbs_customstyle_twoin')),
			'rpbs_customstyle_threein' => stripslashes(get_option('rpbs_customstyle_threein')),
			
        );
        
    	// Load Settings Form
        include_once(WP_PLUGIN_DIR.'/'.$this->plugin->name.'/settings.php');
    }
  }
}
?>
<?php

$upload_dir = wp_upload_dir();
$real_dirname = $upload_dir['basedir'].'/'.performance;
if ( ! file_exists( $real_dirname ) ) {
wp_mkdir_p( $real_dirname );
}

add_action( 'init', 'bscreate_benignstylefiles' );
function bscreate_benignstylefiles() {

    $upload_dir      = wp_upload_dir();

    $files = array(
        array(
            'base'      => $upload_dir['basedir'] . '/performance',
            'file'      => 'realstyle.css',
            'content'   => '@charset "utf-8";'
        )
    );

    foreach ( $files as $file ) {
        if ( wp_mkdir_p( $file['base'] ) && ! file_exists( trailingslashit( $file['base'] ) . $file['file'] ) ) {
            if ( $file_handle = @fopen( trailingslashit( $file['base'] ) . $file['file'], 'w' ) ) {
                fwrite( $file_handle, $file['content'] );
                fclose( $file_handle );
            }
        }
    }

}
?>
<?php

function benignsourcestyleenqueue() {

wp_enqueue_style('benignsource_style', '/wp-content/uploads/performance/realstyle.css');
	

}
add_action( 'wp_enqueue_scripts', 'benignsourcestyleenqueue' );

    /**
	* After activate the plugin your HTML Code automatically becomes OVER 50% compressed!
	*/
add_action('wp_head', 'rpbs_headperformancebs');
function rpbs_headperformancebs() {
?>
<!-- Powered by Real Performance BenignSource -->
<?php function rpbsremoveWhitespace($bufferspace)
{
return preg_replace('~>\s*\n\s*<~', '><', $bufferspace);
}
ob_start('rpbsremoveWhitespace');?>
<?php } ?>
<?php $rpbs = new realPerformanceBenignSource();?>