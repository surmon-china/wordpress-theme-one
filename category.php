<?php get_header(); ?>

<div id="content_wrap">
  <div class="content" id="content">
    <div class="archive-header">
      <h1><a href="<?php echo get_category_link( get_cat_ID( single_cat_title('',false) ) ); ?>">
        <?php single_cat_title() ?>
        </a></h1>
      <?php if ( category_description() ) echo '<div class="archive-header-info">'.category_description().'</div>'; ?>
    </div>
    <?php include( 'modules/excerpt.php' ); ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
