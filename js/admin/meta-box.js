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

	

	
	setTimeout(function(){
		var element = $('.editor-page-attributes__template .components-select-control__input');
		var page_template = $('#personal_info_template_val').val();
		personal_info_event(page_template);

		element.change(function(){
			page_template = $(this).val();

			//new new
			$( "#personal_info_template_val" ).attr( "value", page_template );

			//console.log('after some time ', page_template);
			personal_info_event(page_template);
			
		})
	},2000)


	function personal_info_event(page_template){
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
	}


	

	

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
	 
	 jQuery(document).on('load', '.editor-page-attributes__template .components-select-control__input',function(){
		jQuery(this).trigger("change");
	})


	

 	
 	
});