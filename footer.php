<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Personal_Info_by_SpiderBuzz
 */
?>
  <!-- Start Footer section -->
    <footer class="footer">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
            <?php if(get_theme_mod('phone_no')): ?>
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <a href="<?php echo esc_attr(get_theme_mod('phone_no')); ?>" class="hover-animate">
                        <span class="ukie-icons hover-animate"><i class="fa fa-phone"></i></span> <?php echo esc_attr(get_theme_mod('phone_no')); ?></a>
                </div>
                <?php endif; ?>
                <?php if(get_theme_mod('email_add')): ?>
                <!--email_off-->  
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <a href="<?php echo esc_attr(get_theme_mod('email_add')); ?>" class="hover-animate">
                        <span class="ukie-icons hover-animate"><i class="fa fa-paper-plane"></i></span> <?php echo esc_attr(get_theme_mod('email_add')); ?></a>
                </div>
                <!--/email_off-->
                <?php endif; ?>
                 
                <?php if(get_theme_mod('address')): ?>
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <a href="<?php echo esc_attr(get_theme_mod('address')); ?>" class="hover-animate">
                        <span class="ukie-icons hover-animate"><i class="fa fa-map-marker"></i></span><?php echo esc_attr(get_theme_mod('address')); ?> </a>
                </div>  
                <?php endif; ?>
               
            </div>
            <!-- end row -->
            <div class="row">
                 <div class="col-xs-12 col-sm-12 col-lg-12 text-right">
                    <span class="copyright"><a href="<?php echo esc_url( 'https://wordpress.org/', 'personal-info' ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'personal-info' ), 'WordPress' ); ?></a>
			         <span class="sep"> | </span><a href="<?php echo esc_url('https://spiderbuzz.com','personal-info'); ?>" rel="designer">
			        <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'personal-info' ), 'Personal Info', 'SpiderBuzz' ); ?></a></span>
                </div>
                <!-- end Copyright -->
            </div>
        </div>
        <!-- end container -->
    </footer>
    <!-- End Footer section -->
</div>
<?php wp_footer(); ?>
</body>
</html>
