define(function(require,exports,module){var a=require("./zepto");require("./utils/touch");require("./utils/slide");a(".J-cate-2").on("click",function(c){if(a(this).hasClass("current")){a(this).next("ul").slideUp(500,function(){a(".J-cate-2").removeClass("current");
});}else{var b=a(this);a(".current").next("ul").slideUp(500,function(){a(".J-cate-2").removeClass("current");console.info(b);b.addClass("current");});a(this).next("ul").slideDown("500");
b.addClass("current");}});});