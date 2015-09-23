$(function(){
		var ajaxhome=window.location.host;      //获取到当前域名并定位顶域基础
		var ajaxcontent = 'content';            //定义需要ajax交互的dom区域
		var ajaxsearch_class = 'search-form';   //定义搜索模块表单的form的class属性，以绑定使其生效
		var ajaxignore_string = new String('#, /wp-, .pdf, .zip, .rar, /go');  //定义那些不希望ajas生效的后缀或路径
		var ajaxignore = ajaxignore_string.split(', ');   //忽略的字符串是一串字符串，所以用逗号分隔
		var ajaxloading_code = 'loading';      //预定义ajax加载过程中的状态为loading
		var ajaxloading_error_code = 'error';  //预定义出现异常时异常代码为error
		var ajaxreloadDocumentReady = false;   //是否等待文档加载加载完毕再重载ajax
		var ajaxtrack_analytics = false;       //是否监听并分析ajax行为
		var ajaxscroll_top = true;             //点击按钮回顶部的效果是否开启
		var ajaxisLoad = false;                //ajax加载状态，默认否
		var ajaxstarted = false;               //ajax加载状态，默认否
		var ajaxsearchPath = null;             //指定一个以NULL结束的字符串，该字符串指定要查找的文件的路径。
		var ajaxua = jQuery.browser;           //获取浏览器标示内容
		jQuery(document).ready(function() {	
			ajaxloadPageInit("");              //在页面DOM载入完毕后，执行此函数，此函数见27行调用，并传入参数空字符
		});

		window.onpopstate = function(event) {   //用来处理ajax导致的地址栏底部不变更的问题
			if (ajaxstarted === true && ajaxcheck_ignore(document.location.toString()) == true) {	
				//如果ajax已加载并且ajax检查忽略掉则执行下面的装载函数，并且传入一个当前页面地址的参数
				ajaxloadPage(document.location.toString(),1);
			}
		};

		function ajaxloadPageInit(scope){       //此函数在页面dom加载完毕后就开始执行
			jQuery(scope + "a:not([target='_blank']").click(function(event){
				//绑定作用范围内的所有A链接，并绑定点击事件，时间内传入事件参数，首次传入的值为空
				if (this.href.indexOf(ajaxhome) >= 0 && ajaxcheck_ignore(this.href) == true){
					//如果当前的地址是域内的页面并且
					event.preventDefault();
					this.blur();
					var caption = this.title || this.name || "";
					var group = this.rel || false;
					try {
						ajaxclick_code(this);
					} catch(err) {
					}
					ajaxloadPage(this.href);
				}
			});
			
			jQuery('.' + ajaxsearch_class).each(function(index) {
				if (jQuery(this).attr("action")) {//如果表单定义了提交方式
					ajaxsearchPath = jQuery(this).attr("action");;    //获取到搜索表单的提交方式
					jQuery(this).submit(function() {//给提交按钮定义事件
						submitSearch(jQuery(this).serialize());//序列化表单的数据，
						return false;//并且停止默认提交事件
					});
				}
			});
			
			if (jQuery('.' + ajaxsearch_class).attr("action")) {} else {
			}
		}

		function ajaxloadPage(url, push, getData){
			if (!ajaxisLoad){
				if (ajaxscroll_top == true) {
					jQuery('html,body').animate({scrollTop: 0}, 200);   //定义点击了链接之后的返回顶部的动画
				}
				ajaxisLoad = true;
				ajaxstarted = true;
				nohttp = url.replace("http://","").replace("https://","");
				firstsla = nohttp.indexOf("/");
				pathpos = url.indexOf(nohttp);
				path = url.substring(pathpos + firstsla);
				
				if (push != 1) {
					if (typeof window.history.pushState == "function") {
						var stateObj = { foo: 1000 + Math.random()*1001 };
						history.pushState(stateObj, "ajax page loaded...", path);
					} else {
					}
				}
				if (!jQuery('#' + ajaxcontent)) {
				}
				jQuery('#' + ajaxcontent).append(ajaxloading_code);
				jQuery('#' + ajaxcontent).fadeTo("fast", 0.4,function() {   //定义点击链接后开始渐隐的动画，或者事件
					jQuery('#' + ajaxcontent).fadeIn("fast", function() {
						jQuery.ajax({
							type: "GET",
							url: url,
							data: getData,
							cache: false,
							dataType: "html",
							success: function(data) {
								ajaxisLoad = false;
								
								datax = data.split('<title>');
								titlesx = data.split('</title>');
								 
								if (datax.length == 2 || titlesx.length == 2) {
									data = data.split('<title>')[1];
									titles = data.split('</title>')[0];
									jQuery(document).attr('title', (jQuery("<div/>").html(titles).text()));
								} else {
									
								}
								if (ajaxtrack_analytics == true) {
									if(typeof _gaq != "undefined") {
										if (typeof getData == "undefined") {
											getData = "";
										} else {
											getData = "?" + getData;
										}
										_gaq.push(['_trackPageview', path + getData]);
									}
								}
								data = data.split('id="' + ajaxcontent + '"')[1];
								data = data.substring(data.indexOf('>') + 1);
								var depth = 1;
								var output = '';
								
								while(depth > 0) {
									temp = data.split('</div>')[0];
									i = 0;
									pos = temp.indexOf("<div");
									while (pos != -1) {
										i++;
										pos = temp.indexOf("<div", pos + 1);
									}
									depth=depth+i-1;
									output=output+data.split('</div>')[0] + '</div>';
									data = data.substring(data.indexOf('</div>') + 6);
								}
								document.getElementById(ajaxcontent).innerHTML = output;
								jQuery('#' + ajaxcontent).css("position", "absolute");
								jQuery('#' + ajaxcontent).css("left", "20000px");
								jQuery('#' + ajaxcontent).show();
								ajaxloadPageInit("#" + ajaxcontent + " ");
								
								if (ajaxreloadDocumentReady == true) {
									jQuery(document).trigger("ready");
								}
								try {
									ajaxreload_code();
								} catch(err) {
								}
								jQuery('#' + ajaxcontent).hide();
								jQuery('#' + ajaxcontent).css("position", "");
								jQuery('#' + ajaxcontent).css("left", "");
								jQuery('#' + ajaxcontent).fadeTo("fast", 1, function() {});
							},
							error: function(jqXHR, textStatus, errorThrown) {
								ajaxisLoad = false;
								document.title = "Error loading requested page!";
								document.getElementById(ajaxcontent).innerHTML = ajaxloading_error_code;
							}
						});
					});
				});
			}
		}

		function submitSearch(param){
			if (!ajaxisLoad){
				ajaxloadPage(ajaxsearchPath, 0, param);
			}
		}

		function ajaxcheck_ignore(url) {    //此函数传入一个url
			for (var i in ajaxignore) {
				if (url.indexOf(ajaxignore[i]) >= 0) {
					return false;
				}
			}
			return true;
		}

		function ajaxreload_code() {
			//add code here
		}

		function ajaxclick_code(thiss) {
			jQuery('ul.nav li').each(function() {
				jQuery(this).removeClass('current-menu-item');
			});
			jQuery(thiss).parents('li').addClass('current-menu-item');
		}
})