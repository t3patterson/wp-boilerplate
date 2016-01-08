
<?php /* Template Name: Portfolio Grid Template*/ ?>

<?php get_header(); ?>
<main id="content-wrapper">
  <div class="container" id="projects-portfolio">
    <div class="row">
      <div class="col-xs-12">
        <?php if (have_posts()) { 
            while( have_posts() ) : the_post(); ?> 
            <div class="page-header">
              <h1> 
              <?php the_title(); ?>
              </h1>
            </div>
            <?php the_content(); ?>
        <?php endwhile; 
        } else { ?>
        <h3>No content for portfolio </h3>
        <?php } ?>
      </div>
    </div>
    
    <div class="row">
      <?php 
        $args=[
          "post_type" => 'portfolio'
        ];

        $the_query = new WP_Query($args);

      ?>

      <?php if ( have_posts() ){ 
            while( $the_query->have_posts() ){ 
              $the_query->the_post();
              $post_id = get_the_ID();
              $tn_id = get_post_thumbnail_id();
              $tn_url = wp_get_attachment_image_src($tn_id, 'thumbnail-size',true);
      ?>

      <div class="col-sm-4 col-md-3 ">
        <div class="portfolio-piece">
          <pre><?php echo $tn_id ?></pre>
          <hr>
          <pre><?php echo print_r($tn_url[0]); ?></pre>
          <a href="<?php the_permalink(); ?>" >
              <div class="img-container"><img src="<?php echo $tn_url[0]; ?> " alt="<?php the_title(); ?>"></div>
              <div class="label-container">
                <h3><?php the_title(); ?></h3>
                <h5><?php echo get_post_meta($post_id, 'subtitle', true); ?></h5>
                <!--<p>Extra Information</p>-->
              </div>
          </a>
        </div>
      </div>
      <?php }} ?>
    </div>
  </div>
  <hr>
<!-- </main> is closed in footer.php -->
<?php get_footer(); ?>


