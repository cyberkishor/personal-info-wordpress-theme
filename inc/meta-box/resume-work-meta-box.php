<?php
//Register Meta Box
function personal_info_work_meta_box() {
    add_meta_box( 'personal_info_work_meta_box', esc_html__( 'Sparkle Work ', 'personal-info' ), 'personal_info_work_box_callback', 'page', 'advanced', 'high' );
}
add_action( 'add_meta_boxes', 'personal_info_work_meta_box');
//Add field
function personal_info_work_box_callback( $meta_id ) {
    $outline = "<div id='work_wrapper'><input type='hidden' name='work_hidden_field' id='work_hidden_field' >"; 
    $outline .= '<label for="work_company_name" style="width:150px; display:inline-block;">'. esc_html__('Company Name', 'personal-info') .'</label>';
    $outline .=  wp_nonce_field( 'work_metabox_action', 'work_metabox_nonce' );
    $resume_work_info = json_decode(get_post_meta( $meta_id->ID, 'resume_work_info', true ));
    if( !$resume_work_info ) {
        $resume_work_info = (object) array('company_name' => "",'address'=>"",'period'=>"",'post'=>"",'description'=>"");
    }
    $outline .= '<input type="text" name="resume_work_info[company_name]" id="work_company_name" class="work_company_name" value="'. esc_attr($resume_work_info->company_name) .'" style="width:300px;"/>';

    $outline .= '<br><label for="work_address" style="width:150px; display:inline-block;">'. esc_html__('Address', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="resume_work_info[address]" id="work_address" class="work_address" value="'. esc_attr($resume_work_info->address) .'" style="width:300px;"/>';

    $outline .= '<br><label for="work_period" style="width:150px; display:inline-block;">'. esc_html__('Period', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="resume_work_info[period]" id="work_period" class="work_period" value="'. esc_attr($resume_work_info->period) .'" style="width:300px;"/>';

    $outline .= '<br><label for="work_post" style="width:150px; display:inline-block;">'. esc_html__('Post', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="resume_work_info[post]" id="work_post" class="work_post" value="'. esc_attr($resume_work_info->post) .'" style="width:300px;"/>';

    $outline .= '<br><label for="work_description" style="width:150px; display:inline-block;">'. esc_html__('Description', 'personal-info') .'</label>';
    $outline .= '<input type="textarea" height="6" width="10" name="resume_work_info[description]" id="work_description" class="work_description" value="'. esc_attr($resume_work_info->description) .'" style="width:300px;"/>';
    $outline .= '</div>';   

    echo $outline;
}
/* Do something with the data entered */
add_action( 'save_post', 'personal_info_save_work_metabox' );
function personal_info_save_work_metabox( $post_id ) {

   if ( ! isset( $_POST['work_metabox_nonce'] ) 
        || ! wp_verify_nonce( $_POST['work_metabox_nonce'], 'work_metabox_action' ) 
    ) {


   } else {

           // process form data
   }

   if( isset($_POST['work_hidden_field']) and $_POST['work_hidden_field'] == "active") {

        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
        
 
        /* OK, it's safe for us to save the data now. */

        $resume_work_info = sanitize_text_field( json_encode($_POST['resume_work_info'] ));


        // Update the meta field.
        update_post_meta( $post_id, 'resume_work_info', $resume_work_info );
    }
}