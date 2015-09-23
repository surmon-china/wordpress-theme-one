<aside id="sidebar">
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scroll_top_control.js"></script>
  <div class="aside_search">
    <form method="get" class="dropdown search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
      <input class="search-input" name="s" maxlength="15" lang="zh-CN" type="search" placeholder="Search..." x-webkit-speech >
      <input class="search_submit_btn" type="submit" value="搜索">
    </form>
  </div>
  <div class="aside_hot">
    <h3 class="aside_hot_tit">热门文章</h3>
    <ul class="aside_hot_box">
      <?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 8");  

         foreach ($result as $post) {

         setup_postdata($post);

         $postid = $post->ID;

         $title = $post->post_title;

         $commentcount = $post->comment_count;

         if ($commentcount != 0) { ?>
      <li><i class="aside_post_list_num"></i><a href="<?php echo get_permalink($postid); ?>" title="<?php echo $title ?>"> <?php echo $title ?></a></li>
      <?php } } ?>
    </ul>
  </div>
  <div class="aside_tag" >
    <h3 class="aside_tag_tit">相关标签</h3>
    <?php $html = '<ul class="aside_tag_content">';

				foreach (get_tags( array('number' => 45, 'orderby' => 'count', 'order' => 'DESC', 'hide_empty' => false) ) as $tag){

				        $tag_link = get_tag_link($tag->term_id);

				        $html .= "<li><a href='{$tag_link}' title='查看有关 {$tag->name} 的文章' class='{$tag->slug}'>";

				        $html .= "{$tag->name} ({$tag->count})</a></li>";

				}

			$html .= '</ul>';

			echo $html; ?>
  </div>
  <div class="aside_friendLink" >
    <h3 class="aside_friendLink_tit">友情链接</h3>
    <?php wp_nav_menu( array( 'theme_location' => 'friendLink_menu', 'container' => false, 'items_wrap' => '<ul id="friendLink_menu">%3$s</ul>'));?>
  </div>
  <div id="aside_ad_box">
    <div class="aside_feed_btn"><a href="<?php if(dopt('d_rss')!=''): ?><?php echo dopt('d_rss'); ?><?php else : ?><?php bloginfo('url'); ?>/feed<?php endif; ?>" target="_blank" >订阅本站</a></div>
    <div class="aside_ad_content"><?php echo dopt('d_tui'); ?></div>
  </div>
</aside>
