<?php

//Register Meta Boxsdf
function personal_info_contact_meta_box() {
    add_meta_box( 'personal_info_contact_meta_box', esc_html__( 'Sparkle Contact ','personal-info'  ), 'personal_info_contact_box_callback', 'page', 'advanced', 'high' );
}
add_action( 'add_meta_boxes', 'personal_info_contact_meta_box');

//Add field
function personal_info_contact_box_callback( $meta_id ) {
    $outline = "<div id='contact_wrapper'><input type='hidden' name='contact_hidden_field' id='contact_hidden_field' >";
 
    $outline .= '<label for="contact_address" style="width:150px; display:inline-block;">'. esc_html__('Address', 'personal-info') .'</label>';
    $outline .=  wp_nonce_field( 'contact_metabox_action', 'contact_metabox_nonce' );
    $contact_info = json_decode(get_post_meta( $meta_id->ID, 'personal_info_contact_info', true ));
    if( !$contact_info ) {
        $contact_info = (object) array('address' => "",'phone'=>"",'email'=>"",'skype'=>"",'website'=>"");
    }
    $outline .= '<input type="text" name="personal_info_contact_info[address]" id="contact_address" class="contact_address" value="'. esc_attr($contact_info->address) .'" style="width:300px;"/>';

    $outline .= '<br><label for="contact_phone_no" style="width:150px; display:inline-block;">'. esc_html__('Phone No', 'personal-info') .'</label>';    
    $outline .= '<input type="text" name="personal_info_contact_info[phone]" id="contact_phone_no" class="contact_phone_no" value="'. esc_attr($contact_info->phone) .'" style="width:300px;"/>';

    $outline .= '<br><label for="contact_email" style="width:150px; display:inline-block;">'. esc_html__('Email Address', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="personal_info_contact_info[email]" id="contact_email" class="contact_email" value="'. esc_attr($contact_info->email) .'" style="width:300px;"/>';

    $outline .= '<br><label for="skype" style="width:150px; display:inline-block;">'. esc_html__('Skype', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="personal_info_contact_info[skype]" id="contact_skype" class="contact_skype" value="'. esc_attr($contact_info->skype) .'" style="width:300px;"/>';

    $outline .= '<br><label for="contact_website" style="width:150px; display:inline-block;">'. esc_html__('Website', 'personal-info') .'</label>';
     $outline .= '<input type="text" name="personal_info_contact_info[website]" id="contact_website" class="contact_website" value="'. esc_attr($contact_info->website) .'" style="width:300px;"/>';
     $outline .= '</div>';
    echo $outline;
}

/* Do something with the data entered */
add_action( 'save_post', 'personal_info_save_contact_metabox' );
function personal_info_save_contact_metabox( $post_id ) {
 
         if ( 
            ! isset($_POST['contact_metabox_nonce'] ) 
            || ! wp_verify_nonce(sanitize_key(isset($_POST['contact_metabox_nonce']), 'contact_metabox_action' )) 
        ) {
        } else {

           // process form data
        }
       
        if( isset($_POST['contact_hidden_field']) and esc_url($_POST['contact_hidden_field'] == "active")) {
       
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
        /* OK, it's safe for us to save the data now. */
 
        // Sanitize the user input.
        $contact_address = sanitize_text_field( json_encode($_POST['personal_info_contact_info'] ));
      

        // Update the meta field.
        update_post_meta( $post_id, 'personal_info_contact_info', $contact_address );
    }
}