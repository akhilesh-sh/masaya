//Footer yellow toggle script -->
    jQuery('#tab-bottom-container').easytabs({
        animate: true,
        animationSpeed: 0,
        collapsible: true,
        transitionInEasing: 'swing',
    });
    function confirmBox(message){
        alert(message);
        return true;
    }
  jQuery(document).ready(function(){
    jQuery(".fo_close").on('click',function(){
        jQuery('#tab-bottom-container > ul.contant_cities_foo > li.active > a').trigger('click');
        jQuery('#tab-bottom-container > .contant_cities_foo > li > a').removeAttr('class');
    });
  });
  jQuery(document).on('click','#foo-map-view',function(){
    jQuery(".foo-info-view").slideUp('fast');
    jQuery(".foo-contact-view").slideUp('fast');
    jQuery(".foo-map-view").slideToggle('fast', function(){ 
      santa_marta_map(add1);
      google.maps.event.trigger(map4,"resize");
    });
  });
  (function ($){

    $(document).ready(function(){
        $(".custom-select").each(function(){ 
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".custom-select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
    });

    $(document).ready(function(){
        $(".reserver_con") .click( function(){
          $(".reserver_top_form") .slideToggle("slow"); 
         })   
      });

    $(window).scroll(function() {

        if ($(window).scrollTop() > 120) {
            $('.main_h').addClass('sticky');
        } else {
            $('.main_h').removeClass('sticky');
        }
    });

    $('.mobile-toggle').click(function() {
        if ($('.main_h').hasClass('open-nav')) {
            $('.main_h').removeClass('open-nav');
        } else {
            $('.main_h').addClass('open-nav');
        }
    });

    $('.main_h li a').click(function() {
        if ($('.main_h').hasClass('open-nav')) {
            $('.navigation').removeClass('open-nav');
            $('.main_h').removeClass('open-nav');
        }
    });

    $('nav a').click(function(event) {
        var id = $(this).attr("href");
        var offset = 70;
        var target = $(id).offset().top - offset;
        $('html, body').animate({
            scrollTop: target
        }, 500);
        event.preventDefault();
    });
    $('#tab-bottom-container > .contant_cities_foo > li > a').removeAttr('class');

    $('#datetimepicker2').datetimepicker({
        locale: 'es',
        format: 'MM/DD/YYYY'
    });

    $('#datetimepicker3').datetimepicker({
        locale: 'es',
        format: 'MM/DD/YYYY'
    });

    $("#datetimepicker2").on("dp.change", function (e) {
        $('#datetimepicker3').data("DateTimePicker").minDate(e.date);
        setArrivalTime(e);
    });

    $("#datetimepicker3").on("dp.change", function (e) {
        $('#datetimepicker2').data("DateTimePicker").maxDate(e.date);
        setDepartureTime(e);
    });
    window.submitReservation =  function () {
        if (!$("input[name='hostel_name']").is(':checked')) {
            alert('Please choose the hostel to look for!');
            return false;
        }
 
        var action  = 'http://www.booking.com/hotel/co/'+ $('input:radio[name = hostel_name]:checked').val()+'.'+$('#language_code').val()+'.html';
 
        if ($('input:radio[name = hostel_name]').val() == 'hostal-masaya-santa-marta') {
                $('#hotel_id').val('719664');
        }
        else{
                $('#hotel_id').val('387666');
        }
        $('#reserverForm').attr('action', action);
        $('form#reserverForm').submit();
    }
    
    $('.blog_list_content_in .btn.btn-yellow.btn-cont').click(function(e){
        e.preventDefault();
        $('a[href="#bottom-tab3"]').trigger('click');
        //$('body').scrollTo('');
        $('html, body').animate({
            scrollTop: $("#bottom-tab3").offset().top
        }, 200);
    });
    jQuery(document).ready(function(){
        jQuery("#yallo_mobile_toggle").click(function(){
            jQuery("#yallo_mobile_pannel").slideToggle("slow");
        });
    });

    jQuery(document).ready(function(){
        jQuery("#second_yallo_mobile_toggle").click(function(){
            jQuery(".mobile_yallow_strip").slideToggle("slow");
        });
    });


})(jQuery);

(function(jQuery){
  var ico = jQuery('<i class="fa fa-caret-right"></i>');
  jQuery('nav#menu li:has(ul) > a').append(ico);
  
  jQuery('nav#menu li:has(ul)').on('click',function(){
    jQuery(this).toggleClass('open');
  });
  
  jQuery('button#toggle').on('click',function(e){
    jQuery('html').toggleClass('open-menu');
    return false;
  });
  
  
  jQuery('div#overlay').on('click',function(){
    jQuery('html').removeClass('open-menu');
  })
  
})(jQuery)

jQuery(function()
{
    var win = jQuery(window);
    // Full body scroll
    var isResizing = false;
    win.bind(
        'resize',
        function()
        {
            if (!isResizing) {
                isResizing = true;
                var container = jQuery('#full-page-container');
                // Temporarily make the container tiny so it doesn't influence the
                // calculation of the size of the document
                container.css(
                    {
                        'width': 1,
                        'height': 1
                    }
                );
                // Now make it the size of the window...
                container.css(
                    {
                        'width': win.width(),
                        'height': win.height()
                    }
                );
                isResizing = false;
                container.jScrollPane(
                    {
                        'showArrows': true
                    }
                );
            }
        }
    ).trigger('resize');

    // Workaround for known Opera issue which breaks demo (see
    // http://jscrollpane.kelvinluck.com/known_issues.html#opera-scrollbar )
    jQuery('body').css('overflow', 'hidden');

    // IE calculates the width incorrectly first time round (it
    // doesn't count the space used by the native scrollbar) so
    // we re-trigger if necessary.
    if (jQuery('#full-page-container').width() != win.width()) {
        win.trigger('resize');
    }

    // Internal scrollpanes
    jQuery('#Section_1_panel').jScrollPane({showArrows: true});
});



  


// Footer yellow toggle script -->