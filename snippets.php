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

----------------
          <?php 
             if( have_posts() ){ 
               while( $qry->have_posts() ){
                 $qry->the_post();

                 $tn_id = get_post_thumbnail_id();
                 $tn_url = wp_get_attachment_image_src($tn_id, 'thumbnail-size', true);
                 
                 $index = $qry->the_post();
                 ($index == 0) ? $state = 'active' : $state = ''
           ?>
             <div class="item <?php echo $state ?>">
              <img src="<?php echo $tn_url[0] ?>" alt="<?php the_title(); ?>">
              <div class="carousel-caption"><?php the_title(); ?></div>
            </div>
            <?php 
            }} 
            rewind_posts();
            ?>