<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package labeluk
 */

get_header(); ?>


	<section id="featureimge">
		<?php if (has_post_thumbnail()) {
			the_post_thumbnail( );
		} else {
			echo '<img src="//placehold.it/1600x760" alt="">';
		}
		?>
	</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">

			<div class="span8">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'single' );

						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile;
				endif; 
				?>
			</div>

			<div class="span4 side">
				<?php get_sidebar('news'); ?>
			</div>

		</main>
	</div>

<?php
get_footer();
