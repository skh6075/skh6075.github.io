
$(".nav>li").mouseover(function()
   {$(this).children(".submenu").stop().slideDown();
 });

$(".nav>li").mouseleave(function()
   {$(this).children(".submenu").stop().slideUp();
 });


start();
var imgs=2;
var now=0;

function start() {
    $(".imgs>img").eq(0).siblings().css({"margin-left":"-2000px"});
    setInterval(function() {
        slide();
    }, 2000);
}
function slide() {
    now = npw == imgs ? 0 : now ++;
    $(".imgs>img").eq(now-1).css({"margin-left":"-2000px"});
    $(".imgs>img").eq(now).cass({"margin-left":"0px"});
}