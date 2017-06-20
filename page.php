<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

						get_template_part( 'template-parts/content', 'page' );

					endwhile;
				endif; 
				?>
			</div>

			<div class="span4 side">
				<?php get_sidebar(',page'); ?>
			</div>

		</main>
	</div>


<?php
get_footer();
