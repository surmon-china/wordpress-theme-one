<div id="Share_Bar">
  <div class="share_main">
    <div class="share_link">
      <a target="_blank" rel="nofollow" href="http://v.t.sina.com.cn/share/share.php?&url=<?php the_permalink(); ?>&title=<?php the_title(''); ?>" title="新浪微博"><i class="icon-weibo"></i>微博</a>   
      <a target="_blank" rel="nofollow" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php the_permalink(); ?>&title=<?php the_title(''); ?>&desc=&summary=&site=" title="QQ空间"><i class="icon-qzone"></i>QQ空间</a>  
      <a target="_blank" rel="nofollow" href="http://www.douban.com/recommend/?url=<?php the_permalink(); ?>&title=<?php the_title(''); ?>"  title="豆瓣"><i class="icon-douban"></i>豆瓣</a>   
      <a target="_blank" rel="nofollow" href="http://www.kaixin001.com/rest/records.php?url=<?php the_permalink(); ?>&style=11&content=<?php the_title(''); ?>&stime=&sig="  title="开心网"><i class="icon-kx001"></i>开心网</a>   
      <a target="_blank" rel="nofollow" href="http://share.renren.com/share/buttonshare?link=<?php the_permalink(); ?>&title=<?php the_title(''); ?>" title="人人网"><i class="icon-renren"></i>人人网</a>   
      <a target="_blank" rel="nofollow" href="http://cang.baidu.com/do/add?iu=<?php the_permalink(); ?>&it=<?php the_title(''); ?>&linkid=hjm6y313aqz" title="百度云收藏"><i class="icon-baidu"></i>百度云收藏</a>   
      <a target="_blank" rel="nofollow" href="<?php if(dopt('d_rss')!=''): ?><?php echo dopt('d_rss'); ?><?php else : ?><?php bloginfo('url'); ?>/feed<?php endif; ?>" title="订阅我们"><i class="fa fa-rss"></i>RSS订阅</a>
    </div>
    <div class="share_btnn">
      <p>Share</p>
    </div>
  </div>
</div> 