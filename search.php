<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Personal_Info_by_SpiderBuzz
 */

get_header(); ?>
<div class="container">
	<div class="row">
		
		<div id="primary" class="content-area col-sm-8">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
		
		<div class="col-sm-4">
			<?php get_sidebar(); ?>
		</div>
		
	</div>
</div>
<?php
get_footer();
