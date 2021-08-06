<?php

defined( "ABSPATH" ) || wp_die();

if (!class_exists('FrmRegisterAction')) {

	class FrmRegisterAction {
		function __construct() {
			add_action( 'frm_registered_form_actions', array( $this, 'register_my_action' ) );
		}

		function register_my_action( $actions ) {
			$actions['testing_action_fm'] = 'FmTestingActions';

			require_once 'FrmCreateAction.php';

			return $actions;
		}
	}
}

