

<?php get_header(); ?>
	
	<div class="full darkblue title">		
		
		<h1><?php wp_title(''); ?></h1>

	</div>

	<div class="posts container">
	
		<?php //showOptions(); ?>
		
		<div class="<?php echo columns_class('content'); ?>">		

			<?php $id = ''; while(have_posts()) : the_post(); $id = get_the_ID(); ?>
				
				<!-- Post -->
				<div class="post">
					
					<!-- Team Image -->
					<?php if(has_post_thumbnail()){ ?>
					        <h2>Players</h2>
					<?php	the_post_thumbnail(); 
						}
					?>
					
					<!-- Content -->
					<?php the_content(); ?>

				
				</div>

			<?php endwhile; ?>
		

		<hr>		



		
		</div>



		<!-- Sidebar -->
		<div class="<?php echo columns_class('sidebar'); ?>">
            
             <?php echo get_post_meta($id, '_team_announcements', true); ?>
             <?php //get_sidebar(); ?>

		</div>

	</div>


<?php get_footer(); ?>