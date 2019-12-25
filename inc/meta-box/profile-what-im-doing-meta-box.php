<?php
//Register Meta Box
function personal_info_what_im_doing_meta_box() {
    add_meta_box( 'personal_info_what_im_doing_meta_box', esc_html__( 'What Im Doing ', 'personal-info' ), 'personal_info_what_im_doing_box_callback', 'page', 'advanced', 'high' );
}
add_action( 'add_meta_boxes', 'personal_info_what_im_doing_meta_box');
 
//Add field
function personal_info_what_im_doing_box_callback( $meta_id ) {
    $outline = "<div id='what_im_doing_wrapper'><input type='hidden' name='what_im_doing_hidden_field' id='what_im_doing_hidden_field' >";
    $outline .= '<table class="table_what_im_doing"><tr>';
    $outline .=  wp_nonce_field( 'what_im_doing_metabox_action', 'what_im_doing_metabox_nonce' );
    
    
    $outline .= '<td><label for="what_im_doing_title" style="width:150px; text-align:center; display:inline-block;">'. esc_html__('What Im Doing Title', 'personal-info') .'</label></td>';
    $outline .= '<td><label for="what_im_doing_value" style="width:150px; display:inline-block;">'. esc_html__('What Im Doing  Icon ','personal-info') .'</label></td>';
    $outline .="</tr>";

    $what_im_doing_title = json_decode(get_post_meta( $meta_id->ID, 'what_im_doing_title', true ));

    $what_im_doing_icon = json_decode(get_post_meta( $meta_id->ID, 'what_im_doing_icon', true ));
    
    $repeatInput = '';
    
    if( is_array( $what_im_doing_title)) {

    foreach ($what_im_doing_title as $key => $value) {
        $repeatInput .= '<tr class="repeater_what_im_doing_profile"><td><input type="text" name="what_im_doing_title[]" id="what_im_doing_title" class="what_im_doing_title" value="'. esc_attr($what_im_doing_title[$key]) .'" style="width:300px; text-align:center;"/></td>';
        $repeatInput .= '<td><input type="text" name="what_im_doing_icon[]" id="what_im_doing_icon" class="what_im_doing_icon" value="'. esc_attr($what_im_doing_icon[$key]) .'" style="width:300px;"/>
            <span class="repeater_what_im_doing_add_btn" >Add</span> |
            <span class="repeater_what_im_doing_remove_btn" >Remove</span>
        </td></tr>';
    }
    }else{
        
        $repeatInput .= '<tr class="repeater_what_im_doing_profile"><td><input type="text" name="what_im_doing_title[]" id="what_im_doing_title" class="what_im_doing_title" value="'. esc_attr($what_im_doing_title) .'" style="width:300px; text-align:center;"/></td>';
        $repeatInput .= '<td><input type="text" name="what_im_doing_icon[]" id="what_im_doing_icon" class="what_im_doing_icon" value="'.esc_attr($what_im_doing_icon) .'" style="width:300px;"/>
            <span class="repeater_what_im_doing_add_btn" >Add</span> |
            <span class="repeater_what_im_doing_remove_btn" >Remove</span>
        </td></tr>';
    }

    $template = "<script type='template' id='what_im_doing_repeat_field_template'>";
    $template .= '<tr class="repeater_what_im_doing_profile"><td><input type="text" name="what_im_doing_title[]" id="what_im_doing_title" class="what_im_doing_title" value="" style="width:300px; text-align:center;"/></td>';
    $template .= '<td><input type="text" name="what_im_doing_icon[]" id="what_im_doing_icon" class="what_im_doing_icon" value="" style="width:300px;"/>
            <span class="repeater_what_im_doing_add_btn" >Add</span> |
            <span class="repeater_what_im_doing_remove_btn" >Remove</span>
        </td></tr>';

    $template .= "</script>";

    $outline .= $repeatInput;
    $outline .= '</table>';
   
   $outline .= '<style type="text/css">.repeater_what_im_doing_profile span{cursor:pointer;}</style>';

   $outline .= $template;
   $outline .= '</div>';
 
    echo $outline;
}

/* Do something with the data entered */
add_action( 'save_post', 'personal_info_what_im_doing_save_metabox' );
function personal_info_what_im_doing_save_metabox( $post_id ) {
 
        if ( 
            ! isset( $_POST['what_im_doing_metabox_nonce'] ) 
            || ! wp_verify_nonce( isset($_POST['what_im_doing_metabox_nonce']), 'what_im_doing_metabox_action' ) 
        ) {
        } else {

           // process form data
        }
       if( isset($_POST['what_im_doing_hidden_field']) and $_POST['what_im_doing_hidden_field'] == "active") {
        
 
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
        
 
        /* OK, it's safe for us to save the data now. */
 
        // Sanitize the user input.
        $what_im_doing_title = sanitize_text_field( json_encode($_POST['what_im_doing_title'] ));
        $what_im_doing_icon = sanitize_text_field( json_encode($_POST['what_im_doing_icon'] ));
        // Update the meta field.
        update_post_meta( $post_id, 'what_im_doing_title', $what_im_doing_title );
        update_post_meta( $post_id, 'what_im_doing_icon', $what_im_doing_icon );
    }
}