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

				<div class="downloads">
					<?php
					$args = array(
						'post_type' => 'downloads',
						'posts_per_page' => -1,
					);
					$prev = '';
					$termname = '';
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						$term = get_the_terms( get_the_id(), 'type' );
						//print_r($term);

						$termname = current($term);
						$termname = $termname->name;

						if ($prev != $termname): ?>
						<div class="type">
							<h2><?php echo $termname; ?></h2>
						<?php endif; ?>
						
							<?php $file = get_field( 'file' ); ?>
							<div class="item">
								<a href="<?php echo $file['url']; ?>">
									<i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php the_title(); ?>
								</a>
							</div>

						<?php if ($prev != $termname): ?>
						</div>
						<?php endif; ?>

						<?php
						$prev = $termname;
						}
						wp_reset_postdata();
					}
					?>					
				</div>

			</div>

			<div class="span4 side">
				<?php get_sidebar(',page'); ?>
			</div>

		</main>
	</div>


<?php
get_footer();
