<label>Referer form id</label>
<input type="text"
       value="<?php echo esc_attr( $form_action->post_content['referer'] ); ?>"
       name="<?php echo $action_control->get_field_name( 'referer' ) ?>"
       placeholder="Enter the form id">
<label>Referer field id</label>
<input type="text"
       value="<?php echo esc_attr( $form_action->post_content['field'] ); ?>"
       name="<?php echo $action_control->get_field_name( 'field' ) ?>"
       placeholder="Enter the field id">
