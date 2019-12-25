<?php
/*
* template Name:Resume
* template post type: page
*/
get_header(); ?>
    <!-- Start Head section -->
    <header class="head">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-8 col-sm-11 col-lg-11">
                    <?php personal_info_page_title_info(); ?>
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
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="alert alert-info"><h2 class="title text-center"><i class="fa fa-quote-left"></i><?php esc_attr(the_title()); ?>  <i class="fa fa-quote-right"></i></h2></div>
                         <p><?php the_content(); ?></p>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <h3 class="title title-resume"><?php esc_html_e('Education','personal-info'); ?></h3>
                    <div class="block-grey">
                        <div id="education-slider" class=" owl-theme" >
                            <div class="owl-wrapper-outer">
                            <div class="owl-wrapper " ><div class="owl-item " >
                            <div class="item">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-m width-td"><?php esc_html_e('Name','personal-info');  ?></td>
                                                <td><?php
                                                    $resume_education_info = json_decode(get_post_meta(get_the_ID(), 'resume_education_info', true ));
                                                    if( !is_object($resume_education_info)){
                                                        $resume_education_info = (object) array('name'=>"Dummny Name",'address'=>"Address",'period'=>"Period",'label'=>"lebel 1",'description'=>"Description Nesciunt saepe lacinia reprehenderit pellentesque, vehicula? Vulputate");
                                                     } 
                                                    echo esc_attr($resume_education_info->name);    
                                                ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-m"><?php esc_html_e('Address','personal-info');  ?></td>
                                                <td><?php echo esc_attr($resume_education_info->address);  ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-m"><?php esc_html_e('Period','personal-info');  ?></td>
                                                <td><?php echo esc_attr($resume_education_info->period);  ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-m"><?php esc_html_e('Level','personal-info');  ?></td>
                                                <td><?php echo esc_attr($resume_education_info->label);  ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p><?php echo esc_attr($resume_education_info->description);  ?></p>
                                </div></div><div class="owl-item owl-item " >
                                </div></div></div>                                
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-6">
                
                    <h3 class="title title-resume"><?php esc_html_e('Work','personal-info');  ?></h3>
                    <div class="block-grey">
                        <div id="work-slider" class=" owl-theme work-slide-owl-theme" >
                            <div class="owl-wrapper-outer">
                            <div class="owl-wrapper work-slide-owl-wrapper"  >
                            <div class="owl-item work-slidr-title" >
                            <div class="item">
                            
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-m width-td1"><?php esc_html_e('Company Name','personal-info');  ?></td>
                                            <td>
                                                <?php
                                                    $resume_work_info = json_decode(get_post_meta(get_the_ID(), 'resume_work_info', true )); 
                                                    if( !is_object($resume_work_info)){
                                                        $resume_work_info = (object) array('company_name'=>"Your Company",'address'=>"Your Address",'period'=>"Period II",'post'=>"Post Name",'description'=>"nostra et esse reiciendis fugiat at deleniti aut consectetur consequatur taciti soluta");
                                                     }
                                                    echo esc_attr($resume_work_info->company_name);    
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-m"><?php esc_html_e('Address','personal-info');  ?></td>
                                            <td><?php echo esc_attr($resume_work_info->address);  ?></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-m"><?php esc_html_e('Period','personal-info');  ?></td>
                                            <td><?php echo esc_attr($resume_work_info->period);  ?></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-m"><?php esc_html_e('Post','personal-info');  ?></td>
                                            <td><?php echo esc_attr($resume_work_info->post);  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p><?php echo esc_attr($resume_work_info->description);  ?></p>
                            </div> 
                            </div>
                            </div></div>                                     
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Content section -->
    <!-- Start Skills section -->
    <section class="skills border-bottom padding-block">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <?php $softskill_title = json_decode(get_post_meta(get_the_ID(), 'softskill_title', true ));
                    $softskill_value = json_decode(get_post_meta(get_the_ID(), 'softskill_value', true ));  
                ?>
                <?php if( is_array( $softskill_title)) { ?> 
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <h3 class="title title-skills"><?php esc_html_e('Soft skills','personal-info');  ?></h3>
                    <?php      
                    if( is_array( $softskill_title)) {
                    
                    foreach ($softskill_value as $key => $value) {
                 ?>
                        <label class="progress-bar-label"><?php echo esc_attr($softskill_title[$key]); ?></label>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php  esc_attr($value); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr($value); ?>%">
                                <span><?php echo esc_attr($value); ?>%</span>
                            </div>
                        </div>
                        <?php }}  ?>
                    </div>
                <?php } ?>
                
                <?php $hardskill_title = json_decode(get_post_meta(get_the_ID(), 'hardskill_title', true ));
                    $hardskill_value = json_decode(get_post_meta(get_the_ID(), 'hardskill_value', true ));
                    
                ?>
                <?php if( is_array( $hardskill_title)) { ?> 
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <h3 class="title title-skills"><?php esc_html_e('Hard skills','personal-info');  ?></h3>
                    <?php      
                    if( is_array( $hardskill_title)) {
                    foreach ($hardskill_value as $key => $value) {
                    ?>
                        <label class="progress-bar-label"><?php echo esc_attr($hardskill_title[$key]); ?></label>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr($value); ?>%;">
                                <span><?php echo esc_attr($value); ?>%</span>
                            </div>
                        </div>
                   <?php }}  ?>
                </div>
                <?php } ?>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Skills section -->
    <!-- Start Info section -->
    <?php $hobbise_name = json_decode(get_post_meta(get_the_ID(), 'hobbise_name', true ));
          $hobbise_icon = json_decode(get_post_meta(get_the_ID(), 'hobbise_icon', true ));                    
    ?>
    <?php if( is_array( $hobbise_name)) { ?> 
    <section class="info border-bottom padding-block text-center">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h3 class="title"><?php esc_html_e('Hobbies &amp; Interest','personal-info');  ?></h3>
                </div>
            </div>
            <!-- end row -->
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                        <?php      
                            if( is_array( $hobbise_name)) {
                            
                            foreach ($hobbise_icon as $key => $value) {
                            ?>
                        <div class="circle-block ">
                            <span class="icon hover-animate"><i class="<?php echo esc_attr($value); ?>"></i></span>
                            <span class="name hover-animate"><?php echo esc_attr($hobbise_name[$key]); ?></span>
                        </div>  
                    <?php }}  ?>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <?php } ?>
    <!-- End Info section -->
<?php
get_footer();