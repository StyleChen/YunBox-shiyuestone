(function(){
	log('[c="font-family: \'Microsoft Yahei\', Helvetica, Arial, sans-serif; color: #fff; font-size: 20px; padding: 15px 20px; background: #444; border-radius: 4px; line-height: 100px; text-shadow: 0 1px #000"]Power By 厦门云聪网络科技有限公司[c]');
	log("%c\n                      .,:,.                                                                                                                           \n                 .r1qG8OOOO8Equ;                                                                                                                      \n              ,q@B@B@BBMMMMM@@@B@BuY8B@B@B@MNJi                                                                                                       \n             0B@BMOM8OGOGO8OOMM@B@@@B@B@B@B@B@B@Bu                                                                                                    \n            @BBOO88G8GOGOOMB@B@B@@@B@@@B@B@B@BBB@B@q                                                                                                  \n           @BMGOG8G8ZOGOM@B@X7.           :YZ@B@BMB@@i                                       ;:   :;                              rSY    :ju          \n          JBM88G8G8GOGOB@X,                   :X@BBM@B,       .B@B@B@@@B@B@B@Br    S@B@B@@@ .B@: .@B:     JB@B@B@B@B@B@B@@@F      @B5    @@B@Z0SNE    \n        iUBB88ZOZOG88M@@       .r2POOM8E5L:      FB@M@M        uYLvLLYvLvLLLY2.     B@r M@i.M@@@B@B@@i    L@BJ,::::::::,r@Bk     vBB    0@8rjj0@B@    \n      uB@BB8OZ8GOOMB@@@     :N@B@B@B@B@@@B@B@U    ,B@B@                             NB. EB  @Bi,i::B@r    vB@:Er Y57G .q:O@U    .@M 7B@B@BB   XB@:    \n     8B@MOGOG8ZOO@B@ZB.    BB@B@@@Bkr,.,r0B@B@Br   .B@M                             N@BBB@  B@     @Br    7@@.8M @1,B.U@.BB2    B@krB@i, 7B@uMB8      \n    JBBO8G8Z8GOO@O,       @BMOMBB:         U@M@B:   ZBi      @@@@B@B@B@B@B@B@B@B    ZB, EB  @B     B@r    vB@ rBZB, @B@u B@u    NjFB@u    P@@B@i      \n    B@8OG8Z8GOO@q        2BMOM@P     ::     F@O@N   SB       iri:.2@@@;::i:::ii;    0@i G@ .@@B@B@B@B.    7@B  @BB  J@@  @BU      U@u  kO@Zv ,U@BBv   \n   .@MOZ8G8ZO8BB         L@OO@B    F@B@Br   2BMBG   i             MB@:              EB@O@@  ;.iiir:.      vB@. U@i   B8  B@U     M@7   O@v..  .,MBv   \n   .BB88GOZOZOBU          E@O@7   :@BBB@:  .BBM@r                BB@:     7O1       P@  P@ .O,OX Bk E@    7@B  @B@  1@B  @B1    G@B@B@  B@B@B@@@Bu    \n    @BOG8G8Z88@7          jBMBi   .B@OBq..YB@M@B                @BE        B@q      GB: 8BkqB,@B O@ r@,   v@@:@G @@2@.JB,M@u    .i...   @@7    B@F    \n    i@BOZOG8GO@P         LBMO@U    uB@M@B@B@B@B               :@B@7:L25N0OG@B@i    ZB@@@B@vM0.B@  i.:@Y   7@BLU   B@,  i:MBS    .  ,iki @@i    @BN    \n     J@BMOO8OGBB,        M@OOM@     vB@B@B@@@7                vB@B@B@B@B@BG2@B@    ;7.  B@iBq @Bui@BJB@   u@@i         ,qB@J   ,@B@B@@i.@B@1qFMB@J    \n      :@B@B@MBB@Br       uBM8OB@      :YJYi                                 ,Yu.        O@7,  7EOMGr i:   v@B:         OBOY            .5u10qZX2i     \n        :5MB@B@B@B@L,     M@BOMB@L             j:                                                                                                     \n                 .B@B@@M   5B@@B@@Bki      ,7BBB                                                                                                      \n                   rBB@@@F   k@B@B@B@B@B@B@B@B7                                                                                                       \n                       .i11:     :i7vuuuL7:                                                                                                           ","color:#d15116");
	var style = 'font-family: "Microsoft Yahei", Helvetica, Arial, sans-serif; font-size: 13px; color: #ccc; padding: 8px 0; line-height: 40px'
	log.l('%c了解更多 -> https://www.yunclever.com', style);
})();
/* menu */
jQuery(document).ready(function() {
	if( jQuery(window).width() > 767) {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   });
	   jQuery('.nav li.dropdown-menu').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   });
	}
	jQuery('.nav li.dropdown').find('.caret').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 768) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
	/* Menu Tab */
	jQuery("li").on('click', function () {
        jQuery(".p_front").addClass("hidden");
        jQuery("." + jQuery(this).attr("id")).removeClass("hidden");
    });
});
/*about theme page menu active */
jQuery(document).ready(function() {
	var active_menu;
	jQuery('.theme-menu').click(function(){
		active_menu=jQuery(this).attr('id');
		jQuery('.theme-menu').removeClass('active');
		jQuery('.theme-menu#'+active_menu).addClass('active');
	});
});
/* menu */
jQuery(document).ready(function() {
	if( jQuery(window).width() > 767) {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   });
	   jQuery('.nav li.dropdown-submenu').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   });
	}
	jQuery('li.dropdown').find('.fa-angle-down').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 767) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
});
/* kadima social tooltip js */
jQuery(function(){
	jQuery('li').tooltip();
	jQuery("[data-toggle='tooltip']").tooltip();
	jQuery("[data-toggle='popover']").popover();
});
/* Scroll To Top Section */
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.kadima_scrollup').fadeIn();
		} else {
			jQuery('.kadima_scrollup').fadeOut();
		}
	});
	jQuery('.kadima_scrollup').click(function () {
		jQuery("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
	jQuery('#formpostmail').submit(function() {
		var name = document.getElementById('yourname').value;
		var mail = document.getElementById('youremail').value;
		var msg = document.getElementById('yourmessage').value;
		if(name!='' && mail!='' && msg!=''){
			jQuery.ajax({
				type: 'POST',
				url: 'http://api.yunclever.com/v2/Public/ybox/?',
				data: {
					service: 'Mail.sendMail',
					title: '您有新的询盘信息——来自全网平台',
					mailto: 'marketing@topillumination.com',
					content: '客户名称' + name + '<br/>' + '客户邮箱' + mail + '<br/>' + '客户信息' + msg,
					ybform: true
				},
				datatype: 'json',
				beforeSend: function () {

				},
				success: function (data) {
					alert('发送成功!')
					document.getElementById('yourname').value = ''
					document.getElementById('youremail').value = ''
					document.getElementById('yourmessage').value = ''
				},
				complete: function (XMLHttpRequest, textStatus) {
				   //alert(XMLHttpRequest.responseText);
				   //alert(textStatus);
				},
				error: function () {
				}
			});
		}
		return false;
	});
});
jQuery.browser = {};
(function () {
	jQuery.browser.msie = false;
	jQuery.browser.version = 0;
	if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
		jQuery.browser.msie = true;
		jQuery.browser.version = RegExp.$1;
	}
})();
