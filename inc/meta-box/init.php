<?php
//require a contact meta box
require_once get_template_directory().'/inc/meta-box/profile-meta-box.php';
require_once get_template_directory().'/inc/meta-box/contact-meta-box.php';
//require resume work meta box
require get_template_directory().'/inc/meta-box/resume-work-meta-box.php';
//require a resume soft skill meta box
require get_template_directory().'/inc/meta-box/resume-softskill-meta-box.php';
//require a hard skill  meta box
require get_template_directory().'/inc/meta-box/resume-hardskill-meta-box.php';
//require a hobbise skill meta box
require get_template_directory().'/inc/meta-box/resume-hobbise-meta-box.php';
require get_template_directory().'/inc/meta-box/profile-working-meta-box.php';
 //working a profile what im doing metabox 
require get_template_directory().'/inc/meta-box/profile-what-im-doing-meta-box.php';
//resume  education metabox
require get_template_directory().'/inc/meta-box/resume-education-meta-box.php';
require get_template_directory().'/inc/meta-box/page-title.php';

function enqueue_files() {
	wp_enqueue_script( 'metabox-js', get_template_directory_uri().'/js/admin/meta-box.js', array('jquery'), '20170925', true );
}
add_action( 'admin_enqueue_scripts', 'enqueue_files' );