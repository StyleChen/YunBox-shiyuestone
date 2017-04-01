



jQuery(document).ready(function($){
	console.log(0)
	$("#demo li.active").css("width",function () {
        var li = $("#demo li");
		return (1 - (li.length-1)*0.07)*100 + "%";
    });
	var i=0;
	function carousel(){
			$(".secItem .col-md-4,.secItem .secH5,.secItem .secUl>li").css("opacity",1);
			$(".secItem.active .col-md-4").removeClass("fadeInLeft");
			$(".secItem.active .secH5").removeClass("fadeInRight");
			$(".secItem.active .secUl>li").removeClass("fadeInRight");
			$(".secItem.active .col-md-4").addClass("fadeOutLeft");
			$(".secItem.active .secH5").addClass("fadeOutRight");
			setTimeout(function(){
				$(".secItem.active .secUl>li:eq(0)").addClass("fadeOutRight");
			},200);
			setTimeout(function(){
				$(".secItem.active .secUl>li:eq(1)").addClass("fadeOutRight");
			},400);
			setTimeout(function(){
				$(".secItem.active .secUl>li:eq(2)").addClass("fadeOutRight");
			},600);
			setTimeout(function(){
				$(".secItem.active .col-md-4").removeClass("fadeOutLeft");
				$(".secItem.active .secH5").removeClass("fadeOutRight");
				$(".secItem.active .secUl>li").removeClass("fadeOutRight");
				$(".secItem.active").removeClass("active");
				$(".secItem .col-md-4,.secItem .secH5,.secItem .secUl>li").css("opacity",0);
				i++;
				if(i>=$(".secItem").length){i=0;}
				$(".secItem:eq("+i+")").addClass("active");
				$(".secItem .secItemD:eq("+i+") span").removeClass("active");
				$(".secItem .secItemD:eq("+i+") span").eq(i).addClass("active");
				console.log(i);
				$(".secItem.active .col-md-4").addClass("fadeInLeft");
				$(".secItem.active .secH5").addClass("fadeInRight");
				setTimeout(function(){
					$(".secItem.active .secUl>li:eq(0)").addClass("fadeInRight");
				},200);
				setTimeout(function(){
					$(".secItem.active .secUl>li:eq(1)").addClass("fadeInRight");
				},400);
				setTimeout(function(){
					$(".secItem.active .secUl>li:eq(2)").addClass("fadeInRight");
				},600)
			},1400)
	}

	$(".secItem:eq(0)").addClass("active");
	$(".secItem.active .col-md-4").addClass("fadeInLeft");
	$(".secItem.active .secH5").addClass("fadeInRight");
	setTimeout(function(){
		$(".secItem.active .secUl>li:eq(0)").addClass("fadeInRight");
	},200);
	setTimeout(function(){
		$(".secItem.active .secUl>li:eq(1)").addClass("fadeInRight");
	},400);
	setTimeout(function(){
		$(".secItem.active .secUl>li:eq(2)").addClass("fadeInRight");
	},600);
	$(".sectionFirst .secItemD span").eq(0).addClass("active");
	// var interval = setInterval(carousel,7000);

	$(".sectionFirst").hover(function(){
		// clearInterval(interval);
		$(".sectionFirst .controller-pre,.sectionFirst .controller-next").css("display","block");
	},function(){
		// var interval = setInterval(carousel,7000);
		$(".sectionFirst .controller-pre,.sectionFirst .controller-next").css("display","none");
	});

	$(".sectionFirst .controller-pre").click(function(){
		i-=2;
		if(i<-1){
			i=$(".secItem").length -2;
		}
		carousel()
	});
	$(".sectionFirst .controller-next").click(function(){
		carousel()
	});







/**
 * Created by Admin on 2017/3/27.
 */

var t=0;
function carousel2(){
    $(".secItem2 .col-md-4,.secItem2 .secH5,.secItem2 .secUl>li").css("opacity",1);
    $(".secItem2.active .col-md-4").removeClass("fadeInRight");
    $(".secItem2.active .secH5").removeClass("fadeInLeft");
    $(".secItem2.active .secUl>li").removeClass("fadeInLeft");
    $(".secItem2.active .col-md-4").addClass("fadeOutRight");
    $(".secItem2.active .secH5").addClass("fadeOutLeft");
    setTimeout(function(){
        $(".secItem2.active .secUl>li:eq(0)").addClass("fadeOutLeft");
    },200)
    setTimeout(function(){
        $(".secItem2.active .secUl>li:eq(1)").addClass("fadeOutLeft");
    },400)
    setTimeout(function(){
        $(".secItem2.active .secUl>li:eq(2)").addClass("fadeOutLeft");
    },600)
    setTimeout(function(){
        $(".secItem2.active .col-md-4").removeClass("fadeOutRight");
        $(".secItem2.active .secH5").removeClass("fadeOutLeft");
        $(".secItem2.active .secUl>li").removeClass("fadeOutLeft");
        $(".secItem2.active").removeClass("active");
        $(".secItem2 .col-md-4,.secItem2 .secH5,.secItem2 .secUl>li").css("opacity",0);
        t++;
        if(t>=$(".secItem2").length){t=0;}
        $(".secItem2:eq("+t+")").addClass("active");
        $(".secItem2 .secItemD:eq("+t+") span").removeClass("active");
        $(".secItem2 .secItemD:eq("+t+") span").eq(t).addClass("active");
        console.log(t)
        $(".secItem2.active .col-md-4").addClass("fadeInRight");
        $(".secItem2.active .secH5").addClass("fadeInLeft");
        setTimeout(function(){
            $(".secItem2.active .secUl>li:eq(0)").addClass("fadeInLeft");
        },200);
        setTimeout(function(){
            $(".secItem2.active .secUl>li:eq(1)").addClass("fadeInLeft");
        },400);
        setTimeout(function(){
            $(".secItem2.active .secUl>li:eq(2)").addClass("fadeInLeft");
        },600)
    },1400)
}

$(".secItem2:eq(0)").addClass("active");
$(".secItem2.active .col-md-4").addClass("fadeInRight");
$(".secItem2.active .secH5").addClass("fadeInLeft");
setTimeout(function(){
    $(".secItem2.active .secUl>li:eq(0)").addClass("fadeInLeft");
},200);
setTimeout(function(){
    $(".secItem2.active .secUl>li:eq(1)").addClass("fadeInLeft");
},400);
setTimeout(function(){
    $(".secItem2.active .secUl>li:eq(2)").addClass("fadeInLeft");
},600);
$(".sectionSecond .secItemD span").eq(0).addClass("active")
// var interval2 = setInterval(carousel2,7000);

$(".sectionSecond").hover(function(){
    // clearInterval(interval2);
    $(".sectionSecond .controller-pre,.sectionSecond .controller-next").css("display","block");
},function(){
    // var interval2 = setInterval(carousel2,7000);
    $(".sectionSecond .controller-pre,.sectionSecond .controller-next").css("display","none");
});

$(".sectionSecond .controller-pre").click(function(){
    t-=2;
    if(t<-1){
        t=$(".secItem2").length -2;
    }
    carousel2()
});
$(".sectionSecond .controller-next").click(function(){
    carousel2()
})

if($(window).scrollTop() >=500){
	carousel();
}

	// 证书放大预览
$(".certificate dt").click(function () {
	console.log(0)
	var src = $(this).find("img").attr("src");
	$(".big").css("display","block");
	$(".big img").attr("src",src)
})
    $(".big img").click(function () {
		$(".big").css("display","none")
    })







})
jQuery(document).ready(function() {
    $('.zm_banners').backstretch([
        "http://web.paotuixiaomei.cn/static/images/liebiao_02.jpg",
        "http://web.paotuixiaomei.cn/static/images/2.jpg",
        "http://web.paotuixiaomei.cn/static/images/liebiao_01.jpg",
        "http://web.paotuixiaomei.cn/static/images/1.jpg",
        "http://web.paotuixiaomei.cn/static/images/3.jpg",
        "http://web.paotuixiaomei.cn/static/images/4.jpg"
    ], {
        fade: 2000,
        duration: 3000
    });

});