<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package labeluk
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">

		<header>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h1>
			<h2>Posted on <?php the_date( ); ?> by <?php the_author( ); ?></h2>
		</header>

		<?php
			the_content();
		?>
		
	</div>

</article>
