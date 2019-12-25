<?php
//Register Meta Box
function personal_info_softskill_meta_box() {
    add_meta_box( 'personal_info_softskill_meta_box', esc_html__( 'Sparkle Softskill ', 'personal-info' ), 'personal_info_softskill_box_callback', 'page', 'advanced', 'high' );
}
add_action( 'add_meta_boxes', 'personal_info_softskill_meta_box');
 
//Add field
function personal_info_softskill_box_callback( $meta_id ) {
    $outline = "<div id='softskill_wrapper'><input type='hidden' name='softskill_hidden_field' id='softskill_hidden_field' >";
    $outline .= '<table class="table_softskill"><tr>';
    $outline .=  wp_nonce_field( 'softskill_metabox_action', 'softskill_metabox_nonce' );
    $outline .= '<td><label for="softskill_title" style="width:150px; text-align:center; display:inline-block;">'. esc_html__('Soft skill Title', 'personal-info') .'</label></td>';
    $outline .= '<td><label for="softskill_value" style="width:150px; display:inline-block;">'. esc_html__('Soft skill Value ', 'personal-info') .'</label></td>';
    $outline .="</tr>";

    $softskill_title = json_decode(get_post_meta( $meta_id->ID, 'softskill_title', true ));

    $softskill_value = json_decode(get_post_meta( $meta_id->ID, 'softskill_value', true ));
    $repeatInput = '';
    if( is_array( $softskill_title)) {

    foreach ($softskill_title as $key => $value) {
        $repeatInput .= '<tr class="repeater_softskill"><td><input type="text" name="softskill_title[]" id="softskill_title" class="softskill_title" value="'. esc_attr($softskill_title[$key]) .'" style="width:300px; text-align:center;"/></td>';
        $repeatInput .= '<td><input type="text" name="softskill_value[]" id="softskill_value" class="softskill_value" value="'. esc_attr($softskill_value[$key]) .'" style="width:300px;"/>
            <span class="repeater_softskill_add_btn" >Add</span> |
            <span class="repeater_remove_btn" >Remove</span>
        </td></tr>';
    }
    }else{
        $repeatInput .= '<tr class="repeater_softskill"><td><input type="text" name="softskill_title[]" id="softskill_title" class="softskill_title" value="'. esc_attr($softskill_title) .'" style="width:300px; text-align:center;"/></td>';
        $repeatInput .= '<td><input type="text" name="softskill_value[]" id="softskill_value" class="softskill_value" value="'. esc_attr($softskill_value) .'" style="width:300px;"/>
            <span class="repeater_softskill_add_btn" >Add</span> |
            <span class="repeater_remove_btn" >Remove</span>
        </td></tr>';
    }

    $template = "<script type='template' id='softskill_repeat_field_template'>";
    $template .= '<tr class="repeater_softskill"><td><input type="text" name="softskill_title[]" id="softskill_title" class="softskill_title" value="" style="width:300px; text-align:center;"/></td>';
    $template .= '<td><input type="text" name="softskill_value[]" id="softskill_value" class="softskill_value" value="" style="width:300px;"/>
            <span class="repeater_softskill_add_btn" >Add</span> |
            <span class="repeater_remove_btn" >Remove</span>
        </td></tr>';

    $template .= "</script>";

    $outline .= $repeatInput;
    $outline .= '</table>';
   
   $outline .= '<style type="text/css">.repeater_softskill span{cursor:pointer;}</style>';

   $outline .= $template;
   $outline .= "</div>";
    echo $outline;
}

/* Do something with the data entered */
add_action( 'save_post', 'personal_info_save_softskill' );
function personal_info_save_softskill( $post_id ) {
 
        if ( 
            ! isset( $_POST['softskill_metabox_nonce']) 
            || ! wp_verify_nonce( isset($_POST['softskill_metabox_nonce']), 'softskill_metabox_action' ) 
        ) {

          
        } else {

           // process form data
        }
        
        
       if( isset($_POST['softskill_hidden_field']) and $_POST['softskill_hidden_field'] == "active") {
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
        
 
        /* OK, it's safe for us to save the data now. */
 
        // Sanitize the user input.
        $softskill_value = sanitize_text_field( json_encode($_POST['softskill_value'] ));
        $softskill_title = sanitize_text_field( json_encode($_POST['softskill_title'] ));
        // Update the meta field.
        update_post_meta( $post_id, 'softskill_title', $softskill_title );
        update_post_meta( $post_id, 'softskill_value', $softskill_value );
    }
}