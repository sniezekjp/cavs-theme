

<?php get_header(); ?>
	
	<div class="full darkblue title">		
		
		<h1>Home of the NOVA Cavaliers</h1>

	</div>

	<div class="posts container">
	
		<?php showOptions(); ?>
		
		<div class="<?php echo columns_class('content'); ?>">		

			<?php while(have_posts()) : the_post(); ?>
				
				<!-- Post -->
				<div class="post">


					<!-- Meta -->
					<ul class="meta">
						<li>By: <?php the_author_posts_link(); ?></li>
						<li>/</li>
						<li><?php the_date(); ?></li>
					</ul>
					
					<!-- Post title -->
					<h2><?php the_title(); ?></h2>
					
					<!-- Post Image -->
					<?php if(has_post_thumbnail() 
					    && get_post_meta( get_the_ID(), 'show_featured_image', true )){
							the_post_thumbnail(); 
						}
					?>
					
					<!-- Content -->
					<?php the_content(); ?>
				
				</div>

			<?php endwhile; ?>
		

		<hr>
		<?php 
			global $post; 
			$count = wp_count_comments($post->ID); 
			$count_display = ''; 
			if($count->approved != 0)
				$count_display = '('.$count->approved.')';
		?>		
		<div id="comments" style="margin-top: 40px;">
			<h3>Comments <?php echo $count_display; ?></h3>
			<?php if($count->approved != 0) : ?>
			<ul id="comment-list">
				<?php
					//Gather comments for a specific page/post	
					$comments = get_comments(array(
						'post_id' => $post->ID,
						'status' => 'approve' //Change this to the type of comments to be displayed
					));

					//Display the list of comments
					wp_list_comments(array(
						'per_page' => 10,
						'reverse_top_level' => false,
					), $comments);
				?>
			</ul>
			<?php else : ?>
			<p class="lightgray padding in-comments">
				Be the first to comment.
			</p>
			<?php endif; ?>
		</div>

			<?php comment_form(array(
				'comment_notes_after' => ''
			)); ?>


		
		</div>



		<!-- Sidebar -->
		<div class="<?php echo columns_class('sidebar'); ?>">

			<?php get_sidebar(); ?>

		</div>

	</div>


<?php get_footer(); ?>