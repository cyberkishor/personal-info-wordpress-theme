<?php
/*
* template Name:Profile
* template post type: page
*/
get_header(); ?>
    <!-- Start Head section -->
       <header class="head">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class=" in_logo col-xs-8 col-sm-11 col-lg-11" >
                    <img class="logo-page" src="<?php echo esc_url( get_template_directory_uri() ) ?>/inc/img/profile.png" alt="Profile">
                    <!-- Title Page -->
                    <h2 class="title"><?php esc_html_e('Profile','personal-info');  ?></h2>
                    <!-- Description Page -->
                    <h4 class="sub-title"><?php esc_html_e('A Brief About Me','personal-info');  ?></h4>
                </div>
                <div class="col-xs-4 col-sm-1 col-lg-1 text-right">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-close hover-animate">
                    <img class="logo-page" src="<?php echo esc_url( get_template_directory_uri() ) ?>/inc/img/close.svg" >

                    </a>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </header>
    <!-- End Head section -->
    <!-- Start Content section -->
    <section class="content border-bottom padding-block">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-7">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-5">
                    <div class="block-grey">
                        <table>
                            <tbody><tr>
                                <td class="font-weight-m"><?php esc_html_e('Name','personal-info');  ?></td>
                                <td class="text-right">
                                    <?php
                                        $profile_info = json_decode(get_post_meta(get_the_ID(), 'personal_info_profile_info', true ));
                                        if( !is_object($profile_info)){
                                            $profile_info = (object) array('name'=>"Dummny Name",'date_of_birth'=>"29-10-20",'email'=>"example@example.com",'address'=>"address",'phone'=>"90000000",'website'=>"http://example.com");
                                        }
                                        echo esc_attr($profile_info->name);    
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-m"><?php esc_html_e('Date of birth','personal-info');  ?></td>
                                <td class="text-right">
                                    <?php  echo esc_attr($profile_info->date_of_birth);     ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-m"><?php esc_html_e('E-mail','personal-info');  ?></td>
                                <td class="text-right"><a href="<?php  echo sanitize_email($profile_info->email);     ?>">
                                    <?php  echo sanitize_email($profile_info->email);     ?>
                                </a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-m"><?php esc_html_e('Address','personal-info');  ?></td>
                                <td class="text-right">
                                    <?php echo esc_attr($profile_info->address);     ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-m"><?php esc_html_e('Phone','personal-info');  ?></td>
                                <td class="text-right"><a href="tel:<?php echo esc_url($profile_info->phone); ?>">
                                    <?php echo esc_attr($profile_info->phone);     ?>
                                </a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-m"><?php esc_html_e('Website','personal-info');  ?></td>
                                <td class="text-right"><a href="<?php echo esc_url($profile_info->website);     ?>">
                                    <?php echo esc_url($profile_info->website);     ?>
                                </a></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <?php endwhile; ?>
    <!-- End Content section -->
    <?php $working_title = json_decode(get_post_meta(get_the_ID(), 'working_title', true ));
        $working_icon = json_decode(get_post_meta(get_the_ID(), 'working_icon', true ));   
    ?>
 <?php if( is_array( $working_title)) {  ?>                    
 <section class="methods padding-block text-center">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h3 class="title"><?php esc_html_e('My Way of Working','personal-info');  ?></h3>
                </div>
            </div>
            <!-- end row -->
            <!-- start row -->
            <div class="processes">
                    <?php      
                        if( is_array( $working_title)) {
                        
                        foreach ($working_icon as $key => $value) {
                    ?>
                    <div class="process">
                        <i class="<?php echo esc_attr($value); ?> fa-3x " ></i>
                        <h4><?php echo esc_attr($working_title[$key]); ?></h4>
                    </div>
                    <?php }}  ?>       
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
 </section>
 <?php } ?>
    <!-- Start Info section -->
    <?php           
        $what_im_doing_title = json_decode(get_post_meta(get_the_ID(), 'what_im_doing_title', true ));
        $what_im_doing_icon = json_decode(get_post_meta(get_the_ID(), 'what_im_doing_icon', true ));    
     ?>
     <?php if( is_array( $what_im_doing_title)) {  ?>
    <section class="info border-bottom padding-block text-center">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h3 class="title"><?php esc_html_e('What im doing','personal-info');  ?></h3>
                </div>
            </div>
            <!-- end row -->
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                        <?php 
                       if( is_array( $what_im_doing_title)) {
                            foreach ($what_im_doing_icon as $key => $value) {
                        ?>
                        <div class="circle-block col-md-4 col-sm-12 col-xs-12 ">
                            <span class="icon hover-animate"><i class="<?php echo esc_attr($value); ?>"></i></span>
                            <span class="name hover-animate"><?php echo esc_attr($what_im_doing_title[$key]); ?></span>
                        </div>
                        <?php }}  ?>     
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <?php } ?>
    <!-- End Info section -->  
<?php
get_footer();