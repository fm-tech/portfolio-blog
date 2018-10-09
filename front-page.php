<?php
/**
 * Front Page Template file 
 *
 *Cool stuff is here 
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

<!-- // page container  -->
<div class="container">
        
<main class="site-main" id="main">

<!-- about me section -->
<div class="row">
	<div class="col-sm-12 col-md-4">
		           
		            <h1 class="display-2"><?php bloginfo('title'); ?></h1>
		                <h1 class="display-4">About me</h1>
	</div>
	
	                
	              <div class="col-sm-12 col-md-8" id="about-me">
	              	  <p class="text-right"><?php show_post('about'); ?></p>
		          
	</div>

<!-- Experience section 	 -->
<div class="row">
	<div class="container content" id="WorkExperience">
	<h2 class="display-4 text-right">Work Expreince</h2>
	<?php $workExperience = new WP_Query(array(
                                'posts_per_page' => 5,
                                'post_type' => 'workExperience',
                                'orderby'   => 'post_date',
                                'order'     => 'DESC'
                                     )); 
                                        while($workExperience->have_posts()) {
                                        $workExperience-> the_post(); ?>
                                             <h4 class="display-5"><?php the_title(); ?></h4>
                                          <div>
                                              <p><?php the_content();?> </p>
                                           </div>
										<?php } ?>
	</div>
</div>	
<!-- blog posts section -->
<div class="row" id="educational-sec">
	
	<?php 
        $frontPagePost = new WP_Query(array(
          'posts_per_page' => 1,
          'category_name'  => 'education'
        ));                       
        while ($frontPagePost->have_posts()) {
            $frontPagePost->the_post(); ?>
       
            <div class="col-6">
            	<h2><?php the_title(); ?></h2>
	            <p><?php the_excerpt(); ?></p>
	           
            </div>
        
        <div class="col-6">
            <?php the_post_thumbnail( 'full' ) ?>
        <?php
        } wp_reset_postdata();
        ?>    
        </div>
</div>
			
</div> <!-- end page container -->

</main><!-- #main -->

		

	
		

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
