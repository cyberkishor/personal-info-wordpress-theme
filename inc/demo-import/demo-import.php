<?php
/**
 * Demo Import Functions Hear.
 * 
 */
function personal_info_import_files() {
    return array(
      array(
        'import_file_name'           => 'Default',
        'categories'                 => array('Personal'),
        'import_file_url'            => 'http://demo.spiderbuzz.com/deom-data/personal-info/default/all-content.xml',
        'import_widget_file_url'     => 'http://demo.spiderbuzz.com/deom-data/personal-info/default/widget.wie',
        'import_customizer_file_url' => 'http://demo.spiderbuzz.com/deom-data/personal-info/default/customizer.dat',
        
        'import_preview_image_url'   => 'https://spiderbuzz.com/wp-content/uploads/2017/09/info.png',
        'import_notice'              => __( 'Before the demo import please install required plugin and install then only click demo import Button.', 'personal-info' ),
        'preview_url'                => 'http://demo.spiderbuzz.com/personal-info/',
      ),

      array(
        'import_file_name'           => 'Default',
        'categories'                 => array('Personal'),
        'import_file_url'            => 'http://demo.spiderbuzz.com/deom-data/personal-info/default/all-content.xml',
        'import_widget_file_url'     => 'http://demo.spiderbuzz.com/deom-data/personal-info/default/widget.wie',
        'import_customizer_file_url' => 'http://demo.spiderbuzz.com/deom-data/personal-info/default/customizer.dat',
        
        'import_preview_image_url'   => 'https://spiderbuzz.com/wp-content/uploads/2017/09/info.png',
        'import_notice'              => __( 'Before the demo import please install required plugin and install then only click demo import Button.', 'personal-info' ),
        'preview_url'                => 'http://demo.spiderbuzz.com/personal-info/',
      ),
      
      
    );
  }
  add_filter( 'pt-ocdi/import_files', 'personal_info_import_files' );




/*****************************************************************
*         After Demo Import Functions
*************************************************************/
  function personal_info_after_import_setup() {
  // Assign menus to their locations.
  $main_menu = get_term_by( 'name', 'main menu', 'nav_menu' );

  set_theme_mod( 'nav_menu_locations', array(
    'primary' => $main_menu->term_id,
    )
  );

  // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title( 'Home' );
  $blog_page_id  = get_page_by_title( 'Blog' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'personal_info_after_import_setup' );