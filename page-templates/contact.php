<?php
/*
* template Name:Contact
* template post type: page
*/
get_header(); ?>
    <!-- Start Head section -->
    <header class="head">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row ">
                <div class="contact_cl col-xs-8 col-sm-11 col-lg-11">
                    <img class="logo-page" src="<?php echo esc_url(get_template_directory_uri() ) ?>/inc/img/contact.png" alt="Contact">
                    <!-- Title Page -->
                    <h2 class="title"><?php esc_html_e('Contact','personal-info'); ?></h2>
                    <!-- Description Page -->
                    <h4 class="sub-title"><?php esc_html_e('Get in touch with me','personal-info'); ?></h4>
                </div>
                <div class="col-xs-4 col-sm-1 col-lg-1 text-right">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-close hover-animate"><img class="logo-page" src="<?php echo esc_url( get_template_directory_uri() ) ?>/inc/img/close.svg" ></a>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </header>
    <!-- End Head section -->
    <!-- Start Content section -->
    <section class="content padding-block border-bottom">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <h3 class="title title-contact"><?php esc_html_e('Contact info','personal-info'); ?></h3>
                    <div class="block-grey">
                    <?php
                	while ( have_posts() ) : the_post(); ?>
                        <table>
                            <tbody><tr>
                                <td class="font-weight-m width-td"><?php esc_html_e('Address','personal-info');  ?></td>
                                <td><a href="">
                                	<?php
                                		$contact_info = json_decode(get_post_meta(get_the_ID(), 'personal_info_contact_info', true ));
                                        if( !is_object($contact_info)){
                                            $contact_info = (object) array('address'=>"Your Address",'phone'=>"123-456-7890",'email'=>"example@gmail.com",'skype'=>"example_skype",'website'=>"www.example.com");
                                        } 
										echo esc_html($contact_info->address);	
                                	?>
                                	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-m"><?php esc_html_e('Phone','personal-info');  ?></td>
                                <td><a href="<?php  echo esc_url($contact_info->phone);  ?>">
                                	<?php	echo esc_html($contact_info->phone);	?>
                                </a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-m"><?php esc_html_e('E-mail', 'personal-info'); ?></td>
                                <td><a href="mailto:<?php   echo sanitize_email($contact_info->email);  ?>">
                                	<?php	echo sanitize_email($contact_info->email);	?>
                                </a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-m"><?php esc_html_e('Skype', 'personal-info'); ?></td>
                                <td><?php	echo esc_attr($contact_info->skype);	?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-m"><?php esc_html_e('Website', 'personal-info'); ?></td>
                                <td><a href="<?php  echo  esc_url($contact_info->website);    ?>"><?php	echo esc_url($contact_info->website);	?></a></td>
                            </tr>
                        </tbody></table>
                        <!-- social icon -->
                        <div class="social">
                            <ul class="animated fadeIn visible" data-animation="fadeIn" data-animation-delay="600">
                                    <?php if(get_theme_mod('facebook_url')): ?><li><a class="facebook ukie-icons hover-animate" href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
                                    <?php if(get_theme_mod('twitter_url')): ?><li><a class="twitter ukie-icons hover-animate" href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                                    <?php if(get_theme_mod('linkdein_url')): ?><li><a class="linkedin ukie-icons hover-animate" href="<?php echo esc_url(get_theme_mod('linkdein_url')); ?>" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
                                    <?php if(get_theme_mod('google_plus_url')): ?><li><a class="google-plus ukie-icons hover-animate" href="<?php echo esc_url(get_theme_mod('google_plus_url'));  ?>" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
                                    <?php if(get_theme_mod('wordpress_url')): ?><li><a class="wordpress ukie-icons hover-animate" href="<?php echo esc_url(get_theme_mod('wordpress_url')); ?>" title="WordPress" target="_blank"><i class="fa fa-wordpress"></i></a></li><?php endif; ?>
                            </ul>
                        </div>
                        <!-- end social icon -->
                    </div>
                
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <h3 class="title title-contact"><?php  the_title(); ?></h3>
                    
                    <!-- Start Contact Form -->
                    <div class="contact-form contact-form-7">
                        <?php the_content(); ?>
                    </div>
                    <!-- End Contact Form -->
                </div>
            </div>
            <!-- end row -->
            <?php endwhile; ?>
        </div>
        <!-- end container -->
    </section>
    <!-- End Content section -->
   
 <?php
get_footer();