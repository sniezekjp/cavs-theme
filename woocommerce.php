

<?php get_header(); ?>
	
	<div class="full darkblue title">		
		
		<h1>Home of the NOVA Cavaliers</h1>

	</div>

	<div class="posts container">
	
		<?php showOptions(); ?>
		
		<div class="<?php echo columns_class('content'); ?>">

			<?php woocommerce_content(); ?>	

		<hr>		
		
		</div>



		<!-- Sidebar -->
		<div class="<?php echo columns_class('sidebar'); ?>">

			<?php get_sidebar(); ?>

		</div>

	</div>


<?php get_footer(); ?>