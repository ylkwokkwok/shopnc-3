define(function(require,exports,module){var c=require("../zepto");var e=c(document),a,d;function b(){var f=a.attr("hl-cls");clearTimeout(d);a.removeClass(f).removeAttr("hl-cls");
a=null;e.off("touchend touchmove touchcancel",b);}c.fn.highlight=function(g,f){return this.each(function(){var h=c(this);h.css("-webkit-tap-highlight-color","rgba(255,255,255,0)").off("touchstart.hl");
g&&h.on("touchstart.hl",function(j){var i;a=f?(i=c(j.target).closest(f,this))&&i.length&&i:h;if(a){a.attr("hl-cls",g);d=setTimeout(function(){a.addClass(g);
},100);e.on("touchend touchmove touchcancel",b);}});});};});