<div class="col-1-<?php echo $grid; ?> mason-item" style="padding-right: <?php echo $img_padding; ?>">
  <figure class="carousel-style19 <?php echo $css_class; ?> rpc-box">
      <div class="image" style="height: <?php echo $height; ?>;">
        <?php the_post_thumbnail('large', array('style' => 'height:'.$height.';')); ?>  
      </div>
      <figcaption class="rpc-bg">
        <div class="date rpc-date" style="color: <?php echo $dateclr; ?>; background: <?php echo $themeclr ?>;">
          <span class="day"><?php echo get_the_date( 'd' ); ?></span><span class="month"><?php echo get_the_date( 'M' ); ?></span>
        </div>
        <h3 class="rpc-title" style="font-size: <?php echo $txtsize; ?>; color: <?php echo $txtclr ?>"><?php echo get_the_title() ?></h3>
        <p class="rpc-content" style="font-size: <?php echo $descsize; ?>; color: <?php echo $descclr ?>">
          <?php $content = get_the_content(); echo mb_strimwidth($content, 0, $excerpt, '...');?>
        </p>
    </figcaption>
    <footer class="rpc-overlay" style="background: <?php echo $themeclr ?>;">
      <div class="comments">
      <i class="fa fa-comment"></i>
        <?php comments_number( '0', '1', '%' ); ?> 
      </div>
    </footer>
    <a href="<?php the_permalink(); ?>" tabindex="-1"></a>
  </figure>
</div>