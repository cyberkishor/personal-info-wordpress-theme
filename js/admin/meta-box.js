jQuery(document).ready(function($){
	var metabox = $(".meta-box-sortables ");
	
	function hideAllMetaBox() {
		jQuery("#personal_info_contact_meta_box").hide();
		jQuery('#personal_info_sparkle_working_meta_box').hide();
		jQuery('#personal_info_what_im_doing_meta_box').hide();
		jQuery('#personal_info_work_meta_box').hide();
		jQuery('#personal_info_softskill_meta_box').hide();
		jQuery('#personal_info_hardskill_meta_box').hide();
		jQuery('#personal_info_hobbise_meta_box').hide();
		jQuery('#personal_info_profile_meta_box').hide();
		jQuery('#personal_info_resume_education_meta_box').hide();

		jQuery("#profile_hidden_field").val('');
		jQuery("#contact_hidden_field").val('');
		jQuery("#what_im_doing_hidden_field").val('');
		jQuery("#working_hidden_field").val('');
		jQuery("#education_hidden_field").val('');
		jQuery("#hardskill_hidden_field").val('');
		jQuery("#hobbise_hidden_field").val('');
		jQuery("#softskill_hidden_field").val('');
		jQuery("#work_hidden_field").val('');
	}

	var element = $('#page_template');
	var page_template = element.val();
	element.trigger("change");
	setTimeout(function(){
		element.trigger("change");
	},100)
	element.change(function(){
		page_template = $(this).val();

		switch(page_template){

			case"page-templates/contact.php":
				hideAllMetaBox();
				metabox.find("#personal_info_contact_meta_box").show();
				metabox.find("#contact_hidden_field").val("active");
				break;
			case"page-templates/profile.php":
				hideAllMetaBox();
				metabox.find('#personal_info_profile_meta_box').show();
				metabox.find("#personal_info_profile_meta_box-hide").val("active");
				metabox.find("#profile_hidden_field").val("active");

				metabox.find('#personal_info_sparkle_working_meta_box').show();
				metabox.find("#working_hidden_field").val("active");

				metabox.find('#personal_info_what_im_doing_meta_box').show();
				metabox.find("#what_im_doing_hidden_field").val("active");
				break;
			case"page-templates/resume.php":
			
				hideAllMetaBox();
				metabox.find('#personal_info_resume_education_meta_box').show();
				metabox.find('#personal_info_work_meta_box').show();
				metabox.find('#personal_info_softskill_meta_box').show();
				metabox.find('#personal_info_hardskill_meta_box').show();
				metabox.find('#personal_info_hobbise_meta_box').show();

				metabox.find("#education_hidden_field").val("active");
				metabox.find("#softskill_hidden_field").val("active");
				metabox.find("#work_hidden_field").val("active");
				metabox.find("#hardskill_hidden_field").val("active");
				metabox.find("#hobbise_hidden_field").val("active");
				break;
			case"page-templates/portfolio.php":
				hideAllMetaBox();
				break; 
			case "page-templates/home.php":
				hideAllMetaBox();
				break;
			default:
				hideAllMetaBox();
				
		}
	})

/**
 * Repeator Field
 */
 	jQuery(document).on('click','.repeater_softskill_add_btn',function(){
 		jQuery(".table_softskill").append(softskill_repeat_field_template.innerHTML)
 	})

 	jQuery(document).on('click', '.repeater_hardskill_add_btn',function(){
 		jQuery(".table_hardskill").append(hardskill_repeat_field_template.innerHTML)
 	})

 	jQuery(document).on('click', '.repeater_hobbise_add_btn',function(){
 		jQuery(".table_hobbise").append(hobbise_repeat_field_template.innerHTML)
 	})
 	jQuery(document).on('click', '.repeater_working_add_btn',function(){
 		jQuery(".table_working").append(working_repeat_field_template.innerHTML)
 	})

 	jQuery(document).on('click','.repeater_what_im_doing_add_btn',function(){
 		jQuery(".table_what_im_doing").append(what_im_doing_repeat_field_template.innerHTML)
 	})

 	jQuery(document).on('click','.repeater_remove_btn',function(){
 		if(jQuery(".table_softskill").find("tr.repeater_softskill").length > 1){
 			jQuery(this).parents('tr').remove();
 		}
 	})

 	jQuery(document).on('click', '.repeater_hardskill_remove_btn',function(){
 		if(jQuery(".table_hardskill").find("tr.repeater_hardskill").length > 1){
 			jQuery(this).parents('tr').remove();
 		}
 	})

 	jQuery(document).on('click', '.repeater_hobbise_remove_btn',function(){
 		if( jQuery(".table_hobbise").find("tr.repeater_hobbise").length > 1){
 			jQuery(this).parents('tr').remove();
 		}
 	})

 	jQuery(document).on('click', '.repeater_working_remove_btn',function(){
 		if( jQuery(".table_working").find("tr.repeater_working_profile").length > 1){
 			jQuery(this).parents('tr').remove();
 		}
 	})

 	jQuery(document).on('click', '.repeater_what_im_doing_remove_btn',function(){
 		if( jQuery(".table_what_im_doing").find("tr.repeater_what_im_doing_profile").length > 1){
 			jQuery(this).parents('tr').remove();
 		}
 	})
 	
 	jQuery( document ).ready( function( $ ) {
			// Uploading files
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.url; // Store the old id
			var set_to_post_id = "";
			jQuery('#upload_image_button').on('click', function( event ){
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}
				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select a image to upload',
					button: {
						text: 'Use this image',
					},
					multiple: false	// Set to true to allow multiple files to be selected
				});
				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();
					// Do something with attachment.id and/or attachment.url here
					$( '#image-preview' ).attr( 'src', attachment.url ).parent().removeClass('hidden');
					$( '#title_image_upload_button' ).val( attachment.url );
					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});
					// Finally, open the modal
					file_frame.open();
			});
			
		});

});