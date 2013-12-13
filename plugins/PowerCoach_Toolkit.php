<?php
/*
 * Plugin Name: PowerCoach WordPress Toolkit
 * Plugin URI: http://hoopmedia.com/
 * Description: Hi, I'm Your WordPress Toolkit, a collection of awesome shortcuts make it easy to edit posts with awesome styles.
 * Author: HooPmedia insprired by Matt and Scott of WooThemes
 * Version: 1.0.1
 * Author URI: http://hoopmedia.com/
 
#	References
		http://codex.wordpress.org/Writing_a_Plugin
		http://wordpress.org/plugins/about/readme.txt
		http://generatewp.com/
		http://codex.wordpress.org/Shortcode

Copyright 2013  HooPmedia  (email : geo@hoopmedia.com)

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
*/
 


/* Typography short code helpers*/
function leadpara_shortcode( $atts, $content = null ) {  
        return '<p class="lead">'.$content.'</p>';  
    }  
add_shortcode( 'lead_p', 'leadpara_shortcode' );

/* color helpers */
function emerald_shortcode( $atts, $content = null ) {  
        return '<span id="emeraldTxt">'.$content.'</span>';  
    }  
add_shortcode( 'emerald', 'emerald_shortcode' );
function violet_shortcode( $atts, $content = null ) {  
        return '<span id="violetTxt">'.$content.'</span>';  
    }  
add_shortcode( 'violet', 'violet_shortcode' );

function color_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'col' => 'violet',
	), $atts ) );
	return '<span id="' . $col . 'Txt">' . $content . '</span>';

    }  
add_shortcode( 'color', 'color_shortcode' );

function well_shortcode( $atts, $content = null ){	
	return '<div class="well">'.$content.'</div>';  
}
add_shortcode( 'well', 'well_shortcode' );

/* Custom signature short code */
function sig_shortcode( $atts ){
	return "Energy, Passion and Insight";
}
add_shortcode( 'sig', 'sig_shortcode' );

/* Social media icon shotcodes */
//twitter
function twitter_shortcode( $atts ){
	return '<i class="fa fa-twitter-square fa-2x"></i>';
}
add_shortcode( 'twitter', 'twitter_shortcode' );

//facebook
function facebook_shortcode( $atts ){
	return '<i class="fa fa-facebook-square fa-2x"></i>';
}
add_shortcode( 'facebook_icon', 'facebook_shortcode' );

//linkedin
function linkedin_shortcode( $atts ){
	return '<i class="fa fa-linkedin-square fa-2x"></i>';
}
add_shortcode( 'linkedin', 'linkedin_shortcode' );


 if ( ! class_exists( 'PowerCoach_Toolkit' ) ) {
 	class PowerCoach_Toolkit {
 		
 		/**
 		 * Constructor.
 		 *
 		 * Call our various internal methods.
 		 *
 		 * @since  1.0.0
 		 * @return  void
 		 */
 		public function __construct () {
 			add_action( 'plugins_loaded', array( &$this, 'init' ) );
 		} // End __construct()

 		/**
 		 * Initialise the toolkit.
 		 *
 		 * @since  1.0.0
 		 * @return  void
 		 */
 		public function init () {
 			// Remove the "generator" meta tag.
 			if ( ! is_admin() ) { $this->remove_generator_tag(); }
 		} // End init()

 		/**
 		 * Remove the "generator" <meta> tag.
 		 *
 		 * Remove the "generator" <meta> tag from the <head> section when loading the WordPress frontend.
 		 *
 		 * @since  1.0.0
 		 * @return  void
 		 */
 		public function remove_generator_tag () {
 			remove_action( 'wp_head',  'wp_generator' );
 		} // End remove_generator_tag()
 	} // End Class
 }

 global $PowerCoach_Toolkit;
 $PowerCoach_Toolkit = new PowerCoach_Toolkit();
 
?>