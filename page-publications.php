
<?php /* Template Name: Publications Grid Template*/ ?>

<?php get_header(); ?>
<main id="content-wrapper">
  <div class="container">
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
          "post_type" => 'publication'
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
      
      <style>
      .published-piece{
        margin-bottom: 50px;
        padding: 5%;
      }

      .published-piece .summary {
        font-size: 18px;
      }

      .lnk-container{
        text-align: center;
        margin-top: 20px;
      }

      .published-piece a {
        border: 4px #333 solid;
        margin: 0 auto;
      }

      </style>

      <div class="col-sm-6 published-piece">
        <h2 class="bg-info"><?php the_title(); ?></h2>
        
        <p class="text-right">
          <small>
            <?php  echo get_post_meta($post_id, 'publication_date', true);?>
          </small>  
        </p>

        <?php if ( !strpos($tn_url[0],'default.png')  ) {?>
        <p class="bg-success text-right well">
          <img src="<?php echo $tn_url[0]; ?>" alt="<?php  echo get_post_meta($post_id, 'publication_source', true);?>"/>
        </p>
        <?php } ?>
        
        <p class="summary">
          <?php echo get_post_meta($post_id, 'publication_summary', true);?>        
        </p>

        <?php  if ( get_post_meta($post_id, 'excerpt_quote', true) ) { ?>
        <blockquote>
          <em>
            <?php  echo get_post_meta($post_id, 'excerpt_quote', true); ?>
            <p class="text-right">
              <br/>
              <cite>  <strong>– <?php echo get_post_meta($post_id, 'excerpt_quote_author', true); ?></strong></cite>
            </p>
          </em>
        </blockquote>
        <?php } ?>

        <?php  if ( get_post_meta($post_id, 'link_to_article', true) ) { ?>

        <p class="lnk-container">
          <a class="btn btn-default btn-lg" href="<?php echo get_post_meta($post_id, 'link_to_article') ?>">
            Read <?php  echo get_post_meta($post_id, 'publication_source', true);?> article
          </a>
        </p>
        
        <?php } ?>
      </div>
      <?php }} ?>
    </div>
  </div>
  <hr>
<!-- </main> is closed in footer.php -->
<?php get_footer(); ?>


