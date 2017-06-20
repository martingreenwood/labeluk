<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package labeluk
 */

?>

	</div><!-- #content -->

	<section id="twitter">
		<div class="container">
			<div class="row">
				<h2>LATEST TWEETS</h2>
				<div class="tweets">
					<?php
					// TWITTER OAUTH SETTINGS
					$twitteruser = '@label_spa';
					$notweets = '25';
					$consumerkey = '34yHWgUgRHgVPKASUdkpNA';
					$consumersecret = 'Zlc7HitIakfgiEoNhscC5JOI9lzg5krvSb6y1VHY';
					$accesstoken = '84123573-9EfiiocjJOhzHYqO8vPDgKoy7Db9PhLAopTqjOEEG';
					$accesstokensecret = 'Yc9b4IKjQ2PxD0WMuNSuhiKQdcJjdRsHA1CDs8EM7mY';
					
					function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
						$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
						return $connection;
					}
					$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
					$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&include_rts=true&exclude_replies=true&trim_user=true&contributor_details=false&count=".$notweets);
				    $counter = 0; //set up a counter so we can count the number of iterations
					foreach ($tweets as $tweet):
						//if (isset($tweet->entities->media[0])):
						//	$counter++;
						$created = $tweet->created_at;
						$text = $tweet->text;
						//$tweet_url = $tweet->entities->media[0]->url;
						//$media = $tweet->entities->media[0];
						//$media_url = $media->media_url;
						//$media_image = str_replace("http","https", $media_url);
						$posted_date = date('l jS F Y G:i', strtotime($created));
						?>
						<div class="tweet">
							<p><?php echo $text; ?></p>
							<p>Posted <?php echo custom_dates($posted_date); ?></p>
						</div>
						<?php 
						//endif;
						//if ($counter == 3) break;
					endforeach;
					?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="container">
			<div class="links">
				<div class="row">
					<div class="span8 posts">
						<h4>Latest News</h4>
						
						<ul>
						<?php
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 3,
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
							$query->the_post();
							?>
							<li>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<br>
								Posted on <?php the_date( ); ?> in <?php the_category( ); ?>
							</li>
							<?php
							}
							wp_reset_postdata();
						}
						?>
						</ul>
					</div>

					<div class="span4">

						<h4>Get In Touch</h4>

						<p>Label UK Automatic Door Solutions Ltd<br>
						Faraday Drive,<br>
						Bridgnorth,<br>
						Shropshire,<br>
						WV15 5BQ<br>
						<br>
						Phone: +44 (0)1746 768227<br>
						Fax: +44 (0)1746 767565</p>				
					</div>
				</div>
				<div class="clear"></div>

			</div>
			
			<div class="site-info">
				<p>&copy; LABEL UK AUTOMATIC DOOR SOLUTIONS LIMITED. ALL RIGHTS RESERVED.  Registered in England No. 2940676, VAT GB 648 5668 84</p>
				<p>Website by <a target="_blank" href="http://wearebeard.com">WEAREBEARD</a></p>
			</div>
		</div>
	</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
