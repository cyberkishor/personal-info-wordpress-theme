<?php
//Register Meta Box
function personal_info_page_title_metabox() {
    add_meta_box( 'personal_info_page_title_metabox', esc_html__( 'Page Info', 'personal-info' ), 'personal_info_page_title_meta_box_callback', 'page', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'personal_info_page_title_metabox');
//Add field
function personal_info_page_title_meta_box_callback( $meta_id ) {
	wp_enqueue_media();
    $outline = "<div id='page_title_info_wrapper'><input type='hidden' name='page_title_hidden_field' value='active' id='page_title_hidden_field' >"; 
    $outline .= '<label for="page_info_subtitle" style="width:150px; display:inline-block;">'. esc_html__('Page Sub title', 'personal-info') .'</label>';
    $outline .=  wp_nonce_field( 'page_title_metabox_action', 'page_title_metabox_nonce' );
    $personal_page_info = json_decode(get_post_meta( $meta_id->ID, 'personal_page_info', true ));
    if( !$personal_page_info ) {
        $personal_page_info = (object) array('subtitle' => "",'title_image'=>"");
    }
    // print_r($personal_page_info); exit;
    $outline .= '<input type="text" name="personal_page_info[subtitle]" id="page_info_subtitle" class="page_info_subtitle" value="'. esc_attr($personal_page_info->subtitle) .'" style="width:99%;"/>';

    $outline .= '<br><label for="title_image" style="width:150px; display:inline-block;">'. esc_html__('Title Image URL', 'personal-info') .'</label>';
    $outline .= '<input id="title_image_upload_button" type="text" name="personal_page_info[title_image]" class="title_image hidden" value="'. esc_attr($personal_page_info->title_image) .'" style="width:99%;"/>';
    $outline .= '<input id="upload_image_button" type="button" class="button" value="Upload image" />';
    
    $class = '';
    if(!$personal_page_info->title_image) $class = 'hidden';

    $outline .="<div class='image-preview-wrapper ".$class." '>
		<img id='image-preview' src='". esc_url($personal_page_info->title_image)."' width='100' height='100'>
		</div>";
    $outline .= '</div>';   

    echo $outline;
}
/* Do something with the data entered */
add_action( 'save_post', 'personal_info_save_page_title_metabox' );
function personal_info_save_page_title_metabox( $post_id ) {

   if ( ! isset( $_POST['page_title_metabox_nonce'] ) 
        || ! wp_verify_nonce( $_POST['page_title_metabox_nonce'], 'page_title_metabox_action' ) 
    ) {


   } else {

           // process form data
   }
   // print_r($_POST); exit;

   if( isset($_POST['page_title_hidden_field']) and $_POST['page_title_hidden_field'] == "active") {

        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
        
 
        /* OK, it's safe for us to save the data now. */

        $personal_page_info = sanitize_text_field( json_encode($_POST['personal_page_info'] ));


        // Update the meta field.
        update_post_meta( $post_id, 'personal_page_info', $personal_page_info );
    }
}