<?php
//Register Meta Box
function personal_info_resume_education_meta_box() {
    add_meta_box( 'personal_info_resume_education_meta_box', esc_html__( 'Education', 'personal-info' ), 'personal_info_resume_education_box_callback', 'page', 'advanced', 'high' );
}
add_action( 'add_meta_boxes', 'personal_info_resume_education_meta_box');
 
//Add field
function personal_info_resume_education_box_callback( $meta_id ) {
    $outline = "<div id='education_wrapper'><input type='hidden' name='education_hidden_field' id='education_hidden_field' >"; 
    $outline .= '<label for="institute_name" style="width:150px; display:inline-block;">'. esc_html__('Name', 'personal-info') .'</label>';
    $outline .=  wp_nonce_field( 'education_metabox_action', 'education_metabox_nonce' );
    $resume_education_info = json_decode(get_post_meta( $meta_id->ID, 'resume_education_info', true ));
    if( !$resume_education_info ) {
        $resume_education_info = (object) array('name' => "",'address'=>"",'period'=>"",'label'=>"",'description'=>"");
    }
    $outline .= '<input type="text" name="resume_education_info[name]" id="education_name" class="work_company_name" value="'. esc_attr($resume_education_info->name) .'" style="width:300px;"/>';

    $outline .= '<br><label for="work_address" style="width:150px; display:inline-block;">'. esc_html__('Address', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="resume_education_info[address]" id="work_address" class="work_address" value="'. esc_attr($resume_education_info->address) .'" style="width:300px;"/>';

    $outline .= '<br><label for="work_period" style="width:150px; display:inline-block;">'. esc_html__('Period', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="resume_education_info[period]" id="work_period" class="work_period" value="'. esc_attr($resume_education_info->period) .'" style="width:300px;"/>';

    $outline .= '<br><label for="work_post" style="width:150px; display:inline-block;">'. esc_html__('Post', 'personal-info') .'</label>';
    $outline .= '<input type="text" name="resume_education_info[label]" id="work_post" class="work_post" value="'. esc_attr($resume_education_info->label) .'" style="width:300px;"/>';

    $outline .= '<br><label for="work_description" style="width:150px; display:inline-block;">'. esc_html__('Description', 'personal-info') .'</label>';
    $outline .= '<input type="textarea" height="6" width="10" name="resume_education_info[description]" id="work_description" class="work_description" value="'. esc_attr($resume_education_info->description) .'" style="width:300px;"/>';
    $outline .= '</div>';   
 
    echo $outline;
}
/* Do something with the data entered */
add_action( 'save_post', 'personal_info_save_education_metabox' );
function personal_info_save_education_metabox( $post_id ) {
 
         if ( 
            ! isset( $_POST['education_metabox_nonce'] ) 
            || ! wp_verify_nonce( isset($_POST['education_metabox_nonce']), 'education_metabox_action' ) 
        ) {

           
        } else {

           // process form data
        }

       
        
        if( isset($_POST['education_hidden_field']) and $_POST['education_hidden_field'] == "active") {
 
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
        
 
        /* OK, it's safe for us to save the data now. */

        $resume_education_info = sanitize_text_field( json_encode($_POST['resume_education_info'] ));
      

        // Update the meta field.
        update_post_meta( $post_id, 'resume_education_info', $resume_education_info );
      
    }
}