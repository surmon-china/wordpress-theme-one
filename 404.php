<?php get_header(); ?>
<div id="content_wrap" style="height: 700px;-webkit-box-shadow: 0 0px 20px rgba(0,0,0,0.1);  -moz-box-shadow: 0 0px 20px rgba(0,0,0,0.1);-o-box-shadow: 0 0px 20px rgba(0,0,0,0.1);  box-shadow: 0 0px 20px rgba(0,0,0,0.1);border-radius: 5px;  background-color: #ffffff;padding: 10px;  margin: 10px auto;box-sizing: border-box;">
  <script type="text/javascript">     
function countDown(secs,surl){     
 var jumpTo = document.getElementById('jumpTo');
 jumpTo.innerHTML=secs;  
 if(--secs>0){     
     setTimeout("countDown("+secs+",'"+surl+"')",1000);     
     }     
 else{       
     location.href=surl;     
     }     
 }     
</script>
  <div class="page_404">
    <h2>404 . Not Just An Error</h2>
    <p>抱歉，沒有找到您需要的内容，将在<span id="jumpTo">5</span>秒后<span>&nbsp;<a href="<?php bloginfo('url'); ?>" id="localSrc">[ 跳转至首页 ]</a></span></p>
  </div>
</div>
<script type="text/javascript">
countDown(5,$('#localSrc').attr('href'));
</script>
<?php get_footer(); ?>
