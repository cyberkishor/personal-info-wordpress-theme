<?php
//Register Meta Box
function personal_info_hobbise_meta_box() {
    add_meta_box( 'personal_info_hobbise_meta_box', esc_html__( 'Hobbise and Intrest', 'personal-info' ), 'personal_info_hobbise_box_callback', 'page', 'advanced', 'high' );
}
add_action( 'add_meta_boxes', 'personal_info_hobbise_meta_box');

//Add field
function personal_info_hobbise_box_callback( $meta_id ) {
   
   $outline = "<div id='hobbise_wrapper'><input type='hidden' name='hobbise_hidden_field' id='hobbise_hidden_field' >";
   $outline .= '<table class="table_hobbise"><tr>';
   $outline .=  wp_nonce_field( 'hobbise_metabox_action', 'hobbise_metabox_nonce' );
   $outline .= '<td><label for="hobbise_name" style="width:150px; text-align:center; display:inline-block;">'. esc_html__('Hobbise Name', 'personal-info') .'</label></td>';
   $outline .= '<td><label for="hobbise_icon" style="width:150px; display:inline-block;">'. esc_html__('Hobbise Icon (Font Awesome Icon)', 'personal-info') .'</label></td>';
   $outline .="</tr>";

   $hobbise_name = json_decode(get_post_meta( $meta_id->ID, 'hobbise_name', true ));

   $hobbise_icon = json_decode(get_post_meta( $meta_id->ID, 'hobbise_icon', true ));
   $repeatInput = '';
   if( is_array( $hobbise_name)) {

    foreach ($hobbise_name as $key => $value) {
        $repeatInput .= '<tr class="repeater_hobbise"><td><input type="text" name="hobbise_name[]" id="hobbise_name" class="hobbise_name" value="'. esc_attr($hobbise_name[$key]) .'" style="width:300px; text-align:center;"/></td>';
        $repeatInput .= '<td><input type="text" name="hobbise_icon[]" id="hobbise_icon" class="hobbise_icon" value="'. esc_attr($hobbise_icon[$key]) .'" style="width:300px;"/>
        <span class="repeater_hobbise_add_btn" >Add</span> |
        <span class="repeater_hobbise_remove_btn" >Remove</span>
        </td></tr>';
    }
}else{
    $repeatInput .= '<tr class="repeater_hobbise"><td><input type="text" name="hobbise_name[]" id="hobbise_name" class="hobbise_name" value="" style="width:300px; text-align:center;"/></td>';
    $repeatInput .= '<td><input type="text" name="hobbise_icon[]" id="hobbise_icon" class="hobbise_icon" value="" style="width:300px;"/>
    <span class="repeater_hobbise_add_btn" >Add</span> |
    <span class="repeater_hobbise_remove_btn" >Remove</span>
    </td></tr>';
}

$template = "<script type='template' id='hobbise_repeat_field_template'>";
$template .= '<tr class="repeater_hobbise"><td><input type="text" name="hobbise_name[]" id="hobbise_name" class="hobbise_name" value="" style="width:300px; text-align:center;"/></td>';
$template .= '<td><input type="text" name="hobbise_icon[]" id="hobbise_icon" class="hobbise_icon" value="" style="width:300px;"/>
<span class="repeater_hobbise_add_btn" >Add</span> |
<span class="repeater_hobbise_remove_btn" >Remove</span>
</td></tr>';

$template .= "</script>";

$outline .= $repeatInput;
$outline .= '</table>';

$outline .= '<style type="text/css">.repeater_hobbise span{cursor:pointer;}</style>';

$outline .= $template;
$outline .= '</div>';

echo $outline;
}

/* Do something with the data entered */
add_action( 'save_post', 'personal_info_save_hobbise_metabox' );
function personal_info_save_hobbise_metabox( $post_id ) {
   
    if ( 
        ! isset( $_POST['hobbise_metabox_nonce'] ) 
        || ! wp_verify_nonce( isset($_POST['hobbise_metabox_nonce']), 'hobbise_metabox_action' ) 
    ) {

     

    } else {

           // process form data
    }
    
    if( isset($_POST['hobbise_hidden_field']) and $_POST['hobbise_hidden_field'] == "active") {
        
       
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
        
 
        /* OK, it's safe for us to save the data now. */
        
        // Sanitize the user input.
        $hobbise_name = sanitize_text_field( json_encode($_POST['hobbise_name'] ));
        $hobbise_icon = sanitize_text_field( json_encode($_POST['hobbise_icon'] ));
        // Update the meta field.
        update_post_meta( $post_id, 'hobbise_name', $hobbise_name );
        update_post_meta( $post_id, 'hobbise_icon', $hobbise_icon );
    }
}