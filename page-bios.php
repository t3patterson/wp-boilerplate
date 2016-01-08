
<?php /* Template Name: Employee Bios Template*/ ?>
<?php get_header(); ?>
<main id="content-wrapper">
  <div class="container bios">
    <div class="row">
      <div class="col-xs-12">
        <?php if (have_posts()) { 
            while( have_posts() ) : the_post(); ?> 
            <div class="page-header">
              <h1> 
              <?php the_title(); ?>
              </h1>
            </div>
            <div class="blurb">
              <?php the_content(); ?>
            </div>
        <?php endwhile; 
        } else { ?>
        <h3>No content for bios-list </h3>
        <?php } ?>
      </div>
      <!-- Dynamic -->
  </div>
  <div class="row">
    <?php 
      $args=[
        "post_type" => "bio",
        "order" => "ASC"
      ];

      $the_query = new WP_Query($args);
    ?>

    <?php 
      if (have_posts() ){
        $counter = 1;
        // -> is an object operator... similary to theQuery.have_posts() in js...
        while ( $the_query -> have_posts() ) {
          //iterate +1
          $the_query -> the_post();
          $tn_id = get_post_thumbnail_id();        
          $tn_url = wp_get_attachment_image_src($tn_id, 'thumbnail-size',true);
          $post_id = get_the_ID();


          $even_or_odd;
          $counter % 2 == 0 ?  $even_or_odd = "even" : $even_or_odd = "odd";   
          
          $offset_style = '';

          if ($even_or_odd == "even"){
            $offset_style = 'col-md-offset-4';
          } 
      ?>

    <div class="col-xs-12 col-sm-12 col-md-8 <?php echo $offset_style ?> single-profile">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row"> 
            <div class="col-xs-12 col-sm-4 text-center bio-img">
              <img src="<?php echo $tn_url[0]; ?> " alt="<?php the_title(); ?>" class="center-block img-circle img-responsive">
            </div><!--/col--> 
            <div class="col-xs-12 col-sm-8 bio-text" >
              <h2><?php the_title(); ?></h2>
              <h4>Role</h4>
              <p><strong><?php echo get_post_meta($post_id, 'title_or_role', true);?></strong></p>
              <h4>Bio</h4>
              <p><?php echo get_post_meta($post_id, 'bio_description', true);?></p>
            </div><!--/col-->          
            <div class="clearfix"></div>
            </div><!--/row-->
          </div><!--/panel-body-->
        </div><!--/panel-->
      </div><!--/col--> 
      <?php $counter += 1; ?>
      <?php }} ?>
    <!-- END -->
    </div><!--/row--> 
  </div> 
  <hr>
<!-- </main> is closed in footer.php -->
<?php get_footer(); ?>

