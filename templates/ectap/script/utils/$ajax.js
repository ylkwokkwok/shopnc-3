define(function(require,exports,module){var e=require("./gmu");var d=e.$;var c=/^#.+$/,b={},a={loading:'<div class="ui-loading">Loading</div>',error:'<p class="ui-load-error">内容加载失败!</p>'};
e.Tabs.register("ajax",{_init:function(){var h=this._options,f,g,j;this.on("ready",function(){f=h.items;for(g=0,j=f.length;g<j;g++){f[g].href&&!c.test(f[g].href)&&(f[g].isAjax=true);
}this.on("activate",this._onActivate);f[h.active].isAjax&&this.load(h.active);});},destroy:function(){this.off("activate",this._onActivate);this.xhr&&this.xhr.abort();
return this.origin();},_fitToContent:function(g){var f=this._options;if(!f._fitLock){return this.origin(g);}},_onActivate:function(f,g){g.isAjax&&this.load(g.index);
},load:function(h,l){var k=this,i=k._options,g=i.items,j,m,f;if(h<0||h>g.length-1||!(j=g[h])||!j.isAjax||((m=k._getPanel(h)).text()&&!l&&b[h])){return this;
}(f=k.xhr)&&setTimeout(function(){f.abort();},400);i._loadingTimer=setTimeout(function(){m.html(a.loading);},50);i._fitLock=true;k.xhr=d.ajax(d.extend(i.ajax||{},{url:j.href,context:k.$el.get(0),beforeSend:function(p,n){var o=e.Event("beforeLoad");
k.trigger(o,p,n);if(o.isDefaultPrevented()){return false;}},success:function(n,p){var o=e.Event("beforeRender");clearTimeout(i._loadingTimer);k.trigger(o,n,m,h,p);
if(!o.isDefaultPrevented()){m.html(n);}i._fitLock=false;b[h]=true;k.trigger("load",m);delete k.xhr;k._fitToContent(m);},error:function(){var n=e.Event("loadError");
clearTimeout(i._loadingTimer);b[h]=false;k.trigger(n,m);if(!n.isDefaultPrevented()){m.html(a.error);}delete k.xhr;}}));}});});