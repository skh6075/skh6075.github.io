$(".nav>li").mouseover(function(){
    $(this).children(".submenu").stop().slideDown();
});
$(".nav>li").mouseleave(function(){
    $(this).children(".submenu").stop().slideUp();
});

start();
var imgs = 2;
var now = 0;
function start(){
    $(".imgs>img").eq(0).siblings().css({"margin-left":"-2000px"});
    setInterval(function(){slide();},2000);
};
function slide(){
    now = now==imgs?0:now+=1;
    $(".imgs>img").eq(now-1).css({"margin-left":"-2000px"});
    $(".imgs>img").eq(now).css({"margin-left":"0px"});
};

function winOpen(){
    window.open('contact.html', 'child', 'toobar=no, location=no, status=no, menubar=no, resizable=no, scrollbars=no, width=500, height=300')
};