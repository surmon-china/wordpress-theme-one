<div class="index_showbox">
    <?php
		$sticky = get_option('sticky_posts');
		rsort($sticky);
		query_posts(array(
		    'post__in' => $sticky,
		    'caller_get_posts' => 1,
		    'showposts' => dopt('d_sticky_count') ? dopt('d_sticky_count') : 1
		));
		while (have_posts()):
		    the_post();
		    echo '<div class="index_showbox_content"><a class="index_showbox_content_img" href="' . get_permalink() . '" title="' . get_the_title() . '" >';
		    echo the_post_thumbnail('medium', array(
		        'alt' => trim(strip_tags($post->post_title)) ,
		        'title' => trim(strip_tags($post->post_title))
		    ));
		    echo '</a><div class="index_showbox_content_tit"><h2 class="index_showbox_content_tit_h2"><a href="' . get_permalink() . '" title="' . get_the_title() . '" >' . get_the_title() . '</a></h2><p class="index_showbox_content_p">' . deel_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)) , 0, 190, '...') . '<span class="index_showbox_p_more"></span></p></div>';
		    echo '</div>';
		endwhile;
		wp_reset_query();
	?>
</div>