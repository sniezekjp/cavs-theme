<?php 
    //Template Name: Slider
?>
<?php get_header(); ?>

<?php echo do_shortcode('[layerslider id="1"]'); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>

<?php get_footer(); ?>