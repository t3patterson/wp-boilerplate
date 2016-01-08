
<?php get_header(); ?>
<main id="content-wrapper">
  <div class="container single-portfolio">
    <div class="row">
      <div class="col-xs-12 col-sm-8">
        <h1>Portfolio</h1>
      </div>
      <div class="col-xs-12 col-sm-4">
        <p class="text-center nav-arrows">
          <?php previous_post_link('%link', '<span class="glyphicon glyphicon-circle-arrow-left "></span>') ;?>            
          <a href="<?php bloginfo('url')?>/portfolio-grid-w-custom-posts"><span class="glyphicon glyphicon-th"></span></a>
          <?php next_post_link('%link', '<span class="glyphicon glyphicon-circle-arrow-right"></span>') ;?>
        </p>
      </div>
    </div>
    
    <div class="row">
        <?php if (have_posts()) { 
            while( have_posts() ) : the_post(); ?> 
          <div class="col-xs-12 col-sm-8 col-md-9 text-center feature-image">
            
            <?php 
              $tn_id = get_post_thumbnail_id();
              $tn_url = wp_get_attachment_image_src($tn_id, 'thumbnail-size',true);
            ?>
            
            <img src="<?php echo $tn_url[0] ?>" alt="<?php echo   the_title(); ?>">
          </div>

          <div class="col-xs-10 col-xs-offset-2 col-sm-offset-0 col-sm-4 col-md-3 item-metadata">
            <h3><?php the_title(); ?></h2> 
            <?php the_content(); ?>
          </div>
          
        <?php endwhile; 
        } else { ?>
        <h3>No content here for single-porfolio piece</h3>
        <?php } ?>
    </div>
    
  </div> 
  
<!-- </main> is closed in footer.php -->
<?php get_footer(); ?>


