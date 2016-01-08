
<?php get_header(); ?>
<main id="content-wrapper">
  <div class="container single-blog-post">
    <div class="row">
      <div class="col-md-9">
        <?php if (have_posts()) { 
            while( have_posts() ) : the_post(); ?> 
            
            <div class="page-header">
              <h1> 
              <?php the_title(); ?>
              </h1>
            </div>
            
            <?php 
              $tn_id = get_post_thumbnail_id();
               $tn_url = wp_get_attachment_image_src($tn_id, 'thumbnail-size', true);
               $tn_meta = get_post_meta($tn_id, '_wp_attachment_image_alt', true);
            ?>

            <p class="post-image"> <img src="<?php echo $tn_url[0] ?>" alt="<?php the_title(); ?>" > </p>
            
            <?php the_content(); ?>
            <hr>
            <?php comments_template(); ?>

        <?php endwhile; 
        } else { ?>
        <h3>No content here</h3>
        <?php } ?>
      </div>
    

     <?php get_ (); ?>

  </div> 
  
<!-- </main> is closed in footer.php -->
<?php get_footer(); ?>


