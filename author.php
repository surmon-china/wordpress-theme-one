<?php get_header(); 
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
?>
<div id="content_wrap">
  <div class="content" id="content">
    <div class="archive-header">
      <h1><?php echo $curauth->display_name.' 的文章' ?></h1>
      <?php if ( $curauth->description ) echo '<div class="archive-header-info">'.$curauth->description.'</div>'; ?>
    </div>
    <?php include( 'modules/excerpt.php' ); ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
