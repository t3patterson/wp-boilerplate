<?php get_header(); ?>
  <main id="content-wrapper">
    <div id="carousel-example-generic" class="front-page-slider carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li 
              data-target="#carousel-example-generic" 
              data-slide-to="0" 
              class="active">
            </li>
            <li 
              data-target="#carousel-example-generic" 
              data-slide-to="1" >
            </li>
            <li 
              data-target="#carousel-example-generic" 
              data-slide-to="2" >
            </li>
          
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        
            <div class="item active" >
              <div style="background: url('<?php bloginfo('template_directory');?>/images/barrel_1024.jpg') 0% 0% no-repeat; 
                        background-size: cover;
                        position: absolute; top: 0; left: 0; width: 100%; height: 100%"></div>
              <div class="carousel-caption">Barrels</div>
            </div>
            <div class="item">
              <div style="background: url('<?php bloginfo('template_directory');?>/images/worker_1024.jpg') 0% 0% no-repeat; 
                        background-size: cover;
                        position: absolute; top: 0; left: 0; width: 100%; height: 100%"></div>
              <div class="carousel-caption">Work</div>
            </div>
            <div class="item">
              <div style="background: url('<?php bloginfo('template_directory');?>/images/mtns_1024.jpg') 0% 0% no-repeat; 
                        background-size: cover;
                        position: absolute; top: 0; left: 0; width: 100%; height: 100%"></div>
              <div class="carousel-caption">More Work</div>
            </div>
           
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
  

    <div class="container-fluid fp-content-area">
      <div class="container">
      <!-- Example row of columns -->
        <div class="row">
          <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
           <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
           <?php endwhile; endif; ?>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-4">
           <?php if ( dynamic_sidebar('front-left') ); ?>
          </div>
          <div class="col-sm-4">
           <?php if ( dynamic_sidebar('front-center') ); ?>
          </div>
          <div class="col-sm-4">
           <?php if ( dynamic_sidebar('front-right') ); ?>
          </div>
        </div>
      </div>

<!-- </main> is closed in footer.php -->
<?php get_footer(); ?>
    