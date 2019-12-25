<?php
//Register Meta Box
function personal_info_sparkle_working_meta_box() {
    add_meta_box( 'personal_info_sparkle_working_meta_box', esc_html__( 'My Way of Working ', 'personal-info' ), 'personal_info_working_box_callback', 'page', 'advanced', 'high' );
}
add_action( 'add_meta_boxes', 'personal_info_sparkle_working_meta_box');
 
//Add field
function personal_info_working_box_callback( $meta_id ) {
    $outline = "<div id='working_wrapper'><input type='hidden' name='working_hidden_field' id='working_hidden_field' >";
    $outline .= '<table class="table_working"><tr>';
    $outline .=  wp_nonce_field( 'working_metabox_action', 'working_metabox_nonce' );
    $outline .= '<td><label for="working_title" style="width:150px; text-align:center; display:inline-block;">'. esc_html__('Way of Working Title', 'personal-info') .'</label></td>';
    $outline .= '<td><label for="working_value" style="width:150px; display:inline-block;">'. esc_html__('Way of Working Icon ','personal-info') .'</label></td>';
    $outline .="</tr>";

    $working_title = json_decode(get_post_meta( $meta_id->ID, 'working_title', true ));

    $working_icon = json_decode(get_post_meta( $meta_id->ID, 'working_icon', true ));
    $repeatInput = '';
    if( is_array( $working_title)) {

    foreach ($working_title as $key => $value) {
        $repeatInput .= '<tr class="repeater_working_profile"><td><input type="text" name="working_title[]" id="working_title" class="working_title" value="'. esc_attr($working_title[$key]) .'" style="width:300px; text-align:center;"/></td>';
        $repeatInput .= '<td><input type="text" name="working_icon[]" id="working_icon" class="working_icon" value="'. esc_attr($working_icon[$key]) .'" style="width:300px;"/>
            <span class="repeater_working_add_btn" >Add</span> |
            <span class="repeater_working_remove_btn" >Remove</span>
        </td></tr>';
    }
    }else{
         $repeatInput .= '<tr class="repeater_working_profile"><td><input type="text" name="working_title[]" id="working_title" class="working_title" value="'. esc_attr($working_title) .'" style="width:300px; text-align:center;"/></td>';
        $repeatInput .= '<td><input type="text" name="working_icon[]" id="working_icon" class="working_icon" value="'. esc_attr($working_icon) .'" style="width:300px;"/>
            <span class="repeater_working_add_btn" >Add</span> |
            <span class="repeater_working_remove_btn" >Remove</span>
        </td></tr>';
    }

    $template = "<script type='template' id='working_repeat_field_template'>";
    $template .= '<tr class="repeater_working_profile"><td><input type="text" name="working_title[]" id="working_title" class="working_title" value="" style="width:300px; text-align:center;"/></td>';
    $template .= '<td><input type="text" name="working_icon[]" id="working_icon" class="working_icon" value="" style="width:300px;"/>
            <span class="repeater_working_add_btn" >Add</span> |
            <span class="repeater_working_remove_btn" >Remove</span>
        </td></tr>';

    $template .= "</script>";

    $outline .= $repeatInput;
    $outline .= '</table>';
   
   $outline .= '<style type="text/css">.repeater_working_profile span{cursor:pointer;}</style>';

   $outline .= $template;
   $outline .= '</div>';
 
    echo $outline;
}

/* Do something with the data entered */
add_action( 'save_post', 'personal_info_working_save_metabox' );
function personal_info_working_save_metabox( $post_id ) {
 
        if ( 
            ! isset( $_POST['working_metabox_nonce'] ) 
            || ! wp_verify_nonce( isset($_POST['working_metabox_nonce']), 'working_metabox_action' ) 
        ) {

        } else {

           // process form data
        }

       if( isset($_POST['working_hidden_field']) and $_POST['working_hidden_field'] == "active") {
        
 
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
        
 
        /* OK, it's safe for us to save the data now. */
 
        // Sanitize the user input.
        $working_title = sanitize_text_field( json_encode($_POST['working_title'] ));
        $working_icon = sanitize_text_field( json_encode($_POST['working_icon']));
        // Update the meta field.
        update_post_meta( $post_id, 'working_title', $working_title );
        update_post_meta( $post_id, 'working_icon', $working_icon );
    }
}