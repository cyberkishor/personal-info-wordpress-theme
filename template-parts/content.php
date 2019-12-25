<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Personal_Info_by_SpiderBuzz
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="post">
	<!-- Post Header -->
	<div class="blog-head <?php if(has_post_thumbnail()) echo " inner-head t-shadow"; ?> clearfix">
	<!-- Post Date -->
	<div class="blog-head-left t-center">
		<!-- Day -->
		<h1 class="uppercase bigger">
		<?php  echo get_the_date(__('d','personal-info')); ?>
		</h1>
		<!-- Month, Year -->
		<p class="uppercase">
		<?php  echo get_the_date(__('M Y','personal-info')); ?>
		</p>
		
	</div>
	<!-- End Post Date -->
	<!-- Post Header -->
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="blog-head-right ex-link t-left">
		<!-- Header -->
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="uppercase">', '</h1>' );
		else :
			the_title( '<h1 class="uppercase">','</h1>' );
		endif;
		?>
	</a>
	<!-- Post Header -->
</div>
	<?php if( has_post_thumbnail()) : ?>
	<!-- Image -->
	<div class="single_item mp-gallery">
		<?php the_post_thumbnail('large'); ?>
	</div><!-- End Image -->
	<?php endif; ?>
	
	<!-- Post Details -->
	<div class="details">
		<!-- Post Infos -->
		<div class="post-info">
			<!-- Post Item -->
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="post-item">
				<i class="fa fa-user"></i>
				<?php echo get_the_author(); ?>
			</a>
			<!-- Post Item -->
			<i class="post-item">
				<i class="fa fa-tags"></i>
				<?php echo get_the_category_list( esc_html__( ', ', 'personal-info' ) );
					
				 ?>
			</i>
			<!-- Post Item -->
			<span class="post-item">
				<i class="fa fa-comments"></i>
				<?php esc_url(comments_popup_link()); ?>
			</span>
		</div>
		<!-- End Post Infos -->
		<!-- Post Description -->
		<div class="post-text">
			<?php
			if(!is_single()){
				the_excerpt( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'personal-info' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'personal-info' ),
					'after'  => '</div>',
				) );
			}else{
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'personal-info' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'personal-info' ),
					'after'  => '</div>',
				) );
			}

		?>
		</div>
	</div>
</article><!-- #post-## -->
