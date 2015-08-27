(function($){
  if(!$.browser){
    $.browser={chrome:false,mozilla:false,opera:false,msie:false,safari:false};
    var ua=navigator.userAgent;
    $.each($.browser,function(c,a){
    $.browser[c]=((new RegExp(c,'i').test(ua)))?true:false;
        if($.browser.mozilla && c =='mozilla'){$.browser.mozilla=((new RegExp('firefox','i').test(ua)))?true:false;};
        if($.browser.chrome && c =='safari'){$.browser.safari=false;};
    });
  };
})(jQuery);