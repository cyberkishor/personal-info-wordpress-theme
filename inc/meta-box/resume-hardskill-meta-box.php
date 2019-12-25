<?php
//Register Meta Box
function personal_info_hardskill_meta_box() {
    add_meta_box( 'personal_info_hardskill_meta_box', esc_html__( 'Hardskill ', 'personal-info' ), 'personal_info_hardskill_box_callback', 'page', 'advanced', 'high' );
}
add_action( 'add_meta_boxes', 'personal_info_hardskill_meta_box');
 
//Add field
function personal_info_hardskill_box_callback( $meta_id ) {
    $outline = "<div id='hardskill_wrapper'><input type='hidden' name='hardskill_hidden_field' id='hardskill_hidden_field' >";
    $outline .= '<table class="table_hardskill"><tr>';
    $outline .=  wp_nonce_field( 'hardskill_metabox_action', 'hardskill_metabox_nonce' );
    $outline .= '<td><label for="hardskill_title" style="width:150px; text-align:center; display:inline-block;">'. esc_html__('Hard skill Title', 'personal-info') .'</label></td>';
    $outline .= '<td><label for="hardskill_value" style="width:150px; display:inline-block;">'. esc_html__('Hard skill Value ','personal-info') .'</label></td>';
    $outline .="</tr>";

    $hardskill_title = json_decode(get_post_meta( $meta_id->ID, 'hardskill_title', true ));

    $hardskill_value = json_decode(get_post_meta( $meta_id->ID, 'hardskill_value', true ));
    $repeatInput = '';
    if( is_array( $hardskill_title)) {
    foreach ($hardskill_title as $key => $value) {
        $repeatInput .= '<tr class="repeater_hardskill"><td><input type="text" name="hardskill_title[]" id="hardskill_title" class="hardskill_title" value="'. esc_attr($hardskill_title[$key]) .'" style="width:300px; text-align:center;"/></td>';
        $repeatInput .= '<td><input type="text" name="hardskill_value[]" id="hardskill_value" class="hardskill_value" value="'. esc_attr($hardskill_value[$key]) .'" style="width:300px;"/>
            <span class="repeater_hardskill_add_btn" >Add</span> |
            <span class="repeater_hardskill_remove_btn" >Remove</span>
        </td></tr>';
    }
    }else{
        $repeatInput .= '<tr class="repeater_hardskill"><td><input type="text" name="hardskill_title[]" id="hardskill_title" class="hardskill_title" value="" style="width:300px; text-align:center;"/></td>';
        $repeatInput .= '<td><input type="text" name="hardskill_value[]" id="hardskill_value" class="hardskill_value" value="" style="width:300px;"/>
            <span class="repeater_hardskill_add_btn" >Add</span> |
            <span class="repeater_hardskill_remove_btn" >Remove</span>
        </td></tr>';
    }

    $template = "<script type='template' id='hardskill_repeat_field_template'>";
    $template .= '<tr class="repeater_hardskill"><td><input type="text" name="hardskill_title[]" id="hardskill_title" class="hardskill_title" value="" style="width:300px; text-align:center;"/></td>';
    $template .= '<td><input type="text" name="hardskill_value[]" id="hardskill_value" class="hardskill_value" value="" style="width:300px;"/>
            <span class="repeater_hardskill_add_btn" >Add</span> |
            <span class="repeater_hardskill_remove_btn" >Remove</span>
        </td></tr>';

    $template .= "</script>";

    $outline .= $repeatInput;
    $outline .= '</table>';
   
   $outline .= '<style type="text/css">.repeater_hardskill span{cursor:pointer;}</style>';

   $outline .= $template;
   $outline .= '</div>';
 
    echo $outline;
}

/* Do something with the data entered */
add_action( 'save_post', 'personal_info_hardskill_save_metabox' );
function personal_info_hardskill_save_metabox( $post_id ) {
 
        if ( 
            ! isset( $_POST['hardskill_metabox_nonce'] ) 
            || ! wp_verify_nonce( isset($_POST['hardskill_metabox_nonce']), 'hardskill_metabox_action' ) 
        ) {

          

        } else {

           // process form data
        }

       if( isset($_POST['hardskill_hidden_field']) and $_POST['hardskill_hidden_field'] == "active") {
        
 
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
        
 
        /* OK, it's safe for us to save the data now. */
 
        // Sanitize the user input.
        $hardskill_title = sanitize_text_field( json_encode($_POST['hardskill_title'] ));
        $hardskill_value = sanitize_text_field( json_encode($_POST['hardskill_value'] ));
        // Update the meta field.
        update_post_meta( $post_id, 'hardskill_title', $hardskill_title );
        update_post_meta( $post_id, 'hardskill_value', $hardskill_value );
    }
}