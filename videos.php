


<?php
// Template Name: Videos
?>

<?php get_header(); ?>
		
<div class="blog">
	
	<div class="full darkblue title">		
		<h1 style="color:white !important;"><?php wp_title(''); ?></h1>
	</div>

	<div class="posts container" yt-api>

		<div class="<?php echo columns_class('full'); ?>">

			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
        
        <script>
          var vids = JSON.parse('<?php echo get_post_meta($post->ID, "_extra_vid_ids", true)?>')
        </script>
				<!-- Post -->
				<div class="post row" ng-controller="CavsYt">
				  
        <?php if(is_super_admin()) echo "<a href='javascript:void(0)' ng-click='log()'>log</a>"; ?>
        
					<!-- Content -->
					<div id="cavs-yt" ng-show="isPlayerVisible" ng-init="isPlayerVisible=false">
						<div class="player-holder" ng-cloak>
						    <h2 style="float:left; font-weight: 200;">{{currentTitle}}</h2>
							<a class="close" href="javascript:void(0);" ng-click="hideAndPause()">&#215;</a>
							<yt-player></yt-player>
						</div>
					</div>
					
					<div class="clearfix"></div>

                    <h3 ng-hide="yt.ready" style="text-align:center; font-weight: 200; padding: 80px;">Loading videos...</h3>
                    
                    <div class="vid-container" ng-show="yt.ready">
    					<div class="five columns alpha videos" ng-repeat="video in videos">
    						<h4>
    						    <a href="javascript:void(0);" ng-click="showAndPlay(video.id, video.title)">{{video.title | ytTitle:20}}</a>
                            </h4>
    						<a href="javascript:void(0);" ng-click="showAndPlay(video.id, video.title)">
    							<img ng-src="{{video.thumbnail.hqDefault}}" alt="{{video.title}}" ng-cloak>
    						</a>					
    					</div>
                    </div>
				
				</div>				


			<?php endwhile; else: ?>			
			
			<h1>Sorry, we couldn't find what you are looking for.</h1>

			<?php endif; ?>

	
		</div>

	</div>
</div><!-- blog one -->


<?php get_footer(); ?>