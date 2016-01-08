
<?php get_header(); ?>
<main id="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="page-header">
          <h1> 
          <?php wp_title(''); ?>
          </h1>
        </div>

        <?php   
          $options = [
            'post_type' => 'post',
            'category_name'=> 'featured'
          ];

          $qry = new WP_Query($options)
         ?>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
           <?php 
              if ( have_posts() ){ 
                while( $qry->have_posts() ) {
                  $qry->the_post();
                  $index = $qry->current_post;

                  ($index == 0) ? $state = 'active': $state = ''
            ?>
            
              <li 
                data-target="#carousel-example-generic" 
                data-slide-to="<?php echo $index ?>" 
                class="<?php echo $state ?>">
              </li>
            
            <?php 
              }}
              rewind_posts();
            ?>          


          </ol>


          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
          
            <?php 
               if( have_posts() ){ 
                 while( $qry->have_posts() ){
                   $qry->the_post();

                   $tn_id = get_post_thumbnail_id();
                   $tn_url = wp_get_attachment_image_src($tn_id, 'thumbnail-size', true);
                   $tn_meta = get_post_meta($tn_id, '_wp_attachment_image_alt', true);

                   $index = $qry->current_post;
                   ($index == 0) ? $state = 'active' : $state = ''
             ?>
              <div class="item <?php echo $state ?>">
                <img src="<?php echo $tn_url[0] ?>" alt="<?php echo $tn_meta; ?>">
                <div class="carousel-caption"><?php the_title(); ?></div>
              </div>
              <?php 
              }} 
              rewind_posts();
              ?>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

       
        <?php if (have_posts()) { 
            while( have_posts() ) : 
              the_post(); 
        ?> 
          <article class="post">
             <h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?>  </a> </h2>
             <p><em>
                By <?php the_author(); ?> 
                on <?php echo the_time('l, F jS, Y'); ?>
                <br>
                <small>in <?php the_category(', ') ?>.</small> 
                <br/>
             </em></p>
             <p class="text-right"> <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></p>

             <?php the_excerpt(); ?>
              <hr>

          </article>
             <?php endwhile; // endwhile ?>
        <?php } else { ?>
        <h3>No content here on home.php</h3>
        <?php } ?>
      </div>
    

     <?php get_sidebar('blog'); ?>

    </div>
  </div>
  
<!-- </main> is closed in footer.php -->
<?php get_footer(); ?>


