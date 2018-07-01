<div class="col-1-<?php echo $grid; ?> mason-item" style="padding-right: <?php echo $img_padding; ?>">
<div class="mega-post-carousel5 <?php echo $css_class; ?>" style="margin-bottom: 40px;">
    <div class="mega-post-image" style="height: <?php echo $height; ?>;">
      <?php the_post_thumbnail('large', array('style' => 'height:'.$height.';')); ?>
      <div class="mega-post-category" style="display: <?php echo $catg; ?>">
        <?php $categories = get_the_category();
          $separator = ' ';
          $output = '';
          if ( ! empty( $categories ) ) {
              foreach( $categories as $category ) {
                  $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
              }
              echo trim( $output, $separator );
          } ?>   
      </div>
      <div class="mega-post-socials">
         <?php
            $fbshare = 'http://www.facebook.com/sharer.php?u='.get_permalink().'&amp;t='.get_the_title();
            $twshare = 'http://twitter.com/home/?status='.get_the_title().' - '.get_permalink();
            $gplusshare = 'https://plus.google.com/share?url='.get_permalink();
            $linkedin = 'http://www.linkedin.com/shareArticle?mini=true&amp;title='.get_the_title().'&amp;url='.get_permalink();      
            $pinterest = 'https://pinterest.com/pin/create/button/?url='.get_permalink().'&media='.get_the_post_thumbnail_url().'>&description='.get_the_title();     
          ?>
              <?php if (1) { ?>
                <a href="<?php echo $fbshare; ?>"><i class="fa fa-facebook"></i></a>
              <?php } ?>
              <?php if (1) { ?>
                <a href="<?php echo $twshare; ?>"><i class="fa fa-twitter"></i></a>
              <?php } ?>
              <?php if (1) { ?>
                <a href="<?php echo $gplusshare; ?>" onclick="javascript:window.open(this.href,
          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <i class="fa fa-google-plus"></i></a>
              <?php } ?>
              <?php if (1) { ?>
                <a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin"></i></a>
              <?php } ?>
              <?php if (1) { ?>
                <a href="<?php echo $pinterest; ?>" target="_blank"> <i class=" fa fa-pinterest"></i></a>
              <?php } ?>
      </div>
    </div>
    <h3 class="mega-post-title">
      <a style="font-size: <?php echo $txtsize; ?>; color: <?php echo $txtclr ?>" href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
    </h3>
    <div class="clearfix"></div>
    <div class="mega-post-para">
      <p style="font-size: <?php echo $descsize; ?>; color: <?php echo $descclr ?>">
        <?php $content = get_the_content(); echo mb_strimwidth($content, 0, $excerpt, '...');?>
      </p>
    </div>
    <span class="mega-post-meta" style="color: <?php echo $dateclr; ?>;">
      <i class="fa fa-user"></i>
      <span style="color: <?php echo $dateclr; ?>; padding-right: 15px;">
        <?php echo get_the_author(); ?>
      </span>
    </span>
    <span class="mega-comment-box" style="display: <?php echo $comment; ?>">
      <span class="mega-post-comment">
        <i class="fa fa-comment"></i> <a><?php comments_number( '0', '1', '%' ); ?> </a>
      </span>         
    </span>
    <div class="clearfix"></div>
  </div>
  </div>