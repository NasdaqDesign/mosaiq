!function(a){(new WOW).init(),hideNav=function(b,c){setTimeout(function(){a(".navbar-main").addClass("hide-top"),a(".fp__menu-toggle").addClass("show"),a(".fp__footer").addClass("show"),a("#sub-floor").animate({bottom:"-70px"},250),b.animate({opacity:"1"},500)},c)},buildMap=function(a){var b=a.find(".region-count").data("amers"),c=a.find(".region-count").data("emea"),d=a.find(".region-count").data("apac");a.append('<span data-hover="amers" style="top: 24%; left: 13%;" class="count">AMERS<strong>'+b+"</strong></span>").append('<span data-hover="emea" style="top: 36%; left: 46%;" class="count">EMEA<strong>'+c+"</strong></span>").append('<span data-hover="apac" style="top: 24%; left: 68%;" class="count">APAC<strong>'+d+"</strong></span>")},placePoints=function(b){b.find(".image-wrapper").each(function(){for(var b=a(this),c=b.find(".data-wrapper").data("annotations"),d=0;d<c.length;d++){var e=c[d].xperc,f=c[d].yperc,g=c[d].heading,h=c[d].annotation,i=b.find("img").width(),j=b.find("img").height(),k=i*e,l=j*f;b.append('<a href="#" data-container="body" data-placement="top" data-toggle="popover" data-content="'+h+'" title="'+g+'" style="left: '+(k-25)+"px; top: "+(l-25)+'px;" class="target"><i class="fa fa-bullseye"></i></a>')}})},a(document).ready(function(){var b=(a("body"),a(window));a(document),object_name.templateUrl;a('a.anchor[href*="#"]:not([href="#"])').click(function(b){if(b.preventDefault(),location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var c=a(this.hash);if(c=c.length?c:a("[name="+this.hash.slice(1)+"]"),c.length)return a("html,body").animate({scrollTop:c.offset().top-50},250),!1}}),a("body").hasClass("home")&&a(".home__product > a, .home__research > a").on("click",function(b){b.preventDefault();var c=a(this).data("target");a(".home__product, .home__research").removeClass("active"),"product"==c?(a(".home__product").css("width","100%"),a(".home__research").css("width","0%"),setTimeout(function(){a(".home__product").addClass("active"),a(".design__resources-slider").slick({dots:!1,arrows:!1,autoplay:!0})},500)):"research"==c?(a(".home__product").css("width","0%"),a(".home__research").css("width","100%"),setTimeout(function(){a(".home__research").addClass("active")},500)):"home"==c&&(a(".home__product").css("width","50%"),a(".home__research").css("width","50%"))}),a(".fp__menu-toggle").click(function(b){b.preventDefault(),a(".navbar-main").toggleClass("hide-top"),a(this).toggleClass("spin")}),a("#bgvid, .navbar-main").animate({opacity:"1"},250),a('[data-toggle="tooltip"]').tooltip(),b.on("scroll",function(){b.scrollTop()>=50?a(".navbar-main").addClass("filled"):a(".navbar-main").removeClass("filled")}),b.stellar({horizontalScrolling:!1});var c=a(document).height()-32;a(".iframe-wrapper").css("height",c),a(".participant-modal").on("hide.bs.modal",function(){var b=a(this).find("audio");b&&b.trigger("pause")})})}(jQuery);