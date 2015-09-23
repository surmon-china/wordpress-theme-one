<h3>相关文章</h3>
<ul class="related_content">
	<?php
		$exclude_id = $post->ID;
		$posttags = get_the_tags();
		$i = 0;
		$limit = 8;
		if ($posttags) {
		    $tags = '';
		    foreach ($posttags as $tag) $tags.= $tag->name . ',';
		    $args = array(
		        'post_status' => 'publish',
		        'tag_slug__in' => explode(',', $tags) ,
		        'post__not_in' => explode(',', $exclude_id) ,
		        'caller_get_posts' => 1,
		        'orderby' => 'comment_date',
		        'posts_per_page' => $limit
		    );
		    query_posts($args);
		    while (have_posts()) {
		        the_post();
		        echo '<li><i class="related_num"></i><a href="' . get_permalink() . '" title="' . get_the_title() . '">', get_the_title() , '</a></li>';
		        $exclude_id.= ',' . $post->ID;
		        $i++;
		    };
		    wp_reset_query();
		}
		if ($i < $limit) {
		    $cats = '';
		    foreach (get_the_category() as $cat) $cats.= $cat->cat_ID . ',';
		    $args = array(
		        'category__in' => explode(',', $cats) ,
		        'post__not_in' => explode(',', $exclude_id) ,
		        'caller_get_posts' => 1,
		        'orderby' => 'comment_date',
		        'posts_per_page' => $limit - $i
		    );
		    query_posts($args);
		    while (have_posts()) {
		        the_post();
		        echo '<li><i class="related_num"></i><a href="' . get_permalink() . '" title="' . get_the_title() . '">', get_the_title() , '</a></li>';
		        $i++;
		    };
		    wp_reset_query();
		}
		if ($i == 0) {
		    echo '<li>暂无相关文章！</li>';
		}
	?>
</ul>