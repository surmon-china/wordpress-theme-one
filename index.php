<?php error_reporting(0); get_header(); ?>

<div id="content_wrap">

<!--首页顶部通栏广告-->

<?php if( dopt('d_adindex_01_b') ) printf('<div class="banner" id="banner_index_top">'.dopt('d_adindex_01').'</div>'); ?>

	<div class="content" id="content">

	<?php 

		if( dopt('d_adindex_03_b') ) printf('<div class="banner" id="banner_content_top" >'.dopt('d_adindex_03').'</div>');



		if( $paged && $paged > 1 ){

			printf('<div class="archive-header"><h1>第'.$paged.'页</h1></div>');

		}else{

			include 'modules/sticky.php';

			printf('');

		}



		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array(

		    'caller_get_posts' => 1,

		    'paged' => $paged

		);

		query_posts($args);

		include 'modules/excerpt.php'; 

	?>

	</div>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>