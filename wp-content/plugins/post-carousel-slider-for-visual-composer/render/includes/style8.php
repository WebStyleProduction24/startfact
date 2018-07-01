<div class="col-1-<?php echo $grid; ?> mason-item" style="padding-right: <?php echo $img_padding; ?>">
  <figure class="carousel-style18 rpc-box <?php echo $css_class; ?>">
  <div class="image">
    <?php the_post_thumbnail('large', array('style' => 'height:'.$height.';')); ?>    
    <i class="fa fa-comment">
      <span class="comnt-count">
          <?php comments_number( '0', '1', '%' ); ?>
      </span>
    </i>
    <div class="date rpc-date" style="color: <?php echo $dateclr; ?>;"><span class="day"><?php echo get_the_date( 'd' ); ?></span><span class="month"><?php echo get_the_date( 'M' ); ?></span></div>
  </div>
  <figcaption>
    <h3 class="rpc-title" style="font-size: <?php echo $txtsize; ?>; color: <?php echo $txtclr ?>"><?php echo get_the_title() ?></h3>
    <p class="rpc-content">
      <?php $content = get_the_content(); echo mb_strimwidth($content, 0, $excerpt, '...');?>
    </p>
    <a href="<?php the_permalink(); ?>" class="read-more " tabindex="0">Read More</a>
      </figcaption>
  </figure>
</div>