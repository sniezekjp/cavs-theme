
<?php
// Template Name: Full Width
?>

<?php get_header(); ?>
		
<div class="blog1">
	
	<div class="full darkblue title">		
		<h1 style="color:white !important;"><?php wp_title(''); ?></h1>
	</div>

	<div class="posts container">		
		
		<?php showOptions(); ?>

		<div class="<?php echo columns_class('full'); ?>">

			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>

				<!-- Post -->
				<div class="post row">

					<!-- Content -->
					<?php the_content(); ?>
				
				</div>				


			<?php endwhile; else: ?>			
			
			<h1>Sorry, we couldn't find what you are looking for.</h1>

			<?php endif; ?>

			
			<!-- Pagination -->
			<div id="pagination">
				<?php pagination(); ?>
			</div>
	
		</div>

	</div>
</div><!-- blog one -->


<?php get_footer(); ?>