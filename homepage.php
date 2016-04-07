<?php // Template Name: Homepage ?>

<?php get_header(); ?>  
	<?php echo do_shortcode('[layerslider id="1"]'); ?>

	<!-- Content -->
	<?php while(have_posts()) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>





	<!-- Interested Players -->
	<div class="container interested">
		
		<div class="eight columns bottom">
			<h1>Interested in Joining <br>the NOVA Cavaliers?</h1>	
			<p>Click below to fill out our player interest form.</p>		
			<button class="btn" onclick="window.location.href='/player-interest/'">Player Interest Form</button>
		</div>

		<div class="four columns logos">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aau-logo.png" alt="AAU Baseketball">
			</a>
		</div><!-- four -->

		<div class="four columns logos">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cavs-logo-secondary.png" alt="Nova Cavs">
			</a>
		</div><!-- four -->		

	</div>

	















	<!-- Featured Articles -->
	<div class="full darkblue featured">
		<div class="container">

			<h1>Featured Articles</h1>

			<?php 
				$featured = new WP_Query('category_name=featured&posts_per_page=3');
				if($featured->have_posts() ) : 
					while($featured->have_posts() ) : 
						$featured->the_post();
			?>
				<div class="one-third column">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('hp_featured_img'); ?>
					</a>
					<h2>
					  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>	
					</h2>				
				</div>				

			<?php endwhile; endif; ?>

		</div>
	</div>










	

	<!-- Latest Tweets -->
	<div class="tweets">
		<div class="container" data-ng-controller="TwitterCtrl as tweet">

			<div class="tweet" ng-mouseover="cancel()" ng-mouseleave="loop()" ng-click="next()">
				
				<h2 class="animate" ng-repeat="tweet in tweets" ng-show="select == $index"
				ng-bind-html="tweet.text | twittify"></h2>

			</div>

		</div>
	</div>











<?php get_footer(); ?>