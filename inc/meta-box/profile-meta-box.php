<?php
//Register Meta Box
function personal_info_profile_meta_box() {
    add_meta_box( 'personal_info_profile_meta_box', esc_html__( 'Profile ', 'personal-info' ), 'personal_info_profile_box_callback', 'page', 'advanced', 'high' );
}
add_action( 'add_meta_boxes', 'personal_info_profile_meta_box');
 
//Add field
function personal_info_profile_box_callback( $meta_id ) {
    $outline = "<div id='profile_wrapper'><input type='hidden' name='profile_hidden_field' id='profile_hidden_field' >";
    $outline .= '<label for="profile_name" style="width:150px; display:inline-block;">'. esc_html__('Name', 'personal-info') .'</label>';
    $outline .=  wp_nonce_field( 'profile_metabox_action', 'profile_metabox_nonce' );
    $profile_info = json_decode(get_post_meta( $meta_id->ID, 'personal_info_profile_info', true ));
    if( !$profile_info  ) {
        $profile_info = (object) array('name' => "",'date_of_birth'=>"",'email'=>"",'address'=>"",'phone'=>"",'website'=>"");
    }
    
    $outline .= '<input type="text" name="personal_info_profile_info[name]" id="profile_name" class="profile_name" value="'. esc_attr($profile_info->name) .'" style="width:300px;"/>';

    $outline .= '<br><label for="profile_date_of_birth" style="width:150px; display:inline-block;">'. esc_html__('Date Of Birth', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="personal_info_profile_info[date_of_birth]" id="profile_date_of_birth" class="profile_date_of_birth" value="'. esc_attr($profile_info->date_of_birth) .'" style="width:300px;"/>';

    $outline .= '<br><label for="profile_email" style="width:150px; display:inline-block;">'. esc_html__('Email', 'personal-info') .'</label>';
    $outline .= '<input type="email" name="personal_info_profile_info[email]" id="profile_email" class="profile_email" value="'. esc_attr($profile_info->email) .'" style="width:300px;"/>';

    $outline .= '<br><label for="profile_address" style="width:150px; display:inline-block;">'. esc_html__('Address', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="personal_info_profile_info[address]" id="profile_address" class="profile_address" value="'. esc_attr($profile_info->address) .'" style="width:300px;"/>';

    $outline .= '<br><label for="profile_phone_no" style="width:150px; display:inline-block;">'. esc_html__('Phone No', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="personal_info_profile_info[phone]" id="profile_phone_no" class="profile_phone_no" value="'. esc_attr($profile_info->phone) .'" style="width:300px;"/>';

    $outline .= '<br><label for="profile_website" style="width:150px; display:inline-block;">'. esc_html__('Website', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="personal_info_profile_info[website]" id="profile_website" class="profile_website" value="'. esc_attr($profile_info->website) .'" style="width:300px;"/>';
    $outline .= '</div>';

    echo $outline;
}

/* Do something with the data entered */
add_action( 'save_post', 'personal_info_save_profile_metabox' );
function personal_info_save_profile_metabox( $post_id ) {

    if ( 
        ! isset( $_POST['profile_metabox_nonce'] ) 
        || ! wp_verify_nonce( isset($_POST['profile_metabox_nonce']), 'profile_metabox_action' ) 
    ) {
        $profile_metabox_nonce = wp_unslash( isset($_POST['profile_metabox_nonce']) );
    } else {

       // process form data
    }
    $profile_metabox_nonce = sanitize_text_field( wp_unslash( isset($_POST['profile_metabox_nonce'] )) );


    if( isset($_POST['profile_hidden_field']) and $_POST['profile_hidden_field'] == "active") {
       
    
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.

        

        /* OK, it's safe for us to save the data now. */

        // Sanitize the user input.
        $profile_info = sanitize_text_field( json_encode( $_POST['personal_info_profile_info'] ));
      
        // Update the meta field.
        update_post_meta( $post_id, 'personal_info_profile_info', $profile_info );
    }
   
}