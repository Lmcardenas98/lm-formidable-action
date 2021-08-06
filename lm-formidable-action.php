<?php
/**
 * Plugin Name:  formidable additional entry
 * Description:  when you create an entry form with formidable , the action create an additional entre about this forms
 * Version:      1.0.0
 * Author:       Lmcardenas
 */


defined( 'ABSPATH' ) || wp_die();

if (!class_exists('FormidableAdditionalEntry')) {

	class FormidableAdditionalEntry {
		private static $view;

		protected function __construct() {
			self::$view = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
			require_once 'classes/FrmCreateAction.php';
			require_once 'classes/FrmRegisterAction.php';
			new FrmRegisterAction();
			require_once 'classes/FrmTriggerAction.php';
			new FrmTriggerAction();
		}

		public static function getInstance() {
			static $instance = null;
			if ( null === $instance ) {
				$instance = new static();
			} else {
				wp_die();
			}

			return $instance;
		}

		public static function get_view(): string {
			return self::$view;
		}
	}
}

add_action( 'plugins_loaded', function ()
{
	FormidableAdditionalEntry::getInstance();
}, 999 );
