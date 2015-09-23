<?php get_header(); ?>
<div id="content_wrap">
  <div class="content" id="content">
    <?php if ( !have_posts() ) : ?>
    <div class="archive-header">
      <h1>没有找到有关 [ <?php echo $s; ?> ] 的内容</h1>
      <p class="search_tit_p">给您推荐以下内容：</p>
    </div>
    <?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
				    'showposts' => 4,
				    'caller_get_posts' => 1,
				    'paged' => $paged
				);
				query_posts($args);
			?>
    <?php include( 'modules/excerpt.php' ); ?>
    <?php else: ?>
    <div class="archive-header">
      <h1>有关 [ <?php echo $s; ?> ] 的搜索内容</h1>
    </div>
    <?php include( 'modules/excerpt.php' ); ?>
    <?php endif; ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
