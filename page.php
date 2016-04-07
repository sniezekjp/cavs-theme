

<?php get_header(); ?>
	
	<div class="full darkblue title">
		<h1 style="color:white !important;"><?php wp_title('');?></h1>
	</div>

	<div class="posts container">
		
		<?php showOptions(); ?>

		<div class="<?php echo columns_class('content'); ?>">
			
			<?php while(have_posts()) : the_post(); ?>

				<!-- Post -->
				<div class="post">
					

					<!-- Post title -->
					<!-- TODO: Add title toggle -->
					<h2 style="display:none;"><?php the_title(); ?></h2>

					<!-- Content -->
					<?php the_content(); ?>
				
				</div>				



			<?php endwhile; ?>
	
		</div>



		<!-- Sidebar -->
		<div class="<?php echo columns_class('sidebar'); ?>">

			<?php get_sidebar(); ?>

		</div>

	</div>












<?php get_footer(); ?>