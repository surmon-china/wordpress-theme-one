<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head profile="http://gmpg.org/xfn/11">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8,ie=7">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title>
<?php wp_title('-', true, 'right'); echo get_option('blogname'); ?>
-
<?php if (is_home ()) echo get_option('blogdescription'); if ($paged > 1) echo '-Page ', $paged; ?>
</title>
<?php wp_head(); ?>
<!--[if lt IE 9]><script src="<?php bloginfo('template_url'); ?>/js/html5.js"></script><![endif]-->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/<?php if(dopt('d_maillist')!==''){echo dopt('d_maillist');}else{echo 'style';} ?>.css" media="all">
<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/Ajax.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/global.js"></script>
<!--首页自定义代码-->
<?php if( dopt('d_headcode_b') ) echo dopt('d_headcode'); ?>
</head>
<body>
<header>
  <div id="nav_bar">
    <div class="nav_content"> <a class="logo" href="<?php bloginfo('url'); ?>" style="width:<?php echo dopt('d_logo_w'); ?>px" title="<?php bloginfo('description'); ?>"></a>
      <nav>
        <?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'container' => false, 'items_wrap' => '<ul id="header_menu">%3$s</ul>'));?>
      </nav>
    </div>
  </div>
</header>
<section id="container">
<!--全站顶部通栏广告-->
<?php if( dopt('d_adsite_01_b') ) echo '<div class="banner" id="banner_global_top" >'.dopt('d_adsite_01').'</div>'; ?>
