<?php

defined( 'ABSPATH' ) || wp_die();

if ( class_exists( 'FrmFormAction' ) ) {

	if ( ! class_exists( 'FmTestingActions' ) ) {

		class FmTestingActions extends FrmFormAction {

			public function __construct() {
				$action_ops = array(
					'classes'  => 'dashicons dashicons-format-aside',
					'limit'    => 99,
					'active'   => true,
					'priority' => 50,
					'event'    => array( 'create' ),
				);

				$this->FrmFormAction( 'testing_action_fm', __( 'Test Action', 'formidable' ), $action_ops );

			}


			function form( $form_action, $args = array() ) {
				extract( $args );
				$action_control = $this;

				include FormidableAdditionalEntry::get_view() . 'action_view.php';


			}
		}
	}
}
