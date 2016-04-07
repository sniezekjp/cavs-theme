






<!-- Footer Menu -->
	<div class="full lightgray footer">
		
		<div class="container">
			
			<div class="four columns">				
				<h4>Links</h4>
				<?php footer_menu('links'); ?>
			</div>
			



			<div class="four columns">
				<h4>Tournaments</h4>
				<?php footer_menu('tournaments'); ?>
				
				<h4>Sponsors</h4>
				<?php footer_menu('sponsors'); ?>							
			</div>
			



			<div class="four columns recent-posts">
				<h4>Recent Posts</h4>
				<?php footer_recent(); ?>				
			</div>
			



			<div class="four columns social">
				
				<h4>Search</h4>
				<form action="<?php echo home_url('/'); ?>" method="get">
					<input name="s" type="text" placeholder="Search and press enter">					
				</form>

				<h4>Social Media</h4>
				<ul>
					<li>
						<a class="twitter" href="https://twitter.com/novacavaliers" target="_blank"></a>
					</li>
				</ul>
			</div>

		</div><!-- container -->

	</div>




	


	<!-- Copyright -->
	<div class="full darkblue copyright">
		
		<p>&copy; 2014 <a href="<?php echo home_url(); ?>">NOVA Cavaliers</a>. All Rights Reserved.</p>

	</div>

	
<!-- End Document
================================================== -->

	<?php wp_footer(); ?>
</body>
</html>