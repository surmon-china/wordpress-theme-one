<?php get_header(); ?>
<div id="content_wrap">
  <div class="content" id="content">
    <?php while (have_posts()) : the_post(); ?>
    <div class="article-header">
      <h1 class="article-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
      </h1>
      <div class="meta">
        <time class="muted"><i class="fa fa-clock-o"></i><?php the_time('Y.m.d');?></time>
        <?php  
					$category = get_the_category();
			        if($category[0]){
			            echo '<span class="muted"><i class="fa fa-list"></i><a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a></span>';
			        }
				?>
        <span class="muted"><i class="fa fa-eye"></i><?php deel_views(' Views'); ?></span>
        <?php if ( comments_open() ) echo '<span class="muted"><i class="fa fa-user"></i><a href="'.get_comments_link().'">'.get_comments_number('去', '1', '%').' Comments</a></span>'; ?>
        <?php edit_post_link('[ 编辑 ]'); ?>
      </div>
    </div>
    <!-- 内容页顶部广告 -->
    <?php if( dopt('d_adpost_01_b') ) echo '<div class="banner_post_top">'.dopt('d_adpost_01').'</div>'; ?>
    <article class="article-content">
      <?php the_content(); ?>
    </article>
    <?php endwhile;  ?>
    <div class="article-footer">
    </div>
    <div class="relates">
      <?php include( 'modules/related.php' ); ?>
    </div>
    <?php if( dopt('d_adpost_02_b') ) echo '<div class="banner_post_bottom">'.dopt('d_adpost_02').'</div>'; ?>
    <?php comments_template('', true); ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>