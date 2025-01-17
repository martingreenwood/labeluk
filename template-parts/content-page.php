<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package labeluk
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">

		<header>
			<h1><?php the_field( 'main_title' ); ?></h1>
			<h2><?php the_field( 'sub_title' ); ?></h2>
		</header>

		<?php
			the_content();
		?>
	</div>

</article>
