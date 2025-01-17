<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

						get_template_part( 'template-parts/content', get_post_format() );

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
