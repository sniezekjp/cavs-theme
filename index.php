
<?php get_header(); ?>
	
	<div class="full darkblue title">		
		<h1 style="color:white !important;"><?php wp_title(''); ?></h1>
	</div>

	<div class="posts container">
		
		<?php showOptions(); ?>
		
		<div class="<?php echo columns_class('content'); ?>">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>

				<!-- Post -->
				<div class="post">
					
					<!-- Meta -->
					<ul class="meta">
						<li>By: <a href="#"><?php the_author_posts_link(); ?></a></li>
						<li>/</li>
						<li><?php the_time('M d, Y'); ?></li>
					</ul>
				
					<!-- Post title -->
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				

					<!-- Featured Image -->
					<?php if(has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>								
					<?php endif; ?>

					<!-- Content -->
					<?php the_excerpt(); ?>
				
				</div>				


			<?php endwhile; else: ?>			
			
			<h1>Sorry, we couldn't find what you are looking for.</h1>

			<?php endif; ?>

			
			<!-- Pagination -->
			<div id="pagination">
				<?php pagination(); ?>
			</div>
	
		</div>

		
		<!-- Sidebar -->
		<div class="<?php echo columns_class('sidebar'); ?>">

			<?php get_sidebar(); ?>

		</div>

	</div>












<?php get_footer(); ?>