<?php include('comment-args.php');?>


<section class="blog-comment-style">
<?php comment_form($comment_ops); ?>
</section>

<h3>There <?php comments_number('are no comments','is 1 Comment', 'are % comments')?></h4>  
<?php if ( have_comments() ) :
      while(have_comments()) : the_comment();
?>
  <aside class="comment row">
    <div class="col-xs-1">    
      <?php echo get_avatar($comment, 50); ?>
    </div>
    <div class="col-xs-10">
      <p><strong><?php comment_author(); ?></strong> </p>
      <p><?php comment_text(); ?></p>
    </div>


  </aside>
<?php endwhile ; endif ;?>