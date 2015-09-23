$(function(){
	//开始定义全局事件

	//导航栏事件
	if ($("ul#header_menu>li>ul")) {
		//预定义是否点击信号
		var clickTF = false;
		//预定义当前的菜单位置
		var $nowMenu;
		//绑定一级菜单鼠标悬浮事件
		$("ul#header_menu>li>a").hover(function(){
		//每次鼠标放上则重置信号为未点击
		clickTF = false;
		//将当前的选中项存储起来，给悬浮释放事件使用
		$nowMenu = $('ul#header_menu>li[class*=current-menu-item]');
		//如果鼠标放上，则二级菜单显示
		$(this).next().css("display","block");
		//并且去掉所有a链接的选中图标，单独给其本身加上
		$("ul#header_menu>li").removeClass('current-menu-item');
		//单独给本身加上选中图标
		$(this).parent().addClass('current-menu-item');
		//如果在悬浮的过程中被点击了，则给释放事件一个信号
		$(this).click(function(){
			clickTF = true;
		});

	    },function(){
	    	//定义释放事件
	    	//使二级菜单隐藏
	        $(this).next().css("display","none");
	    	//如果松开时链接被点击了，则执行函数
	    	//函数目的：移出所有的标签，单独给当前加上标签
	    	if (clickTF) {
	    		$("ul#header_menu>li").removeClass('current-menu-item');
    	        $(this).parent().addClass('current-menu-item');
	    	}else{
	    	//否则，没有点击，则继续执行	
	        //去除其父元素的标签，即悬浮事件执行的当前的高亮
	        $(this).parent().removeClass('current-menu-item');
	        //给原本备份存储的当前高亮菜单恢复其效果
			$nowMenu.addClass('current-menu-item');
	    	}
    });


	//给二级菜单绑定悬浮事件
    $('ul#header_menu>li>ul.sub-menu').hover(function(){
	    	//如果鼠标放上则其本身显示
	        $(this).css("display","block");
	        //去掉所有的标示，给其本身的父元素加上标示
	        $("ul#header_menu>li").removeClass('current-menu-item');
	        $(this).parent().addClass('current-menu-item');
	        //如果他点击了，则把释放更改为true
	        $(this).click(function(){
				clickTF = true;
			});
	    },function(){
	    	//如果松开则隐藏自己
	        $(this).css("display","none");
	        //如果松开时链接被点击了，则执行函数
		    	//函数目的：移出所有的标签，单独给当前加上标签
	    	if (clickTF) {
	    		$("ul#header_menu>li").removeClass('current-menu-item');
		        $(this).parent().addClass('current-menu-item');
	    	}else{
	    	//否则，没有点击，则继续执行	
	        //去除其父元素的标签，即悬浮事件执行的当前的高亮
	        $(this).parent().removeClass('current-menu-item');
	        //给原本备份存储的当前高亮菜单恢复其效果
			$nowMenu.addClass('current-menu-item');
	    	}
	    });
	}
	

    //处理侧边栏友链模块的下划线
    //目的在于：判断如果剩下一个就给这个去掉下划线，否则给最后两个都去掉下划线
    var $fl = $('#friendLink_menu>li');
    var flLength = $('#friendLink_menu>li').length;
    var flLastLi = $fl[flLength - 1];
    var flLastLi2 = $fl[flLength - 2];
    //如果除以二不可以整除，说明是奇数最后会剩下一个，否则剩下两个
    if (flLength % 2 != 0) {
    	flLastLi.childNodes[0].style.borderBottom = '0px';
    }else{
    	flLastLi.childNodes[0].style.borderBottom = '0px';
    	flLastLi2.childNodes[0].style.borderBottom = '0px';
    }


    //给所有未包含title属性的a标签添加title信息，优化seo
    var ulA = $("a");
    for (var i = 0; i < ulA.length; i++) {
        if (ulA[i].getAttribute('title') == null) {//判断链接没有title元素才给其加入title元素
        var ulaT = ulA[i].innerHTML;
        ulA[i].setAttribute("title",ulaT)
      }
    }
    $('.footer_content').prepend('Theme by <a href="http://surmon.me/about" target="_blank" title="Theme By cute Surmon ^-^~">One</a>&nbsp;');

    //定义侧边栏分享效果
    $('.share_main').hover(function(){
    	if($('#Share_Bar').is(":animated")){
            $(this).stop(false,true).animate({'left':'0px'},200);
        } else{
            $('#Share_Bar').animate({'left':'0px'},200);
        }
    },function(){
    	if($('#Share_Bar').is(":animated")){
            $(this).stop(false,true).animate({'left':'-120px'},200);
        } else{
             $('#Share_Bar').animate({'left':'-120px'},200);
        }
    });

    
})