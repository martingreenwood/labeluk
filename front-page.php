<?php
/**
 * The front-page template file
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

	<div id="famousfour">
		
		<?php
		if( have_rows('item') ):
		    while ( have_rows('item') ) : the_row();
			$image = get_sub_field('image');
			?>

			<div class="box">
				<a href="<?php the_sub_field('link'); ?>">
					<img src="<?php echo $image[url]; ?>" alt="">
				</a>
			</div>
		        
		    <?php
		    endwhile;
		endif;
		?>
		

		<div class="clear"></div>
	</div>

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
				<?php get_sidebar( ); ?>
			</div>

		</main>
	</div>

<?php
get_footer();
