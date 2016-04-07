<?php

//construction shortcode
require 'lib/construction_shortcode.php';


//twitter stuff
add_action('init', 'get_tweets'); 
function get_tweets(){
    if(isset($_GET['tweets'])){
        require 'twitter/tweets_json.php';
        exit; 
    }    
}

//delete options below
function showOptions(){
	if(false){
		return;
	}
	if(false) :  ?>
		<div class="clearfix options" style="position: absolute; top: 10px; left: -100px; width: 150px;" ng-controller="OptionsCtrl">
		    <a href="javascript:void(0);" ng-click="options.showOptions= !options.showOptions">Notes</a>
		    <div ng-show="options.showOptions">
    		    <label style="line-height: 16px;">Click checkbox to see changes.</label>
    			<input id="showPadding" type="checkbox" ng-model="options.showPadding" 
    			style="float:left; margin-top: 6px; ">
    			<label for="showPadding" style="float:left; margin-left: 0; line-height: 16px; display:block;">Show padding / gray background or something similar??</label>
    			
    			<br>
    			<br>
    			<br>
    			
    			<?php if(!is_single() && !is_page() ) : ?>
    			<input id="underline" type="checkbox" ng-model="options.underline" style="float:left; margin-top: 6px; margin-left: 0px; ">
    			<label for="underline" style="float:left; margin-left: 0; display:block; line-height: 16px;">Maybe separate posts with an underline??</label>
    			<?php endif; ?>
    
    			<?php if(false) : ?>
    			<input id="sidebarPadding" type="checkbox" ng-model="options.sidebarPadding" style="float:left; margin-top: 6px; margin-left: 0px; ">
    			<label for="sidebarPadding" style="float:left; margin-left: 0; display:block;">sidebar padding??</label>
    			<?php endif; ?>
		    </div>

		</div>
	<?php endif;
}


//delete options above

add_image_size('hp_featured_img', 300, 189, true);


register_nav_menu( 'main', 'Header Menu' );
register_nav_menu( 'links', 'Footer Links Menu' );
register_nav_menu( 'tournaments', 'Footer Tournaments' );
register_nav_menu( 'sponsors', 'Footer Sponsors' );

function footer_menu($context = 'links'){
	$defaults = array(
		'theme_location'  => $context,
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);
	wp_nav_menu( $defaults );
}

function footer_recent(){
	global $post; 
	$recent = new WP_Query('posts_per_page=3'); 
	echo '<ul>';
	while($recent->have_posts()) : $recent->the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endwhile; 
	echo '</ul>';
	wp_reset_postdata();
}

function header_menu(){
	$defaults = array(
		'theme_location'  => 'main',
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'main-menu nav navbar-nav',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);
	wp_nav_menu( $defaults );
}

function mobile_header_menu(){
	$defaults = array(
		'theme_location'  => 'main',
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'main-menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);
	wp_nav_menu( $defaults );	
}



//register a sidebar
register_sidebar( array(
    'id'           => 'sidebar-right',
    'name'         => __( 'Primary Sidebar' ),
    'description'  => __( 'Sidebar Right' ),
    'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>'
) );







//shortcodes
add_shortcode('lead', 'do_lead'); 
function do_lead($atts, $content){
	return '<p class="lead">'.$content.'</p>';
}


//Table shortcodes
add_shortcode('table', 'do_table'); 
add_shortcode('columns', 'do_column'); 
add_shortcode('row', 'do_row'); 
function do_table($attrs, $content = null){
	extract( shortcode_atts( array(
		'last' => 'no',
	), $attrs ) );
	$output  = '<table class="table">'; 
	$output .= do_shortcode($content); 
	$output .= '</table>'; 
    return $output; 
}
function do_column($attrs, $content = null){
    extract( shortcode_atts( array(
		'names' => '',
	), $attrs ) );
	$output = '<tr>';
	$names = explode(',', $names);
	foreach($names as $name){
    	$output .= '<th>'.trim($name).'</th>';
	}
	$output .= '</tr>';
	return $output; 
}
function do_row($attrs, $content = null){
	extract( shortcode_atts( array(
		'data' => '',
	), $attrs ) );

    if($data != ''){    
    	$data = explode(',', $data);
    	$output = '<tr>';
    	foreach($data as $row){
        	$output .= '<td>'.trim($row).'</td>';
    	}
    	$output .= '</tr>';
    	return $output; 
	}
	else if( count($attrs) > 0 ){
    	$output = '<tr>';	
    	foreach($attrs as $column){
        	$output .= '<td>'.$column.'</td>';
    	}
    	$output .= '</tr>';
    	return $output; 
	}
	else{
    	return '';
	}
    
}

add_shortcode('title', 'do_title'); 
function do_title($attrs, $content = null){
	extract( shortcode_atts( array(
		'size' => '1',
	), $attrs ) );
	
	return '<h'.$size.'>'. $content . '</h'.$size.'>';
    
}
//old shortcodes
add_shortcode('separator', 'temporarily_remove'); 
add_shortcode('checklist', 'temporarily_remove');
add_shortcode('content_boxes', 'temporarily_remove');
add_shortcode('content_box', 'temporarily_remove');
function temporarily_remove($attrs, $content = null){
    if($content == null)
        $content = ''; 
        
    return $content; 
}


//trim the excerpt
add_filter( 'the_excerpt', 'trim_excerpt' );
function trim_excerpt($excerpt){
	return trim($excerpt);
}



//TESTING REMOVE CODE
add_filter('the_content', 'remove_br', 1000);
function remove_br($content){
    if(is_page())
        return $content; 
	$content = str_replace(array("\n","<br />"), '', $content);
	return $content;
}





//helper fn for content & sidebar widths
function columns_class($context = 'content'){
    switch($context){
        case "content": 
            return 'eleven columns'; 
            break; 
        case "full": 
            return 'sixteen columns'; 
            break; 
        case "sidebar": 
            return "five columns"; 
            break;
    }
}







//helper for title inside purple header
add_filter( 'wp_title', 'search_page_title', 10, 2 );
function search_page_title($title){	
	global $post; 
	if(is_search())
		return 'Search results: ' . get_query_var('s');
	else if(is_category())
		return single_cat_title( $prefix = '' );
	else
		return $title;

}







//only search posts
add_filter('pre_get_posts','search_filter');
function search_filter($query) {
    if ($query->is_search) {
	    $query->set('post_type', 'post');
	    $query->set('posts_per_page', '5');
    }
    return $query;
}






//pagination links
function pagination(){
	global $wp_query; 
	$total_pages = $wp_query->max_num_pages;  

	if ($total_pages > 1){  
	  
	  $current_page = max(1, get_query_var('paged'));
	  if(is_search()){
	  	$format = '&paged=%#%';
	  } 
	  else{
	  	$format = 'page/%#%';
	  }	  
	  echo paginate_links(array(  
	      'base'    => get_pagenum_link(0) . '%_%',  
	      'format'  => $format,  
	      'current' => $current_page,  
	      'total'   => $total_pages,  
	    ));  

	}	
}




//column shortcodes
add_shortcode('one_half', 'do_one_half'); 
function do_one_half($attrs, $content = null){
	extract( shortcode_atts( array(
		'last' => 'no',
	), $attrs ) );

	if($last == 'no')
		return '<div class="row"><div class="four columns">'.$content.'</div>';
	else
		return '<div class="four columns">'.$content.'</div></div>';
}


//Homepage Shortcodes
add_shortcode('lightgray', 'do_lightgray');
function do_lightgray($attrs, $content = null){
	extract( shortcode_atts( array(
		'last' => 'no',
	), $attrs ) );

	$content = trim($content, '</p>' );
	$content = trim($content, '<p>'  );
	$content = trim($content);	
	
	$output  = '<div class="full darkblue latest"><div class="container">';
	$output .= $content;
	$output .= '</div></div>';
	return $output; 
}

add_shortcode('interested', 'do_interested');
function do_interested($attrs, $content = null){
	extract( shortcode_atts( array(
		'last' => 'no',
	), $attrs ) );	

	$output  = '<div class="full interested"><div class="container">';
	$output .= $content;
	$output .= '</div></div>';
	return $output; 
}



//Team Meta Boxes, ie Quick Announcements
add_action( 'add_meta_boxes', 'team_meta_box' );
function team_meta_box() {
        
    $screens = array( 'team' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'team_info',
            __( 'Team Announcements', 'novacavs' ),
            'team_info_display',
            $screen
        );
    }
}


function team_info_display( $post ){
	global $pagenow; 
    wp_nonce_field( 'team_info', 'team_nonce' );
	echo '<h3>Team page sidebar information.</h3>';
    if( $pagenow == 'post-new.php' ){
    	$template = '<ul id="team-info" class="sidebar">
				<li>
					<h4>Quick Announcements</h4>
					<p>Stayed tuned for announcements</p>
				</li>			
				<li>
					<h4>Upcoming Events</h4>
					<ul>
						<li>TBA</li>
					</ul>
				</li>
				<li>
					<h4>Coaches</h4>
					<ul>
						<li>Head Coach</li>
						<li>Asst. Coach</li>
					</ul>
				</li>
				
			</ul>'; 
		wp_editor( $template, '_team_announcements' , 
			array('media_buttons'=>false));
    }
    else{
    	$value = get_post_meta( $post->ID, '_team_announcements', true );    
    	wp_editor( $value, '_team_announcements' , 
    		array('media_buttons'=>false));
    }
}


add_action( 'save_post', 'save_team_info' );
function save_team_info( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['team_nonce'] ) )
    return $post_id;

  $nonce = $_POST['team_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'team_info' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'team' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  
  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
  $mydata = $_POST['_team_announcements'];

  // Update the meta field in the database.
  update_post_meta( $post_id, '_team_announcements', $mydata );
}










/** 
 *    Videos.php meta box
 */
add_action( 'add_meta_boxes', 'video_meta_box' );
function video_meta_box() {
        
    $screens = array( 'page' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'extra_videos',
            __( 'Extra Videos', 'novacavs' ),
            'extra_vids_display',
            $screen
        );
    }
}


function extra_vids_display( $post ){
  global $pagenow; 
  echo '<p>Add the youtube video id to the list. The video id is the value of "v" 
  in the url. Example: for this url "https://www.youtube.com/watch?v=aun19xeNE2A", the id is "aun19xeNE2A"</p>';
  wp_nonce_field( 'extra_videos', 'extra_vid_nonce' );
  $value = get_post_meta( $post->ID, '_extra_vid_ids', true );
  wp_editor( $value, '_extra_vid_ids' , array('media_buttons'=>false));    
}


add_action( 'save_post', 'save_extra_vids' );
function save_extra_vids( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['extra_vid_nonce'] ) )
    return $post_id;

  $nonce = $_POST['extra_vid_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'extra_videos' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'team' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  
  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
  $mydata = $_POST['_extra_vid_ids'];

  // Update the meta field in the database.
  update_post_meta( $post_id, '_extra_vid_ids', $mydata );
}



