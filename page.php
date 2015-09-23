<?php get_header(); ?>
<div id="content_wrap">
  <div class="content" id="content">
    <?php while (have_posts()) : the_post(); ?>
    <div class="article-header">
      <h1 class="article-title"><a href="<?php the_permalink() ?>">
        <?php the_title(); ?>
        </a></h1>
      <div class="meta">
        <time class="muted"><i class="ico icon-time icon12"></i>
          <?php the_time('Y-m-d');?>
        </time>
        <span class="muted"><i class="ico icon-eye-open icon12"></i>
        <?php deel_views('浏览'); ?>
        </span>
        <?php if ( comments_open() ) echo '<span class="muted"><i class="icon-comment icon12"></i> <a href="'.get_comments_link().'">'.get_comments_number('去', '1', '%').'评论</a></span>'; ?>
        <?php edit_post_link('[编辑]'); ?>
      </div>
    </div>
    <article class="article-content">
      <?php the_content(); ?>
    </article>
    <?php comments_template('', true); ?>
    <?php endwhile;  ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
