<?php
/**
 * @Author: suifengtec
 * @Date:   2016-12-12 14:52:33
 * @Last Modified by:   suifengtec
 * @Last Modified time: 2016-12-12 17:39:20
 */
/**
 * Plugin Name: WP Responsive Tables
 * Plugin URI: http://coolwp.com/wp-responsive-tables.html
 * Description: Responsive tables by given css selectors.
 * Author: suifengtec
 * Author URI: https://coolwp.com
 * Version: 0.9.0
 * Text Domain: cwp
 * Domain Path: /languages/
 *
 */

if ( ! defined( 'ABSPATH' ) ){exit;}


if ( ! class_exists( 'CWP_Responsive_Table' ) ) :

final class CWP_Responsive_Table {

	private static $instance;
	public static $slctrs;
	public function __wakeup() {}
	public function __clone() {}
	public function __construct( ){}
	public static function instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof CWP_Responsive_Table ) ) {
			self::$instance = new self();
			self::$instance->hooks();
		}
		return self::$instance;

	}

	/*
	define table selectors.
	 */
	public static function get_table_selectors(){

		$r = array(
			'#tab-description  table#aaa',
			'#tab-description  table#sss',
			);

		return  apply_filters('coolwp_responsive_table_selectors', $r );
	}

	public function hooks(){

		if(is_admin()){return;}

		self::$slctrs = self::get_table_selectors();
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'wp_enqueue_scripts' ), 11 );
		add_action('wp_head', array( __CLASS__ , 'wp_head' ), 99 );
	}

	public static function is_enabled(){
		$r = apply_filters( 'coolwp_responsive_table_enabled', wp_is_mobile() );
		return $r;
	}

	public static function is_load_default_table_style_enabled(){
		$r = apply_filters( 'coolwp_responsive_table_load_default_style_enabled', true );
		return $r;
	}	
	/*
	load styles.
	 */
	public static function wp_head(){

		if(self::is_load_default_table_style_enabled()):
			?><style>table thead th{background: #313131;color:#fff;}</style><?php
		endif;

		if(!self::is_enabled()){ return; }

		$slctrs = self::$slctrs;
		$slctrs_str = implode(',', $slctrs );
		?>	
<style><?php echo $slctrs_str; ?> {  width: 100%; border-collapse: collapse; }<?php foreach($slctrs as $slctr): ?><?php echo $slctr; ?> th ,<?php endforeach; ?>#coolwp_table{  background: #313131;  color: white; font-weight: bold; }<?php foreach($slctrs as $slctr): ?><?php echo $slctr; ?> tr:nth-of-type(odd) ,<?php endforeach; ?>#coolwp_table{background: #fff;}<?php foreach($slctrs as $slctr): ?><?php echo $slctr; ?> td,<?php echo $slctr; ?>  th ,<?php endforeach; ?>#coolwp_table{padding: 6px; border: 1px solid #ccc; text-align: center;}@media  only screen and (max-width: 760px),(max-width: 480px), (min-device-width: 768px) and (max-device-width: 1024px) {<?php foreach($slctrs as $slctr): ?><?php echo $slctr; ?> td,<?php echo $slctr; ?>  th ,<?php endforeach; ?>#coolwp_table{ text-align: left;}<?php foreach($slctrs as $slctr): ?><?php echo $slctr; ?>,<?php echo $slctr; ?> thead,<?php echo $slctr; ?>  tbody,<?php echo $slctr; ?>  th ,<?php echo $slctr; ?> td,<?php echo $slctr; ?> tr ,<?php endforeach; ?>#coolwp_table{display: block;}<?php foreach($slctrs as $slctr): ?><?php echo $slctr; ?> thead tr,<?php endforeach; ?>#coolwp_table{position: absolute;top: -9999px;left: -9999px;}<?php foreach($slctrs as $slctr): ?><?php echo $slctr; ?>   tr ,<?php endforeach; ?> #coolwp_table{border: 1px solid #ccc; margin-bottom:6px;}<?php foreach($slctrs as $slctr): ?><?php echo $slctr; ?>   td,<?php endforeach; ?>#coolwp_table{border: none;border-bottom: 1px solid #eee;position: relative;padding-left: 50%!important;}<?php foreach($slctrs as $slctr): ?><?php echo $slctr; ?>  td:before ,<?php endforeach; ?>#coolwp_table{position: absolute;top: 6px;left: 6px; width: 45%;padding-right: 10px;white-space: nowrap;content: attr(data-th);}<?php foreach($slctrs as $slctr): ?><?php echo $slctr; ?> td:hover,<?php endforeach; ?>#coolwp_table{background: #313131;color:#fff;}}</style>
		<?php
	}

	/*
	load javascript.
	 */
	public static function wp_enqueue_scripts(){
		
		if(!self::is_enabled()){ return; }

		wp_enqueue_script( 'cwp-frontend-js', plugins_url( 'assets/js/cwp-responsive-table-f.js', __FILE__ ) , array('jquery'), false, true );
        wp_localize_script(  'cwp-frontend-js', 'CWP_RESPONSIVE_TABLE_Data', array('slctrs' => self::$slctrs ) );
	}

}

global $cwp;
$cwp = CWP_Responsive_Table::instance();

endif;
