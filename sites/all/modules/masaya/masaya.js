(function($){
    window.submitContact =  function () {
        var site_path = Drupal.settings.masaya.sitepath;
        var lastname = $('#con-lastname').val();
        var firstname = $('#con-firstname').val();
        var email = $('#email').val();
        var hostel = $('#con-hostel_name').val();
        var object = $('#con-object').val();
        var text = $('#con-textarea').val();

        $.ajax({
            data: ({'lastname' : lastname , 
                    'firstname' : firstname, 
                    'email' : email , 
                    'hostel' : hostel , 
                    'object': object , 
                    'message': text 
                  }),

            type: "POST",

            url: site_path+'/sendEmail',

            success: function(data) {
                confirmBox('Your message has been sent.');
            }
        });
        return false;
    }
    $(document).ready(function(){
        /*Make all the vos voyages boxes of same height*/
        var max = 0;
        $('.travel_listing-inner > h6').each(function(){
            var x = $(this).height();
            if(max < x){
                max = x;
            }
        });
        max = max + 20;
        $('.travel_listing-inner > h6').css('height', max+'px');
        /* End */
        /*Make all Ps in popular activities of same height*/
        max = 0;
        $('.blog_list_content_in > p').each(function(){
            var x = $(this).height();
            if(max < x){
                max = x;
            }
        });
        //max = max + 20;
        $('.col-md-3.col-sm-3.space1cell > .blog_list-inner > .blog_list_content_in > p').css('height', max+'px');
        /* End */
        /*Make all s in popular activities of same height*/
        max = 0;
        $('.blog_list_content_in > h6').each(function(){
            var x = $(this).height();
            if(max < x){
                max = x;
            }
        });
        //max = max + 20;
        $('.col-md-3.col-sm-3.space1cell > .blog_list-inner > .blog_list_content_in > h6').css('height', max+'px');
        /* End */
        /*Make all s in popular activities of same height*/
        max = 0;
        $('.carousel-inner > .item').each(function () {
            var x = $(this).height();
            if (max < x) {
                max = x;
            }
        });
        $('.carousel-inner').css('height', max + 'px');
        /* End */

        /*Make all s in popular activities of same height*/
        max = 0;
        $('.forsameheight .items_content_p').each(function () {
            var x = $(this).height();
            if (max < x) {
                max = x;
            }
        });
        $('.forsameheight .items_content_p').css('height', max + 'px');
        /* End */
        $('.comment-by-anonymous .username').each(function (){
            $(this).text($(this).text().slice(0,-14));
        });
    });
})(jQuery);