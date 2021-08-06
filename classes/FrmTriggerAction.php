<?php

defined( 'ABSPATH' ) || wp_die();

if (!class_exists('FrmTriggerAction')) {

	class FrmTriggerAction {
		function __construct() {
			add_action( 'frm_trigger_testing_action_fm_create_action', array( $this, 'create_new_entry' ), 10, 3 );
		}

		public function create_new_entry( $action, $entry, $form ) {

			if ( $action->post_content['referer'] && $action->post_content['field'] ) {

				$form_id   = intval( $action->post_content['referer'] );
				$field_id  = intval( $action->post_content['field'] );
				$text      = sanitize_text_field( $entry->name );
				$data_test = array(
					'form_id'                      => $form_id,
					'frm_user_id'                  => get_current_user_id(),
					'frm_submit_entry_' . $form_id => wp_create_nonce( 'my_test_nonce' ),
					'item_meta'                    => array( $field_id => $text )
				);

				$entry = FrmEntry::create( $data_test );
			};
		}
	}
}










