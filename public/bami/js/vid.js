function scrollbarFocused(t){t.css("background","linear-gradient(to bottom,white,white,white,white,white,#9E9E9E,#9E9E9E,#9E9E9E,#9E9E9E,#9E9E9E,white,white,white,white,white)")}function scrollbarUnfocused(t){t.css("background","linear-gradient(to bottom,white,white,white,white,#9E9E9E,white,white,white,white)")}function scrollbarSetWidth(t,i){scrollbarReset(t,i),scrollbarRenderButton(i);var o=i.children().width(),e=t.parent().outerWidth(),r=parseInt(e/3),n=2*e-o;scrollbarWidth=n>=r?n:r,r>n?t.prop("scrollConst",(o-e)/(e-r)):t.prop("scrollConst",1),t.outerWidth(scrollbarWidth)}function scrollbarRender(t,i){var o=i.scrollLeft()/t.prop("scrollConst");t.css("margin-left",o),scrollbarRenderButtonVisibility(i)}function scrollbarReset(t,i){t.css("margin-left",0),i.scrollLeft(0)}function scrollbarRenderButton(t){var i=t.find("button"),o=t.position().top+t.outerHeight()/2-i.outerHeight()/2;i.css("top",o),scrollbarRenderRightButton(t),scrollbarRenderButtonVisibility(t)}function scrollbarRenderRightButton(t){var i=t.find("button.right"),o=t.position().left+t.outerWidth()-i.outerWidth();i.css("left",o)}function scrollbarRenderButtonVisibility(t){var i=t.scrollLeft()+t.outerWidth(),o=t.children().width(),e="0.5";0==t.scrollLeft()?(t.find("button.left").css("opacity",e),t.find("button.right").css("opacity","1.0")):i==o?(t.find("button.left").css("opacity","1.0"),t.find("button.right").css("opacity",e)):(t.find("button.left").css("opacity","1.0"),t.find("button.right").css("opacity","1.0"))}function flipTrailer(t,i,o){var e=t.height();i.hide(),o.show();var r=t.height();o.hide(),t.height(e);var n=e>r?"-="+(e-r):"+="+(r-e);t.delay(500).animate({height:n},1e3,function(){t.height("auto"),o.show()})}function RenderSummaryHeader(){var t=$(window).width()<535?"20px":"30px";$("div#summary > div:first-child > span:first-of-type").css("font-size",t)}function RenderHeader(){var t=$(window).width()<535?"18px":"24px";$("span.header-responsive").css("font-size",t)}function setStripebtn(t,i){var o=$("div#"+t+" button.stripe-button-el > span"),e=o.parent();e.removeClass("stripe-button-el"),e.addClass("btn btn-danger btn-block"),o.html(i)}$(function(){$("div").on("custom.scrollableGallary",function(){$(this).wrap('<div class="scrollbody"></div>');var t=$(this).parent();t.after('<div class="scrollbox"><div></div></div>');var i=t.siblings().last().children();i.prop("scrollConst",1),t.append('<button class="left btn"><i class="glyphicon glyphicon-chevron-left"></i></button>'),t.append('<button class="right btn"><i class="glyphicon glyphicon-chevron-right"></i></button>'),t.find("button").css("outline","none"),t.find("button.left").css("box-shadow","2px -1px 2px 1px rgba(0, 0, 0, .2)"),t.find("button.right").css("box-shadow","-2px -1px 2px 1px rgba(0, 0, 0, .2)"),t.find("button").mouseover(function(){1==$(this).css("opacity")&&$(this).find("i").css("opacity","1.0"),$(this).css("box-shadow",($(this).is(".left")?"":"-")+"2px -1px 2px 1px rgba(0, 0, 0, .5)")}),t.find("button").mouseout(function(){$(this).find("i").css("opacity","0.5"),$(this).css("box-shadow",($(this).is(".left")?"":"-")+"2px -1px 2px 1px rgba(0, 0, 0, .2)")});var o=$(this).children(),e=o.eq(0).outerWidth()*(o.length-1)+o.last().outerWidth();$(this).css("min-width",e+"px");var r=!1,n=!1,s=0;scrollbarSetWidth(i,t),$(window).resize(function(){scrollbarSetWidth(i,t)}),i.mouseout(function(){n=!0,r||scrollbarUnfocused(i)}),i.mouseover(function(){n=!1,r||scrollbarFocused(i)}),$(window).mouseup(function(){r=!1}),i.mousedown(function(){r=!0}),$(window).mousemove(function(o){if(r){if(o.pageX!=s){var e=o.pageX-s+parseInt(i.css("margin-left").replace("px","")),l=i.parent().outerWidth()-i.outerWidth();e>=0&&l>=e&&(i.css("margin-left",e),t.scrollLeft(e*i.prop("scrollConst")),t.find("button.left").show(),scrollbarRenderButtonVisibility(t))}}else n&&scrollbarUnfocused(i);s=o.pageX}),t.find("button.left").hide(),t.find("button.left").click(function(){var o=t.scrollLeft()-t.outerWidth();t.scrollLeft(0>o?0:o),scrollbarRender(i,t)}),t.find("button.right").click(function(){t.find("button.left").show();var o=t.scrollLeft()+t.outerWidth(),e=t.children().width();t.scrollLeft(o>e?e:o),scrollbarRender(i,t)})})}),$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$(function(){renderObj(RenderSummaryHeader),$("div#trailer > div:first-child > button").click(toggleTrailer),$("button#watchTrailer").click(toggleTrailer),renderObj(RenderHeader),$("div.scrollableGallary").triggerHandler("custom.scrollableGallary")});