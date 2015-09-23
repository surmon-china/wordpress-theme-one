var scrolltotop={
	setting:{
		startline:100, //起始行
		scrollto:0, //滚动到指定位置
		scrollduration:300, //滚动过渡时间
		fadeduration:[500,100] //淡出淡现消失
	},
	controlHTML:'<div class="totop">TOP</div>', //返回顶部按钮
	controlattrs:{offsetx:100,offsety:120},//返回按钮固定位置
	anchorkeyword:"#top",
	state:{
		isvisible:false,
		shouldvisible:false
	},scrollup:function(){
		if(!this.cssfixedsupport){
			this.$control.css({opacity:0});
		}
		var dest=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);
		if(typeof dest=="string"&&jQuery("#"+dest).length==1){
			dest=jQuery("#"+dest).offset().top;
		}else{
			dest=0;
		}
		this.$body.animate({scrollTop:dest},this.setting.scrollduration);
	},keepfixed:function(){
		var $window=jQuery(window);
		var controlx=$window.scrollLeft()+$window.width()-this.$control.width()-this.controlattrs.offsetx;
		var controly=$window.scrollTop()+$window.height()-this.$control.height()-this.controlattrs.offsety;
		this.$control.css({left:controlx+"px",top:controly+"px"});
	},togglecontrol:function(){
		var scrolltop=jQuery(window).scrollTop();
		if(!this.cssfixedsupport){
			this.keepfixed();
		}
		this.state.shouldvisible=(scrolltop>=this.setting.startline)?true:false;
		if(this.state.shouldvisible&&!this.state.isvisible){
			this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]);
			this.state.isvisible=true;
		}else{
			if(this.state.shouldvisible==false&&this.state.isvisible){
				this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]);
				this.state.isvisible=false;
			}
		}
	},init:function(){
		jQuery(document).ready(function($){
			var mainobj=scrolltotop;
			var iebrws=document.all;
			mainobj.cssfixedsupport=!iebrws||iebrws&&document.compatMode=="CSS1Compat"&&window.XMLHttpRequest;
			mainobj.$body=(window.opera)?(document.compatMode=="CSS1Compat"?$("html"):$("body")):$("html,body");
			mainobj.$control=$('<div id="topcontrol">'+mainobj.controlHTML+"</div>").css({position:mainobj.cssfixedsupport?"fixed":"absolute",bottom:mainobj.controlattrs.offsety,right:mainobj.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"返回顶部"}).click(function(){mainobj.scrollup();return false;}).appendTo("body");if(document.all&&!window.XMLHttpRequest&&mainobj.$control.text()!=""){mainobj.$control.css({width:mainobj.$control.width()});}mainobj.togglecontrol();
			$('a[href="'+mainobj.anchorkeyword+'"]').click(function(){mainobj.scrollup();return false;});
			$(window).bind("scroll resize",function(e){mainobj.togglecontrol();});
		});
	}
};
scrolltotop.init();

//float right
jQuery(document).ready(function($) {
    //在页面DOM完全加载完成后开始执行以下函数 
    //将下一行引号中的内容替换成你想要下拉的模块 的ID或者CLASS名字,如"#ABC",".ABC"    
    var $sidebar = $("#aside_ad_box"),
        //找到ID为sidebar_fixed的元素
        $window = $(window),
        //找到全局window对象元素
        offset = $sidebar.offset(),
        //找到id元素的相当于与事件源对象的坐标位置
        topPadding = 70,
        //修改距顶间距为140px
        $footer = $("#footer"); //获取底部栏目距离顶部的距离，用来判断和浮动元素之间的距离关系
    $window.scroll(function() { //给全局窗口即浏览器窗口绑定滚动触发事件
        if ($window.scrollTop() > offset.top - 60) { //如果浏览器窗口往上滑动的距离大于id元素距离顶部的距离
            if ($footer.offset().top >= $window.scrollTop() + topPadding + $sidebar.height()) {
                //并且这个距离小于底部通栏距离顶部的距离（即边栏的浮动范围），则执行下面
                //那么这个距离指什么，这个距离包含高度本身，所以等于浮动margin高度+元素本身高度+边距高度
                $sidebar.stop().animate({ //则将其距离顶部的高度不断实时更新为，
                    marginTop: $window.scrollTop() - offset.top + topPadding //窗口滑动的高度减去它文档的高度，即看起来不变,但是看起来有延时的效果
                }, 10); //这个地方可以加上时间参数，或者把animate动画改为css的赋值，均可以控制动画效果
            }
        } else { //否则，则回复正常，距离顶部为0，恢复正常文档流，这里可以加入获取到内容区的高度，如果上面的高度等于内容区高度则停止
            $sidebar.stop().animate({
                marginTop: 0
            }, 10);
        }
    });
});