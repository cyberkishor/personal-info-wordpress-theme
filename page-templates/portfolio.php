<?php
/*
* template Name:Portfolio
* template post type: page
*/
get_header(); ?>
   <!-- Start Head section -->
    <?php while ( have_posts() ) : the_post(); ?>
    <header class="head">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-8 col-sm-11 col-lg-11">
                <img class="logo-page" src="<?php echo esc_url( get_template_directory_uri() ) ?>/inc/img/portfolio.png" alt="portfolio">
                    <!-- Title Page -->
                    <h2 class="title"><?php esc_html_e('Portfolio','personal-info');  ?></h2>
                    <!-- Description Page -->
                    <h4 class="sub-title"><?php esc_html_e('Some of My Works','personal-info');  ?></h4>
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
    <div class="container">
    <?php the_content(); ?>
    </div>
<?php endwhile; ?>  
<?php
get_footer();