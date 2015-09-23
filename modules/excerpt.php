<!--文章列表顶部广告-->
<?php if( dopt('d_adindex_02_b') ) printf('<div id="banner_postlist_top">'.dopt('d_adindex_02').'</div>'); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="post_list_divide"></div>
<article class="excerpt">
  <ul class="focus">
    <li class="metatime">
      <i class="fa fa-clock-o"></i><?php if(is_home()) the_time('Y.m.d'); else the_time('Y-m-d'); ?>
    </li>
    <li class="metacomt">
    <i class="fa fa-comments"></i>
      <?php 
					if ( comments_open() ) echo '<a href="'.get_comments_link().'">'.get_comments_number('0', '1', '%').'&nbsp;Comments</a>';
				?>
    </li>
    <li class="metaview">
      <i class="fa fa-eye"></i><?php deel_views('&nbsp;Views'); ?>
    </li>
    <li class="metacateblack-color">
      <i class="fa fa-list"></i><?php the_category(‘, ‘) ?>
    </li>
    <li class="metaauthor">
    <i class="fa fa-user"></i>
      <?php if( !is_author() ){ ?>
      <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?php echo get_the_author() ?></a>
      <?php } ?>
    </li>
  </ul>
  <div class="hl_excerpt">
    <h3 class="post_list_h3" ><a href="<?php the_permalink() ?>" title="<?php the_title(); ?> - <?php bloginfo('name'); ?>">
      <?php the_title(); ?>
      </a></h3>
    <p class="note"><?php echo deel_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 160, '...'); ?></p>
  </div>
</article>
<?php endwhile; wp_reset_query(); ?>
<?php deel_paging(); ?>
